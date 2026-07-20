<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/* admin */
$routes->get('/', 'OperationAdminController::index');
$routes->post('/insert_operation', 'OperationAdminController::insert_operation');
$routes->get('/prefixes', 'PrefixeController::index');
$routes->post('/prefixes/insert', 'PrefixeController::insert');


/* clients */
