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
    <a href="<?= base_url('/buku/create'); ?>" class="btn btn-primary">Tambah</a>
    <hr />
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>Data Buku</strong></h3>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No Buku</th>
                    <th>Cover Buku</th>
                    <th>Nama Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
$no = 1;
foreach ($buku as $row) {
?>
                <tr>
                    <td><?= $row->no_buku; ?></td>
                    <td>
                        <div class="text-center">
                            <img class="profile-user-img img-fluid" src="/img/<?= $row->cover_buku; ?>"
                                alt="Cover Buku">
                        </div>
                    </td>
                    <td><?= $row->nama_buku; ?></td>
                    <td><?= $row->penulis; ?></td>
                    <td><?= $row->penerbit; ?></td>
                    <td>
                        <a title="Edit" href="<?= base_url("buku/edit/$row->no_buku"); ?>" class="btn btn-warning">Edit</a>
                        <a title="Delete" href="<?= base_url("buku/delete/$row->no_buku") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
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
                <li class="page-item"><a class="page-link" href="<?= base_url('buku'); ?>">1</a></li>
                <li class="page-item">
                    <a class="page-link" href="<?= base_url('buku'); ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /.card-body -->

<?= $this->endSection('content'); ?>