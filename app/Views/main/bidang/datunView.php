<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Perdata & Tata Usaha Negara<?= $this->endSection() ?>

<?= $this->section("content") ?>
<style>
    .deskripsi {
        padding: 15px;
        background-color: wheat;
        border-radius: 5px;
    }
</style>
<section>
    <section id="breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bolder">
                    <li class="breadcrumb-item">Bidang</li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Perdata & Tata Usaha Negara</li>
                </ol>
            </nav>
            <div class="row" style="text-align: justify;">
                <div class="col-sm-5 col-md-6 justify-content-center">
                    <div class="row my-2 d-flex justify-content-center" style="text-align: center;">
                        <img src="<?= base_url('assets') ?>/img/struktural/kasi_datun.png" alt="kasubagbin" class="avatar img-fluid" style="width: 350px; height: 500px;">
                        <strong class="fw-bold text-primary">ARDHANA RISWATI P, S.H., M.H.</strong>
                        <strong style="scale: 0.8;">Kepala Seksi Tindak Pidana Umum</strong>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6 d-flex justify-content-center">
                    <div class="row my-2">
                        <div class="col text-center">
                            <h2>
                                <strong class="text-primary">Perdata & Tata Usaha Negara</strong>
                            </h2>
                            <div class="col text-center mb-5">
                                <strong>
                                    Tugas Bagian Perdata & Tata Usaha Negara menurut Peraturan Jaksa Agung Republik Indonesia
                                    <br>
                                    Nomor: 006/A/JA/07/2017 tanggal 20 Juli 2017
                                </strong>
                                <br><br><br>
                                <p><strong class="text-primary">Tugas:</strong></p>
                                <div class="text-align-justify" style="text-align: justify;">
                                    <p>Seksi Perdata & Tata Usaha Negara mempunyai tugas melakukan pemantauan, analisis, evaluasi, dan pelaporan di bidang perdata dan tata usaha negara. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="deskripsi row gx-5">
                    <div class="col-lg-6">
                        <p><strong class="text-primary">Fungsi:</strong></p>
                        <ol style="font-size: 0.9rem;">
                            <li>Penyiapan bahan penyusunan rencana dan program kerja;</li>
                            <li>Pelaksanaan penegakan hukum, bantuan hukum, pertimbangan hukum, dan tindakan hukum lain, serta pelayanan hukum di bidang perdata dan tata usaha negara;</li>
                            <li>Koordinasi dan sinkronisasi pelaksanaan kebijakan di bidang perdata dan tata usaha negara;</li>
                            <li>Pelaksanaan hubungan kerja dengan instansi atau lembaga baik di dalam negeri maupun di luar negeri;</li>
                            <li>Pemantauan, analisis, evaluasi, dan pelaporan pelaksanaan penegakan hukum, bantuan hukum, pertimbangan hukum, dan tindakan hukum lain, serta pelayanan hukum di bidang perdata dan tata usaha negara.</li>
                        </ol>
                    </div>
                    <div class="col-lg-6">
                        <p><strong class="text-primary">Perdata & Tata Usaha Negara Terdiri Dari:</strong></p>
                        <ol style="font-size: 0.9rem;">
                            <li><strong>Subseksi Perdata dan Tata Usaha Negara</strong>: mempunyai tugas melakukan pemberian bantuan hukum di bidang perdata dan forum arbitrase, penegakan hukum, dan pemberian jasa hukum di bidang tata usaha negara.</li>
                            <li><strong>Subseksi Pertimbangan Hukum</strong>: mempunyai tugas melakukan pemberian pertimbangan hukum, tindakan hukum lain, dan pelayanan hukum di bidang perdata.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>

<?= $this->endSection() ?>