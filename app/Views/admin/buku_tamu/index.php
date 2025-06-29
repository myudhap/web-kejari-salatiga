<?= $this->extend('admin/layouts/index') ?>
<?= $this->section('title') ?>Buku Tamu<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h3>Daftar Buku Tamu</h3>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>

    <a href="<?= base_url('panel/buku-tamu/create') ?>" class="btn btn-primary mb-3">Tambah Tamu</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tipe Pelayanan</th>
                <th>Petugas</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tamus as $t): ?>
                <tr>
                    <td><?= esc($t['nama']) ?></td>
                    <td><?= esc($t['tipe_pelayanan']) ?></td>
                    <td><?= esc($t['nama_petugas']) ?></td>
                    <td><?= (new \DateTime($t['created_at']))->format('d F Y, H:i') ?></td>
                    <td>
                        <a href="<?= base_url('panel/buku-tamu/update/' . $t['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('panel/buku-tamu/delete/' . $t['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit<?= $t['id'] ?>" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <form action="<?= base_url('panel/buku-tamu/update/' . $t['id']) ?>" method="post" enctype="multipart/form-data" class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Tamu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <?= view('admin/buku_tamu/form_fields', ['tamu' => $t]) ?>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="<?= base_url('panel/buku-tamu/store') ?>" method="post" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tamu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <?= view('admin/buku_tamu/form_fields', ['tamu' => []]) ?>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>