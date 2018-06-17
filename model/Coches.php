<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coches
 *
 * @author wilme
 */
class Coches {
    //put your code here
    private $id_coche;
    private $id_tipo;
    private $descripcion_coche;
    private $fecha_adquisicion;
    
    public function getId_coche()
    {
        return $this->id_coche;
    }
    
    public function setId_coche($id_coche)
    {
        $this->id_coche=$id_coche;
    }

    public function getId_tipo() {
        return $this->id_tipo;
    }

    public function setId_tipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }

    public function getDescripcion_coche() {
        return $this->descripcion_coche;
    }

    public function setDescripcion_coche($descripcion_coche) {
        $this->descripcion_coche=$descripcion_coche;
    }
    
    public function getFecha_adquisicion() {
        return $this->fecha_adquisicion;
    }

    public function setFecha_adquisicion($fecha_adquisicion) {
        $this->fecha_adquisicion=$fecha_adquisicion;
    }
}
