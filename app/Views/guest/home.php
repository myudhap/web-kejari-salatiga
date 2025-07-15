<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Beranda<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="content">
    <div id="carouselHome" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner pb-5">
            <div class="carousel-item active pb-5">
                <img src="<?php echo base_url('assets') ?>/img/carousel.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <img src="<?php echo base_url('assets') ?>/img/logo_berakhlak.png" class="mb-2" alt="" width="200">
                    <h1 class="text-primary fw-bolder">Kejaksaan Negeri Salatiga</h1>
                    <h2 class="text-black fw-bold">ZONA INTEGRITAS</h2>
                </div>
            </div>
        </div>
    </div>
    <section id="main">
        <section id="news">
            <div class="container">
                <div class="row mb-5">
                    <div class="col text-center">
                        <h2>
                            <strong class="text-primary">Berita</strong> Terbaru
                        </h2>
                    </div>
                </div>
                <?php foreach ($berita as $item): ?>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-sm-4 col-md-6 col-lg-4">
                            <div class="card" style="padding: 5px;border-width: 3px;border-radius: 0;border-color: #00923f;">
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
                            <a style="background-color: #00923f;" href="/berita/<?= $item['id'] ?>"
                                class="btn text-white font-weight-semibold btn-px-4 btn-py-2 text-2 my-2">Selengkapnya</a>
                        </div>
                    </div>
                    <br><br>
                <?php endforeach; ?>
                <div class="text-center">
                    <a style="background-color: #00923f; width:30%; border-radius:2rem;" href="/berita"
                        class="btn text-white fw-bold btn-px-4 py-3 text-2 my-2 btn-outline-light">Lihat Berita Lainnya</a>
                </div>
            </div>
        </section>
        <section id="bidang" class="pt-5">
            <div class="container">
                <div class="row my-5">
                    <div class="col text-center">
                        <h2>
                            <strong class="text-primary">Bidang</strong> Kejari Salatiga
                        </h2>
                        <strong>UNIT KERJA</strong>
                    </div>
                </div>
                <div class="row gx-5 gy-4">
                    <a class="col-6 text-decoration-none" href="/bidang/pembinaan">
                        <div class="mb-4 shadow px-5 py-4 hover-primary bg-white">
                            <div class="feature-box-icon"></div>
                            <div class="feature-box-info">
                                <h4 class="fw-bold text-center mb-4">Bidang Pembinaan</h4>
                                <p>Seksi Pembinaan melakukan perencanaan program kerja dan anggaran, pengelolaan ketata
                                    usahaan kepegawaian.</p>
                            </div>
                        </div>
                    </a>
                    <a class="col-6 text-decoration-none bg-white" href="/bidang/intelijen">
                        <div class="mb-4 shadow px-5 py-4 hover-primary bg-white">
                            <div class="feature-box-icon"></div>
                            <div class="feature-box-info">
                                <h4 class="fw-bold text-center mb-4">Bidang Intelijen</h4>
                                <p>Seksi Intelijen mempunyai tugas melaksanakan penanganan operasi intelijen dan penerangan
                                    hukum.</p>
                            </div>
                        </div>
                    </a>
                    <a class="col-6 text-decoration-none" href="/bidang/pidum">
                        <div class="mb-4 shadow px-5 py-4 hover-primary bg-white">
                            <div class="feature-box-icon"></div>
                            <div class="feature-box-info">
                                <h4 class="fw-bold text-center mb-4">Bidang Tindak Pidana Umum</h4>
                                <p>Seksi Tindak Pidana Umum mempunyai tugas melaksanakan dan mengendalikan penanganan
                                    perkara tindak pidana umum.</p>
                            </div>
                        </div>
                    </a>
                    <a class="col-6 text-decoration-none" href="/bidang/pidsus">
                        <div class="mb-4 shadow px-5 py-4 hover-primary bg-white">
                            <div class="feature-box-icon"></div>
                            <div class="feature-box-info">
                                <h4 class="fw-bold text-center mb-4">Bidang Tindak Pidana Khusus</h4>
                                <p>Seksi Tindak Pidana Khusus mempunyai tugas melaksanakan dan mengendalikan penanganan
                                    perkara tindak pidana khusus.</p>
                            </div>
                        </div>
                    </a>
                    <a class="col-6 text-decoration-none" href="/bidang/datun">
                        <div class="mb-4 shadow px-5 py-4 hover-primary bg-white">
                            <div class="feature-box-icon"></div>
                            <div class="feature-box-info">
                                <h4 class="fw-bold text-center mb-4">Bidang Perdata & Tata Usaha Negara</h4>
                                <p>Seksi Perdata dan Tata Usaha Negara mempunyai tugas dan fungsi dalam bidang perdata dan
                                    tata usaha negara di daerah hukumnya.</p>
                            </div>
                        </div>
                    </a>
                    <a class="col-6 text-decoration-none" href="/bidang/pb3r">
                        <div class="mb-4 shadow px-5 py-4 hover-primary bg-white">
                            <div class="feature-box-icon"></div>
                            <div class="feature-box-info">
                                <h4 class="fw-bold text-center mb-4">Bidang Pengelolaan Barang Bukti & Barang Rampasan</h4>
                                <p>Seksi Pengelolaan Barang Bukti & Barang Rampasan mempunyai tugas melakukan pengelolaan
                                    barang bukti dan barang rampasan yang berasal dari Pidum dan Pidsus.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section id="structural" class="py-5">
            <div class="container">
                <div class="row my-5">
                    <div class="col text-center">
                        <h2>
                            <strong class="text-primary">Pejabat </strong> Struktural
                        </h2>
                        <strong>KEJAKSAAN NEGERI SALATIGA</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4 text-center">
                        <img src="<?php echo base_url('assets') ?>/img/struktural/kajari.png" alt="" class="img-fluid mb-4" width="80%">
                        <h3 class="fw-bold text-primary">SUKAMTO, S.H., M.H.</h3>
                        <strong>Kepala Kejaksaan Negeri Salatiga</strong>
                    </div>
                    <div class="col-4"></div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="center">
                        <div class="text-center">
                            <img src="<?php echo base_url('assets') ?>/img/struktural/kasubagbin.png" alt="" class="mx-auto" width="50%">
                            <br>
                            <h5 class="fw-bold text-primary">RAMLAH HASYIM PAREMA, S.H.</h5>
                            <strong>Kepala Sub Bagian Pembinaan</strong>
                        </div>
                        <div class="text-center">
                            <img src="<?php echo base_url('assets') ?>/img/struktural/kasi_intel.png" alt="" class="mx-auto" width="50%">
                            <br>
                            <h5 class="fw-bold text-primary">ERWIN RIONALDY KOLOWAY, S.H., M.H.</h5>
                            <strong>Kepala Seksi Intelijen</strong>
                        </div>
                        <div class="text-center">
                            <img src="<?php echo base_url('assets') ?>/img/struktural/kasi_pidum.png" alt="" class="mx-auto" width="50%">
                            <br>
                            <h5 class="fw-bold text-primary">ARDHANA RISWATI P, S.H., M.H.</h5>
                            <strong>Kepala Seksi Tindak Pidana Umum</strong>
                        </div>
                        <div class="text-center">
                            <img src="<?php echo base_url('assets') ?>/img/struktural/kasi_pidsus.png" alt="" class="mx-auto" width="50%">
                            <br>
                            <h5 class="fw-bold text-primary">DIMAZ ATMADI BRATA A, S.H., M.H.</h5>
                            <strong>Kepala Seksi Tindak Pidana Khusus</strong>
                        </div>
                        <div class="text-center">
                            <img src="<?php echo base_url('assets') ?>/img/struktural/kasi_datun.png" alt="" class="mx-auto" width="50%">
                            <br>
                            <h5 class="fw-bold text-primary">NANA ROSITA SARI, S.H., M.H.</h5>
                            <strong>Kepala Seksi Perdata & Tata Usaha Negara</strong>
                        </div>
                        <div class="text-center">
                            <img src="<?php echo base_url('assets') ?>/img/struktural/kasi_bb.png" alt="" class="mx-auto" width="50%">
                            <br>
                            <h5 class="fw-bold text-primary">IMAM RAHMAT SAPUTRA, S.H., M.H.</h5>
                            <strong>Kepala Seksi PB3R</strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="social-media" class="py-5">
            <div class="container">
                <div class="row my-2">
                    <div class="col text-center text-white">
                        <h2>
                            Temukan kami di <strong class="text-secondary">Media Sosial</strong>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <h4 class="heading-block my-4 text-secondary" style="border-bottom: 3.5px solid #ffffff; padding-bottom: 1rem;">
                            <span class="text-white"><b><i class="fa-brands fa-instagram"></i> Instagram</b></span>
                            Kejaksaan
                        </h4>
                        <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/C4KB-gyyESa/?utm_source=ig_embed&utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                            <div style="padding:16px;"> <a href="https://www.instagram.com/p/C4KB-gyyESa/?utm_source=ig_embed&utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                                    <div style=" display: flex; flex-direction: row; align-items: center;">
                                        <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div>
                                        <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                            <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div>
                                            <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div>
                                        </div>
                                    </div>
                                    <div style="padding: 19% 0;"></div>
                                    <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                                    <g>
                                                        <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg></div>
                                    <div style="padding-top: 8px;">
                                        <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div>
                                    </div>
                                    <div style="padding: 12.5% 0;"></div>
                                    <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                        <div>
                                            <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div>
                                            <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div>
                                            <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div>
                                        </div>
                                        <div style="margin-left: 8px;">
                                            <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div>
                                            <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div>
                                        </div>
                                        <div style="margin-left: auto;">
                                            <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div>
                                            <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div>
                                            <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div>
                                        </div>
                                    </div>
                                    <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                        <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div>
                                        <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div>
                                    </div>
                                </a>
                                <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/C4KB-gyyESa/?utm_source=ig_embed&utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Kejaksaan Negeri Salatiga (@kejari.salatiga)</a></p>
                            </div>
                        </blockquote>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="heading-block my-4 text-secondary" style="border-bottom: 3.5px solid #ffffff; padding-bottom: 1rem;">
                            <span class="text-white"><b><i class="fa-brands fa-youtube"></i> Youtube</b></span>
                            Kejaksaan
                        </h4>
                        <div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.25%;"><iframe src="https://www.youtube.com/embed/XhPOBlbZXdg?rel=0&start=5" style="top: 0; left: 0; width: 100%; height: 100%; position: absolute; border: 0;" allowfullscreen scrolling="no" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share;"></iframe></div>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="heading-block my-4 text-secondary" style="border-bottom: 3.5px solid #ffffff; padding-bottom: 1rem;">
                            <span class="text-white"><b><i class="fa-brands fa-twitter"></i> Twitter</b></span>
                            Kejaksaan
                        </h4>
                        <blockquote class="twitter-tweet">
                            <p lang="in" dir="ltr">Kepala Kejaksaan Negeri Salatiga (Sukamto, S.H., M.H.) didampingi kasubag dan para kasi bersilaturahmi serta melaksanakan bakti sosial yang disambut langsung oleh Bapak K.H. Drs. Rofiq selaku pengasuh Pondok Pesantren Sultan Fatah Salatiga <a href="https://t.co/lSoLcnuKAn">pic.twitter.com/lSoLcnuKAn</a></p>&mdash; Kejari.Salatiga (@SalatigaKejari) <a href="https://twitter.com/SalatigaKejari/status/1775330975297556759?ref_src=twsrc%5Etfw">April 3, 2024</a>
                        </blockquote>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
        </section>
        <section id="location" class="py-5">
            <div class="container">
                <div class="row my-2">
                    <div class="col text-center">
                        <h2>
                            <strong class="text-primary">Lokasi</strong> Kami
                        </h2>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-lg-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.127899621014!2d110.50606427570952!3d-7.339530892669057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a7833b459e9cb%3A0x426899f415d8dcc2!2sKejaksaan%20Negeri%20Salatiga!5e0!3m2!1sen!2sid!4v1738816124607!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col">
                                <h5><strong>ALAMAT</strong></h5>
                                <br>
                                Jl. Jend. Sudirman, Gendongan, Kec. Tingkir, Kota Salatiga, Jawa Tengah 50743
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <h5><strong>JAM OPERASIONAL</strong></h5>
                                <br>
                                SENIN-KAMIS 08:00 – 16:00
                                <br>
                                JUM’AT 08:00 – 16:30
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<script>
    $('.center').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        mobileFirst: true
    });
</script>
<script async onerror="var a=document.createElement('script');a.src='https://iframely.net/files/instagram_embed.js';document.body.appendChild(a);" src="https://www.instagram.com/embed.js"></script>

<?= $this->endSection() ?>