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
                <div class="row my-5">
                    <div class="col text-center">
                        <h2>
                            <strong class="text-primary">Berita</strong> Kejaksaan
                        </h2>
                    </div>
                </div>
                <?php foreach ($berita as $item): ?>
                <div class="row align-items-center justify-content-center mb-5">
                    <div class="col-sm-4 col-md-6 col-lg-4">
                        <div class="card"  style="padding: 5px;border-width: 3px;border-radius: 0;border-color: #00923f;">
                            <img src="<?php echo base_url('assets/img/berita/' . $item['gambar']) ?>" alt="">
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-6 col-lg-8">
                        <p class="fw-bold text-primary fs-5"><?php echo esc($item['judul']) ?></p>
                        <div class="post-meta text-primary mt-4 my-2">
                            <span>
                                <i class="fa-solid fa-calendar-days"></i>
                                <span>&nbsp;<?php echo esc($item['tanggal']) ?></span>
                            </span>
                            &nbsp; &nbsp;
                            <span>
                                <i class="fa-solid fa-eye"></i>
                                <span>&nbsp;<?php echo esc($item['views']) ?>x dilihat</span>
                            </span>
                            &nbsp; &nbsp;
                            <span>
                                <i class="fa-solid fa-user"></i>
                                <span>Admin Kejari</span>
                            </span>
                        </div>
                        <p class="my-3" style="text-align: justify;">
                            <?php 
                            $content = $item['isi'];
                            $max_chars = 380;
                            if (strlen($content) > $max_chars) {
                                $content = substr($content, 0, $max_chars) . '...';
                            }
                            echo $content ?>
                        </p>
                        <a style="background-color: #05ac69;" href="/berita/<?= $item['id'] ?>"
                            class="btn text-white font-weight-semibold btn-px-4 btn-py-2 text-2 my-2">Selengkapnya</a>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="my-5">
                    <h4 class="fw-bold float-start">Total Berita: <?= $total ?></h4>
                    <div class="pagination float-end">
                        <nav>
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= ceil($total / $limit); $i++): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $i ?>&limit=<?= $limit ?>" <?= ($i == $page ? 'style="font-weight: bold;"' : '') ?>>
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>

<?= $this->endSection() ?>