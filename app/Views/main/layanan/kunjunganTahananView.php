<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Layanan<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section>
    <section id="breadcrumb">
        <div class="container">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bolder">
                    <li class="breadcrumb-item">Layanan</li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Kunjungan Tahanan</li>
                </ol>
            </nav>
            <div class="row" style="text-align: justify;">
                <div class="row mt-5">
                    <div class="col text-center">
                        <h2>
                        <strong class="text-primary">S I </strong><strong>B E T A - </strong><strong class="text-primary">ON</strong>
                        </h2>
                        <p>Surat Izin Besuk Tahanan <span class="text-primary">Online</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <strong>
                        Layanan permohonan izin kunjungan tahanan bagi masyarakat yang ingin mengunjungi <br> kerabat atau saudara yang sedang ditahan karena kasus tindak pidana umum
                        </strong>
                    </div>
                </div>
                <div class="row gx-5 gy-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="shadow p-5">
                            <div class="text-center mb-4">
                                <strong>Lacak Permohonan</strong>
                                <form action="">
                                    <div class="input-group my-4">
                                        <input type="text" name="nomorRegistrasi" class="form-control" id="nomorRegistrasi" placeholder="Nomor Registrasi">
                                        <button type="submit" class="btn btn-green"><strong>Cari</strong></button>
                                    </div>
                                </form>
                            </div>
                            <strong>Syarat & Ketentuan</strong>
                            <p>Proses permohonan ijin kunjungan dapat dilakukan secara online melalui aplikasi ini, dengan ketentutan sebagai berikut:</p>
                            <ol>
                                <li>Permohonan ijin dilakukan minimal 1 hari sebelum hari kunjungan</li>
                                <li>Permohonan akan diproses 1x24 jam setelah permohonan dikirim</li>
                                <li>Kunjungan hanya dapat dilakukan selama hari kerja Senin-Jumat</li>
                                <li>Setiap permohonan yang masuk akan mendapatkan Nomor Registrasi. Catat Nomor registrasi tersebut, dan gunakan untuk mengecek apakah permohonan tersebut telah disetujui</li>
                                <li>Jika permohonan disetujui, download Surat Ijin Kunjungan (T-10) dan tunjukkan kepada pegawai Lapas pada saat melakukan kunjungan</li>
                            </ol>
                            <br><br>
                            <strong>Alur Pelayanan Kunjungan Tahanan</strong>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shadow p-5">
                            <div class="text-center">
                                <h3>Formulir</h3><hr>
                            </div>
                            <form action="">
                                <strong>Data Pengunjung</strong>
                                <div class="mb-4">
                                    <label for="namaPemohon" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="namaPemohon" class="form-control" id="namaPemohon" placeholder="Nama Lengkap">
                                </div>
                                <div class="mb-4">
                                    <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                                    <textarea type="text" name="alamatLengkap" class="form-control" id="alamatLengkap" placeholder="Alamat Lengkap"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan">
                                </div>
                                <div class="mb-4">
                                    <label for="hubungan" class="form-label">Hubungan Dengan Tahanan</label>
                                    <input type="text" name="hubungan" class="form-control" id="hubungan" placeholder="(Orang Tua, Suami, Istri, Saudara, dll)">
                                </div>
                                <div class="mb-4">
                                    <label for="keperluan" class="form-label">Keperluan</label>
                                    <input type="text" name="keperluan" class="form-control" id="keperluan" placeholder="Keperluan">
                                </div>
                                <div class="mb-4">
                                    <label for="tanggalKunjungan" class="form-label">Tanggal Kunjungan</label>
                                    <input type="date" name="tanggalKunjungan" class="form-control" id="tanggalKunjungan" placeholder="Tanggal Kunjungan">
                                </div>
                                <div class="mb-4">
                                    <label for="nomorTelepon" class="form-label">Nomor Telepon / HP Yang Dapat Dihubungi</label>
                                    <input type="text" name="nomorTelepon" class="form-control" id="nomorTelepon" placeholder="Nomor Telepon / HP">
                                </div>
                                <div class="mb-4">
                                    <label for="tandaPengenal" class="form-label">Upload KTP / SIM / Passport</label>
                                    <input type="file" name="tandaPengenal" class="form-control" id="tandaPengenal">
                                    <p style="font-size: 0.7rem;">Upload 1 file: PDF, atau image(jpg, jpeg, png). Max 1 MB.</p>
                                </div>
                                <strong>Data Tahanan</strong>
                                <div class="mb-4">
                                    <label for="namaTersangka" class="form-label">Nama Tersangka</label>
                                    <input type="text" name="namaTersangka" class="form-control" id="namaTersangka" placeholder="Nama Tersangka">
                                </div>
                                <div class="mb-4">
                                    <label for="alamatTersangka" class="form-label">Alamat Tersangka</label>
                                    <textarea type="text" name="alamatTersangka" class="form-control" id="alamatTersangka" placeholder="Alamat Tersangka"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="ttlTersangka" class="form-label">Tempat/Tanggal Lahir Tersangka</label>
                                    <input type="text" name="ttlTersangka" class="form-control" id="ttlTersangka" placeholder="Tempat/Tanggal Lahir Tersangka">
                                </div>
                                <div class="mb-4">
                                    <label for="jenisKelaminTersangka" class="form-label">Jenis Kelamin Tersangka</label>
                                    <select name="jenisKelaminTersangka" class="form-select" aria-label="Jenis Kelamin">
                                        <option selected value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="agamaTersangka" class="form-label">Agama Tersangka</label>
                                    <select name="agamaTersangka" class="form-select" aria-label="Agama Tersangka">
                                        <option selected value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="buddha">Buddha</option>
                                        <option value="konghuchu">Konghuchu</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="pekerjaanTersangka" class="form-label">Pekerjaan Tersangka</label>
                                    <input type="text" name="pekerjaanTersangka" class="form-control" id="pekerjaanTersangka" placeholder="Pekerjaan Tersangka">
                                </div>
                                <button type="submit" class="btn btn-green"><strong>Submit</strong></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>

<?= $this->endSection() ?>