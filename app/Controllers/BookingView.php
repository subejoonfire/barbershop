<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BookingView extends BaseController
{
    protected $M_Barber, $M_Layanan, $M_Pelanggan, $M_pesanan;
    public function __construct()
    {
        $this->M_Barber = new \App\Models\Pelanggan\M_Barber();
        $this->M_Layanan = new \App\Models\Pelanggan\M_Layanan();
        $this->M_Pelanggan = new \App\Models\Pelanggan\M_Pelanggan();
        $this->M_pesanan = new \App\Models\Pelanggan\M_pesanan();
    }
    public function index()
    {
        $data = [
            'booking' => $this->M_pesanan->join('layanan', 'pesanan.id_layanan = layanan.id_layanan')
                ->join('barber', 'pesanan.id_barber = barber.id_barber')
                ->join('pelanggan', 'pesanan.id_pelanggan = pelanggan.id_pelanggan')
                ->select('pesanan.*, layanan.jenis_layanan, barber.nama as barber_name, pelanggan.nama as pelanggan_name')
                ->findAll(),
        ];
        return view('booking/index', $data);
    }
    public function tambah()
    {
        $data = [
            'pelanggan' => $this->M_Pelanggan->findAll(),
            'layanan' => $this->M_Layanan->findAll(),
            'barber' => $this->M_Barber->findAll(),
        ];
        return view('booking/tambah', $data);
    }
    public function edit($id_pesanan)
    {
        $booking = $this->M_pesanan->find($id_pesanan);
        $layanan = $this->M_Layanan->findAll();
        $barber = $this->M_Barber->findAll();

        if (!$booking) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        $data['booking'] = $booking;
        $data['layanan'] = $layanan;
        $data['barber'] = $barber;

        return view('booking/edit', $data);
    }
}
