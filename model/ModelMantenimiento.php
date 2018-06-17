<?php

include_once 'Database.php';
include_once 'Mantenimiento.php';

class ModelMantenimiento {

    public function getMantenimientos() {

        $pdo = Database::connect();
        $sql = "SELECT m.id_mant,c.descripcion_coche,t.tip_desc,m.descripcion_dano,m.fecha_ing,m.estado,m.fecha_salida 
            FROM tbl_mantenimiento m 
            INNER JOIN tbl_coche c on m.id_coche=c.id_coche 
            INNER JOIN tbl_tipo t on c.id_tipo=t.id_tipo order by m.id_mant";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Producto:
        $listado = array();
        foreach ($resultado as $res) {
            $mante = new Mantenimiento();
            $mante->setId($res['id_mant']);
            $mante->setId_coche($res['descripcion_coche']);
            $mante->setId_tipo($res['tip_desc']);
            $mante->setDano($res['descripcion_dano']);
            $mante->setIngreso($res['fecha_ing']);
            $mante->setEstado($res['estado']);
            $mante->setSalida($res['fecha_salida']);
            array_push($listado, $mante);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function getMantenimiento($id_mant) {

        $pdo = Database::connect();
        $sql = "SELECT m.id_mant,c.descripcion_coche,t.tip_desc,m.descripcion_dano,m.fecha_ing,m.estado,m.fecha_salida 
            FROM tbl_mantenimiento m 
            INNER JOIN tbl_coche c on m.id_coche=c.id_coche 
            INNER JOIN tbl_tipo t on c.id_tipo=t.id_tipo 
            WHERE id_mant=?";
        $consulta = $pdo->prepare($sql);

        $consulta->execute(array($id_mant));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $mante = new Mantenimiento();
        $mante->setId($dato['id_mant']);
        $mante->setId_coche($dato['descripcion_coche']);
        $mante->setId_tipo($dato['tip_desc']);
        $mante->setDano($dato['descripcion_dano']);
        $mante->setIngreso($dato['fecha_ing']);
        $mante->setEstado($dato['estado']);
        $mante->setSalida($dato['fecha_salida']);
        Database::disconnect();
        return $mante;
    }
    
     public function crearMantenimiento($id_coche, $descripcion_dano, $fecha_ing, $estado, $fecha_salida) {
       
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_mantenimiento (id_coche,descripcion_dano,fecha_ing,estado,fecha_salida) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        $consulta->execute(array( $id_coche, $descripcion_dano, $fecha_ing, $estado, $fecha_salida));
        Database::disconnect();
    }

    public function eliminarMantenimiento($id_mant) {
   
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_mantenimiento where id_mant=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_mant));
        Database::disconnect();
    }

    public function actualizarMantenimiento($id_mant, $id_coche, $descripcion_dano, $fecha_ing, $estado, $fecha_salida) {

        $pdo = Database::connect();
        $sql = "update tbl_mantenimiento set id_coche=?,descripcion_dano=?,fecha_ing=?,estado=?,fecha_salida=? where id_mant=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_coche, $descripcion_dano, $fecha_ing, $estado, $fecha_salida, $id_mant));
        Database::disconnect();
    }


}
