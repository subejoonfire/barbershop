<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Booking extends BaseController
{
    protected $M_Barber, $M_Layanan, $M_Pelanggan, $M_pesanan;
    public function __construct()
    {
        $this->M_Barber = new \App\Models\Pelanggan\M_Barber();
        $this->M_Layanan = new \App\Models\Pelanggan\M_Layanan();
        $this->M_Pelanggan = new \App\Models\Pelanggan\M_Pelanggan();
        $this->M_pesanan = new \App\Models\Pelanggan\M_pesanan();
    }
    public function tambah()
    {
        if (
            empty($this->request->getPost('id_pelanggan')) ||
            empty($this->request->getPost('id_layanan')) ||
            empty($this->request->getPost('id_barber')) ||
            empty($this->request->getPost('tanggal')) ||
            empty($this->request->getPost('jam_mulai')) ||
            empty($this->request->getPost('estimasi_berakhir'))
        ) {
            return redirect()->to('/tukangcukur/booking/tampil/tambah')->with('error', 'Semua field harus diisi!');
        }
        $data = [
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'id_layanan' => $this->request->getPost('id_layanan'),
            'id_barber' => $this->request->getPost('id_barber'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jam_mulai' => $this->request->getPost('jam_mulai'),
            'estimasi_berakhir' => $this->request->getPost('estimasi_berakhir'),
        ];

        $this->M_pesanan->insert($data);

        return redirect()->to(base_url('/tukangcukur/booking/tampil/'))->with('success', 'Booking berhasil ditambahkan!');
    }
    public function hapus($id)
    {
        if (!$id) {
            return redirect()->to('/tukangcukur/booking/tampil')->with('error', 'ID tidak ditemukan!');
        }
        $this->M_pesanan->where('id_pesanan', $id)->delete();

        return redirect()->to('/tukangcukur/booking/tampil')->with('success', 'Booking berhasil dihapus!');
    }
    public function edit($id_pesanan)
    {
        $booking = $this->M_pesanan->find($id_pesanan);
        $layanan = $this->M_Layanan->findAll();
        $barber = $this->M_Barber->findAll();

        if (!$booking) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        $id_layanan = $this->request->getPost('id_layanan');
        $id_barber = $this->request->getPost('id_barber');
        $tanggal = $this->request->getPost('tanggal');
        $jam_mulai = $this->request->getPost('jam_mulai');
        $estimasi_berakhir = $this->request->getPost('estimasi_berakhir');

        if (empty($id_layanan) || empty($id_barber) || empty($tanggal) || empty($jam_mulai) || empty($estimasi_berakhir)) {
            session()->setFlashdata('error', 'Semua field harus diisi');
            return redirect()->to(base_url() . '/tukangcukur/booking/tampil/edit/' . $id_pesanan);
        }

        $data = [
            'id_layanan' => $id_layanan,
            'id_barber' => $id_barber,
            'tanggal' => $tanggal,
            'jam_mulai' => $jam_mulai,
            'estimasi_berakhir' => $estimasi_berakhir,
        ];

        $this->M_pesanan->update($id_pesanan, $data);
        session()->setFlashdata('success', 'Data pesanan berhasil diupdate');

        return redirect()->to(base_url() . '/tukangcukur/booking/tampil');

        $data['booking'] = $booking;
        $data['layanan'] = $layanan;
        $data['barber'] = $barber;

        return view('booking/edit', $data);
    }
}
