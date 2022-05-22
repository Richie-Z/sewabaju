<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/baju/', 'Baju::index');
$routes->get('/baju/(:num)', 'Baju::index/$1');
$routes->get('/jenis_baju/(:num)', 'Baju::jenisBaju/$1');

$routes->get('/booking/(:num)', 'Booking::index/$1', ['filter' => 'client_auth']);
$routes->get('/booking/ready/(:num)', 'Booking::ready/$1', ['filter' => 'client_auth']);
$routes->get('/booking/detail/(:num)', 'Booking::detail/$1', ['filter' => 'client_auth']);
$routes->get('/booking/upload/(:num)', 'Booking::upload/$1', ['filter' => 'client_auth']);
$routes->get('/booking/cetak/(:num)', 'Booking::cetak/$1', ['filter' => 'client_auth']);
$routes->get('/booking/riwayat', 'Booking::riwayat', ['filter' => 'client_auth']);


$routes->get('/page/(:alpha)', 'Home::page/$1');
$routes->get('/contact_us', 'Home::contactUs');
$routes->get('/profile', 'Home::profile', ['filter' => 'client_auth']);
$routes->get('/update_password', 'Home::updatePassword', ['filter' => 'client_auth']);

$routes->get('/admin', 'admin\Login::index', ['filter' => 'admin_auth:guest']);
$routes->get('/admin/dashboard', 'admin\Dashboard::index', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/profile', 'admin\Login::profile', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/change', 'admin\Login::updatePassword', ['filter' => 'admin_auth:admin']);

$routes->get('/admin/baju', 'admin\Baju::index', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/baju/tambah', 'admin\Baju::add', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/baju/detail/(:num)', 'admin\Baju::detail/$1', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/baju/edit/(:num)', 'admin\Baju::ubah/$1', ['filter' => 'admin_auth:admin']);

$routes->get('/admin/jenis', 'admin\Jenis::index', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/jenis/tambah', 'admin\Jenis::tambah', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/jenis/edit/(:num)', 'admin\Jenis::ubah/$1', ['filter' => 'admin_auth:admin']);

$routes->get('/admin/kategori', 'admin\Kategori::index', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/kategori/tambah', 'admin\Kategori::tambah', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/kategori/edit/(:num)', 'admin\Kategori::ubah/$1', ['filter' => 'admin_auth:admin']);

$routes->get('/admin/member', 'admin\Member::index', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/member/tambah', 'admin\Member::tambah', ['filter' => 'admin_auth:admin']);

$routes->get('/admin/pesan', 'admin\Pesan::index', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/halaman', 'admin\Halaman::index', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/kontak', 'admin\Kontak::index', ['filter' => 'admin_auth:admin']);

$routes->get('/admin/pembayaran', 'admin\Pembayaran::index', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/pembayaran/edit/(:any)', 'admin\Pembayaran::edit/$1', ['filter' => 'admin_auth:admin']);

$routes->get('/admin/konfirmasi', 'admin\Konfirmasi::index', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/konfirmasi/edit/(:any)', 'admin\Konfirmasi::edit/$1', ['filter' => 'admin_auth:admin']);

$routes->get('/admin/data_sewa', 'admin\Sewa::index', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/laporan', 'admin\Sewa::laporan', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/laporan/cetak/(:any)/(:any)', 'admin\Sewa::laporanCetak/$1/$2', ['filter' => 'admin_auth:admin']);

$routes->get('/admin/sewa/detail/(:any)', 'admin\Sewa::detailSewa/$1', ['filter' => 'admin_auth:admin']);
$routes->get('/admin/sewa/denda/(:any)', 'admin\Sewa::denda/$1', ['filter' => 'admin_auth:admin']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
