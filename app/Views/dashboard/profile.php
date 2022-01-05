<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<div class="col-md-12">
    <!-- general form elements -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.card-header -->
                <!-- form start -->
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="dist/img/irwan.jpg"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">Gt. Irwan</h3>
                            <p class="text-muted text-center">(Admin)</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Biodata Admin</strong></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i>
                                Pendidikan</strong>
                            <p class="text-muted">
                                Sekolah Tinggi Manajemen dan Informatika (STMIK) Palangkaraya
                            </p>
                            <hr>
                            <strong><i class="fas fa-mobile-alt mr-1"></i> No
                                Telp/HP</strong>
                            <p class="text-muted">089685289782</p>
                            <hr>
                            <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                            <p class="text-muted">gt.irwan2311@gmail.com</p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i>Alamat</strong>
                            <p class="text-muted">Jl. Sri Rejeki</p>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('/home'); ?>" class="btn btn-secondary">Kembali</a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.card -->
        </div>
</div>
<?= $this->endSection('content'); ?>