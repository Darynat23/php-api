<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '../../model/design.php';


class DesignController{
    private static function json_to_design(Request $request){
        $json =$request->getBody();
        $json_data =  json_decode($json, TRUE);
        $design = new Design();
        $design->id_design          =$json_data['id_design'];
        $design->nombre_prenda      =$json_data['nombre_prenda'];
        $design->descripcion        =$json_data['descripcion'];
        $design->costo              =$json_data['costo'];
        $design->tiempo_creacion    =$json_data['tiempo_creacion'];
        $design->estado             =$json_data['estado'];
        $design->fecha_creacion     =$json_data['fecha_creacion'];
        $design->id_user            =$json_data['id_user'];
        $design->talla              =$json_data['talla'];
        $design->tipo_prenda        =$json_data['tipo_prenda'];
        $design->tipo_tela          =$json_data['tipo_tela'];
        $design->color              =$json_data['color'];
        return $design;
    }



    public function __invoke(Request $request, Response $response, $args){
        $params =$request->getQueryParams();
        $id_user = $params['id'];
        $designdao = new DesignDao();
        $designs = $designdao->buscar($id_user);
        $json = json_encode($designs);
        $response->getBody()->write("$json");
        return $response->withHeader('Content-type','application/json');
    }

    public static function guardar(Request $request, Response $response, $args){
        $design= self::json_to_design($request);
        $designdao = new DesignDao();
        $estado = $designdao->guardar($design);

        // retorna al usuario el estado de el guardado
        if($estado){
            $design_json = json_encode($estado);
            $response->getBody()->write("$design_json");
            return $response->withHeader('Content-type','application/json');
        }else{
            $response->getBody()->write("error al crear diseño intente mas tarde");    
            return $response->withStatus(500);
        }
    }
    public static function actualizar(Request $request, Response $response, $args){
        $design = self::json_to_design($request);
        $designdao = new DesignDao();
        $estado = $designdao->actualizar($design);
        $response->getBody()->write("actualizar");
        return $response;
    }    

    public function borrar(Request $request, Response $response, $args){
        $response->getBody()->write("borrar");
        return $response;
    }
    public function buscar(Request $request, Response $response, $args){
        $iddisenio= $args["id"];
        $designdao = new DesignDao();
        $design = $designdao->buscar_iddisenio($iddisenio);
        $json = json_encode($design);
        $response->getBody()->write("$json");
        return $response->withHeader('Content-type','application/json');
    }
}