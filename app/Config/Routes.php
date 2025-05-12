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
$routes->get('/test-password', 'TestPassword::index');
$route['auth/login'] = 'auth/login';
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/register', 'Auth::store');
$routes->get('/dashboard/generatePdf', 'Dashboard::generatePdf');
$routes->get('/dashboard/exportExcel', 'Dashboard::exportExcel');