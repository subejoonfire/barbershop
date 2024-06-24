<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Pesanan</h1>
    </div>


    <?php if (session()->has('message')): ?>
    <div class="alert alert-success">
        <?= session('message') ?>
    </div>
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
    <div class="alert alert-danger">
        <?= session('error') ?>
    </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow ">

        <div class="card-body">
            <form method="post" action="<?= base_url('UbahPesanan/'. $id_pesanan) ?>">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Tanggal</label>
                        <input type="text" name="tanggal" class="form-control" id="validationDefault01"
                            value="<?= $tanggal ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault02">Jam Mulai</label>
                        <input type="text" name="jam_mulai" class="form-control" id="validationDefault02"
                            value="<?= $jam_mulai ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Estimasi Berakhir</label>
                        <input type="text" name="estimasi_berakhir" class="form-control" id="validationDefault01"
                            value="<?= $estimasi_berakhir ?>" readonly>
                    </div>
                        <div class="btnubahform">
                            <a class="" href="/Pesanan"><button type="button"
                                    class="btn btn-secondary mb-md-n3 btnformtambah">Batal</button></a>
                            <button type="submit" class="btn btn-primary mb-md-n3 btnformubah">Ubah</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?= $this->endSection(); ?>