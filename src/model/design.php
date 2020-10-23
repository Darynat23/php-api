<?php

// require __DIR__ . '../../config/database.php';
// data transport Object.
class Design {
    public $id_design;
    public $nombre_prenda;
    

    public function get_id_design(){
        return $this->id_design;
    }
    public function get_nombre_prenda(){
        return $this->nombre_prenda;
    }

    public function set_id_design($id_design){
        $this->idusuario = $id_design;
    }
    public function set_nombre_usuario($nombre_prenda){
        $this->nombre_usuario =$nombre_prenda ;
    } 
}


// data access Object.

class DesignDao{
    private $db;

    public function buscar($id_design){
      return "buscando usuario $id_design->get_id_design()";
    }

    public function guardar($design){
        $design_name = $design->get_nombre_prenda();
        $db = new Db();
       
        // dao guardar en base de datos 
            // conectarse a la base datos

                try{
                    $conn = $db->connect();
                }catch(PDOException  $e){
                    $state = False;
                }
                
            // tener la consulta SQL que guarda
                $sql = 'INSERT INTO natkandlo.disenio (nombre_prenda)
                VALUES (?,?);';
    
            // ejecutar la consulta y recibir el estado 
                $state = $conn->prepare($sql)->execute([$design_name]);
            
            //retornar el estado.

            if (state){
                $design->set_idusuario($conn->lastInsertId());
                return $design;
            }else{
                return NULL;
            }

        // cliente       -  usuario->flutter 
        //------------------------------------
        // recepcion     -  controller     - UserController  - userController.php
        // moto caja     -  dto  - datos   -  Usuario        - usuario.php
        // domiciliario  -  dao            - this -          - usuario.php
    }

    public function actualizar(){
        
    }

    public function borrar(){
        
    }

}