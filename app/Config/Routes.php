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
$routes->group('panel', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('login/auth', 'Auth::loginAuth');
});

$routes->group('panel', [
    'namespace' => 'App\Controllers\Admin',
    'filter' => 'auth'
], function($routes) {
    $routes->get('logout', 'Auth::logout');

    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('', 'Dashboard::index');

    $routes->get('user', 'User::index');
    $routes->post('user', 'User::store');
    $routes->post('user/update/(:segment)', 'User::update/$1');
    $routes->get('user/delete/(:segment)', 'User::delete/$1');

    $routes->get('berita', 'Berita::index');
    $routes->post('berita', 'Berita::store');
    $routes->post('berita/update/(:segment)', 'Berita::update/$1');
    $routes->get('berita/delete/(:segment)', 'Berita::delete/$1');

    $routes->get('jadwal-sidang', 'JadwalSidang::index');
    $routes->post('jadwal-sidang', 'JadwalSidang::store');
    $routes->post('jadwal-sidang/update/(:num)', 'JadwalSidang::update/$1');
    $routes->get('jadwal-sidang/delete/(:num)', 'JadwalSidang::delete/$1');

    // Layanan
    $routes->get('layanan/barang-bukti', 'Layanan::barangBukti');
    // $routes->get('/layanan/barang-bukti', 'Main\Layanan::barangBukti', ['as' => 'layanan.barang_bukti']);
    // $routes->post('/layanan/barang-bukti', 'Data\BarangBuktiController::storePengambilanBarangBukti');
    // $routes->post('/layanan/barang-bukti/check', 'Data\BarangBuktiController::checkPengambilanBarangBukti');
    // $routes->get('/layanan/kunjungan-tahanan', 'Main\Layanan::kunjunganTahanan', ['as' => 'layanan.kunjungan_tahanan']);
    // $routes->post('/layanan/kunjungan-tahanan', 'Main\KunjunganTahananController::store');
    // $routes->post('/layanan/kunjungan-tahanan/check', 'Main\KunjunganTahananController::check');

    // Buku Tamu
    $routes->get('buku-tamu', 'BukuTamu::index');
    $routes->post('buku-tamu', 'BukuTamu::store');
    $routes->post('buku-tamu/update/(:num)', 'BukuTamu::update/$1');
    $routes->get('buku-tamu/delete/(:num)', 'BukuTamu::delete/$1');

    // Jaksa
    $routes->get('jaksa', 'Jaksa::index');
    $routes->post('jaksa', 'Jaksa::store');
    $routes->post('jaksa/update/(:num)', 'Jaksa::update/$1');
    $routes->post('jaksa/toggle-status/(:num)', 'Jaksa::toggleStatus/$1');
    $routes->get('jaksa/delete/(:num)', 'Jaksa::delete/$1');

    $routes->group('user', [
        'filter' => 'adminauth'
    ], function($routes) {
        $routes->get('/register', 'Auth::register');
        $routes->post('/register/store', 'Auth::registerStore');
    });
});