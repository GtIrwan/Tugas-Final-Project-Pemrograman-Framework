<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<div class="col-md-10">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Peminjaman</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-light alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Periksa Entrian Form</h4>
            </hr />
            <?php echo session()->getFlashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <form class="form-horizontal" method="post" action="<?= base_url('peminjaman/update/' . $peminjaman->nama_mahasiswa) ?>">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="form-group row">
                    <label for="status" class="col-sm-2 col-formlabel">Status</label>
                    <div class="col-sm-6">
                        <select name="status" class="form-control" id="status">
                            <option value="Dipinjam" <?= ($peminjaman->status == "Dipinjam" ? "selected" : ""); ?>>Dipinjam</option>
                            <option value="Dikembalikan" <?= ($peminjaman->status == "Dikembalikan" ? "selected" : ""); ?>>Dikembalikan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="denda" class="col-sm-2 col-formlabel">Denda</label>
                    <div class="col-sm-6">
                        <select name="denda" class="form-control" id="denda">
                            <option value="Tidak Denda" <?= ($peminjaman->denda == "Tidak Denda" ? "selected" : ""); ?>>Tidak Denda</option>
                            <option value="Terlambat 1 Minggu = 20000" <?= ($peminjaman->denda == "Terlambat 1 Minggu = 20000" ? "selected" : ""); ?>>Terlambat 1 Minggu = 20000</option>
                            <option value="Terlambat 2 Minggu = 40000" <?= ($peminjaman->denda == "Terlambat 2 Minggu = 40000" ? "selected" : ""); ?>>Terlambat 2 Minggu = 40000</option>
                            <option value="Terlambat 3 Minggu = 80000" <?= ($peminjaman->denda == "Terlambat 3 Minggu = 80000" ? "selected" : ""); ?>>Terlambat 3 Minggu = 80000</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('/peminjaman'); ?>" class="btn btn-secondary">Kembali</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
</div>

<?= $this->endSection('content'); ?>