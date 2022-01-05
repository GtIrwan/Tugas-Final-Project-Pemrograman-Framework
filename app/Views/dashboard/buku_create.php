<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<div class="col-md-10">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Buku</h3>
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
        <form class="form-horizontal" method="post" action="<?= base_url('buku/store') ?>"
            enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="form-group row">
                    <label for="no_buku" class="col-sm-2 col-formlabel">No Buku</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="no_buku" name="no_buku"
                            value="<?= old('no_buku'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_buku" class="col-sm-2 col-formlabel">Nama Buku</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama_buku" name="nama_buku"
                            value="<?= old('nama_buku'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penulis" class="col-sm-2 col-formlabel">Penulis</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="penulis" name="penulis"
                            value="<?= old('penulis'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="penerbit" name="penerbit"
                            value="<?= old('penerbit') ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cover_buku" class="col-sm-2 col-form-label">Cover Buku</label>
                    <div class="custom-file col-sm-6">
                        <input type="file" class="custom-file-input" id="cover_buku" name="cover_buku">
                        <label class="custom-file-label" for="cover_buku">Pilih Cover Buku</label>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('/buku'); ?>" class="btn btn-secondary">Kembali</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
</div>

<?= $this->endSection('content'); ?>