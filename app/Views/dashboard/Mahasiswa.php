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
    <a href="<?= base_url('/mahasiswa/create'); ?>" class="btn btn-primary">Tambah</a>
    <hr />
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>Data Mahasiswa</strong></h3>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>No Telp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
$no = 1;
foreach ($mahasiswa as $row) {
?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nim; ?></td>
                    <td><?= $row->nama; ?></td>
                    <td><?= $row->jurusan; ?></td>
                    <td><?= $row->no_telp; ?></td>
                    <td>
                        <a title="View" href="<?= base_url("mahasiswa/view/$row->nim"); ?>" class="btn btn-info">View</a>
                        <a title="Edit" href="<?= base_url("mahasiswa/edit/$row->nim"); ?>" class="btn btn-warning">Edit</a>
                        <a title="Delete" href="<?= base_url("mahasiswa/delete/$row->nim") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
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
                <li class="page-item"><a class="page-link" href="<?= base_url('mahasiswa'); ?>">1</a></li>
                <li class="page-item">
                    <a class="page-link" href="<?= base_url('mahasiswa'); ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /.card-body -->

<?= $this->endSection('content'); ?>