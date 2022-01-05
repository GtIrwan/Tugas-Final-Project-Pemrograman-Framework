<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php if (!empty($buku->cover_buku)) : ?>
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid" src="/img/<?= $buku->cover_buku; ?>"
                                alt="Cover Buku">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <?php endif; ?>
                <!-- /.card -->
            </div>
            <div class="col-md-9">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Buku</h3>
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
                    <form class="form-horizontal" method="post"
                        action="<?= base_url('buku/update/' . $buku->no_buku) ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="no_buku" class="col-sm-2 col-formlabel">No Buku</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="no_buku" name="no_buku"
                                        value="<?= $buku->no_buku; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_buku" class="col-sm-2 col-formlabel">Nama Buku</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama_buku" name="nama_buku"
                                        value="<?= $buku->nama_buku; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penulis" class="col-sm-2 col-formlabel">Penulis</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="penulis" name="penulis"
                                        value="<?= $buku->penulis; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penerbit" class="col-sm-2 col-formlabel">Penerbit</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="penerbit" name="penerbit"
                                        value="<?= $buku->penerbit; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" id="cover_buku_lama" name="cover_buku_lama"
                                    value="<?= $buku->cover_buku; ?>">
                                <label for="cover_buku" class="col-sm-2 col-form-label">Cover Buku</label>
                                <div class="custom-file col-sm-6">
                                    <input type="file" class="custom-file-input" id="cover_buku" name="cover_buku">
                                    <label class="custom-file-label" for="cover_buku"><?= $buku->cover_buku; ?></label>
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
        </div>
    </div>

    <?= $this->endSection('content'); ?>