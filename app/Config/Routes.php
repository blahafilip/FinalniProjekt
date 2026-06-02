<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('zavody', 'Main::zavody');

$routes->get('zavody/(:num)', 'Main::zavody/$1');

$routes->group('form-helper','' , static function ($routes){
    $routes->get('/', 'Main::index');
    
    $routes->get('races/add', 'Main::add');
    $routes->post('races/create', 'Main::create');
    
    $routes->get('races/edit/(:num)', 'Main::edit/$1');
    
    $routes->post('races/update/(:num)', 'Main::update/$1'); 
    
    $routes->get('races/delete/(:num)', 'Main::delete/$1');
});