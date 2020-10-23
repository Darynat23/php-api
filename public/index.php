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


// $app->options('/{routes:.+}', function ($request, $response, $args) {
//     return $response;
// });

// $app->add(function ($req, $res, $next) {
//     $response = $next($req, $res);
//     return $response
//             ->withHeader('Access-Control-Allow-Origin', '*')
//             ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
//             ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
// });

// $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
//     $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
//     return $handler($req, $res);
// });
$app->run();
