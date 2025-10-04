<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attempt');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Auth::dashboard');

$routes->get('/anggota', 'Anggota::index');
$routes->get('/anggota/create', 'Anggota::create');
$routes->post('/anggota/store', 'Anggota::store');

$routes->get('/anggota/edit/(:num)', 'Anggota::edit/$1');
$routes->post('/anggota/update/(:num)', 'Anggota::update/$1');
$routes->post('/anggota/delete/(:num)', 'Anggota::delete/$1');

$routes->get('/komponen', 'KomponenGaji::index');
$routes->get('/komponen/create', 'KomponenGaji::create');
$routes->get('/komponen/edit/(:num)', 'KomponenGaji::edit/$1');
$routes->post('/komponen/update/(:num)', 'KomponenGaji::update/$1');
$routes->post('/komponen/store', 'KomponenGaji::store');
$routes->post('/komponen/delete/(:num)', 'KomponenGaji::delete/$1');
