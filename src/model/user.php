<?php

// require __DIR__ . '../../config/database.php';
// data transport Object.
class Usuario {
    public $idusuario;
    public $nombre_usuario;
    public $apellido;
    public $correo;
    public $clave;
 
}

// data access Object.

class UsuarioDao{
    private $db;
    public function login($user){
        
        $db = new Db();
        $sql = "SELECT * FROM natkandlo.usuarios
        WHERE 
            nombre_usuario = '$user->nombre_usuario' AND
            clave = $user->clave
            ;";
        try{
            $conn = $db->connect();
            // ejecutar la consulta y recibir el estado 
            
            $row = $conn->query($sql)->fetch();

            if($row['idusuario']==NULL){
                return NULL;
            }
            $user = new Usuario();
            $user->idusuario=$row['idusuario'];
            $user->nombre_usuario=$row['nombre_usuario'];
            $user->apellido =$row['apellido'] ;
            $user->correo= $row['correo'];
            $user->clave=$row['clave'];
            return $user;
        }catch(Exception  $e){
            $state = False;
            return NULL;
        }
    }

    public function buscar($id){
        $db = new Db();
        $sql = "SELECT * FROM natkandlo.usuarios
        WHERE idusuario = $id;";
        try{
            $conn = $db->connect();
            // ejecutar la consulta y recibir el estado 
            

            $row = $conn->query($sql)->fetch();
            $user = new Usuario();
            $user->idusuario=$row['idusuario'];
            $user->nombre_usuario=$row['nombre_usuario'];
            $user->apellido =$row['apellido'] ;
            $user->correo= $row['correo'];
            $user->clave=$row['clave'];
            return $user;
        }catch(Exception  $e){
            $state = False;
            return NULL;
        }
    }

    public function guardar($user){
        $username = $user->nombre_usuario;
        $password = $user->clave;
        $lastname = $user->apellido;
        $email = $user->correo;
        $db = new Db();
       
        // dao guardar en base de datos 
            // conectarse a la base datos

             // tener la consulta SQL que guarda
        $sql = 'INSERT INTO natkandlo.usuarios (nombre_usuario,clave,apellidos,email)
        VALUES (?,?,?,?);';
        try{
            $conn = $db->connect();
            // ejecutar la consulta y recibir el estado 
            $state = $conn->prepare($sql)->execute([$username,$password,$lastname,$email]);
            $user->idusuario=$conn->lastInsertId();
            return $user;
        }catch(Exception  $e){
            $state = False;
            return NULL;
        }
                
            //retornar el estado.
          
        // cliente       -  usuario->flutter 
        //------------------------------------
        // recepcion     -  controller     - UserController  - userController.php
        // moto caja     -  dto  - datos   -  Usuario        - usuario.php
        // domiciliario  -  dao            - this -          - usuario.php
    }

    public function actualizar($user){
        $db = new Db();
        $sql = 'UPDATE natkandlo.usuarios
        SET 
            nombre_usuario = ?,
            clave = ?
        WHERE idusuario = ?;';
        try{
            $conn = $db->connect();
            // ejecutar la consulta y recibir el estado 
            $state = $conn->prepare($sql)->execute(
                [
                    $user->nombre_usuario,
                    $user->clave,
                    $user->idusuario
                ]);
            $user->idusuario=$conn->lastInsertId();
            return $user;
        }catch(Exception  $e){
            $state = False;
            return NULL;
        }
    }

    public function borrar(){
        
    }

}