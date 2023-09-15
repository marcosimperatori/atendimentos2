<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LoginController::index');

$routes->get('home', 'Home::index');


$routes->get('clientes', 'ClienteController::index');
$routes->get('clientes_get_all', 'ClienteController::getAll');
$routes->get('clientes/criar', 'ClienteController::criar');
$routes->get('clientes/editar/(:alphanum)', 'ClienteController::edit/$1');
$routes->get('clientes/deletar/(:alphanum)', 'ClienteController::deletar/$1');
$routes->get('clientes/confirma_exclusao/(:alphanum)', 'ClienteController::confirma_exclusao/$1');
$routes->post('clientes/cadastrar', 'ClienteController::cadastrar');
$routes->post('clientes/atualizar', 'ClienteController::atualizar');


$routes->get('escritorios', 'EscritorioController::index');
$routes->get('escritorios-all', 'EscritorioController::getAll');
$routes->get('escritorios/criar', 'EscritorioController::criar');
$routes->get('escritorios/editar/(:alphanum)', 'EscritorioController::edit/$1');
$routes->get('escritorios/deletar/(:alphanum)', 'EscritorioController::deletar/$1');
$routes->get('escritorios/confirma_exclusao/(:alphanum)', 'EscritorioController::confirma_exclusao/$1');
$routes->post('escritorios/cadastrar', 'EscritorioController::cadastrar');
$routes->post('escritorios/atualizar', 'EscritorioController::atualizar');


$routes->get('atendimentos', 'AtendeController::index');

$routes->get('certificados', 'CertificadoController::index');
$routes->get('certificados_get_all', 'CertificadoController::getAll');

$routes->get('tipos', 'TipoController::index');


$routes->get('logout', 'LoginController::logout');
$routes->post('logar', 'LoginController::logar');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
