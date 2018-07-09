<?php

include_once 'Database.php';
include_once 'Detalle_alquiler.php';
include_once 'ModelCoches.php';
include_once 'Coches.php';

class ModelDetalle {

    public function getDeta_alquis() {
        $pdo = Database::connect();
        $sql = "select * from tbl_detalle_alqui";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $deta = new Detalle_alquiler();
            $deta->setId_deta_alqui($dato['id_deta_alqui']);
            $deta->setId_coche($dato['id_coche']);
            $deta->setId_alqui($dato['id_alqui']);
            $deta->setValor($dato['valor']);
            $deta->setTiempo_ini($dato['tiempo_ini']);
            $deta->setTiempo_fin($dato['tiempo_fin']);
            array_push($listado, $deta);
        }
        Database::disconnect();
        return $listado;
    }

    public function getDeta_alqui($id) {
        $pdo = Database::connect();
        $sql = "select * from tbl_detalle_alqui where id_deta_alqui=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $deta = new Detalle_alquiler();
        $deta->setId_deta_alqui($dato['id_deta_alqui']);
        $deta->setId_coche($dato['id_coche']);
        $deta->setId_alqui($dato['id_alqui']);
        $deta->setValor($dato['valor']);
        $deta->setTiempo_ini($dato['tiempo_ini']);
        $deta->setTiempo_fin($dato['tiempo_fin']);
        Database::disconnect();
        return $deta;
    }

    public function crearDeta_alqui($id_coche, $id_alqui, $valor,$tiempo_ini,$tiempo_fin) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_detalle_alqui (id_coche, id_alqui,valor,tiempo_ini,tiempo_fin) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($id_coche, $id_alqui, $valor,$tiempo_ini,$tiempo_fin));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarDeta_alqui($id) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_detalle_alqui where id_detea_alqui=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id));
        Database::disconnect();
    }

    public function actualizarDeta_alqui($id_deta_alqui,$id_coche, $id_alqui, $valor,$tiempo_ini,$tiempo_fin) {
        $pdo = Database::connect();
        $sql = "update tbl_detalle_alqui set id_coche=?,id_alqui=?,valor=?,tiempo_ini=?,tiempo_fin=? where id_deta_alqui=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($id_deta_alqui,$id_coche, $id_alqui, $valor,$tiempo_ini,$tiempo_fin));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    public function adicionarDetalle($listaAlqui_deta,$id_coche,$tiempo_ini,$tiempo_fin,$valor){
        //buscamos el producto:
        $coche = new ModelCoches();
        $coch=$coche->getCoche($id_coche);
        //creamos un nuevo detalle FacturaDet:
        
        $deta=new Detalle_alquiler();
        $deta->setId_coche($coch->getId_coche());
        $deta->setNombre_coche($coch->getDescripcion_coche());
        $deta->setTiempo_ini($tiempo_ini);
        $deta->setTiempo_fin($tiempo_fin);
        $deta->setValor($valor);
        //adicionamos el nuevo detalle al array en memoria:
        if(!isset($listaAlqui_deta)){
            $listaAlqui_deta=array();
        }
        array_push($listaAlqui_deta,$deta);
        return $listaAlqui_deta;
    }
}