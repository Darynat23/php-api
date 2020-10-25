<?php

// require __DIR__ . '../../config/database.php';
// data transport Object.
class Usuario
{
    public $idusuario;
    public $nombre_usuario;
    public $apellidos;
    public $nombres;
    public $correo;
    public $clave;
}

// data access Object.

class UsuarioDao
{
    private $db;

    private function row_to_user($row)
    {
        $user = new Usuario();
        $user->idusuario = $row['idusuario'];
        $user->nombre_usuario = $row['nombre_usuario'];
        $user->nombres = $row['nombres'];
        $user->apellidos = $row['apellidos'];
        $user->correo = $row['email'];
        $user->clave = $row['clave'];
        return $user;
    }
    public function login($user)
    {

        $db = new Db();
        $sql = "SELECT * FROM natkandlo.usuarios
        WHERE 
            nombre_usuario = '$user->nombre_usuario' AND
            clave = $user->clave
            ;";
        try {
            $conn = $db->connect();
            // ejecutar la consulta y recibir el estado 

            $row = $conn->query($sql)->fetch();

            if ($row['idusuario'] == NULL) {
                return NULL;
            }
            $user = $this->row_to_user($row);
            return $user;
        } catch (Exception  $e) {
            $state = False;
            return NULL;
        }
    }

    public function buscar($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM natkandlo.usuarios
        WHERE idusuario = $id;";
        try {
            $conn = $db->connect();
            // ejecutar la consulta y recibir el estado 


            $row = $conn->query($sql)->fetch();
            $user = $this->row_to_user($row);
            return $user;
        } catch (Exception  $e) {
            $state = False;
            return NULL;
        }
    }

    public function guardar($user)
    {
        $db = new Db();
        $sql = 'INSERT INTO natkandlo.usuarios (
            nombre_usuario,
            clave,
            nombres,
            apellidos,
            email
            )
        VALUES (?,?,?,?,?);';
        try {
            $conn = $db->connect();
            // ejecutar la consulta y recibir el estado 
            $state = $conn->prepare($sql)->execute([
                $user->nombre_usuario,
                $user->clave,
                $user->nombres,
                $user->apellidos,
                $user->correo
                    ]);
            $user->idusuario = $conn->lastInsertId();
            return $user;
        } catch (Exception  $e) {
            $state = False;
            return NULL;
        }
    }

    public function actualizar($user)
    {
        $db = new Db();
        $sql = 'UPDATE natkandlo.usuarios
        SET 
            nombre_usuario = ?,
            clave = ?
        WHERE idusuario = ?;';
        try {
            $conn = $db->connect();
            // ejecutar la consulta y recibir el estado 
            $state = $conn->prepare($sql)->execute(
                [
                    $user->nombre_usuario,
                    $user->clave,
                    $user->idusuario
                ]
            );
            $user->idusuario = $conn->lastInsertId();
            return $user;
        } catch (Exception  $e) {
            $state = False;
            return NULL;
        }
    }

    public function borrar()
    {
    }
}
