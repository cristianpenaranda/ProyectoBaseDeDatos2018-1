<?php

class SalidasDTO {
    private $id_venta;	
    private $valor;	
    private $iva;	
    private $total;	
    private $fecha_sal;
    
    function __construct($id_venta, $valor, $iva, $total, $fecha_sal) {
        $this->id_venta = $id_venta;
        $this->valor = $valor;
        $this->iva = $iva;
        $this->total = $total;
        $this->fecha_sal = $fecha_sal;
    }
    
    function getId_venta() {
        return $this->id_venta;
    }

    function getValor() {
        return $this->valor;
    }

    function getIva() {
        return $this->iva;
    }

    function getTotal() {
        return $this->total;
    }

    function getFecha_sal() {
        return $this->fecha_sal;
    }

    function setId_venta($id_venta) {
        $this->id_venta = $id_venta;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setIva($iva) {
        $this->iva = $iva;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setFecha_sal($fecha_sal) {
        $this->fecha_sal = $fecha_sal;
    }



}
