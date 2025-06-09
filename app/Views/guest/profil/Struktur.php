<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Struktur Organisasi<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section>
    <section id="breadcrumb">
        <div class="container">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bolder">
                    <li class="breadcrumb-item">Profil</li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Struktur Organisasi</li>
                </ol>
            </nav>
            <div class="row">
                <div class="row my-2">
                    <div class="col text-center">
                        <h2>
                            <strong class="text-primary">Struktur</strong> Organisasi
                        </h2>
                        <strong>KEJAKSAAN NEGERI SALATIGA (TIPE B)</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center my-5">
                        <img src="<?php echo base_url('assets') ?>/img/bagan.png" alt="" width="80%">
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>

<?= $this->endSection() ?>