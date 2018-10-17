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
            $stm = $conexion->prepare("INSERT INTO productos(stock, valor_fabricacion, valor_venta, id_tipo_producto, nombre_producto, descripcion, imagen) VALUES (?,?,?,?,?,?,?)");
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

    //LISTAR PRODUCTOS
    function ListarProductosDAO(){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from productos");
            $stm->execute();
            $cadena ="";
            while($pro = $stm->fetch()){
             $cadena.= '<tr><td style="text-align: center;">'.$pro['id_producto'].'</td>'
                        . '<td style="text-align: center;">'.$pro['nombre_producto'].'</td>'
                        . '<td style="text-align: center;"><button id="'.$pro['id_producto'].'" type="button" class="ActionVerProducto botones btn btn-outline-secondary ml-2" title="Ver Información" href="#VerInfoProducto" data-toggle="modal"><span class="ion-eye"></span></button>'
                        . '<button type="button" id="'.$pro['id_producto'].'" class="ActionEliminarProducto botones btn btn-outline-danger ml-2" title="Eliminar Producto"><span class="ion-close-round"></span></button></td>'
                        . '</tr>';
            }

        } catch (Exception $ex) {
            throw new Exception("Error al listar empleados");
        }
        return $cadena;
    }

    //LISTAR PRODUCTOS DE PANADERIA
    function ListarProductosPanaderiaDAO(){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from productos WHERE id_tipo_producto='1'");
            $stm->execute();
            $cadena ="";
            while($pro = $stm->fetch()){
             $cortar = explode("htdocs/", $pro["imagen"]);
             $imagen = "/".$cortar[1];
             $cadena.= '<div class="col-md-3 productos">
                            <p id="nombrePro"><b>'.$pro["nombre_producto"].'</b></p>'
                            .'<p><b>Descripción: </b>'.$pro["descripcion"].'<br>'
                            .'<b>Precio: </b>$'.$pro["valor_venta"].'</p>
                            <img src="'.$imagen.'" title="'.$pro["nombre_producto"].'">
                        </div>';
            }

        } catch (Exception $ex) {
            throw new Exception("Error al listar empleados");
        }
        return $cadena;
    }
    
    //LISTAR PRODUCTOS DE PANADERIA PARA COMPRA DEL CLIENTE
    function ListarProductosCompraPanaderiaDAO(){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from productos WHERE id_tipo_producto='1'");
            $stm->execute();
            $cadena="";
            while($pro = $stm->fetch()){
             $cadena.= '<li class="productosCompra" id="'.$pro["nombre_producto"].'" style="cursor: pointer;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none; ">
                            <p id="nombrePro"><b>'.$pro["nombre_producto"].': $'.$pro["valor_venta"].'</p>         
                        </li>';
            }

        } catch (Exception $ex) {
            throw new Exception("Error al listar empleados");
        }
        return $cadena;
    }
    
    

    //LISTAR PRODUCTOS DE REPOSTERIA
    function ListarProductosReposteriaDAO(){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from productos WHERE id_tipo_producto='2'");
            $stm->execute();
            $cadena ="";
            while($pro = $stm->fetch()){
             $cortar = explode("htdocs/", $pro["imagen"]);
             $imagen = "/".$cortar[1];
             $cadena.= '<div class="col-md-3 productos">
                            <p id="nombrePro"><b>'.$pro["nombre_producto"].'</b></p>'
                            .'<p><b>Descripción: </b>'.$pro["descripcion"].'<br>'
                            .'<b>Precio: </b>$'.$pro["valor_venta"].'</p>
                            <img src="'.$imagen.'" title="'.$pro["nombre_producto"].'">
                        </div>';
            }

        } catch (Exception $ex) {
            throw new Exception("Error al listar empleados");
        }
        return $cadena;
    }
    
    //LISTAR PRODUCTOS DE REPOSTERIA PARA LA COMPRA DEL CLIENTE
    function ListarProductosCompraReposteriaDAO(){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from productos WHERE id_tipo_producto='2'");
            $stm->execute();
            $cadena ="";
            while($pro = $stm->fetch()){
             $cadena.= '<li class="productosCompra" id="'.$pro["nombre_producto"].'" style="cursor: pointer;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none; ">
                            <p id="nombrePro"><b>'.$pro["nombre_producto"].': $'.$pro["valor_venta"].'</p>         
                        </li>';
            }

        } catch (Exception $ex) {
            throw new Exception("Error al listar empleados");
        }
        return $cadena;
    }


    //BUSCAR PRODUCTO POR ID
    function mostrarInfoProductoDAO($id){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("SELECT * FROM productos WHERE id_producto=?");
            $stm->bindParam(1, $id, PDO::PARAM_STR);
            $stm->execute();
            $pro = $stm->fetch();
            $respuesta = $pro['nombre_producto'].'ª'.$pro['descripcion'].'ª'.$pro['stock'].'ª'.$pro['valor_fabricacion'].'ª'.$pro['valor_venta'].'ª'.$pro['imagen'];
        } catch (Exception $ex) {
            throw new Exception("Error al buscar producto");
        }
        return $respuesta;
    }
    
    //ELIMINAR PRODUCTO 
    function eliminarProductoDAO($producto){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {           
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("DELETE FROM productos WHERE id_producto=?");
            $stm->bindParam(1, $producto, PDO::PARAM_STR);
            $exito = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al eliminar el producto");
        }
        return $exito;
    }    
    
}