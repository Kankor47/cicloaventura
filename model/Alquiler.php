<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alquiler
 *
 * @author wilme
 */
class Alquiler {

    //put your code here
    private $id_alqui;
    private $id_cli;
    private $id_emp;
    private $valor_total;

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

}
