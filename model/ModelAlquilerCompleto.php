<?php

include_once 'Database.php';
include_once 'AlquilerCompleto.php';

class ModelAlquilerCompleto {
    public function getCompletos() {

        $pdo = Database::connect();
        $sql = "select * from tbl_detalle_alqui; select * from tbl_alquiler";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $deta = new AlquilerCompleto();
            $deta->getId_alqui($dato['id_alqui']);
            $deta->getId_cli($dato['id_cli']);
            $deta->getId_emp($dato['id_emp']);
            $deta->setId_deta_alqui($dato['id_deta_alqui']);
            $deta->setId_coche($dato['id_coche']);
            $deta->setId_alqui($dato['id_alqui']);
            $deta->setValor($dato['valor']);
            $deta->setTiempo_ini($dato['tiempo_ini']);
            $deta->setTiempo_fin($dato['tiempo_fin']);
            $deta->getValor_total($dato['valor_total']);
            array_push($listado, $deta);
        }
        Database::disconnect();
        return $listado;
    }

    public function getCompleto($id) {

        $pdo = Database::connect();
        $sql = "select * from tbl_detalle_alqui where id_deta_alqui=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $deta = new AlquilerCompleto();
            $deta->getId_alqui($dato['id_alqui']);
            $deta->getId_cli($dato['id_cli']);
            $deta->getId_emp($dato['id_emp']);
            $deta->setId_deta_alqui($dato['id_deta_alqui']);
            $deta->setId_coche($dato['id_coche']);
            $deta->setId_alqui($dato['id_alqui']);
            $deta->setValor($dato['valor']);
            $deta->setTiempo_ini($dato['tiempo_ini']);
            $deta->setTiempo_fin($dato['tiempo_fin']);
            $deta->getValor_total($dato['valor_total']);
        Database::disconnect();
        return $deta;
    }

    public function crearCompleto($id_cli,$id_emp,$id_coche, $id_alqui, $valor,$tiempo_ini,$tiempo_fin,$valor_total) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_alquiler(id_cli,id_emp,valor_total) values(?,?,'?'); insert into tbl_detalle_alqui (id_coche, id_alqui,valor,tiempo_ini,tiempo_fin) values(?,?,'?',?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($id_cli,$id_emp,$id_coche, $id_alqui, $valor,$tiempo_ini,$tiempo_fin,$valor_total));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarCompleto($id) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_detalle_alqui where id_detea_alqui=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id));
        Database::disconnect();
    }

    public function actualizarCompleto($id_deta_alqui,$id_coche, $id_alqui, $valor,$tiempo_ini,$tiempo_fin) {


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
}
