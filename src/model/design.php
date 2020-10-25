<?php

// require __DIR__ . '../../config/database.php';
// data transport Object.
/*
{
    "id_design":"",
    "nombre_prenda":"pantalon",
    "descripcion":"largo y azul",
    "costo":10000,
    "tiempo_creacion":"35:50",  
    "estado":"pendiente",
    "fecha_creacion":"12/10/20",
    }
*/
class Design {
    public $id_design;
    public $nombre_prenda;
    public $descripcion;
    public $costo;
    public $tiempo_creacion;
    public $estado;
    public $fecha_creacion;
    public $id_user;
    public $talla;
    public $tipo_prenda;
    public $tipo_tela;
    public $color;
}


// data access Object.

class DesignDao{
    private $db;

    private function row_to_design($row){
        $design = new Design();
        $design->id_design          =$row['id_design'];
        $design->nombre_prenda      =$row['nombre_prenda'];
        $design->descripcion        =$row['descripcion'];
        $design->costo              =$row['costo'];
        $design->tiempo_creacion    =$row['tiempo_creacion'];
        $design->estado             =$row['estado'];
        $design->fecha_creacion     =$row['fecha_creacion'];
        $design->id_user            =$row['id_user'];
        $design->talla              =$row['talla'];
        $design->tipo_prenda        =$row['tipo_prenda'];
        $design->tipo_tela          =$row['tipo_tela'];
        $design->color              =$row['color'];
        return $design;
    }

    public function buscar($id){
        $db = new Db();
        $sql = "SELECT * FROM natkandlo.disenio
        WHERE id_usuario = $id;";
        try{
            $conn = $db->connect();
            // ejecutar la consulta y recibir el estado 
            $row = $conn->query($sql)->fetchAll();
            $designs = [];
            foreach ($row as $design_array) {
                $design = $this->row_to_design($design_array);
                array_push($designs, $design);
            }
            return $designs;
        }catch(Exception  $e){
            $state = False;
            return NULL;
        }
    }

    public function buscar_iddisenio($id){
        $db = new Db();
        $sql = "SELECT * FROM natkandlo.disenio
        WHERE iddisenio = $id;";
        try{
            $conn = $db->connect();
            $row = $conn->query($sql)->fetch();
            $design = $this->row_to_design($row);
            return $design;
        }catch(Exception  $e){
            $state = False;
            return NULL;
        }
    }


    public function guardar($design){
        $db = new Db();
        // tener la consulta SQL que guarda

        
        
        $sql = 'INSERT INTO natkandlo.disenio (
            nombre,
            descripcion,
            costos,
            tiempo_creacion,
            estado,
            fecha_creacion,
            talla,
            color,
            tipo_prenda,
            tipo_tela,
            id_usuario
            )
        VALUES (?,?,?,?,?,?,?,?,?,?,?);';
        try{
            // conectarse a la base datos
            $conn = $db->connect();
            // dao guardar en base de datos 
        
            $state = $conn->prepare($sql)->execute([
                $design->nombre_prenda,
                $design->descripcion,
                $design->costo,
                $design->tiempo_creacion,
                $design->estado,
                $design->fecha_creacion,
                $design->$talla,
                $design->$color,
                $design->$tipo_prenda,
                $design->$tipo_tela,
                $design->id_user
            ]);
            $design->id_design = $conn->lastInsertId();
            return $design;
        }catch(PDOException  $e){
            $state = False;
            return NULL;
        }
    }

    public function actualizar(){
        
    }

    public function borrar(){
        
    }

}