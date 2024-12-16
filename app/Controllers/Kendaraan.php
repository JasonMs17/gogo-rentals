<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori as KategoriModel;
use App\Models\Booking as BookingModel;
use App\Models\Kendaraan as KendaraanModel;

class Kendaraan extends BaseController
{
    public function index()
    {
        $kategoriModel = new KategoriModel();
        $bookingModel = new BookingModel();
        $userLoggedIn = session('isLoggedIn') ?? false;

        $data = [
            'kendaraan' => $kategoriModel->getKendaraanGroupByKategori(),
            'bookedDateRanges' => $bookingModel->getBookedDateRanges(),
            'metode' => $bookingModel->getMetodePembayaran(),
            'userLoggedIn' => $userLoggedIn,
        ];

        return view('browse', $data);
    }

    public function save()
    {
        $bookingModel = new BookingModel();
        $kendaraanModel = new KendaraanModel();
        $kategoriModel = new KategoriModel();

        $kategori = $this->request->getPost('kategori');
        $id_kategori = $kategoriModel->getIdKategoriByNama($kategori);
        $pilihan_kendaraan = $this->request->getPost('pilihan_kendaraan');

        $data = [
            'username' => session('username'),
            'nama' => $this->request->getPost('nama'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'id_kendaraan' => $kendaraanModel->getKendaraanIdByCategoryAndOption($id_kategori, $pilihan_kendaraan),
            'tanggal_sewa' => $this->request->getPost('tgl_sewa'),
            'tanggal_pengembalian' => $this->request->getPost('tgl_pengembalian'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'total_biaya' => intval($this->request->getPost('total_biaya')),
        ];

        $bookingModel->saveBooking($data);
        return redirect()->to(base_url('myBooking'));
    }
}
