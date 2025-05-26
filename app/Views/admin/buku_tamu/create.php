<?= $this->extend('admin/layouts/index') ?>

<?= $this->section('title') ?>
Tambah Buku Tamu
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h3>Tambah Buku Tamu</h3>
    <form action="<?= base_url('panel/buku-tamu/store') ?>" method="post" enctype="multipart/form-data">
        <?= view('admin/buku_tamu/form_fields', ['tamu' => null]) ?>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= base_url('panel/buku-tamu') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>