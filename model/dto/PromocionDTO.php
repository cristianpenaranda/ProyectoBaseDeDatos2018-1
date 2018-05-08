<?php

class PromocionDTO {
    
    private $id_promocion;
    private $nombre;
    private $descripcion;
            
    function __construct($id_promocion, $nombre, $descripcion) {
        $this->id_promocion = $id_promocion;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    function getId_promocion() {
        return $this->id_promocion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_promocion($id_promocion) {
        $this->id_promocion = $id_promocion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


    
}
