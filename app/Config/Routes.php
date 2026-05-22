<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('zavody', 'Main::zavody');

$routes->get('zavody/(:num)', 'Main::zavody/$1');

$routes->get('uvodniStranka/add', 'Main::add');
