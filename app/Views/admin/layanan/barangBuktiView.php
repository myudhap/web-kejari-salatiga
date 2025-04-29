<?= $this->extend("admin/layouts/index") ?>

<?= $this->section("title") ?>Dashboard<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Pemohon</th>
                                <th>Nama Terpidana</th>
                                <th>Perkara</th>
                                <th>Nomor HP</th>
                                <th>Barang Bukti</th>
                                <th>Dokumen</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $index => $item): ?>
                                <?php
                                // Jika status kosong, default ke 'waiting'
                                $status = $item['status'] ?? 'waiting';
                                if (empty($status)) {
                                    $status = 'waiting';
                                }
                                ?>
                                <tr>
                                    <td><?= $item['nama_pemohon'] ?></td>
                                    <td><?= $item['nama_terpidana'] ?></td>
                                    <td><?= $item['perkara'] ?></td>
                                    <td><?= $item['nomor_telepon'] ?></td>
                                    <td><?= $item['barang_bukti'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_<?= $item['id'] ?>">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal_<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel_<?= $item['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel_<?= $item['id'] ?>">Dokumen Pemohon</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>KTP</label><br>
                                                            <img src="<?= base_url('assets/img/layanan/barang_bukti/' . $item['nama_pemohon'] . '_' . $item['nomor_telepon'] . '_' . date('Y-m-d', strtotime($item['created_at'])) . '/' . $item['tanda_pengenal']) ?>" alt="KTP" class="img-fluid">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Surat Kuasa</label><br>
                                                            <img src="<?= base_url('assets/img/layanan/barang_bukti/' . $item['nama_pemohon'] . '_' . $item['nomor_telepon'] . '_' . date('Y-m-d', strtotime($item['created_at'])) . '/' . $item['surat_kuasa']) ?>" alt="Surat Kuasa" class="img-fluid">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Dokumen Bukti Kepemilikan</label><br>
                                                            <img src="<?= base_url('assets/img/layanan/barang_bukti/' . $item['nama_pemohon'] . '_' . $item['nomor_telepon'] . '_' . date('Y-m-d', strtotime($item['created_at'])) . '/' . $item['bukti_kepemilikan']) ?>" alt="Bukti Kepemilikan" class="img-fluid">

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input
                                                type="checkbox"
                                                class="custom-control-input"
                                                id="customSwitch_<?= $item['id'] ?>"
                                                data-index="<?= $index ?>"
                                                onchange="cycleStatus(this)"
                                                <?= ($status == 'on_process' || $status == 'done') ? 'checked' : '' ?>>
                                            <label class="custom-control-label" for="customSwitch_<?= $item['id'] ?>">
                                                <?= $status ?>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <script>
                            function cycleStatus(checkbox) {
                                const label = checkbox.nextElementSibling;
                                let currentStatus = label.innerText.toLowerCase();

                                if (currentStatus === 'waiting') {
                                    label.innerText = 'on_process';
                                    checkbox.checked = true;
                                    label.parentElement.classList.remove('text-success');
                                    label.parentElement.classList.add('text-warning');
                                } else if (currentStatus === 'on_process') {
                                    label.innerText = 'done';
                                    checkbox.checked = true;
                                    label.parentElement.classList.remove('text-warning');
                                    label.parentElement.classList.add('text-success');
                                } else if (currentStatus === 'done') {
                                    label.innerText = 'waiting';
                                    checkbox.checked = false;
                                    label.parentElement.classList.remove('text-success', 'text-warning');
                                }
                            }
                        </script>

                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="col-12">
            </div>
</section>
<?= $this->endSection() ?>