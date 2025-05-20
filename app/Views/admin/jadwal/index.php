<?= $this->extend("admin/layouts/index") ?>

<?= $this->section("title") ?>index<?= $this->endSection() ?>

<?= $this->section("content") ?>
<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome (untuk ikon edit dan hapus) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Jadwal Sidang</h2>
        <a href="/panel/jadwal-sidang/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Jadwal
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Terdakwa</th>
                    <th>JPU</th>
                    <th>No Perkara</th>
                    <th>Agenda</th>
                    <th>Kategori</th>
                    <th>Tempat</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($jadwals)) : ?>
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data jadwal sidang.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($jadwals as $j) : ?>
                        <tr>
                            <td><?= $j['tanggal'] ?></td>
                            <td><?= $j['terdakwa'] ?></td>
                            <td><?= $j['jpu'] ?></td>
                            <td><?= $j['no_perkara'] ?></td>
                            <td><?= $j['agenda'] ?></td>
                            <td class="text-uppercase"><?= $j['kategori'] ?></td>
                            <td><?= $j['tempat'] ?></td>
                            <td class="text-center">
                                <a href="/panel/jadwal-sidang/edit/<?= $j['id'] ?>" class="btn btn-sm btn-warning me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="/panel/jadwal-sidang/delete/<?= $j['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>