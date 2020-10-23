<?php

// require __DIR__ . '../../config/database.php';
// data transport Object.
class Usuario {
    public $idusuario;
    public $nombre_usuario;
    private $clave;
    

    public function get_idusuario(){
        return $this->idusuario;
    }
    public function get_nombre_usuario(){
        return $this->nombre_usuario;
    }

    public function get_clave(){
        return $this->clave;
    }

    public function set_idusuario($idusuario){
        $this->idusuario = $idusuario;
    }
    public function set_nombre_usuario($nombre_usuario){
        $this->nombre_usuario =$nombre_usuario ;
    }

    public function set_clave($clave){
         $this->clave = $clave;
    }
 
}


// data access Object.

class UsuarioDao{
    private $db;

    public function buscar($usuario){
      return "buscando usuario $usuario->get_id_usuario()";
    }

    public function guardar($user){
        $username = $user->get_nombre_usuario();
        $password = $user->get_clave();
        $db = new Db();
       
        // dao guardar en base de datos 
            // conectarse a la base datos

                try{
                    $conn = $db->connect();
                }catch(PDOException  $e){
                    $state = False;
                }
                
            // tener la consulta SQL que guarda
                $sql = 'INSERT INTO natkandlo.usuarios (nombre_usuario,clave)
                VALUES (?,?);';
    
            // ejecutar la consulta y recibir el estado 
                $state = $conn->prepare($sql)->execute([$username , $password]);
            
            //retornar el estado.

            if (state){
                $user->set_idusuario($conn->lastInsertId());
                return $user;
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