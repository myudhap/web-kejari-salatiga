<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Layanan<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section>
    <section id="breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bolder">
                    <li class="breadcrumb-item">Error 404</li>
                </ol>
            </nav>
            <div class="row" style="text-align: justify;">
                <div class="row mt-5">
                    <div class="col text-center">
                        <img src="<?= base_url('assets') ?>/img/icon/404.png" alt="kasubagbin" class="avatar img-fluid">
                        <h2>
                            <strong><?= $error_message ?></strong>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>

<?= $this->endSection() ?>