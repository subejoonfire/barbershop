<?php
namespace App\Models\Pelanggan;

use CodeIgniter\Model;

class M_Layanan extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';
    protected $allowedFields = ['jenis_layanan', 'biaya', 'model_potongan'];
}
