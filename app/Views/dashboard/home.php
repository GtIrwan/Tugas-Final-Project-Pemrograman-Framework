<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<!-- Isi Konten -->
<div class="px-4 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold"><b>Selamat Datang Admin Perpustakaan</b></h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Mahasiswa : Menambah atau mengedit data dari mahasiswa.
        <br> Buku : Menambah atau mengedit data dari buku.
        <br> Peminjaman : Mengatur data peminjaman buku oleh mahasiswa.
      </p>
    </div>
    <div class="overflow-hidden" style="max-height: 40vh;">
      <div class="container px-5">
        <img src="dist/img/photo2.png" class="img-fluid border rounded-3 shadow-lg mb-5" alt="Foto Perpustakaan" width="700" height="500" loading="lazy">
      </div>
    </div>
  </div>
<!-- Akhir Isi Konten -->

<?= $this->endSection('content'); ?>