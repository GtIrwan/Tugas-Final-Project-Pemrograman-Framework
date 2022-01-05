<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Data Peminjaman</h3>
  </div>
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
  <form class="form-horizontal" method="post" action="<?= base_url('peminjaman/store') ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="card-body">
      <div class="form-group row">
        <label for="nama_mahasiswa" class="col-sm-2 col-formlabel">Nama Mahasiswa</label>
        <div class="col-sm-6">
          <select name="nama_mahasiswa" class="form-control" id="nama_mahasiswa">
            <option selected>Pilih Nama Mahasiswa</option>
            <option value="Monica Febbyola Audia">Monica Febbyola Audia</option>
            <option value="Alexander Osten Prawara">Alexander Osten Prawara</option>
            <option value="Budi">Budi</option>
            <option value="Avrilyne Odela Prawara">Avrilyne Odela Prawara</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama_buku" class="col-sm-2 col-formlabel">Nama Buku</label>
        <div class="col-sm-6">
          <select name="nama_buku" class="form-control" id="nama_buku">
            <option selected>Pilih Nama Buku</option>
            <option value="Jujutsu Kaisen">Jujutsu Kaisen</option>
            <option value="BTOOOM">BTOOOM</option>
            <option value="Black Bullet">Black Bullet</option>
            <option value="Spy X Family">Spy X Family</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="tanggal_pinjam" class="col-sm-2 col-formlabel">Tanggal Pinjam</label>
        <div class="col-sm-6">
          <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"
            value="<?= old('tanggal_pinjam'); ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="tanggal_kembali" class="col-sm-2 col-formlabel">Tanggal Kembali</label>
        <div class="col-sm-6">
          <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali"
            value="<?= old('tanggal_kembali'); ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="status" class="col-sm-2 col-formlabel">Status Peminjaman</label>
        <div class="col-sm-6">
          <select name="status" class="form-control" id="status">
            <option value="Dipinjam">Dipinjam</option>
            <option value="Dikembalikan">Dikembalikan</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="denda" class="col-sm-2 col-formlabel">Denda</label>
        <div class="col-sm-6">
          <select name="denda" class="form-control" id="denda">
            <option value="Tidak Ada Denda">Tidak Ada Denda</option>
            <option value="Terlambat 1 Minggu = 20000">Terlambat 1 Minggu = 20000</option>
            <option value="Terlambat 2 Minggu = 40000">Terlambat 2 Minggu = 40000</option>
            <option value="Terlambat 3 Minggu = 80000">Terlambat 3 Minggu = 80000</option>
          </select>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?= base_url('/peminjaman'); ?>" class="btn btn-secondary">Kembali</a>
    </div>
  </from>
</div>

<?= $this->endSection('content'); ?>