<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?><?= $bidang['nama'] ?><?= $this->endSection() ?>

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
                    <li class="breadcrumb-item active text-primary" aria-current="page"><?= $bidang['nama'] ?></li>
                </ol>
            </nav>
            <div class="row" style="text-align: justify;">
                <div class="col-sm-5 col-md-6 justify-content-center">
                    <div class="row my-2 justify-content-center" style="text-align: center;">
                        <img src="<?= base_url('assets') ?>/img/struktural/<?= $bidang['image'] ?>" alt="kasubagbin" class="avatar img-fluid" style="width: 345px; height: 500px;">
                        <strong class="fw-bold text-primary"><?= $bidang['nama_kepala'] ?></strong>
                        <strong style="scale: 0.8;"><?= $bidang['kepala'] . " " . $bidang['nama'] ?></strong>
                    </div>
                </div>
                <div class="col-sm-5 col-md-6 d-flex justify-content-center">
                    <div class="row my-2">
                        <div class="col text-center">
                            <h2>
                                <strong class="text-primary"><?= $bidang['nama'] ?></strong>
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
                                    <p><?= $bidang['tugas'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                </div>
                <div class="deskripsi row gx-5">
                    <div class="<?php if(count($bidang['struktural']) > 0) { echo `col-lg-6`; } else { echo `col-lg-12`; } ?>">
                        <p><strong class="text-primary">Fungsi:</strong></p>
                        <ol style="font-size: 0.9rem;">
                            <?php foreach ($bidang['fungsi'] as $item): ?>
                                <li><?= $item ?></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                    <div class="col-lg-6" <?php if(count($bidang['struktural']) == 0) echo "hidden" ?>>
                        <p><strong class="text-primary"><?= $bidang['nama'] ?> Terdiri Dari:</strong></p>
                        <ol style="font-size: 0.9rem;">
                            <?php foreach ($bidang['struktural'] as $item): ?>
                                <li><?= $item ?></li>
                            <?php endforeach; ?>
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