<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//nome navegador - nome pagina/classe controller - nome método controller
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->get('cadastro', 'Home::cadastro');
$routes->get('feed', 'Home::feed');
$routes->get('perfilSocialMedia', 'Home::perfilSm');
$routes->get('perfilUsuario', 'Home::perfilUsuario');
$routes->get('informacoes', 'Home::informacoesPerfil');


//Rotas de Usuario
$routes->post('/user/register', 'Usuarios::inserir', ['as' => 'cadastrarUsuario']);
$routes->post('/user/login', 'Usuarios::index', ['as' => 'logarUsuario']);
$routes->post('/user/edit', 'Usuarios::editar');
$routes->post('/user/delete', 'Usuarios::excluir');
$routes->post('/user/informacoes', 'InformacoesPerfil::index', ['as' => 'cadastrarInformacoes']);

//Rotas de Servico
$routes->post('/service/register', 'Profissoes::inserir');
$routes->post('/service/search', 'Profissoes::index');
$routes->post('/service/edit', 'Profissoes::editar');
$routes->post('/service/delete', 'Profissoes::excluir');

//Rotas de Anuncio
$routes->post('/ad/register', 'Anuncios::inserir');
$routes->post('/ad/search', 'Anuncios::index');
$routes->post('/ad/edit', 'Anuncios::editar');
$routes->post('/ad/delete', 'Anuncios::excluir');

//Rotas de Avaliação
$routes->post('/stars/register', 'Avaliacoes::inserir');
$routes->post('/stars/edit', 'Avaliacoes::editar');
$routes->post('/stars/delete', 'Avaliacoes::excluir');
$routes->post('/stars/search', 'Avaliacoes::index');

//Rotas de Vendas
$routes->post('/register', 'Vendas::inserir');
$routes->post('/delete', 'Vendas::excluir');
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
