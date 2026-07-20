<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/* admin */
$routes->get('/', 'OperationController::index');
$routes->post('/insert_operation', 'OperationController::insert_operation');
$routes->get('/prefixes', 'PrefixeController::index');
$routes->post('/prefixes/insert', 'PrefixeController::insert');
$routes->get('/situation', 'TransactionController::gains');
$routes->get('/situation/comptes', 'TransactionController::comptes');

/* clients */
$routes->get('/login', 'ClientsController::index');
$routes->post('/login', 'ClientsController::login');
$routes->get('/espaceClient', 'ClientsController::espaceClient');
$routes->get('/voirSolde', 'ClientsController::voirSolde');
$routes->get('/faireDepot', 'ClientsController::faireDepot');
$routes->post('/faireDepot', 'ClientsController::traiterDepot');
$routes->get('/faireRetrait', 'ClientsController::faireRetrait');
$routes->post('/faireRetrait', 'ClientsController::traiterRetrait');
$routes->get('/faireTransfert', 'ClientsController::faireTransfert');
$routes->post('/faireTransfert', 'ClientsController::traiterTransfert');
$routes->get('/voirHistorique', 'ClientsController::voirHistorique');
$routes->get('/deconnexion', 'ClientsController::deconnexion');
