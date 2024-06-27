<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// Default routes
$routes->get('/', 'AuthController::index');
$routes->get('/dashboard', 'Home::index');
$routes->get('/admin/dashboard', 'AdminHome::index');

// Lapangan routes
$routes->get('/lapangan', 'LapanganController::index');
$routes->get('/adminlapangan', 'LapanganController::adminindex');
$routes->get('/lapangan/create', 'LapanganController::create');
$routes->post('/lapangan/store', 'LapanganController::store');
$routes->get('/lapangan/edit/(:num)', 'LapanganController::edit/$1');
$routes->post('/lapangan/update', 'LapanganController::update');
$routes->get('/lapangan/delete/(:num)', 'LapanganController::delete/$1');

// Profile routes
$routes->get('/profile', 'ProfileController::index');
$routes->get('/adminprofile', 'ProfileController::adminindex');
$routes->post('/profile/saveProfile', 'ProfileController::saveProfile');
$routes->get('/profile/delete/(:num)', 'ProfileController::deleteProfile/$1');

// Reservasi Routes
$routes->get('/reservasi', 'ReservasiController::index');
$routes->get('/adminreservasi', 'ReservasiController::adminindex');
$routes->post('/reservasi/store', 'ReservasiController::store');
$routes->post('reservasi/confirm/(:num)', 'ReservasiController::confirm/$1');
$routes->post('reservasi/cancel/(:num)', 'ReservasiController::cancel/$1');

// Auth routes
$routes->get('auth', 'AuthController::index');
$routes->post('auth/login', 'AuthController::login');
$routes->post('/auth/register', 'AuthController::register');
$routes->get('auth/logout', 'AuthController::logout');
