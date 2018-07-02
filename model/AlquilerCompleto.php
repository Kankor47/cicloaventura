<?php

class AlquilerCompleto {
    private $id_alqui;
    private $id_cli;
    private $id_emp;
    private $valor_total;
    private $id_deta_alqui;
    private $id_coche;
    private $valor;
    private $tiempo_ini;
    private $tiempo_fin;

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

    function getValor_total() {
        return $this->valor_total;
    }

    function setValor_total($valor_total) {
        $this->valor_total = $valor_total;
    }
    
    function getId_deta_alqui() {
        return $this->id_deta_alqui;
    }

    function setId_deta_alqui($id_deta_alqui) {
        $this->id_deta_alqui = $id_deta_alqui;
    }
    
    function getId_coche() {
        return $this->id_coche;
    }

    function setId_coche($id_coche) {
        $this->id_coche = $id_coche;
    }
    
    function getValor() {
        return $this->valor;
    }

    function setValor($valor) {
        $this->valor = $valor;
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
}
