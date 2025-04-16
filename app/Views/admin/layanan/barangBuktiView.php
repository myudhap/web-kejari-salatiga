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
                            <?php foreach($items as $item): ?>
                            <tr>
                                <td><?= $item['nama_pemohon'] ?></td>
                                <td><?= $item['nama_terpidana'] ?></td>
                                <td><?= $item['perkara'] ?></td>
                                <td><?= $item['nomor_telepon'] ?></td>
                                <td><?= $item['barang_bukti'] ?></td>
                                <td></td>
                                <td>
                                    <div class="custom-control custom-switch custom-switch-on-success custom-switch-off-danger">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch3" <?php echo $item['status'] == "on_process" ? "" : "checked" ?>>
                                        <label class="custom-control-label" for="customSwitch3"><?= $item['status'] ?></label>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
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
