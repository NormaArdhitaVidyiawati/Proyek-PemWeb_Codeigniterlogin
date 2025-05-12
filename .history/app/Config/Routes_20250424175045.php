<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('auth', 'Auth::index');
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/attempt', 'Auth::attempt');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/hash', 'Hash::index');