<?php

class EmpleadoDTO{
    
    private $id_persona;
    
    function __construct($id_persona) {
        $this->id_persona = $id_persona;
    }

    function getId_persona() {
        return $this->id_persona;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

}