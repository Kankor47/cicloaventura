<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Detalle_alquiler
 *
 * @author wilme
 */
class Detalle_alquiler {

    private $id_deta_alqui;
    private $id_coche;
    private $nombre_coche;
    private $id_alqui;
    private $valor;
    private $tiempo_ini;
    private $tiempo_fin;
    
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
    
    function getNombre_coche() {
        return $this->nombre_coche;
    }

    function setNombre_coche($nombre_coche) {
        $this->nombre_coche = $nombre_coche;
    }
    
    function getId_alqui() {
        return $this->id_alqui;
    }

    function setId_alqui($id_alqui) {
        $this->id_alqui = $id_alqui;
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
