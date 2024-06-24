<?= $this->extend('Layout/index'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pesanan</h1>
        <a href="/TambahPesanan" class="d-none d-sm-inline-block btn btn-primary shadow-sm">Tambah</a>
    </div>
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Layanan</th>
                            <th>Pelanggan</th>
                            <th>Hair Artist</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Estimasi Berakhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($pesanan as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['jenis_layanan'] ?></td>
                            <td><?= $item['pelanggan_nama'] ?></td>
                            <td><?= $item['barber_nama'] ?></td>
                            <td><?= $item['tanggal'] ?></td>
                            <td><?= $item['jam_mulai'] ?></td>
                            <td><?= $item['estimasi_berakhir'] ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="/pesanan/ubah/<?= $item['id_pesanan'] ?>" class="btn btn-outline-warning btn-sm">
                                        <img class="fotoicontabel" src="/icons/edit.svg" alt="Ubah">
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#hapuspesananmodal" data-id="<?= $item['id_pesanan'] ?>" class="btn btn-outline-danger btn-sm">
                                        <img class="fotoicontabel" src="/icons/delete.svg" alt="Hapus">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<div class="modal fade" id="hapuspesananmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">Apakah anda Yakin Ingin Menghapus Data Pesanan ini?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                <a class="btn btn-primary" id="confirm-delete-btn" href="#">Yakin</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
