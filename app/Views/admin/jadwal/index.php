<?= $this->extend("admin/layouts/index") ?>

<?= $this->section("title") ?>Jadwal Sidang<?= $this->endSection() ?>

<?= $this->section("content") ?>
<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Jadwal Sidang</h2>
        <!-- Trigger Create Modal -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah Jadwal
        </button>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead>
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
                                <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $j['id'] ?>">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <a href="/panel/jadwal-sidang/delete/<?= $j['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal<?= $j['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $j['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="/panel/jadwal-sidang/update/<?= $j['id'] ?>" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel<?= $j['id'] ?>">Edit Jadwal Sidang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" name="tanggal" value="<?= $j['tanggal'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Terdakwa</label>
                                                <input type="text" class="form-control" name="terdakwa" value="<?= $j['terdakwa'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">JPU</label>
                                                <input type="text" class="form-control" name="jpu" value="<?= $j['jpu'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">No Perkara</label>
                                                <input type="text" class="form-control" name="no_perkara" value="<?= $j['no_perkara'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Agenda</label>
                                                <textarea class="form-control" name="agenda" rows="3" required><?= $j['agenda'] ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kategori</label>
                                                <select class="form-select" name="kategori" required>
                                                    <option value="pidum" <?= $j['kategori'] == 'pidum' ? 'selected' : '' ?>>PIDUM</option>
                                                    <option value="pidsus" <?= $j['kategori'] == 'pidsus' ? 'selected' : '' ?>>PIDSUS</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tempat</label>
                                                <input type="text" class="form-control" name="tempat" value="<?= $j['tempat'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Simpan Perubahan
                                            </button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                <i class="fas fa-times"></i> Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Edit -->
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/panel/jadwal-sidang/store" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Jadwal Sidang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Terdakwa</label>
                        <input type="text" class="form-control" name="terdakwa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">JPU</label>
                        <input type="text" class="form-control" name="jpu" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Perkara</label>
                        <input type="text" class="form-control" name="no_perkara" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Agenda</label>
                        <textarea class="form-control" name="agenda" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="kategori" required>
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="pidum">PIDUM</option>
                            <option value="pidsus">PIDSUS</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat</label>
                        <input type="text" class="form-control" name="tempat" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Create -->

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection() ?>