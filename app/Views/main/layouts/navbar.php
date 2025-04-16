<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-white sticky-top px-2">
    <div class="container">
        <a class="navbar-brand" href="#">
            <div class="logo pt-2">
                <img src="<?php echo base_url('assets') ?>/img/logo_kejaksaan.png" alt="Logo Kejaksaan" width="75">
            </div>
        </a>
        <div class="ml-2 mt-3">
            <h6 class="my-0 ts-1" style="margin-bottom: -0.3rem !important;">Kejaksaan Republik Indonesia                            </h6>
            <h4 class="fw-bold text-dark ts-1">Kejaksaan Negeri Salatiga</h4>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto navbar-nav-scroll">
                <li class="nav-item">
                    <a class="nav-link <?php if ($base == "Beranda") echo "active" ?>" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  <?php if ($base == "Profile") echo "active" ?>" href="#" id="navbarScrollingDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end px-4 py-3" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="/profil/sejarah">Sejarah</a></li>
                        <li><a class="dropdown-item" href="/profil/visi-misi">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="/profil/logo">Logo Kejaksaan</a></li>
                        <li><a class="dropdown-item" href="/profil/tri-krama-adhyaksa">Tri Krama Adhyaksa</a></li>
                        <li><a class="dropdown-item" href="/profil/struktur-organisasi">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  <?php if ($base == "Bidang") echo "active" ?>" href="#" id="navbarScrollingDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Bidang
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end px-4 py-3" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="/bidang/pembinaan">Pembinaan</a></li>
                        <li><a class="dropdown-item" href="/bidang/intel">Intelijen</a></li>
                        <li><a class="dropdown-item" href="/bidang/pidum">Tindak Pidana Umum</a></li>
                        <li><a class="dropdown-item" href="/bidang/pidsus">Tindak Pidana Khusus</a></li>
                        <li><a class="dropdown-item" href="/bidang/datun">Perdata & Tata Usaha Negara</a></li>
                        <li><a class="dropdown-item" href="/bidang/pb3r">Pengelolaan Barang Bukti & Barang Rampasan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  <?php if ($base == "Informasi") echo "active" ?>" href="#" id="navbarScrollingDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end px-4 py-3" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="/informasi/jadwal-sidang">Jadwal Sidang</a></li>
                        <li><a class="dropdown-item" href="https://tilang.kejaksaan.go.id/" target="_blank">Tilang</a></li>
                        <li><a class="dropdown-item" href="https://halojpn.id/satker/kn-salatiga" target="_blank">Halo JPN</a></li>
                        <li><a class="dropdown-item" href="https://www.lapor.go.id/" target="_blank">Lapor SP4N</a></li>
                        <li><a class="dropdown-item" href="https://sippn.menpan.go.id/instansi/1878889/kejaksaan-agung/kejaksaan-negeri-salatiga" target="_blank">SIPPN</a></li>
                        <li><a class="dropdown-item" href="https://ppid.kejaksaan.go.id/satker/kn-salatiga" target="_blank">PPID</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  <?php if ($base == "Layanan") echo "active" ?>" href="#" id="navbarScrollingDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Layanan
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end px-4 py-3" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="/layanan/survey">Survey Kepuasan Masyarakat</a></li>
                        <li><a class="dropdown-item" href="/layanan/barang-bukti">Pengambilan/Pengantaran Barang Bukti Gratis</a></li>
                        <li><a class="dropdown-item" href="/layanan/pelayanan-hukum-gratis">Pelayanan Hukum Gratis</a></li>
                        <li><a class="dropdown-item" href="/layanan/kunjungan-tahanan">Besuk Tahanan Online</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Layanan PTSP</a></li>
                        <li><a class="dropdown-item" href="#">Layanan Pengambilan Tilang</a></li>
                        <li><a class="dropdown-item" href="#">Layanan Pertimbangan Hukum</a></li>
                        <li><a class="dropdown-item" href="#">Layanan Bantuan Hukum</a></li>
                        <li><a class="dropdown-item" href="#">Layanan Saksi</a></li>
                        <li><a class="dropdown-item" href="#">Layanan Jaksa Menyapa</a></li>
                        <li><a class="dropdown-item" href="#">Layanan Jaksa Masuk Sekolah</a></li>
                        <li><a class="dropdown-item" href="#">Layanan Permohonan Perpanjangan Penahanan</a></li>
                        <li><a class="dropdown-item" href="#">Layanan Penerangan Hukum</a></li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if ($base == "Berita") echo "active" ?>" href="/berita">Berita</a>
                </li>
            </ul>
        </div>
    </div>
</nav>