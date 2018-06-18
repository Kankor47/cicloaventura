<?php

require_once 'Database.php';
require_once 'Alquiler.php';

class ModelAlquiler {

    public function getAlquilers() {

        $pdo = Database::connect();
        $sql = "select * from tbl_alquiler";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $alquiler = new Alquiler();
            $alquiler->setId_alqui($dato['id_alqui']);
            $alquiler->setId_cli($dato['id_cli']);
            $alquiler->setId_emp($dato['id_emp']);
            $alquiler->setValor_total($dato['valor_total']);
            array_push($listado, $alquiler);
        }
        Database::disconnect();
        return $listado;
    }

    public function getAlquiler($id) {

        $pdo = Database::connect();
        $sql = "select * from tbl_alquiler where id_alqui=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $alquiler = new Alquiler();
        $alquiler->setId_alqui($dato['id_alqui']);
        $alquiler->setId_cli($dato['id_cli']);
        $alquiler->setId_emp($dato['id_emp']);
        $alquiler->setValor_total($dato['valor_total']);
        Database::disconnect();
        return $alquiler;
    }

    public function crearAlquiler($id_cli, $id_emp, $valor_total) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_alquiler (id_cli, id_emp,valor_total) values(?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($id_cli, $id_emp, $valor_total));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarAlquiler($id) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_alquiler where id_alqui=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id));
        Database::disconnect();
    }

    public function actualizarAlquiler($id_alqui, $id_cli, $id_emp, $valor_total) {


        $pdo = Database::connect();
        $sql = "update tbl_alquiler set id_cli=?,id_emp=?,valor_total=? where id_alqui=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($id_alqui, $id_cli, $id_emp, $valor_total));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
