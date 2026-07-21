<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/* admin */
$routes->get('/admin', 'AdminController::login');
$routes->post('/admin/login', 'AdminController::authenticate');
$routes->get('/admin/dashboard', 'AdminController::dashboard');
$routes->get('/admin/logout', 'AdminController::logout');
$routes->get('/operation', 'OperationController::index');
$routes->post('/insert_operation', 'OperationController::insert_operation');
$routes->get('/prefixes', 'PrefixeController::index');
$routes->post('/prefixes/insert', 'PrefixeController::insert');
$routes->get('/situation_financiere', 'TransactionController::gains');
$routes->get('/comptabilite', 'TransactionController::comptes');
$routes->get('/commission', 'CommissionController::index');
$routes->post('/commission/insert', 'CommissionController::insert');
$routes->get('/promotion', 'PromotionController::index');
$routes->post('/promotion/insert', 'PromotionController::insert');




/* clients */
$routes->get('/', 'ClientsController::index');
$routes->post('/login', 'ClientsController::login');
$routes->get('/espaceClient', 'ClientsController::espaceClient');
$routes->get('/voirSolde', 'ClientsController::voirSolde');
$routes->get('/faireDepot', 'ClientsController::faireDepot');
$routes->post('/faireDepot', 'ClientsController::traiterDepot');
$routes->get('/faireRetrait', 'ClientsController::faireRetrait');
$routes->post('/faireRetrait', 'ClientsController::traiterRetrait');
$routes->get('/faireTransfert', 'TransfertController::faireTransfert');
$routes->post('/faireTransfert', 'TransfertController::traiterTransfert');
$routes->get('/voirHistorique', 'ClientsController::voirHistorique');
$routes->get('/deconnexion', 'ClientsController::deconnexion');
$routes->get('/epargne', 'EpargneController::index');
$routes->post('/epargne/insert', 'EpargneController::insert');

