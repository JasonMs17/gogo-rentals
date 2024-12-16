<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

//Home
$routes->get('/', 'Home::index');
$routes->get('halamanUtama', 'Home::index');
$routes->get('about', 'Home::about');

//Browse
$routes->get('browse', 'Kendaraan::index');
$routes->post('browse', 'Kendaraan::save');

//Register Login
$routes->match(['get', 'post'], 'register', 'Auth::register');
$routes->match(['get', 'post'], 'login', 'Auth::index', ['filter' => 'login']);
$routes->get('logout', 'Auth::logout');

//My Booking
$routes->get('myBooking', 'Booking::index');

//Profile
$routes->get('profile', 'User::index');
$routes->post('profile', 'User::update');

//Admin
$routes->get('admin/dashboard', 'Admin::index', ['filter' => 'auth']);
$routes->get('admin/kendaraan', 'Admin::kendaraan', ['filter' => 'auth']);
$routes->get('admin/users', 'Admin::users', ['filter' => 'auth']);
$routes->get('admin/booking', 'Admin::booking', ['filter' => 'auth']);

$routes->get('edit/(:segment)', 'Admin::editKendaraan/$1', ['filter' => 'auth']);
$routes->post('admin/kendaraan/saveKendaraan', 'Admin::saveKendaraan', ['filter' => 'auth']);
$routes->get('admin/kendaraan/deleteKendaraan/(:segment)', 'Admin::deleteKendaraan/$1', ['filter' => 'auth']);
$routes->post('admin/kendaraan/updateKendaraan/(:segment)', 'Admin::updateKendaraan/$1', ['filter' => 'auth']);

$routes->post('admin/update-status', 'Admin::updateStatus/$1', ['filter' => 'auth']);
