<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kendaraan as KendaraanModel;
use App\Models\Kategori as KategoriModel;
use App\Models\Booking as BookingModel;
use App\Models\User as UserModel;

class Admin extends BaseController
{
    public function index()
    {
        $booking = new BookingModel();
        $user = new UserModel();
        $kendaraan = new KendaraanModel();

        $jumlahBooking = $booking->getJumlahBooking();
        $jumlahIncome = $booking->getTotalIncome();
        $jumlahUser = $user->getJumlahUser();
        $jumlahKendaraan = $kendaraan->getJumlahKendaraan();

        $data = [
            'jumlahBooking' => $jumlahBooking,
            'jumlahUser' => $jumlahUser,
            'jumlahKendaraan' => $jumlahKendaraan,
            'jumlahIncome' => $jumlahIncome,
        ];

        return view('admin/dashboard', $data);
    }

    public function kendaraan()
    {
        $kendaraan = new KendaraanModel();
        $kategori = new KategoriModel();

        $data = [
            'kendaraan' => $kendaraan->getKendaraan(),
            'kategori' => $kategori->getKategori(),
        ];

        return view('admin/kendaraan', $data);
    }

    public function booking()
    {
        $booking = new BookingModel();

        $daftarBooking = $booking->getBookingByStatus();

        $data = [
            'booking' => $daftarBooking
        ];

        return view('admin/booking', $data);
    }

    public function updateStatus()
    {
        $id_booking = $this->request->getPost('id_booking');
        $status = $this->request->getPost('status');
        $deskripsi = $this->request->getPost('deskripsi'); 

        $booking = new BookingModel();
        $booking->updateStatusAndDeskripsi($id_booking, $status, $deskripsi);

        return json_encode(['status' => 'success']);
    }

    public function users()
    {
        $user = new UserModel();

        $data = [
            'user' => $user->getUser()
        ];

        return view('admin/users', $data);
    }

    public function saveKendaraan()
    {
        $model = new KendaraanModel();

        $data = [
            'id_kendaraan' => $this->generateNextId(),
            'kode_kategori' => $this->request->getPost('kode_kategori'),
            'merk_kendaraan' => $this->request->getPost('merk_kendaraan'),
            'varian' => $this->request->getPost('varian'),
            'kapasitas_penumpang' => $this->request->getPost('kapasitas_penumpang'),
            'tahun_produksi' => $this->request->getPost('tahun_produksi'),
            'nomor_polisi' => $this->request->getPost('nomor_polisi'),
            'harga_sewa' => $this->request->getPost('harga_sewa'),
            'gambar' => $this->getImage()
        ];

        $model->saveKendaraan($data);
        return redirect()->to(base_url('admin/kendaraan'));
    }

    function generateNextId()
    {
        $model = new KendaraanModel();

        $maxId = $model->selectMax('id_kendaraan')->first()['id_kendaraan'] ?? null;

        if ($maxId) {
            $numericPart = (int)substr($maxId, 1);
            $nextNumericPart = $numericPart + 1;
            $nextId = 'M' . str_pad($nextNumericPart, 3, '0', STR_PAD_LEFT);
        } else {
            $nextId = 'M001';
        }

        return $nextId;
    }

    function getImage()
    {
        $file = $this->request->getFile('gambar');

        if ($file->isValid()) {
            $imageName = $file->getName();
            $file->move('uploads/', $imageName, true);

            return $imageName;
        }
    }

    public function editKendaraan($id)
    {
        $model = new KendaraanModel();
        $data = $model->getKendaraan($id);

        return $this->response->setJSON($data);
    }

    public function updateKendaraan($id)
    {
        $model = new KendaraanModel();

        $data = [
            '$id_kendaraan' => $this->request->getPost('$id_kendaraan'),
            'kode_kategori' => $this->request->getPost('kode_kategori'),
            'merk_kendaraan' => $this->request->getPost('merk_kendaraan'),
            'varian' => $this->request->getPost('varian'),
            'kapasitas_penumpang' => $this->request->getPost('kapasitas_penumpang'),
            'tahun_produksi' => $this->request->getPost('tahun_produksi'),
            'nomor_polisi' => $this->request->getPost('nomor_polisi'),
            'harga_sewa' => $this->request->getPost('harga_sewa'),
        ];

        if (!empty($_FILES['gambar']['name']) || $this->request->getPost('isImageRemoved') == '1') {
            $data['gambar'] = $this->getImage();
        }

        $model->updateKendaraan($id, $data);
        return redirect()->to(base_url('admin/kendaraan'));
    }

    public function deleteKendaraan($id)
    {
        $model = new KendaraanModel();

        $model->deleteKendaraan($id);

        return redirect()->to(base_url('admin/kendaraan'));
    }
}
