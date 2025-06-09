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
            $routes->post('', 'Main\KunjunganTahananController::store');
            $routes->post('check', 'Main\KunjunganTahananController::check');
        });
    });
    
    $routes->get('/berita', 'Berita::index');
    $routes->get('/berita/(:segment)', 'Berita::detail/$1');

    $routes->get('/informasi/jadwal-sidang', 'Main\InformasiController::jadwalSidang');
});
