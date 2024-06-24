<?php
namespace App\Models\Pelanggan;

use CodeIgniter\Model;

class M_Barber extends Model
{
    protected $table = 'barber';
    protected $primaryKey = 'id_barber';
    protected $allowedFields = ['nama'];
}
