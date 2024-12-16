<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;

use CodeIgniter\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id_booking';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'nama', 'no_telepon', 'id_kendaraan', 'tanggal_sewa', 'tanggal_pengembalian', 'total_biaya', 'metode_pembayaran', 'status', 'deskripsi'];

    public function getBooking($id_booking = false)
    {
        if ($id_booking !== false) {
            return $this->where('id_booking', $id_booking)->first();
        } else {
            return $this->findAll();
        }
    }

    public function getUserBooking($username)
    {
        return $this->select('booking.*, kendaraan.*, CONCAT(merk_kendaraan, " ", varian) as detail_kendaraan')
            ->join('kendaraan', 'booking.id_kendaraan = kendaraan.id_kendaraan')
            ->where('username', $username)
            ->get()
            ->getResultArray();
    }

    public function getBookingByStatus()
    {

        $daftarStatus = ["Menunggu konfirmasi", "Sukses", "Gagal"];

        foreach ($daftarStatus as $status) {

            $result = $this->select('booking.*, kendaraan.*, CONCAT(merk_kendaraan, " ", varian) as detail_kendaraan')
                ->where('status', $status)
                ->join('kendaraan', 'booking.id_kendaraan = kendaraan.id_kendaraan')
                ->findAll();

            $groupedResults[$status] = $result;
        }

        return $groupedResults;
    }

    public function updateStatusAndDeskripsi($id_booking, $status, $deskripsi)
    {
        $this->set([
            'status' => $status,
            'deskripsi' => $deskripsi,
        ])
            ->where('id_booking', $id_booking)
            ->update();
    }

    public function getJumlahBooking()
    {
        return $this->countAll();
    }

    public function getTotalIncome()
    {
        return $this->db->table('booking')
            ->selectSum('total_biaya')
            ->where('status', 'sukses')
            ->get()
            ->getRowArray()['total_biaya'];
    }

    public function saveBooking($data)
    {
        return $this->insert($data);
    }

    public function updateBooking($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBooking($id)
    {
        return $this->delete($id);
    }

    public function getMetodePembayaran()
    {
        $enumValues = $this->db->query("SHOW COLUMNS FROM booking WHERE Field = 'metode_pembayaran'")->getRow()->Type;
        preg_match('/^enum\((.*)\)$/', $enumValues, $matches);
        $enumOptions = [];
        foreach (explode(',', $matches[1]) as $option) {
            $enumOptions[] = trim($option, "'");
        }

        return $enumOptions;
    }

    public function getBookedDateRanges()
    {
        $bookings = $this->findAll();

        $bookedDateRanges = [];
        foreach ($bookings as $booking) {
            $bookedDateRanges[] = [
                'start' => $booking['tanggal_sewa'],
                'end'   => $booking['tanggal_pengembalian'],
            ];
        }

        return $bookedDateRanges;
    }
}
