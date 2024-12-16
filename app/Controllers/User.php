<?php

namespace App\Controllers;

use App\Models\User as UserModel;

class User extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        $username = session()->get('username');

        $data = [
            'user' => $model->getUser($username),
        ];

        return view('profile', $data);
    }

    public function update()
    {
        $model = new UserModel();

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telepon' => $this->request->getPost('no_telepon'),
        ];

        $model->updateUser(session()->get('username'), $data);

        session()->set('nama_lengkap', $data['nama_lengkap']);

        if (session()->get('level') == 1){
            echo "<script>alert('Data berhasil disimpan');window.location = ('/halamanUtama') </script>";
        } else {
            echo "<script>alert('Data berhasil disimpan');window.location = ('/admin/dashboard') </script>";
        }
    }
}
