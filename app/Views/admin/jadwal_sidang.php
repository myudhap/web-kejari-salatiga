<?= $this->extend("admin/layouts/index") ?>

<?= $this->section("title") ?>Jadwal Sidang<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header float-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                        Tambah Jadwal Sidang
                    </button>
                    <div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
                        <form action="/panel/jadwal-sidang" method="POST" enctype="multipart/form-data">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Jadwal Sidang</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body px-5">
                                    <div class="form-group">
                                        <label>No. Perkara</label>
                                        <input type="text" class="form-control" name="no_perkara" id="noPerkara" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Terdakwa</label>
                                        <input type="text" class="form-control" name="terdakwa" id="terdakwa" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>JPU</label>
                                        <div id="jaksa-container">
                                            <div class="input-group jaksa-item mb-2">
                                                <select class="custom-select" name="jaksa_id[]">
                                                    <option value="">Pilih Jaksa</option>
                                                    <?php foreach ($jpus as $j): ?>
                                                        <option value="<?= $j['id'] ?>"><?= $j['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <button type="button" class="btn btn-danger btn-flat" onclick="hapusJaksa(this)">Hapus Jaksa</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="button" onclick="tambahJaksa()">Tambah Jaksa</button><br><br>
                                    <div class="form-group">
                                        <label>Agenda</label>
                                        <input type="text" class="form-control" name="agenda" id="agenda" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat</label>
                                        <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="custom-select" name="kategori">
                                            <option value="pidum">pidum</option>
                                            <option value="pidsus">pidsus</option>
                                        </select>
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
                                <th>Tanggal</th>
                                <th>Terdakwa</th>
                                <th>JPU</th>
                                <th>Agenda</th>
                                <th>Tempat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($jadwals)) : ?>
                            <tr>
                                <td class="text-center" colspan="6">Belum ada data Jadwal Sidang.</td>
                            </tr>
                            <?php else : ?>
                            <?php foreach($jadwals as $key => $jadwal): ?>
                            <tr>
                                <td>
                                    <?php
                                    $date=date_create($jadwal['tanggal']);
                                    echo date_format($date,"d M Y");
                                    ?>
                                </td>
                                <td><?= $jadwal['terdakwa'] ?></td>
                                <td>
                                    <?php foreach ($jadwal['jaksa_list'] as $jpu): ?>
                                        <span class="badge badge-info"><?= $jpu ?></span><br>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= $jadwal['agenda'] ?></td>
                                <td><?= $jadwal['tempat'] ?></td>
                                <td>
                                <span>
                                    <button 
                                        type="button" 
                                        class="edit-btn btn btn-warning"
                                        data-toggle="modal"
                                        data-target="#modal-update-jadwal"
                                    >
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-update-jadwal" style="display: none;" aria-hidden="true">
                                        <form method="POST" action="/panel/jadwal-sidang/update/<?= esc($jadwal['id']) ?>" id="editForm" enctype="multipart/form-data">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Jadwal Sidang</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body px-5">
                                                        <input type="hidden" name="id" id="jadwalId" value="<?= esc($jadwal['id']) ?>">
                                                        <div class="form-group">
                                                            <label>No. Perkara</label>
                                                            <input type="text" class="form-control" name="no_perkara" id="jadwalNoPerkara" value="<?= esc($jadwal['no_perkara']) ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Terdakwa</label>
                                                            <input type="text" class="form-control" name="terdakwa" id="jadwalTerdakwa" value="<?= esc($jadwal['terdakwa']) ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>JPU</label>
                                                            <div id="jaksa-container-update">
                                                                <?php foreach ($jadwal['jaksa_list'] as $jpu): ?>
                                                                    <div class="input-group jaksa-item-update mb-2">
                                                                            <select class="custom-select form-select" name="jaksa_id[]">
                                                                                <?php foreach ($jpus as $j): ?>
                                                                                    <option value="<?= $j['id'] ?>" <?= $j['nama'] === $jpu ? 'selected' : '' ?>><?= $j['nama'] ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>                                                                     
                                                                        <button type="button" class="btn btn-danger btn-flat" onclick="hapusJaksaUpdate(this)">Hapus Jaksa</button>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-success" type="button" onclick="tambahJaksaUpdate()">Tambah Jaksa</button><br><br>
                                                        <div class="form-group">
                                                            <label>Agenda</label>
                                                            <input type="text" class="form-control" name="agenda" id="jadwalAgenda" value="<?= esc($jadwal['agenda']) ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tempat</label>
                                                            <input type="text" class="form-control" name="tempat" id="jadwalTempate" value="<?= esc($jadwal['tempat']) ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal</label>
                                                            <input type="date" class="form-control" name="tanggal" id="jadwalTanggal" value="<?= esc($jadwal['tanggal']) ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select class="custom-select" name="kategori">
                                                                <option value="pidum" <?= $jadwal['kategori'] === 'pidum' ? 'selected' : '' ?>>pidum</option>
                                                                <option value="pidsus" <?= $jadwal['kategori'] === 'pidsus' ? 'selected' : '' ?>>pidsus</option>
                                                            </select>
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
                                    <a href="/panel/jadwal-sidang/delete/<?= $jadwal['id'] ?>" type="button" class="btn btn-danger" onclick="return confirm('Anda ingin menghapus berita ini?');">
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

                document.getElementById('editForm').action = `/panel/berita/update/${btn.dataset.id}`;
            }
        })
    </script>
    <script>
        function tambahJaksa() {
            const container = document.getElementById('jaksa-container');
            const firstItem = container.querySelector('.jaksa-item');

            if (!firstItem) return;

            const newItem = firstItem.cloneNode(true);
            const select = newItem.querySelector('select');
            select.selectedIndex = 0;
            select.addEventListener('change', updateSelectOptions);

            newItem.querySelector('button').onclick = function () {
                hapusJaksa(this);
            };

            container.appendChild(newItem);
            updateTombolHapus();
            updateSelectOptions();
        }

        function tambahJaksaUpdate() {
            const container = document.getElementById('jaksa-container-update');
            const firstItem = container.querySelector('.jaksa-item-update');

            if (!firstItem) return;

            const newItem = firstItem.cloneNode(true);
            const select = newItem.querySelector('select');
            select.selectedIndex = 0;
            select.addEventListener('change', updateSelectOptions);

            newItem.querySelector('button').onclick = function () {
                hapusJaksaUpdate(this);
            };

            container.appendChild(newItem);
            updateTombolHapusUpdate();
            updateSelectOptions();
        }

        function hapusJaksa(button) {
            const item = button.closest('.jaksa-item');
            item.remove();
            updateTombolHapus();
        }

        function hapusJaksaUpdate(button) {
            const item = button.closest('.jaksa-item-update');
            item.remove();
            updateTombolHapus();
        }

        function updateTombolHapus() {
            const items = document.querySelectorAll('.jaksa-item');
            items.forEach((item, index) => {
                const btn = item.querySelector('button');
                btn.style.display = (items.length > 1) ? 'inline-block' : 'none';
            });
        }

        function updateTombolHapusUpdate() {
            const items = document.querySelectorAll('.jaksa-item-update');
            items.forEach((item, index) => {
                const btn = item.querySelector('button');
                btn.style.display = (items.length > 1) ? 'inline-block' : 'none';
            });
        }

        function updateSelectOptions() {
            const allSelects = document.querySelectorAll('.jaksa-item select');
            const selectedValues = Array.from(allSelects)
                .map(select => select.value)
                .filter(val => val !== '');

            allSelects.forEach(select => {
                const currentValue = select.value;

                Array.from(select.options).forEach(option => {
                    // Show all options initially
                    option.disabled = false;

                    // Hide options that are selected in other selects
                    if (option.value !== currentValue && selectedValues.includes(option.value)) {
                        option.disabled = true;
                    }
                });
            });
        }

        window.onload = function() {
            const selects = document.querySelectorAll('.jaksa-item select');
            selects.forEach(select => {
                select.addEventListener('change', updateSelectOptions);
            });

            updateTombolHapus();
            updateSelectOptions();
        };
    </script>
<?= $this->endSection() ?>