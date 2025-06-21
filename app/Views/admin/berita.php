<?= $this->extend("admin/layouts/index") ?>

<?= $this->section("title") ?>Berita<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header float-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                        Tambah Berita
                    </button>
                    <div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
                        <form action="/panel/berita" method="POST" enctype="multipart/form-data">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Berita</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body px-5">
                                    <div class="form-group">
                                        <label>Judul Berita</label>
                                        <textarea class="form-control" name="judulBerita" id="judulBerita" rows="2" placeholder="Enter ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Isi Berita</label>
                                        <textarea class="form-control" name="isiBerita" id="summernote" rows="4" placeholder="Enter ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Berita</label>
                                        <input type="date" name="tanggalBerita" id="tanggalBerita" class="form-control" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar Berita <i class="text-gray">(max 2MB)</i></label>
                                        <div class="custom-file">
                                            <input type="file" name="gambarBerita" class="custom-file-input" id="gambarBerita">
                                            <label class="custom-file-label" for="gambarBerita">Choose file</label>
                                        </div>
                                    </div>
                                    <div id="previewBerita" class="invisible">
                                        <label>Preview Gambar</label><br>
                                        <img id="previewGambarBerita" src="#" alt="your image" width="50%"/>
                                    </div>
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
                                <th style="width: 10px">No</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Isi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($beritas)) : ?>
                            <tr>
                                <td class="text-center" colspan="6">Belum ada data Berita.</td>
                            </tr>
                            <?php else : ?>
                            <?php foreach($beritas as $key => $berita): ?>
                            <tr>
                                <td><?= $key+1 ?>.</td>
                                <td><?= $berita['judul'] ?></td>
                                <td>
                                    <?php
                                    $date=date_create($berita['tanggal']);
                                    echo date_format($date,"d M Y");
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    $content = $berita['isi'];
                                    $max_chars = 300;
                                    if (strlen($content) > $max_chars) {
                                        $content = substr($content, 0, $max_chars) . '...';
                                    }
                                    echo esc($content) 
                                    ?>
                                </td>
                                <td><img src="<?php echo base_url('assets/img/berita/' . $berita['gambar']) ?>" alt="" width="100px"></td>
                                <td>
                                <span>
                                    <button 
                                        type="button" 
                                        class="edit-btn btn btn-warning" 
                                        data-toggle="modal" 
                                        data-target="#modal-update-berita"
                                        data-id="<?= $berita['id'] ?>"
                                        data-judul="<?= esc($berita['judul']) ?>"
                                        data-isi="<?= esc($berita['isi']) ?>"
                                        data-gambar="<?= esc($berita['gambar']) ?>"
                                        data-tanggal="<?= date('Y-m-d', strtotime($berita['tanggal'])) ?>"
                                    >
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-update-berita" style="display: none;" aria-hidden="true">
                                        <form method="POST" id="editForm" enctype="multipart/form-data">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Berita</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body px-5">
                                                        <input type="hidden" name="id" id="beritaId">
                                                        <div class="form-group">
                                                            <label>Judul Berita</label>
                                                            <textarea class="form-control" name="judul" id="beritaJudul" rows="2"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Isi Berita</label>
                                                            <textarea class="form-control" name="isi" id="beritaIsi" rows="4"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal Berita</label>
                                                            <input type="date" name="tanggal" id="beritaTanggal" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Gambar Berita <i class="text-gray">(max 2MB)</i></label>
                                                            <div class="custom-file">
                                                                <input type="file" name="gambar" class="custom-file-input" id="beritaGambar">
                                                                <label class="custom-file-label" for="gambar"></label>
                                                            </div>
                                                        </div>
                                                        <div id="updatePreviewBerita">
                                                            <label>Preview Gambar</label><br>
                                                            <img id="beritaPreviewGambar" src="<?php echo base_url('assets') ?>/img/berita/<?= $berita['gambar'] ?>" alt="your image" width="50%"/>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-end">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success" >Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <a href="/panel/berita/delete/<?= $berita['id'] ?>" type="button" class="btn btn-danger" onclick="return confirm('Anda ingin menghapus berita ini?');">
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
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
    <script type="text/javascript">
        gambarBerita.onchange = e => {
            const [file] = gambarBerita.files
            if (file) {
                previewGambarBerita.src = URL.createObjectURL(file)
                document.getElementById("previewBerita").classList.remove("invisible")
            }
        }
    </script>
    <script>
        updateGambarBerita = document.getElementById("updateGambarBerita")
        updatePreviewGambarBerita = document.getElementById("updatePreviewGambarBerita")
        updateGambarBerita.onchange = e => {
            const [file] = updateGambarBerita.files
            if (file) {
                updatePreviewGambarBerita.src = URL.createObjectURL(file)
            }
        }
    </script>
    <script>
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.onclick = () => {
                $('#beritaIsi').summernote('code', btn.dataset['isi']);
                ['id', 'judul', 'tanggal', 'previewGambar'].forEach(f => {
                    document.getElementById('berita' + f.charAt(0).toUpperCase() + f.slice(1)).value = btn.dataset[f];
                });

                document.getElementById('editForm').action = `/panel/berita/edit/${btn.dataset.id}`;
            }
        })
    </script>
<?= $this->endSection() ?>