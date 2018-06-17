<?php

class Mantenimiento {

    private $id;
    private $id_coche;
    private $id_tipo;
    private $dano;
    private $ingreso;
    private $estado;
    private $salida;

    function getId_tipo() {
        return $this->id_tipo;
    }

    function setId_tipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }

    function getId() {
        return $this->id;
    }

    function getId_coche() {
        return $this->id_coche;
    }

    function getDano() {
        return $this->dano;
    }

    function getIngreso() {
        return $this->ingreso;
    }

    function getEstado() {
        return $this->estado;
    }

    function getSalida() {
        return $this->salida;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_coche($id_coche) {
        $this->id_coche = $id_coche;
    }

    function setDano($dano) {
        $this->dano = $dano;
    }

    function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setSalida($salida) {
        $this->salida = $salida;
    }

}
