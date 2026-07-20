<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test', 'Test::index');
$routes->get('/prefixes', 'PrefixeController::index');
$routes->post('/prefixes/insert', 'PrefixeController::insert');

