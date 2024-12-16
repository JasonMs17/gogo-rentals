<?php

namespace App\Models;

use CodeIgniter\Model;

class Kendaraan extends Model
{
    protected $table      = 'kendaraan';
    protected $primaryKey = 'id_kendaraan';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_kendaraan', 'merk_kendaraan', 'varian', 'kode_kategori', 'kapasitas_penumpang', 'tahun_produksi', 'nomor_polisi', 'harga_sewa', 'gambar'];
    public function getKendaraan($id = false)
    {
        if ($id !== false) {
            return $this->where('id_kendaraan', $id)->first();
        } else {
            $results = $this->select('*, CONCAT(CONCAT(merk_kendaraan, " "), varian) as detail_kendaraan')
                ->findAll();

            return $results;
        }
    }

    public function getKendaraanIdByCategoryAndOption($kode_kategori, $pilihan_kendaraan)
    {
        $result = $this->select('id_kendaraan')
            ->where('kode_kategori', $kode_kategori)
            ->like("CONCAT(merk_kendaraan, ' ', varian)", $pilihan_kendaraan)
            ->first();

        return $result;
    }

    public function getJumlahKendaraan(){
        return $this->countAll();
    }
    
        public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function saveKendaraan($data)
    {
        return $this->insert($data);
    }

    public function updateKendaraan($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteKendaraan($id)
    {
        $kendaraan = $this->find($id);
        $fileName = $kendaraan['gambar'];

        if ($fileName && file_exists('/' . $fileName)) {
            unlink('uploads/' . $fileName);
        }

        $this->delete($id);
    }
}
