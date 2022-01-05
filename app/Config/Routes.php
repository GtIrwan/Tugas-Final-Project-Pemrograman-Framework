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

$routes->get('home', 'UserController::index', ['filter' => 'auth']);
$routes->get('profile', 'UserController::profile', ['filter' => 'auth']);

$routes->get('/backend', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');

$routes->get('/mahasiswa', 'Mahasiswa::index', ['filter' => 'auth']);
$routes->get('/mahasiswa/create', 'Mahasiswa::create', ['filter' => 'auth']);
$routes->get('/mahasiswa/store', 'Mahasiswa::store', ['filter' => 'auth']);
$routes->get('/mahasiswa/edit', 'Mahasiswa::edit', ['filter' => 'auth']);

$routes->get('/buku', 'Buku::index', ['filter' => 'auth']);
$routes->get('/buku/create', 'Buku::create', ['filter' => 'auth']);
$routes->get('/buku/store', 'Buku::store', ['filter' => 'auth']);
$routes->get('/buku/edit', 'Buku::edit', ['filter' => 'auth']);

$routes->get('/peminjaman', 'Peminjaman::index', ['filter' => 'auth']);
$routes->get('/peminjaman/create', 'Peminjaman::create', ['filter' => 'auth']);
$routes->get('/peminjaman/store', 'Peminjaman::store', ['filter' => 'auth']);
$routes->get('/peminjaman/edit', 'Peminjaman::edit', ['filter' => 'auth']);

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
