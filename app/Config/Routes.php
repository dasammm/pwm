<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->get('/datalive', 'DataLive::index');

// Authentication Routes
$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/saveRegister', 'Auth::saveRegister');

// User Management Routes
$routes->get('/user', 'User::index');
$routes->get('/user/create', 'User::create');
$routes->post('/user/save', 'User::save');
$routes->get('/user/edit/(:num)', 'User::edit/$1');
$routes->post('/user/update/(:num)', 'User::update/$1');
$routes->get('/user/delete/(:num)', 'User::delete/$1');
$routes->get('/user/admin', 'User::admin');
$routes->get('/user/client', 'User::client');
$routes->get('/user/customer', 'User::customer');

// Existing Routes
$routes->get('/pelanggan', 'Pelanggan::index');
$routes->get('/profil', 'Profil::index');

$routes->get('/masalah', 'Masalah::index');
$routes->get('/masalah/simpan', 'Masalah::simpan');

$routes->get('/pulsa/simpan', 'Pulsa::simpan');

$routes->get('/riwayat', 'Riwayat::index');
$routes->get('/riwayat/listdata', 'Riwayat::listdata');

$routes->get('/wilayah', 'Wilayah::index');

$routes->get('/tipe', 'Tipe::index');
$routes->get('/tipe/simpan', 'Tipe::simpan');

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
