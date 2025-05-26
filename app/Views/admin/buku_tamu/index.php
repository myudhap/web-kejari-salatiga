<?= $this->extend('admin/layouts/index') ?>
<?= $this->section('title') ?>
Buku Tamu
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Daftar Buku Tamu</h3>
    <a href="<?= base_url('panel/buku-tamu/create') ?>" class="btn btn-primary mb-3">Tambah Tamu</a>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Tipe Pelayanan</th>
                <th>Nama Petugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buku_tamu as $tamu): ?>
                <tr>
                    <td><?= date('d-m-Y H:i', strtotime($tamu['created_at'])) ?></td>
                    <td><?= esc($tamu['nama']) ?></td>
                    <td><?= esc($tamu['tipe_pelayanan']) ?></td>
                    <td><?= esc($tamu['nama_petugas']) ?></td>
                    <td>
                        <a href="<?= base_url('panel/buku-tamu/edit/' . $tamu['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('panel/buku-tamu/delete/' . $tamu['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>