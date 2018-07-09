<?php

class AlquilerCompleto {
    private $id_alqui;
    private $id_cli;
    private $id_emp;
    private $id_coche;
    private $tiempo_ini;
    private $tiempo_fin;
    private $valor;

    function getId_alqui() {
        return $this->id_alqui;
    }

    function setId_alqui($id_alqui) {
        $this->id_alqui = $id_alqui;
    }

    function getId_cli() {
        return $this->id_cli;
    }

    function setId_cli($id_cli) {
        $this->id_cli = $id_cli;
    }

    function getId_emp() {
        return $this->id_emp;
    }

    function setId_emp($id_emp) {
        $this->id_emp = $id_emp;
    }
    
    function getId_coche() {
        return $this->id_coche;
    }

    function setId_coche($id_coche) {
        $this->id_coche = $id_coche;
    }

    function getTiempo_ini() {
        return $this->tiempo_ini;
    }

    function setTiempo_ini($tiempo_ini) {
        $this->tiempo_ini = $tiempo_ini;
    }
    
    function getTiempo_fin() {
        return $this->tiempo_fin;
    }

    function setTiempo_fin($tiempo_fin) {
        $this->tiempo_fin = $tiempo_fin;
    }
    
        function getValor() {
        return $this->valor;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }
}
