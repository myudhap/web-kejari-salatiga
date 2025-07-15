<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Tri Krama Adhyaksa<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section>
    <section id="breadcrumb">
        <div class="container">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bolder">
                    <li class="breadcrumb-item">Profil</li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Tri Krama Adhyaksa</li>
                </ol>
            </nav>
            <div class="row">
                <div class="row my-4">
                    <div class="col text-center">
                        <h2>
                            <strong>Tri Krama Adhyaksa</strong>
                        </h2>
                    </div>
                </div>
                <div class="row my-5 text-center">
                    <div class="col-lg-4">
                            <h5 class="text-primary text-center"><strong>SATYA</strong></h5>
                            <p style="text-align: justify;">Kesetiaan yang bersumber pada rasa jujur, baik terhadap Tuhan Yang Maha Esa, diri pribadi dan keluarga maupun kepada sesama manusia.</p>
                    </div>
                    <div class="col-lg-4">
                            <h5 class="text-primary text-center"><strong>ADHI</strong></h5>
                            <p style="text-align: justify;">Kesempurnaan dalam bertugas dan yang berunsur utama pemilikan rasa tanggung jawab terhadap Tuhan Yang Maha Esa, keluarga dan sesama manusia.</p>
                    </div>
                    <div class="col-lg-4">
                            <h5 class="text-primary text-center"><strong>WICAKSANA</strong></h5>
                            <p style="text-align: justify;">Bijaksana dalam tutur kata dan tingkah laku, khususnya dalam pengetrapan tugas dan kewenangannya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>

<?= $this->endSection() ?>