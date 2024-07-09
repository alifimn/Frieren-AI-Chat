<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ChatController::index'); // Ubah rute root menjadi ChatController
$routes->get('/chat', 'ChatController::index');
$routes->post('/chat/send', 'ChatController::send');
