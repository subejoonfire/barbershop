<?php

namespace App\Controllers;

use App\Models\Pelanggan\M_Pelanggan;

class Pelanggan extends BaseController
{
    public function index()
    {
        $model = new M_Pelanggan();
        $data['pesanan'] = $model->findAll();

        return view('pelanggan/pelanggan', $data);
    }
}
