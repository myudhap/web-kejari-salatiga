<?= $this->extend('admin/layouts/index') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Edit Buku Tamu</h3>
    <form action="<?= base_url('buku-tamu/update/' . $tamu['id']) ?>" method="post" enctype="multipart/form-data">
        <?= view('admin/buku_tamu/form_fields', ['tamu' => $tamu]) ?>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('buku-tamu') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>
