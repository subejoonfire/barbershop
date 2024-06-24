<?= $this->extend('Layout/index'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pesanan</h1>
    </div>

    <?php //if (session()->has('message')): ?>
    <div class="alert alert-success">
        <?= session('message') ?>
    </div>
    <?php// endif; ?>

    <?php if (session()->has('error')): ?>
    <div class="alert alert-danger">
        <?= session('error') ?>
    </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow ">

        <div class="card-body">
            <form action="/Pelanggan/simpanPesanan" method="post">
                <?= csrf_field() ?>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="service">Pilih Layanan:</label>
                        <select id="service" name="service" class="form-control" required>
                            <option value="haircut">Haircut</option>
                            <option value="perm">Perm</option>
                            <option value="smoothing">Smoothing</option>
                            <option value="hair-coloring">Hair Coloring</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="artist">Pilih Hair Artist:</label>
                        <select id="artist" name="artist" class="form-control" required>
                            <option value="artist1">Artist 1</option>
                            <option value="artist2">Artist 2</option>
                            <option value="artist3">Artist 3</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jam">Jam Mulai</label>
                        <input type="time" name="jam" class="form-control" id="jam" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="estimasi">Estimasi Berakhir</label>
                        <input type="time" name="estimasi" class="form-control" id="estimasi" required>
                    </div>
                    <div class="btntambahform">
                        <a href="/Pesanan"><button type="button" class="btn btn-secondary mb-md-n3 btnformtambah">Batal</button></a>
                        <button type="submit" class="btn btn-primary mb-md-n3 btnformtambah">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>
