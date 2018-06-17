<?php


class Tipo {

    private $id_tipo;
    private $tip_desc;
    
    public function getId_tipo() {
        return $this->id_tipo;
    }

    public function setId_tipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }

    public function getTip_desc() {
        return $this->tip_desc;
    }

    public function setTip_desc($tip_desc) {
        $this->tip_desc=$tip_desc;
    }
}
