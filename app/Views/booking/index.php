<?= $this->extend('Layout/index'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Booking</h1>
        <a href="<?= base_url() ?>tukangcukur/booking/tampil/tambah" class="d-none d-sm-inline-block btn btn-primary shadow-sm">Tambah</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Jenis Layanan</th>
                            <th>Nama Barber</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($booking as $b) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $b['pelanggan_name']; ?></td>
                                <td><?= $b['jenis_layanan']; ?></td>
                                <td><?= $b['barber_name']; ?></td>
                                <td>
                                    <a href="<?= base_url()?>/tukangcukur/booking/tampil/edit/<?= $b['id_pesanan'];?>" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url()?>/tukangcukur/booking/hapus/<?= $b['id_pesanan'];?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus booking ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
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