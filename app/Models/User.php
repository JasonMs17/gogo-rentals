<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'username';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username', 'password', 'nama_lengkap', 'alamat', 'no_telepon', 'level', 'remember_me',
    ];

    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $beforeUpdate   = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
    public function getUser($username = false)
    {
        if ($username === false)
            return $this->where('level', 1)->findAll();
        else
            return $this->where('username', $username)->first();
    }

    public function getJumlahUser()
    {
        return $this->where('level', 1)->countAllResults();
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function getLoggedInUser($nama_lengkap)
    {
        return $this->where('nama_lengkap', $nama_lengkap)->first();
    }
}
