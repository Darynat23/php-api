<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '../../model/user.php';


class UserController{
    public function __invoke(Request $request, Response $response, $args){
        $response->getBody()->write("Hola");
        return $response;
    }

    public function guardar(Request $request, Response $response, $args){
       
        // ----------Guardar

        // json

        // convertir json a php

        $json = $request->getBody();
        $array = json_decode($json, TRUE);
        
        // extraer los datos en variables
        $user = new Usuario();
        $user->set_nombre_usuario($array['nombre_usuario']);
        $user->set_clave($array['clave']);

        // el dao guarda en base de datos 
        $userdao = new UsuarioDao();
        $estado = $userdao->guardar($user);

        // retorna al usuario el estado de el guardado
        if($estado){
            $user_json = json_encode($estado);
            $response->getBody()->write("$user_json");
            return $response->withHeader('Content-type','application/json');
        }else{
            $response->getBody()->write("error al crear usuario intente mas tarde");    
            return $response->withStatus(500);
        }
    }
    public  function actualizar(Request $request, Response $response, $args){
        $response->getBody()->write("actualizar");
        return $response;

    }    
    public function borrar(Request $request, Response $response, $args){
        $response->getBody()->write("borrar");
        return $response;
    }
}