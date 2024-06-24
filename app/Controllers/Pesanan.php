<?php

namespace App\Controllers;

use App\Models\Pelanggan\M_Pesanan;
use App\Models\Pelanggan\M_Layanan;
use App\Models\Pelanggan\M_Pelanggan;
use App\Models\Pelanggan\M_Barber;

class Pesanan extends BaseController
{
    protected $pesananModel;
    protected $layananModel;
    protected $barberModel;
    protected $pelangganModel;

    public function index()
    {
        $pesananModel = new M_Pesanan();
        $data['pesanan'] = $pesananModel->getPesanan();

        return view('pesanan/pesanan', $data);
    }

    public function tambahPesanan()
    {
        $layananModel = new M_Layanan();
        $pelangganModel = new M_Pelanggan();
        $barberModel = new M_Barber();

        $data['layanan'] = $layananModel->findAll();
        $data['pelanggan'] = $pelangganModel->findAll();
        $data['barber'] = $barberModel->findAll();

        return view('pesanan/TambahPesanan', $data);
    }

    public function simpanPesanan()
    {
        $pesananModel = new M_Pesanan();

        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'jam_mulai' => $this->request->getPost('jam_mulai'),
            'estimasi_berakhir' => $this->request->getPost('estimasi_berakhir'),
            'id_layanan' => $this->request->getPost('id_layanan'),
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'id_barber' => $this->request->getPost('id_barber')
        ];

        $pesananModel->insert($data);

        return redirect()->to('/pesanan')->with('message', 'Pesanan berhasil ditambah.');
    }

    // Method lainnya seperti UbahPesanan, HapusPesanan dll dapat ditambahkan dengan pola yang serupa
}
