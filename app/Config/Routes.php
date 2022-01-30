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
$routes->setDefaultController('Dashboard');
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
$routes->get('/', 'Dashboard::index');

$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->put('user/edit/(:num)', 'Admin\User::update/$1');
    $routes->post('user/create', 'Admin\User::save');
    $routes->delete('user/(:num)', 'Admin\User::delete/$1');
    $routes->get('user/(:num)', 'Admin\User::detail/$1');

    $routes->post('anggota/create', 'Admin\Anggota::save');

    $routes->put('jenissimpanan/edit/(:num)', 'Admin\JenisSimpanan::update/$1');
    $routes->post('jenissimpanan/create', 'Admin\JenisSimpanan::save');
    $routes->delete('jenissimpanan/(:num)', 'Admin\JenisSimpanan::delete/$1');
});

$routes->post('simpanan/create', 'Simpanan::save');
$routes->post('pinjaman/create', 'Pinjaman::save');
$routes->post('angsuran/create', 'Angsuran::save');

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
