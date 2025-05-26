<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main\HomeController::index');

$routes->get('/profil/sejarah', 'Main\ProfileController::sejarah');
$routes->get('/profil/visi-misi', 'Main\ProfileController::visiMisi');
$routes->get('/profil/logo', 'Main\ProfileController::logo');
$routes->get('/profil/tri-krama-adhyaksa', 'Main\ProfileController::triKrama');
$routes->get('/profil/struktur-organisasi', 'Main\ProfileController::strukturOrganisasi');

$routes->get('/bidang/pembinaan', 'Main\BidangController::pembinaan');
$routes->get('/bidang/intel', 'Main\BidangController::intel');
$routes->get('/bidang/pidum', 'Main\BidangController::pidum');
$routes->get('/bidang/pidsus', 'Main\BidangController::pidsus');
$routes->get('/bidang/datun', 'Main\BidangController::datun');
$routes->get('/bidang/pb3r', 'Main\BidangController::pb3r');

$routes->get('/layanan/survey', 'Main\LayananController::survey');
$routes->get('/layanan/pelayanan-hukum-gratis', 'Main\LayananController::pelayananHukumGratis');

$routes->get('/berita', 'Main\BeritaController::index');
$routes->get('/berita/(:segment)', 'Main\BeritaController::detail/$1');

$routes->get('/informasi/jadwal-sidang', 'Main\InformasiController::jadwalSidang');

// Routes untuk Admin (No Required Admin Auth)

$routes->group('panel', static function ($routes) {
    $routes->get('/', 'Admin\DashboardController::index');
    $routes->get('list-user', 'Admin\UserController::index');
    $routes->get('berita', 'Admin\BeritaController::index');
    $routes->post('berita', 'Admin\BeritaController::store');
    $routes->get('berita/edit/(:segment)', 'Admin\BeritaController::edit/$1');
    $routes->post('berita/edit/(:segment)', 'Admin\BeritaController::update/$1');
    $routes->get('berita/delete/(:segment)', 'Admin\BeritaController::delete/$1');
    $routes->get('layanan/barang-bukti', 'Admin\LayananController::barangBukti');
});

// Routes Untuk Admin Middleware (Required Admin Auth)

// $routes->group('panel', ['filter' => 'adminauth'], static function ($routes) {
//     $routes->get('/', 'Admin\DashboardController::index');
//     $routes->get('list-user', 'Admin\UserController::index');
//     $routes->get('berita', 'Admin\BeritaController::index');
//     $routes->post('berita', 'Admin\BeritaController::store');
//     $routes->get('berita/edit/(:segment)', 'Admin\BeritaController::edit/$1');
//     $routes->post('berita/edit/(:segment)', 'Admin\BeritaController::update/$1');
//     $routes->get('berita/delete/(:segment)', 'Admin\BeritaController::delete/$1');
//     $routes->get('layanan/barang-bukti', 'Admin\LayananController::barangBukti');
// });


// Routes Layanan
$routes->get('/layanan/barang-bukti', 'Main\LayananController::barangBukti', ['as' => 'layanan.barang_bukti']);
$routes->post('/layanan/barang-bukti', 'Data\BarangBuktiController::storePengambilanBarangBukti');
$routes->post('/layanan/barang-bukti/check', 'Data\BarangBuktiController::checkPengambilanBarangBukti');
$routes->get('/layanan/kunjungan-tahanan', 'Main\LayananController::kunjunganTahanan', ['as' => 'layanan.kunjungan_tahanan']);
$routes->post('/layanan/kunjungan-tahanan', 'Main\KunjunganTahananController::store');
$routes->post('/layanan/kunjungan-tahanan/check', 'Main\KunjunganTahananController::check');

// Routes Login
$routes->get('/login', 'Auth::login');
$routes->post('/login/auth', 'Auth::loginAuth');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard::index'); // Tambahkan jika belum

// Routes Register
$routes->get('/register', 'Auth::register');
$routes->post('/register/store', 'Auth::registerStore');

    // Routes Jadwal Sidang 
    $routes->group('panel', static function ($routes) {
        $routes->get('jadwal-sidang', 'Admin\JadwalSidangController::index');
        $routes->get('jadwal-sidang/create', 'Admin\JadwalSidangController::create');
        $routes->post('jadwal-sidang/store', 'Admin\JadwalSidangController::store');
        $routes->get('jadwal-sidang/edit/(:num)', 'Admin\JadwalSidangController::edit/$1');
        $routes->post('jadwal-sidang/update/(:num)', 'Admin\JadwalSidangController::update/$1');
        $routes->get('jadwal-sidang/delete/(:num)', 'Admin\JadwalSidangController::delete/$1');
        // ['filter' => 'adminOnly'],
        $routes->post('panel/jadwal-sidang/update/(:num)', 'JadwalController::update/$1');

    // Routes Buku Tamu
        $routes->get('buku-tamu', 'Admin\BukuTamuController::index');
        $routes->get('buku-tamu/create', 'Admin\BukuTamuController::create');
        $routes->post('buku-tamu/store', 'Admin\BukuTamuController::store');
        $routes->get('buku-tamu/edit/(:num)', 'Admin\BukuTamuController::edit/$1');
        $routes->post('buku-tamu/update/(:num)', 'Admin\BukuTamuController::update/$1');
        $routes->get('buku-tamu/delete/(:num)', 'Admin\BukuTamuController::delete/$1');
});
