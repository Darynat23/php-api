<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

require __DIR__ . './config/database.php';
require __DIR__ . './controllers/userController.php';
require __DIR__ . './controllers/designController.php';

$usuarioController = new UserController();
$designController = new DesignController();



$app->get('/usuarios', 'UserController'); // todos usuarios
$app->get('/usuarios/id/{id}', 'UserController::buscar'); // usuario por id
$app->post('/usuarios/login', 'UserController::login'); // usuario por nombre_usuario password
$app->post('/usuarios','UserController::guardar');
$app->put('/usuarios','UserController::actualizar');
$app->delete('/usuarios','UserController::borrar');


 $app->get('/disenios', 'DesignController');
 $app->get('/disenios/id/{id}', 'DesignController::buscar');
 $app->post('/disenios','DesignController::guardar');
// $app->put('/disenios','DesignController::actualizar');
// $app->delete('/disenios','DesignController::borrar');


// $app->delete('/ruta', function);
// $app->delete('/usuarios', usuarioController->get);