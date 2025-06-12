<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */

// Guest Routes
$routes->group('', ['namespace' => 'App\Controllers\Guest'], function($routes) {
    $routes->get('/', 'Beranda::index');

    $routes->group('profil', function($routes) {
        $routes->get('sejarah', 'Profil::sejarah');
        $routes->get('visi-misi', 'Profil::visiMisi');
        $routes->get('logo', 'Profil::logo');
        $routes->get('tri-krama-adhyaksa', 'Profil::triKrama');
        $routes->get('struktur-organisasi', 'Profil::strukturOrganisasi');
    });

    $routes->get('/bidang/(:segment)', 'Bidang::detail/$1');

    $routes->group('layanan', function($routes) {
        $routes->get('survey', 'Layanan::survey');
        $routes->get('pelayanan-hukum-gratis', 'Layanan::pelayananHukumGratis');
        $routes->group('barang-bukti', function($routes) {
            $routes->get('', 'Layanan::barangBukti', ['as' => 'layanan.barang_bukti']);
            $routes->post('', 'Layanan::storeBarangBukti');
            $routes->post('check', 'Layanan::checkBarangBukti');
        });
        $routes->group('kunjungan-tahanan', function($routes) {
            $routes->get('', 'Layanan::kunjunganTahanan', ['as' => 'layanan.kunjungan_tahanan']);
            $routes->post('', 'Layanan::storeKunjunganTahanan');
            $routes->post('check', 'Layanan::checkKunjunganTahanan');
        });
    });
    
    $routes->get('/berita', 'Berita::index');
    $routes->get('/berita/(:segment)', 'Berita::detail/$1');

    $routes->get('/informasi/jadwal-sidang', 'Informasi::jadwalSidang');
});

// Admin Routes
$routes->get('/panel/login', 'Auth::login');
$routes->post('/panel/login/auth', 'Auth::loginAuth');
$routes->get('/panel/logout', 'Auth::logout');

$routes->group('panel', [
    'namespace' => 'App\Controllers\Admin',
    'filter' => 'auth'
], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('/', 'DashboardController::index');
    $routes->get('list-user', 'UserController::index');

    $routes->get('berita', 'BeritaController::index');
    $routes->post('berita', 'BeritaController::store');
    $routes->get('berita/edit/(:segment)', 'BeritaController::edit/$1');
    $routes->post('berita/edit/(:segment)', 'BeritaController::update/$1');
    $routes->get('berita/delete/(:segment)', 'BeritaController::delete/$1');

    // Layanan
    $routes->get('layanan/barang-bukti', 'Layanan::barangBukti');
    // $routes->get('/layanan/barang-bukti', 'Main\LayananController::barangBukti', ['as' => 'layanan.barang_bukti']);
    // $routes->post('/layanan/barang-bukti', 'Data\BarangBuktiController::storePengambilanBarangBukti');
    // $routes->post('/layanan/barang-bukti/check', 'Data\BarangBuktiController::checkPengambilanBarangBukti');
    // $routes->get('/layanan/kunjungan-tahanan', 'Main\LayananController::kunjunganTahanan', ['as' => 'layanan.kunjungan_tahanan']);
    // $routes->post('/layanan/kunjungan-tahanan', 'Main\KunjunganTahananController::store');
    // $routes->post('/layanan/kunjungan-tahanan/check', 'Main\KunjunganTahananController::check');

    // Jadwal Sidang
    $routes->get('jadwal-sidang', 'JadwalSidangController::index');
    $routes->get('jadwal-sidang/create', 'JadwalSidangController::create');
    $routes->post('jadwal-sidang/store', 'JadwalSidangController::store');
    $routes->get('jadwal-sidang/edit/(:num)', 'JadwalSidangController::edit/$1');
    $routes->post('jadwal-sidang/update/(:num)', 'JadwalSidangController::update/$1');
    $routes->get('jadwal-sidang/delete/(:num)', 'JadwalSidangController::delete/$1');
    $routes->post('jadwal-sidang/update/(:num)', 'JadwalSidangController::update/$1');

    // Buku Tamu
    $routes->get('buku-tamu', 'BukuTamuController::index');
    $routes->get('buku-tamu/create', 'BukuTamuController::create');
    $routes->post('buku-tamu/store', 'BukuTamuController::store');
    $routes->get('buku-tamu/edit/(:num)', 'BukuTamuController::edit/$1');
    $routes->post('buku-tamu/update/(:num)', 'BukuTamuController::update/$1');
    $routes->get('buku-tamu/delete/(:num)', 'BukuTamuController::delete/$1');

    $routes->group('user', [
        'filter' => 'adminauth'
    ], function($routes) {
        $routes->get('/register', 'Auth::register');
        $routes->post('/register/store', 'Auth::registerStore');
    });
});