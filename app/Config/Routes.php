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
