<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Layanan<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section>
    <section id="breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bolder">
                    <li class="breadcrumb-item">Layanan</li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Pengambilan/Pengantaran Barang Bukti Gratis</li>
                </ol>
            </nav>
            <div class="row" style="text-align: justify;">
                <div class="row mt-5">
                    <div class="col text-center">
                        <h2>
                            <strong class="text-primary">Pengambilan / Pengantaran Barang Bukti Gratis</strong>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <strong>
                        Layanan Pengambilan/Pengantaran Barang Bukti kepada Pemilik atau yang berhak <br> sesuai amar Putusan Pengadilan yang telah inkracht
                        </strong>
                    </div>
                </div>
                <div class="row gx-5 gy-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-4">
                            <strong>Lacak Permohonan</strong>
                            <form action="/layanan/barang-bukti/check" method="POST">
                                <div class="input-group my-4">
                                    <input type="text" name="nomorRegistrasi" class="form-control" id="nomorRegistrasi" placeholder="Nomor Registrasi" required>
                                    <button type="submit" class="btn btn-green"><strong>Cari</strong></button>
                                </div>
                            </form>
                            <?php if (session()->getFlashdata('success_check')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <p><strong class="text-center">Lacak Permohonan</strong></p><hr>
                                    <p>Nomor Registrasi: <br> <strong><?php echo session()->getFlashdata('nomor_registrasi'); ?></strong></p>
                                    <p>Status: <br> <strong><?php echo session()->getFlashdata('status'); ?></strong></p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->getFlashdata('success_check') !== NULL && !session()->getFlashdata('success_check')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <p><strong class="text-center">Lacak Permohonan</strong></p><hr>
                                    <p>Nomor Registrasi: <br> <strong><?php echo session()->getFlashdata('nomor_registrasi'); ?></strong></p>
                                    <p>Status: <br> <strong>Nomor Registrasi Tidak Ditemukan</strong></p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="shadow p-5">
                            <strong>Alur Pengambilan / Pengantaran Barang</strong>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shadow p-5">
                            <?php if (session()->getFlashdata('success_create') !== NULL) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong class="text-center">Permohonan Berhasil</strong><br>
                                    <p>Nomor Registrasi: <br> <?php echo session()->getFlashdata('success_create'); ?></p>
                                    <hr>
                                    <p class="mb-0 fw-light">
                                        Catatan: <br> Harap catat / simpan nomor registrasi untuk mengetahui status permohonan
                                    </p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->getFlashdata('error') !== NULL) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo session()->getFlashdata('error'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <div class="text-center">
                                <h3>Formulir</h3><hr>
                            </div>
                            <form action="/layanan/barang-bukti" method="POST" enctype="multipart/form-data">
                                <strong>Data Pemohon</strong>
                                <div class="mb-4">
                                    <label for="namaPemohon" class="form-label">Nama Pemohon</label>
                                    <input type="text" name="namaPemohon" class="form-control" id="namaPemohon" placeholder="Nama Pemohon">
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
                                    <label for="nomorTelepon" class="form-label">Nomor Telepon / HP Yang Dapat Dihubungi</label>
                                    <input type="text" name="nomorTelepon" class="form-control" id="nomorTelepon" placeholder="Nomor Telepon / HP">
                                </div>
                                <!-- Upload KTP/SIM/Passport <br> -->
                                <div class="mb-4">
                                    <label for="tandaPengenal" class="form-label">Upload KTP / SIM / Passport</label>
                                    <input type="file" name="tandaPengenal" class="form-control" id="tandaPengenal">
                                    <p style="font-size: 0.7rem;">Upload 1 file: PDF, atau image(jpg, jpeg, png). Max 1 MB.</p>
                                </div>
                                <strong>Data Terpidana & Perkara</strong>
                                <div class="mb-4">
                                    <label for="namaTerpidana" class="form-label">Nama Terpidana</label>
                                    <input type="text" name="namaTerpidana" class="form-control" id="namaTerpidana" placeholder="Nama Terpidana">
                                </div>
                                <div class="mb-4">
                                    <label for="perkara" class="form-label">Perkara / Pasal Yang Dikenakan Terpidana</label>
                                    <input type="text" name="perkara" class="form-control" id="perkara" placeholder="Perkara / Pasal Yang Dikenakan Terpidana">
                                </div>
                                <strong>Data Lainnya</strong>
                                <div class="mb-4">
                                    <label for="barangBukti" class="form-label">Barang Bukti Yang Akan Diambil</label>
                                    <input type="text" name="barangBukti" class="form-control" id="barangBukti" placeholder="Barang Bukti Yang Akan Diambil">
                                </div>
                                <div class="mb-4">
                                    <label for="suratKuasa" class="form-label">Surat Kuasa <p style="font-size: 0.8rem;">(Jika Diwakilkan)</p></label>
                                    <input type="file" name="suratKuasa" class="form-control" id="suratKuasa">
                                    <p style="font-size: 0.7rem;">Upload 1 file: PDF, atau image(jpg, jpeg, png). Max 1 MB.</p>
                                </div>
                                <div class="mb-4">
                                    <label for="buktiMilik" class="form-label">Dokumen Bukti Kepemilikan <p style="font-size: 0.8rem;">(Apabila Berbentuk Kendaraan Bermotor)</p></label>
                                    <input type="file" name="buktiMilik" class="form-control" id="buktiMilik">
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