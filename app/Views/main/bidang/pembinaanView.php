<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Pembinaan<?= $this->endSection() ?>

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
                    <li class="breadcrumb-item active text-primary" aria-current="page">Pembinaan</li>
                </ol>
            </nav>
            <div class="row" style="text-align: justify;">
                <div class="col-sm-5 col-md-6 d-flex justify-content-center">
                    <div class="row my-2 d-flex justify-content-center" style="text-align: center;">
                        <img src="<?= base_url('assets') ?>/img/struktural/kasubagbin.png" alt="kasubagbin" class="avatar img-fluid" style="width: 350px; height: 500px;">
                        <strong class="fw-bold text-primary">RAMLAH HASYIM PAREMA, S.H.</strong>
                        <strong style="scale: 0.8;">Kepala Sub Bagian Pembinaan</strong>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6 d-flex justify-content-center">
                    <div class="row my-2">
                        <div class="col text-center">
                            <h2>
                                <strong class="text-primary">Pembinaan</strong>
                            </h2>
                            <div class="col text-center mb-5">
                                <strong>
                                    Tugas Bagian Pembinaan menurut Peraturan Jaksa Agung Republik Indonesia
                                    <br>
                                    Nomor: 006/A/JA/07/2017 tanggal 20 Juli 2017
                                </strong>
                                <br><br><br>
                                <p><strong class="text-primary">Tugas:</strong></p>
                                <div class="text-align-justify" style="text-align: justify;">
                                    <p>Pembinaan mempunyai tugas melakukan perencanaan program kerja dan anggaran, pengelolaan ketatausahaan kepegawaian, kesejahteraan pegawai, keuangan, perlengkapan, organisasi dan tatalaksana, pengelolaan teknis atas barang milik negara, pengelolaan data dan statistik kriminal, pelaksanaan evaluasi dan penguatan program reformasi birokrasi serta pemberian dukungan pelayanan teknis dan administrasi bagi seluruh satuan kerja diLingkungan Kejaksaan Negeri yang bersangkutan dalam rangka memperlancar pelaksanaan tugas.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                </div>
                <div class="deskripsi row gx-5">
                    <div class="col-lg-6">
                        <p><strong class="text-primary">Fungsi:</strong></p>
                        <ol style="font-size: 0.9rem;">
                            <li>melakukan koordinasi, integrasi dan sinkronisasi serta membina kerjasama seluruh satuan kerja di Lingkungan Kejaksaan Negeri di bidang administrasi;</li>
                            <li>melakukan pembinaan organisasi dan tatalaksana urusan ketatausahaan dan mengelola keuangan, kepegawaian, perlengkapan dan milik negara yang menjadi tanggung jawabnya;</li>
                            <li>melakukan pembinaan dan peningkatan kemampuan, keterampilan dan integritas kepribadian aparat Kejaksaan di daerah hukumnya;</li>
                            <li>melaksanakan pengelolaan data dan statistik kriminal serta penerapan dan pengembangan teknologi informasi di Lingkungan Kejaksaan Negeri; pelaksanaan program reformasi birokrasi.</li>
                        </ol>
                    </div>
                    <div class="col-lg-6">
                        <p><strong class="text-primary">Pembinaan Terdiri Dari:</strong></p>
                        <ol style="font-size: 0.9rem;">
                            <li><strong>Urusan Tata Usaha, Kepegawaian, Keuangan dan Penerimaan Negara Bukan Pajak</strong>: mempunyai tugas melakukan urusan ketatausahaan, kepegawaian, peningkatan integritas dan kepribadian serta kesejahteraan pegawai, melakukan urusan keuangan dan pengelolaan Penerimaan Negara Bukan Pajak</li>
                            <li><strong>Urusan Perlengkapan, Data Statistik Kriminal dan Teknologi Informasi dan Perpustakaan</strong>: mempunyai tugas melakukan urusan perlengkapan dan kerumahtanggaan, serta melakukan urusan pengelolaan data statistik kriminal, penerapan dan pengembangan teknologi informasi, perpustakaan, dokumentasi hukum</li>
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