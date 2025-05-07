<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Pengelolaan Barang Bukti & Barang Rampasan<?= $this->endSection() ?>

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
                    <li class="breadcrumb-item active text-primary" aria-current="page">Pengelolaan Barang Bukti & Barang Rampasan</li>
                </ol>
            </nav>
            <div class="row" style="text-align: justify;">
                <div class="col-sm-5 col-md-6 justify-content-center">
                    <div class="row my-2 d-flex justify-content-center" style="text-align: center;">
                        <img src="<?= base_url('assets') ?>/img/struktural/kasi_bb.png" alt="kasubagbin" class="avatar img-fluid" style="width: 350px; height: 500px;">
                        <strong class="fw-bold text-primary">ARDHANA RISWATI P, S.H., M.H.</strong>
                        <strong style="scale: 0.8;">Kepala Seksi Tindak Pidana Umum</strong>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6 d-flex justify-content-center">
                    <div class="row my-2">
                        <div class="col text-center">
                            <h2>
                                <strong class="text-primary">Pengelolaan Barang Bukti & Barang Rampasan</strong>
                            </h2>
                            <div class="col text-center mb-5">
                                <strong>
                                    Tugas Bagian Pengelolaan Barang Bukti & Barang Rampasan menurut Peraturan Jaksa Agung Republik Indonesia
                                    <br>
                                    Nomor: 006/A/JA/07/2017 tanggal 20 Juli 2017
                                </strong>
                                <br><br><br>
                                <p><strong class="text-primary">Tugas:</strong></p>
                                <div class="text-align-justify" style="text-align: justify;">
                                    <p>Seksi Pengelolaan Barang Bukti & Barang Rampasan mempunyai tugas melakukan pengelolaan barang bukti dan barang rampasan yang berasal dari tindak pidana umum dan pidana khusus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="deskripsi row gx-5">
                    <div class="col-lg-12">
                        <p><strong class="text-primary">Fungsi:</strong></p>
                        <ol style="font-size: 0.9rem;">
                            <li>Penyiapan bahan penyusunan rencana dan program kerja;</li>
                            <li>Analisis dan penyiapan pertimbangan hukum pengelolaan barang bukti dan barang rampasan;</li>
                            <li>Pengelolaan barang bukti dan barang rampasan meliputi pencatatan, penelitian barang bukti, penyimpanan dan pengklasifikasian barang bukti, penitipan, pemeliharaan, pengamanan, penyediaan dan pengembalian barang bukti sebelum dan setelah sidang serta penyelesaian barang rampasan;</li>
                            <li>Penyiapan pelaksanaan koordinasi dan kerja sama dalam pengelolaan barang buki dan barang rampasan;</li>
                            <li>Pengelolaan dan penyajian data dan informasi;</li>
                            <li>Pelaksanaan pemantauan, evaluasi dan penyusunan laporan pengelolaan barang bukti dan barang rampasan.</li>
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