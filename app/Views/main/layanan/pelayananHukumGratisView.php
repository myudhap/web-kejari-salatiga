<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Layanan<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section>
    <section id="breadcrumb">
        <div class="container">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bolder">
                    <li class="breadcrumb-item">Layanan</li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Pelayanan Hukum Gratis</li>
                </ol>
            </nav>
            <div class="row" style="text-align: justify;">
                <div class="row mt-5">
                    <div class="col text-center">
                        <h2>
                            <strong class="text-primary">Pelayanan Hukum Gratis</strong>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <strong>
                        Layanan konsultasi hukum gratis masalah hukum perdata dan tata usaha negara yang diberikan <br> kepada masyarakat tanpa dipungut biaya
                        </strong>
                    </div>
                </div>
                <div class="row gx-5 gy-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="shadow p-5">
                            <strong>Alur Pelayanan Hukum Gratis</strong>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shadow p-5">
                            <div class="text-center">
                                <h3>Formulir</h3><hr>
                            </div>
                            <form action="">
                                <strong>Data Pemohon</strong>
                                <div class="mb-4">
                                    <label for="namaPemohon" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="namaPemohon" class="form-control" id="namaPemohon" placeholder="Nama Lengkap">
                                </div>
                                <div class="mb-4">
                                    <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                                    <textarea type="text" name="alamatLengkap" class="form-control" id="alamatLengkap" placeholder="Alamat Lengkap"></textarea>
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
                                <strong>Data Permasalahan</strong>
                                <div class="mb-4">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori" id="perdata">
                                        <label class="form-check-label" for="perdata">
                                            Perdata
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori" id="tun">
                                        <label class="form-check-label" for="tun">
                                            Tata Usaha Negara (TUN)
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="bentukMasalah" class="form-label">Bentuk Permasalahan Hukum</label>
                                    <input type="text" name="bentukMasalah" class="form-control" id="bentukMasalah" placeholder="Bentuk Permasalahan Hukum">
                                </div>
                                <div class="mb-4">
                                    <label for="detailMasalah" class="form-label">Detail Permasalahan</label>
                                    <textarea type="text" name="detailMasalah" class="form-control" id="detailMasalah" placeholder="Detail Permasalahan"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="filePendukung" class="form-label">Dokumen / File Pendukung Terkait</label>
                                    <input type="file" name="filePendukung" class="form-control" id="filePendukung">
                                    <p style="font-size: 0.7rem;">Upload 1 file: PDF, atau image(jpg, jpeg, png). Max 1 MB.</p>
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