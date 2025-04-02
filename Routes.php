<?php

use App\Controllers\Responsavel;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('home', 'Home::index', ['as' => 'home']);


$routes->get('login', 'responsavels::index', ['as' => 'login']); // Página do formulário
$routes->post('responsavels/responsaveis', 'responsavels::responsaveis'); // Processa o login
$routes->get('home', 'responsavels::home');
$routes->get('test', 'TestDB::teste');


