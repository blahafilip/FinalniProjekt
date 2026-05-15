<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
<<<<<<< HEAD
=======
$routes->get('zavody', 'Main::zavody');
>>>>>>> c396d3c268108d12fb0860ce9d46e38b94e9ce7c
$routes->get('zavody/(:num)', 'Main::zavody/$1');
