<?php

class Inventario {

    private $id;
    private $tipo;
    private $descripcion;
    private $adquisicion;
    private $dano;
    private $ingreso;
    private $salida;
    private $estado;
    
    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getAdquisicion() {
        return $this->adquisicion;
    }

    function getDano() {
        return $this->dano;
    }

    function getIngreso() {
        return $this->ingreso;
    }

    function getSalida() {
        return $this->salida;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setAdquisicion($adquisicion) {
        $this->adquisicion = $adquisicion;
    }

    function setDano($dano) {
        $this->dano = $dano;
    }

    function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }

    function setSalida($salida) {
        $this->salida = $salida;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
