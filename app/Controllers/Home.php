<?php

namespace App\Controllers;

use App\Models\User as UserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('/halamanUtama');
    }

    public function about()
    {
        return view('/about');
    }
}
