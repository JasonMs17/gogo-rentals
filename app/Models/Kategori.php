<?php

namespace App\Models;

use App\Models\Kendaraan as KendaraanModel;

use CodeIgniter\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'kode_kategori';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['kode_kategori', 'nama_kategori'];

    public function getKategori($kode_kategori = false)
    {
        if ($kode_kategori !== false) {
            return $this->where('kode_kategori', $kode_kategori)->first();
        } else {
            return $this->findAll();
        }
    }

    public function getIdKategoriByNama($nama_kategori)
    {
        return $this->select('kode_kategori')->where('nama_kategori', $nama_kategori)->first();
    }

    public function getKendaraanGroupByKategori()
    {
        $kendaraanModel = new kendaraanModel();
        $kategoriKendaraan = $this->findAll();

        foreach ($kategoriKendaraan as $kategori) {
            $listKendaraan = $kendaraanModel
                ->select('*, CONCAT(merk_kendaraan, " ", varian) as detail_kendaraan')
                ->where('kode_kategori', $kategori['kode_kategori'])
                ->findAll();

            $result[$kategori['nama_kategori']] = $listKendaraan;
        }

        return $result;
    }

    public function saveKategori($data)
    {
        return $this->insert($data);
    }

    public function updateKategori($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteKategori($id)
    {
        return $this->delete($id);
    }
}
