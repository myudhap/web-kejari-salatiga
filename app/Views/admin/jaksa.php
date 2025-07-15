<?= $this->extend("admin/layouts/index") ?>

<?= $this->section("title") ?>Berita<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header float-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                        Tambah Jaksa
                    </button>
                    <div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
                        <form action="/panel/jaksa" method="POST" enctype="multipart/form-data">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Jaksa</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body px-5">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Jaksa">
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP Jaksa">
                                    </div>
                                    <input type="hidden" name="status" id="status" value="1">
                                </div>
                                <div class="modal-footer justify-content-end">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success" >Simpan</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($jaksas)) : ?>
                            <tr>
                                <td class="text-center" colspan="6">Belum ada data Jaksa.</td>
                            </tr>
                            <?php else : ?>
                            <?php foreach($jaksas as $jaksa): ?>
                            <tr>
                                <td><?= $jaksa['nama'] ?></td>
                                <td><?= $jaksa['nip'] ?></td>
                                <td>
                                    <div class="custom-control custom-switch custom-switch-on-success custom-switch-off-danger">
                                        <input type="checkbox"
                                            class="custom-control-input status-switch"
                                            id="switchStatus-<?= $jaksa['id'] ?>"
                                            data-id="<?= $jaksa['id'] ?>"
                                            <?= $jaksa['status'] == 1 ? 'checked' : '' ?>
                                            >
                                        <label class="custom-control-label"
                                            for="switchStatus-<?= $jaksa['id'] ?>"
                                            id="labelStatus">
                                            <?= $jaksa['status'] == 1 ? 'Aktif' : 'Tidak Aktif' ?>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                <span>
                                    <button 
                                        type="button" 
                                        class="edit-btn btn btn-warning" 
                                        data-toggle="modal" 
                                        data-target="#modal-update-jaksa"
                                        data-id="<?= $jaksa['id'] ?>"
                                        data-nama="<?= $jaksa['nama'] ?>"
                                        data-nip="<?= $jaksa['nip'] ?>"
                                        data-status="<?= $jaksa['status'] ?>"
                                    >
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-update-jaksa" style="display: none;" aria-hidden="true">
                                        <form method="POST" id="editForm" enctype="multipart/form-data">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Jaksa</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body px-5">
                                                        <input type="hidden" name="id" id="jaksaId">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" name="nama" id="jaksaNama" class="form-control mt-2" placeholder="Tanggal">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NIP</label>
                                                            <input type="text" name="nip" id="jaksaNip" class="form-control mt-2" placeholder="NIP">
                                                        </div>
                                                        <input type="hidden" name="status" id="jaksaStatus">
                                                    </div>
                                                    <div class="modal-footer justify-content-end">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success" >Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <a href="/panel/jaksa/delete/<?= $jaksa['id'] ?>" type="button" class="btn btn-danger" onclick="return confirm('Anda ingin menghapus berita ini?');">
                                        Hapus
                                    </a>
                                </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <?php for ($i = 1; $i <= ceil($total / $limit); $i++): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $i ?>&limit=<?= $limit ?>" <?= ($i == $page ? 'style="font-weight: bold;"' : '') ?>>
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        <div class="col-12">
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>
    <script>
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.onclick = () => {
                ['id', 'nama', 'nip', 'status'].forEach(f => {
                    document.getElementById('jaksa' + f.charAt(0).toUpperCase() + f.slice(1)).value = btn.dataset[f];
                });

                document.getElementById('editForm').action = `/panel/jaksa/update/${btn.dataset.id}`;
            }
        })
    </script>
    <script>
    $(function() {
        $('.status-switch').change(function() {
            const isChecked = $(this).is(':checked') ? 1 : 0;
            const id = $(this).data('id');
            const label = $('#labelStatus').text(isChecked ? 'Aktif' : 'Tidak Aktif');

            $.ajax({
                url: '<?= site_url('panel/jaksa/toggle-status/') ?>/' + id,
                type: 'POST',
                dataType: 'json',
                data: {
                    status: isChecked,
                },
                success: function(res) {
                    if (!res.success) {
                        $('#switchStatus').prop('checked', !isChecked);
                        label.text(isChecked ? 'Tidak Aktif' : 'Aktif');
                        alert(res.message || 'Gagal memperbarui status.');
                    }
                },
                error: function() {
                    $('#switchStatus').prop('checked', !isChecked);
                    label.text(isChecked ? 'Tidak Aktif' : 'Aktif');
                    alert('Terjadi kesalahan pada server.');
                }
            });
        });
    });
    </script>
<?= $this->endSection() ?>