<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

// dependencias
require __DIR__ . '/../vendor/autoload.php';



$app = AppFactory::create();


// $app->addBodyParsingMiddleware();
// importaciones

require __DIR__ . '/../src/routes.php';


// routes 

$app->get('/', function(Request $request, Response $response, $args) {
    $response->getBody()->write("Root!");
    return $response;
});

$app->run();

// https://www.postman.com/downloads/

// php -S localhost:8888

// composer require slim/psr7