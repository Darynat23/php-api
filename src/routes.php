<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

// $app = AppFactory::create();



require __DIR__ . './config/database.php';


$app->get('/designs', function(Request $request, Response $response, $args){
    $response->getBody()->write($json);
    return $response ->withHeader('Content-Type', 'application/json');
});


$app->post('/designs', function(Request $request, Response $response, $args){
    $response->getBody()->write("Hola");
    return $response;
});



$app->post('/prueba', function(Request $request, Response $response, $args){


    // json_decode(datos, quieres arreglo?)


    // tomamos el body el request
    $body = $request->getBody();

    // convertimos el JSON del body en un arreglo
    $user = json_decode($body, TRUE);
    // podemos usar con php los datos
    // guardar base de datos $array['text']


    // usuario: nombre, apellido, correo

    
        $user['nombre'];
        $user['apellido'];
        $user['correo'];


        $db = new db();


        try{
            $conn = $db->$connect();
        }catch(PDOException $e){
            var_dump($e);
        }


    
    // --------------------------------------------
    // convertimos el arreglo a json

    $json = json_encode($user);

    //agregamos al body de la respuesta el json.

    $response->getBody()->write("$json");
    // respondemos un application/json
    return $response->withHeader('Content-type','application/json');
});