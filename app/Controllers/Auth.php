<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Auth extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);

        $remember_me = $this->request->getCookie('remember_me');

        if ($remember_me) {
            $db = db_connect();
            $query = $db->query("SELECT * FROM users WHERE remember_me = '$remember_me'");
            $user = $query->getRowArray();

            if ($user) {
                $this->setUserSession($user);
                redirect()->to(base_url('halamanUtama'));
            }
        }

        if ($this->request->is('post')) {
            $rules = [
                'username' => 'required',
                'password' => 'required|validateUser[username, password]',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'Username or password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new User();

                $user = $model->where('username', $this->request->getVar('username'))->first();
                $this->setUserSession($user);

                if (session()->get("level") == 1) {
                    return redirect()->to(base_url('halamanUtama'))->withCookies();
                } else {
                    return redirect()->to(base_url('admin/dashboard'))->withCookies();
                }
            }
        }

        return view('login', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'nama_lengkap' => $user['nama_lengkap'],
            'username' => $user['username'],
            'level' => $user['level'],
            'isLoggedIn' => true,
        ];

        if (!empty($this->request->getVar('remember_me'))) {
            $remember_me = bin2hex(random_bytes(20));
            $this->response->setCookie('remember_me', $remember_me, 3600);

            $model = new User();
            $model->update($user['username'], ['remember_me' => $remember_me]);
        }

        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [];
        helper(['form']);

        if ($this->request->is('post')) {
            $rules = [
                'username' => 'required|is_unique[users.username]',
                'password' => 'required',
                'pass_confirm' => 'matches[password]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new User();

                $data = [
                    'username' => $this->request->getVar('username'),
                    'password' => $this->request->getVar('password'),
                    'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_telepon' => $this->request->getVar('no_telepon'),
                ];

                $model->insert($data);

                session()->setFlashData('success', 'Register Success!');
                return redirect()->to(base_url('/login'));
            }
        }
        return view('register', $data);
    }

    public function logout()
    {
        session()->destroy();

        if ($this->request->getCookie('remember_me')) {
            $this->response->deleteCookie('remember_me');
        }

        return redirect()->to(base_url('login'))->withCookies();
    }
}
