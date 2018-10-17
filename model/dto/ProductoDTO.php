<?php

class ProductoDTO {
    
    private $id_producto;
    private $stock;
    private $valor_fabricacion;
    private $valor_venta;
    private $id_tipo_producto;
    private $nombre_producto;
    private $descripcion;
    private $imagen;
    
    function __construct($id_producto, $stock, $valor_fabricacion, $valor_venta, $id_tipo_producto, $nombre_producto, $descripcion, $imagen) {
        $this->id_producto = $id_producto;
        $this->stock = $stock;
        $this->valor_fabricacion = $valor_fabricacion;
        $this->valor_venta = $valor_venta;
        $this->id_tipo_producto = $id_tipo_producto;
        $this->nombre_producto = $nombre_producto;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
    }
    
    
    function getId_producto() {
        return $this->id_producto;
    }

    function getStock() {
        return $this->stock;
    }

    function getValor_fabricacion() {
        return $this->valor_fabricacion;
    }

    function getValor_venta() {
        return $this->valor_venta;
    }

    function getId_tipo_producto() {
        return $this->id_tipo_producto;
    }

    function getNombre_producto() {
        return $this->nombre_producto;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setValor_fabricacion($valor_fabricacion) {
        $this->valor_fabricacion = $valor_fabricacion;
    }

    function setValor_venta($valor_venta) {
        $this->valor_venta = $valor_venta;
    }

    function setId_tipo_producto($id_tipo_producto) {
        $this->id_tipo_producto = $id_tipo_producto;
    }

    function setNombre_producto($nombre_producto) {
        $this->nombre_producto = $nombre_producto;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }



            
}
