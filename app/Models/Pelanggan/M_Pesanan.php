<?php

namespace App\Models\Pelanggan;

use CodeIgniter\Model;

class M_Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $allowedFields = [
        'tanggal', 'jam_mulai', 'estimasi_berakhir', 
        'id_layanan', 'id_pelanggan', 'id_barber'
    ];

    public function getPesanan()
    {
        return $this->select('pesanan.*, layanan.jenis_layanan, pelanggan.nama as pelanggan_nama, barber.nama as barber_nama')
                    ->join('layanan', 'layanan.id_layanan = pesanan.id_layanan')
                    ->join('pelanggan', 'pelanggan.id_pelanggan = pesanan.id_pelanggan')
                    ->join('barber', 'barber.id_barber = pesanan.id_barber')
                    ->findAll();
    }
}
