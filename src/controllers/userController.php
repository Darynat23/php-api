<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '../../model/user.php';


class UserController{
    private static function json_to_user(Request $request){
        $json =$request->getBody();
        $user_data =  json_decode($json, TRUE);
        $user = new Usuario();
        $user->nombre_usuario = $user_data['nombre_usuario'];
        $user->clave = $user_data['clave'];
        $user->idusuario = $user_data['idusuario'];
        return $user;
    }



    public function __invoke(Request $request, Response $response, $args){
        $response->getBody()->write("Hola");
        return $response;
    }

    public static function guardar(Request $request, Response $response, $args){
        $user= self::json_to_user($request);
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
    public static function actualizar(Request $request, Response $response, $args){
        $user = self::json_to_user($request);
        $userdao = new UsuarioDao();
        $estado = $userdao->actualizar($user);
        $response->getBody()->write("actualizar");
        return $response;
    }    

    public function borrar(Request $request, Response $response, $args){
        $response->getBody()->write("borrar");
        return $response;
    }
    public function buscar(Request $request, Response $response, $args){
        $idusuario = $args["id"];
        $userdao = new UsuarioDao();
        $user = $userdao->buscar($idusuario);
        $json = json_encode($user);
        $response->getBody()->write("$json");
        return $response->withHeader('Content-type','application/json');
    }

    public static function login(Request $request, Response $response, $args){
        $user = self::json_to_user($request);
        $userdao = new UsuarioDao();
        $user = $userdao->login($user);

        if($user){
            $json = json_encode($user);
            $response->getBody()->write("$json");
            return $response->withHeader('Content-type','application/json');
        }else{
            $error = ['error' => "user not found"];
            $json = json_encode($error);
            $response->getBody()->write("$json");
            return $response->withStatus(500)->withHeader('Content-type','application/json');
        }

        
    }

}