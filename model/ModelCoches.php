<?php

include_once 'Database.php';
include_once 'Coches.php';


class ModelCoches {

 

    public function getCoches() {
     
        $pdo = Database::connect();
        $sql = "SELECT c.id_coche, t.tip_desc, c.descripcion_coche,c.fecha_adquisicion from tbl_coche c INNER JOIN tbl_tipo t ON c.id_tipo=t.id_tipo";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $coche = new Coches();
            $coche->setId_coche($res['id_coche']);
            $coche->setId_tipo($res['tip_desc']);
            $coche->setDescripcion_coche($res['descripcion_coche']);
            $coche->setFecha_adquisicion($res['fecha_adquisicion']);
            array_push($listado, $coche);
        }
        Database::disconnect();
        return $listado;
    }

    public function getCoche($id_coche) {
     
        $pdo = Database::connect();
        $sql = "select * from tbl_coche where id_coche=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_coche));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $coche = new Coches();
        $coche->setId_coche($dato['id_coche']);
        $coche->setId_tipo($dato['id_tipo']);
        $coche->setDescripcion_coche($dato['descripcion_coche']);
        $coche->setFecha_adquisicion($dato['fecha_adquisicion']);
        Database::disconnect();
        return $coche;
    }

    public function crearCoche($id_tipo, $descripcion_coche, $fecha_adquisicion) {
 
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Preparamos la sentencia con parametros:
        $sql = "insert into tbl_coche (id_tipo,descripcion_coche,fecha_adquisicion) values(?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        $consulta->execute(array($id_tipo, $descripcion_coche, $fecha_adquisicion));
        Database::disconnect();
    }

    public function eliminarCoche($id_coche) {
    
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_coche where id_coche=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_coche));
        Database::disconnect();
    }

    public function actualizarCoche($id_coche, $id_tipo, $descripcion_coche, $fecha_adquisicion) {
      
        $pdo = Database::connect();
        $sql = "update tbl_coche set id_tipo=?,descripcion_coche=?, fecha_adquisicion=? where id_coche=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_tipo, $descripcion_coche, $fecha_adquisicion,$id_coche));
        Database::disconnect();
    }

}
