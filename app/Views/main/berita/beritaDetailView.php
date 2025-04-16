<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Berita<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section>
    <section id="breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bolder">
                    <li class="breadcrumb-item active text-primary" aria-current="page">Berita</li>
                </ol>
            </nav>
            <div class="row">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 p-5">
                        <div class="mb-5">
                            <div class="card"  style="padding: 5px;border-width: 3px;border-radius: 0;border-color: #00923f;">
                                <img src="<?php echo base_url('assets/img/berita/' . $berita['gambar']) ?>" alt="">
                            </div>
                        </div>
                        <h3><strong class="fw-bold text-primary"><?= $berita['judul'] ?></strong></h3>
                        <div class="post-meta text-primary mt-4 my-2">
                            <span>
                                <i class="fa-solid fa-calendar-days"></i>
                                <span>&nbsp;<?= $berita['tanggal'] ?></span>
                            </span>
                            &nbsp; &nbsp;
                            <span>
                                <i class="fa-solid fa-eye"></i>
                                <span>&nbsp;<?= $berita['views'] ?>x dilihat</span>
                            </span>
                            &nbsp; &nbsp;
                            <span>
                                <i class="fa-solid fa-user"></i>
                                <span><?= $berita['name'] ?></span>
                            </span>
                        </div>
                        <p class="my-3" style="text-align: justify;">
                        <?= add_line_breaks($berita['isi']) ?>
                        </p>
                    </div>
                    <div class="col-lg-4 py-5">
                        <div class="pb-2">
                            <strong>BERITA LAINNYA</strong>
                        </div>
                        <div class="shadow">
                        <?php foreach ($beritaBaru as $item): ?>
                            <a href="/berita/<?= $item['id'] ?>" class="row align-items-center p-4 text-decoration-none">
                                <div class="col-sm-4">
                                    <img class="imgs" src="<?php echo base_url('assets/img/berita/' . $item['gambar']) ?>" alt="">
                                </div>
                                <div class="col-sm-8">
                                        <strong>
                                            <?php 
                                            $content = $item['judul'];
                                            $max_chars = 60;
                                            if (strlen($content) > $max_chars) {
                                                $content = substr($content, 0, $max_chars) . '...';
                                            }
                                            echo esc($content) ?>
                                        </strong><br>
                                        <?= $item['tanggal'] ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
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