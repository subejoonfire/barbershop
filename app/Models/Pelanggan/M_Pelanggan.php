<?php

namespace App\Models\Pelanggan;

use CodeIgniter\Model;

class M_Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = ['username', 'email', 'password', 'nama'];
}
