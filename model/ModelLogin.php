<?php

include_once 'Database.php';
include_once  'Usuario.php';

class ModelLogin {
    
     public function verificacionUsuario($usuario, $contrasena) {

        $pdo = Database::connect();
        $sql = "select * from tbl_usuario  where usuario=? and pass=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($usuario,$contrasena));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $usuario = new Usuario();
        $usuario->setId($dato['id_user']);
        $usuario->setCedula($dato['id_emp']);
        $usuario->setUsuario($dato['usuario']);
        $usuario->setContrasena($dato['pass']);
        $usuario->setTipo($dato['tipo']);
        Database::disconnect();
     
    return $usuario;
    }
    
    
    
    
    
    
}
