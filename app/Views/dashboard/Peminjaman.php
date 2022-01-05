<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<!-- /.card-header -->
<div class="card-body"><?php if (!empty(session()->getFlashdata('message'))) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" arialabel="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <a href="<?= base_url('/peminjaman/create'); ?>" class="btn btn-primary">Tambah</a>
    <hr />
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>Data Peminjaman</strong></h3>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Nama Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Denda</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
$no = 1;
foreach ($peminjaman as $row) {
?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_mahasiswa; ?></td>
                    <td><?= $row->nama_buku; ?></td>
                    <td><?= $row->tanggal_pinjam; ?></td>
                    <td><?= $row->tanggal_kembali; ?></td>
                    <td><?= $row->status; ?></td>
                    <td><?= $row->denda; ?></td>
                    <td>
                        <a title="Edit" href="<?= base_url("peminjaman/edit/$row->nama_mahasiswa"); ?>" class="btn btn-warning">Edit</a>
                        <a title="Delete" href="<?= base_url("peminjaman/delete/$row->nama_mahasiswa") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                    </td>
                </tr>
                <?php
}
?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="<?= base_url('peminjaman'); ?>">1</a></li>
                <li class="page-item">
                    <a class="page-link" href="<?= base_url('peminjaman'); ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /.card-body -->

<?= $this->endSection('content'); ?>