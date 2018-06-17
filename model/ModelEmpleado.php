<?php

include_once 'Database.php';
include_once 'Empleado.php';

class ModelEmpleado {

    public function getEmpleados() {

        $pdo = Database::connect();
        $sql = "select * from tbl_empleado";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $empleado = new Empleado();
            $empleado->setId($dato['id_emp']);
            $empleado->setCedula($dato['ced_emp']);
            $empleado->setNombres($dato['nom_emp']);
            $empleado->setDireccion($dato['dic_emp']);
            $empleado->setTelefono($dato['tel_emp']);
            array_push($listado, $empleado);
        }
        Database::disconnect();
        return $listado;
    }

    public function getEmpleado($id) {

        $pdo = Database::connect();
        $sql = "select * from tbl_empleado where id_emp=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $empleado = new Empleado();
        $empleado->setId($dato['id_emp']);
        $empleado->setCedula($dato['ced_emp']);
        $empleado->setNombres($dato['nom_emp']);
        $empleado->setDireccion($dato['dic_emp']);
        $empleado->setTelefono($dato['tel_emp']);
        Database::disconnect();
        return $empleado;
    }
    
    public function buscarEmpleado($ced_emp)
    {
        $pdo = Database::connect();
        $sql = "select * from tbl_empleado where ced_emp='?'";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ced_emp));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $empleado = new Empleado();
        $empleado->setId($dato['id_emp']);
        $empleado->setCedula($dato['ced_emp']);
        $empleado->setNombres($dato['nom_emp']);
        $empleado->setDireccion($dato['dic_emp']);
        $empleado->setTelefono($dato['tel_emp']);
        Database::disconnect();
        return $empleado;
    }

    public function crearEmpleado($cedula, $nombres, $direccion, $telefono) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_empleado (ced_emp, nom_emp,dic_emp,tel_emp) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedula, $nombres, $direccion, $telefono));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarEmpleado($id) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_empleado where id_emp=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id));
        Database::disconnect();
    }
    
      public function actualizarUsuario($id,$cedula,$nombres,$direccion,$telefono) {
      
        $pdo = Database::connect();
        $sql = "update tbl_empleado set ced_emp=?, nom_emp=?, dic_emp=?, tel_emp=? where id_emp=?";
        $consulta = $pdo->prepare($sql);
        try {
        $consulta->execute(array($cedula,$nombres,$direccion,$telefono,$id));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
