<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

// require('../controllers/greetings.php');
require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();


// app - function get (ruta, function)
$app->get('/hello/{name}/{apellido}', function (Request $request, Response $response, $args) {

    $name = $args["name"];
    $apellido = $args["apellido"];
    $response->getBody()->write("Hello world $name $apellido!");
    return $response;
});
 

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Root!");
    return $response;
});

$app->run();

// https://www.postman.com/downloads/

// php -S localhost:8888

// composer require slim/psr7