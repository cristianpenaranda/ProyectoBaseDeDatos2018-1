<?php

class ProductoDAO{
    
    //REGISTRA PRODUCTO 
    function RegistroProductoDAO($producto){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $cantidad = $producto->getStock();
            $valor = $producto->getValor_fabricacion();
            $precio = $producto->getValor_venta();
            $tipo = $producto->getId_tipo_producto();
            $nombre = $producto->getNombre_producto();
            $descripcion = $producto->getDescripcion();
            $imagen = $producto->getImagen();
            
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("INSERT INTO producto(stock, valor_fabricacion, valor_venta, id_tipo_producto, nombre_producto, descripcion, imagen) VALUES (?,?,?,?,?,?,?)");
            $stm->bindParam(1, $cantidad, PDO::PARAM_STR);
            $stm->bindParam(2, $valor, PDO::PARAM_STR);
            $stm->bindParam(3, $precio, PDO::PARAM_STR);
            $stm->bindParam(4, $tipo, PDO::PARAM_STR);
            $stm->bindParam(5, $nombre, PDO::PARAM_STR);
            $stm->bindParam(6, $descripcion, PDO::PARAM_STR);
            $stm->bindParam(7, $imagen, PDO::PARAM_STR);
            $exito = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al registrar el producto en bd");
        }
        return $exito;
    }
    
}