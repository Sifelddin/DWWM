<?php

require_once __DIR__. '/../vendor/autoload.php';

use app\Router;
use app\Controllers\ProController;

$router = new Router();

$router->get('/', [ProController::class, 'index']);
$router->get('/products', [ProController::class, 'index']);
$router->get('/products/create', [ProController::class, 'create']);
$router->post('/products/create', [ProController::class, 'create']);
$router->get('/products/update', [ProController::class, 'update']);
$router->post('/products/update', [ProController::class, 'update']);
$router->post('/products/delete', [ProController::class, 'delete']);

$router->resolve();
