<?php

include_once 'Database.php';
include_once 'Tipo.php';


class ModelTipo {
   
    public function getTipos(){
   
        $pdo = Database::connect();
        $sql = "select * from tbl_tipo order by id_tipo";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res){
            $tipo = new Tipo();
            $tipo->setId_tipo($res['id_tipo']);
            $tipo->setTip_desc($res['tip_desc']);
            array_push($listado, $tipo);
        }
        Database::disconnect();

        return $listado;
    }

    public function getTipo($id_tipo){
     
        $pdo = Database::connect();
        $sql = "select * from tbl_tipo where id_tipo=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_tipo));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $tipo=new Tipo();
        $tipo->setId_tipo($dato['id_tipo']);
        $tipo->setTip_desc($dato['tip_desc']);
        Database::disconnect();
        return $tipo;
    }

    public function crearTipo($tip_desc){
    
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="insert into tbl_tipo (tip_desc) values(?)";
        $consulta=$pdo->prepare($sql);
        $consulta->execute(array($tip_desc));
        Database::disconnect();
    }

    public function eliminarTipo($id_tipo){
      
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="delete from tbl_tipo where id_tipo=?";
        $consulta=$pdo->prepare($sql);
        $consulta->execute(array($id_tipo));
        Database::disconnect();
    }

    public function actualizarTipo($id_tipo,$tip_desc){
 
        $pdo=Database::connect();
        $sql="update tbl_tipo set tip_desc=? where id_tipo=?";
        $consulta=$pdo->prepare($sql);
        $consulta->execute(array($tip_desc, $id_tipo));
        Database::disconnect();
    }

}
