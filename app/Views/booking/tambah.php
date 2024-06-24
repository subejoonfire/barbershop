<?= $this->extend('Layout/index'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Booking</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Booking</h6>
                </div>
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
                    <form action="<?= base_url() ?>/tukangcukur/booking/tambah" method="post">
                        <div class="form-group">
                            <label for="id_pelanggan">Nama Pemesan</label>
                            <select class="form-control" id="id_pelanggan" name="id_pelanggan">
                                <?php foreach ($pelanggan as $p) : ?>
                                    <option value="<?= $p['id_pelanggan']; ?>"><?= $p['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_layanan">Jenis Layanan</label>
                            <select class="form-control" id="id_layanan" name="id_layanan">
                                <?php foreach ($layanan as $l) : ?>
                                    <option value="<?= $l['id_layanan']; ?>"><?= $l['jenis_layanan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_barber">Nama Barber</label>
                            <select class="form-control" id="id_barber" name="id_barber">
                                <?php foreach ($barber as $b) : ?>
                                    <option value="<?= $b['id_barber']; ?>"><?= $b['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="jam_mulai">Jam Mulai</label>
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai">
                        </div>
                        <div class="form-group">
                            <label for="estimasi_berakhir">Estimasi Berakhir</label>
                            <input type="time" class="form-control" id="estimasi_berakhir" name="estimasi_berakhir">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>