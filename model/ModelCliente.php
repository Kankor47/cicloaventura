<?php

include_once 'Database.php';
include_once 'Cliente.php';

class ModelCliente {

    public function getClientes() {

        $pdo = Database::connect();
        $sql = "select * from tbl_cliente";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $cliente = new Cliente();
            $cliente->setId($dato['id_cli']);
            $cliente->setCedula($dato['ced_cli']);
            $cliente->setNombres($dato['nom_cli']);
            $cliente->setDireccion($dato['dic_cli']);
            $cliente->setTelefono($dato['tel_cli']);
            $cliente->setCorreo($dato['email_cli']);
            array_push($listado, $cliente);
        }
        Database::disconnect();
        return $listado;
    }
    
    public function getCliente_ced($cedula) {

        $pdo = Database::connect();
        $sql = "select * from tbl_cliente where ced_cli=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedula));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $cliente = new Cliente();
        $cliente->setCedula($dato['ced_cli']);
        $cliente->setNombres($dato['nom_cli']);
        $cliente->setDireccion($dato['dic_cli']);
        $cliente->setTelefono($dato['tel_cli']);
        $cliente->setCorreo($dato['email_cli']);
        Database::disconnect();
        return $cliente;
    }

    public function getCliente($id) {

        $pdo = Database::connect();
        $sql = "select * from tbl_cliente where id_cli=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $cliente = new Cliente();
        $cliente->setId($dato['id_cli']);
        $cliente->setCedula($dato['ced_cli']);
        $cliente->setNombres($dato['nom_cli']);
        $cliente->setDireccion($dato['dic_cli']);
        $cliente->setTelefono($dato['tel_cli']);
        $cliente->setCorreo($dato['email_cli']);
        Database::disconnect();
        return $cliente;
    }

    public function crearCliente($cedula, $nombres, $direccion, $telefono, $correo) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_cliente (ced_cli, nom_cli,dic_cli,tel_cli,email_cli) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedula, $nombres, $direccion, $telefono,$correo));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarCliente($id) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_cliente where id_cli=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id));
        Database::disconnect();
    }

    public function actualizarCliente($id,$cedula, $nombres, $direccion, $telefono,$correo) {

        
        $pdo = Database::connect();
        $sql = "update tbl_cliente set ced_cli=?,nom_cli=?,tel_cli=?,dic_cli=?,email_cli=? where id_cli=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedula,$nombres, $telefono, $direccion,$correo,$id));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
