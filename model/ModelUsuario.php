<?php

include_once 'Database.php';
include_once 'Usuario.php';

class ModelUsuario {

    public function getUsuarios() {

        $pdo = Database::connect();
        $sql="SELECT u.id_user, e.ced_emp, e.nom_emp, u.usuario,u.pass,u.tipo FROM tbl_usuario u INNER JOIN tbl_empleado e on u.id_emp=e.id_emp";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $usuario = new Usuario();
            $usuario->setId($dato['id_user']);
            $usuario->setCedula($dato['ced_emp']);
             $usuario->setNombre($dato['nom_emp']);
            $usuario->setUsuario($dato['usuario']);
            $usuario->setContrasena($dato['pass']);
            $usuario->setTipo($dato['tipo']);
            array_push($listado, $usuario);
        }
        Database::disconnect();
        return $listado;
    }

    public function getUsuario($id) {

        $pdo = Database::connect();
        $sql = "SELECT u.id_user, e.ced_emp, e.nom_emp, u.usuario,u.pass,u.tipo FROM tbl_usuario u INNER JOIN tbl_empleado e on u.id_emp=e.id_emp where id_user=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $usuario = new Usuario();
        $usuario->setId($dato['id_user']);
         $usuario->setCedula($dato['ced_emp']);
             $usuario->setNombre($dato['nom_emp']);
        $usuario->setUsuario($dato['usuario']);
        $usuario->setContrasena($dato['pass']);
        $usuario->setTipo($dato['tipo']);
        array_push($listado, $usuario);
        Database::disconnect();
        return $usuario;
    }

    public function crearUsuario($cedula, $usuario, $contrasena, $tipo) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_usuario (id_emp,usuario,pass,tipo) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedula, $usuario, $contrasena, $tipo));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarUsuario($id) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_usuario where id_user=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id));
        Database::disconnect();
    }

    public function actualizarUsuario($id,$usuario, $contrasena, $tipo) {

        $pdo = Database::connect();
        $sql = "update tbl_usuario set usuario=?,pass=?,tipo=? where id_user=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($usuario, $contrasena, $tipo, $id ));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
