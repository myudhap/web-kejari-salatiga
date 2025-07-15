<?= $this->extend("admin/layouts/index") ?>

<?= $this->section("title") ?>Buku Tamu<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="content">
    <div class="row">
        <div class="col-12">
        <!-- Flashdata: Error -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php endif; ?>
        <!-- Flashdata: Success -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header float-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                        Tambah Buku Tamu
                    </button>
                    <div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
                        <form action="/panel/buku-tamu" method="POST" enctype="multipart/form-data">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Buku Tamu</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body px-5 row">
                                    <div class="class col-md-6">
                                        <div class="form-group">
                                            <label>Nama Petugas<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_petugas" id="namaPetugas" placeholder="Enter ..." required>
                                        </div>
                                    </div>
                                    <div class="class col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Pelayanan<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Enter ..." required>
                                        </div>
                                    </div>
                                    <div class="class col-md-12">
                                        <div class="form-group">
                                            <label>Tipe Pelayanan<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="tipe_pelayanan" required>
                                                <?php foreach($layanans as $key => $layanan): ?>
                                                    <option value="<?= $layanan['id'] ?>"><?= $layanan['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="class col-md-6">
                                        <div class="form-group">
                                            <label>Nama<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Identitas<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="tipe_identitas" required>
                                                <option value="ktp">KTP</option>
                                                <option value="sim">SIM</option>
                                                <option value="passport">Passport</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Identitas<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nomor_identitas" id="nomorIdentitas" placeholder="Enter ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor HP / Whatsapp / Email</label>
                                            <input type="text" class="form-control" name="no_hp" id="noHp" placeholder="Enter ...">
                                        </div>
                                    </div>
                                    <div class="class col-md-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="jenis_kelamin" required>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" id="tempatLahir" placeholder="Enter ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggalLahir" placeholder="Enter ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Plat Kendaraan</label>
                                            <input type="text" class="form-control" name="plat" id="plat" placeholder="Enter ...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Enter ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Identitas <span class="small">(maks. file 2MB)</span></label>
                                        <input type="file" name="foto_identitas" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Diri <span class="small">(maks. file 2MB)</span></label>
                                        <input type="file" name="foto_diri" class="form-control">
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
                                <th>Nama</th>
                                <th>Tipe Pelayanan</th>
                                <th>Petugas</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($tamus)) : ?>
                            <tr>
                                <td class="text-center" colspan="6">Belum ada data Jadwal Sidang.</td>
                            </tr>
                            <?php else : ?>
                            <?php foreach($tamus as $key => $tamu): ?>
                            <tr>
                                <td><?= $tamu['nama'] ?></td>
                                <td>
                                    <?php 
                                        $layanan = array_filter($layanans, function($l) use ($tamu) {
                                            return $l['id'] == $tamu['layanan_id'];
                                        });
                                        echo !empty($layanan) ? reset($layanan)['nama'] : 'Tidak Diketahui';
                                    ?>
                                </td>
                                <td><?= $tamu['nama_petugas'] ?></td>
                                <td><?= $tamu['tanggal'] ?></td>
                                <td>
                                <span>
                                    <!-- <button 
                                        type="button" 
                                        class="edit-btn btn btn-warning"
                                        data-toggle="modal"
                                        data-target="#modal-update-tamu"
                                        data-id="<?= esc($tamu['id']) ?>"
                                        data-nama-petugas="<?= esc($tamu['nama_petugas']) ?>"
                                        data-tanggal="<?= esc($tamu['tanggal']) ?>"
                                        data-tipe-pelayanan="<?= esc($tamu['layanan_id']) ?>"
                                        data-nama="<?= esc($tamu['nama']) ?>"
                                        data-tipe-identitas="<?= esc($tamu['tipe_identitas']) ?>"
                                        data-nomor-identitas="<?= esc($tamu['nomor_identitas']) ?>"
                                        data-no-hp="<?= esc($tamu['no_hp']) ?>"
                                        data-jenis-kelamin="<?= esc($tamu['jenis_kelamin']) ?>"
                                        data-tempat-lahir="<?= esc($tamu['tempat_lahir']) ?>"
                                        data-tanggal-lahir="<?= esc($tamu['tanggal_lahir']) ?>"
                                        data-plat="<?= esc($tamu['plat_kendaraan']) ?>"
                                        data-alamat="<?= esc($tamu['alamat']) ?>"
                                        data-foto-identitas="<?= esc($tamu['foto_identitas']) ?>"
                                        data-foto-diri="<?= esc($tamu['foto_diri']) ?>"
                                    >
                                        Edit
                                    </button> -->
                                    <div class="modal fade" id="modal-update-tamu" style="display: none;" aria-hidden="true">
                                        <form method="POST" action="/panel/buku-tamu/update/<?= esc($tamu['id']) ?>" id="editForm" enctype="multipart/form-data">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Buku Tamu</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body px-5 row">
                                                        <input type="hidden" name="id" id="tamuId" value="<?= esc($tamu['id']) ?>">
                                                        <div class="class col-md-6">
                                                            <div class="form-group">
                                                                <label>Nama Petugas<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="nama_petugas" id="tamuNamaPetugas" placeholder="Enter ..." required>
                                                            </div>
                                                        </div>
                                                        <div class="class col-md-6">
                                                            <div class="form-group">
                                                                <label>Tanggal Pelayanan<span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" name="tanggal" id="tamuTanggal" placeholder="Enter ..." required>
                                                            </div>
                                                        </div>
                                                        <div class="class col-md-12">
                                                            <div class="form-group">
                                                                <label>Tipe Pelayanan<span class="text-danger">*</span></label>
                                                                <select class="custom-select" name="tipe_pelayanan" id="tamuTipePelayanan" required>
                                                                    <?php foreach($layanans as $key => $layanan): ?>
                                                                        <option value="<?= $layanan['id'] ?>"><?= $layanan['nama'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="class col-md-6">
                                                            <div class="form-group">
                                                                <label>Nama<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="nama" id="tamuNama" placeholder="Enter ..." required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tipe Identitas<span class="text-danger">*</span></label>
                                                                <select class="custom-select" name="tipe_identitas" id="tamuTipeIdentitas" required>
                                                                    <option value="ktp">KTP</option>
                                                                    <option value="sim">SIM</option>
                                                                    <option value="passport">Passport</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nomor Identitas<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="nomor_identitas" id="tamuNomorIdentitas" placeholder="Enter ..." required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nomor HP / Whatsapp / Email</label>
                                                                <input type="text" class="form-control" name="no_hp" id="tamuNoHp" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                        <div class="class col-md-6">
                                                            <div class="form-group">
                                                                <label>Jenis Kelamin<span class="text-danger">*</span></label>
                                                                <select class="custom-select" name="jenis_kelamin" id="tamuJenisKelamin" required>
                                                                    <option value="L">Laki-Laki</option>
                                                                    <option value="P">Perempuan</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tempat Lahir</label>
                                                                <input type="text" class="form-control" name="tempat_lahir" id="tamuTempatLahir" placeholder="Enter ...">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tanggal Lahir</label>
                                                                <input type="date" class="form-control" name="tanggal_lahir" id="tamuTanggalLahir" placeholder="Enter ...">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Plat Kendaraan</label>
                                                                <input type="text" class="form-control" name="plat" id="tamuPlat" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea class="form-control" name="alamat" id="tamuAlamat" placeholder="Enter ..."></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Foto Identitas <span class="small">(maks. file 2MB)</span></label>
                                                            <input type="file" name="foto_identitas" id="tamuFotoIdentitas" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Foto Diri <span class="small">(maks. file 2MB)</span></label>
                                                            <input type="file" name="foto_diri" id="tamuFotoDiri" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-end">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <a href="/panel/buku-tamu/delete/<?= $tamu['id'] ?>" type="button" class="btn btn-danger" onclick="return confirm('Anda ingin menghapus daftar tamu ini?');">
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
                ['id', 'namaPetugas', 'tanggal', 'tipePelayanan', 'tipeIdentitas', 'nomorIdentitas', 'nama', 'noHp', 'plat', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'alamat', 'fotoDiri', 'fotoIdentitas'].forEach(f => {
                    document.getElementById('tamu' + f.charAt(0).toUpperCase() + f.slice(1)).value = btn.dataset[f];
                });

                document.getElementById('editForm').action = `/panel/berita/update/${btn.dataset.id}`;
            }
        })
    </script>
<?= $this->endSection() ?>