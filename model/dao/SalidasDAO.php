<?php

class SalidasDAO{
    //REGISTRO DE SALIDA HECHA POR EL EMPLEADO 
    function registroVentaEmpleadoDAO($salida){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $valor = $salida->getValor();
            $iva = $salida->getIva();
            $total = $salida->getTotal();
            $fecha = $salida->getFecha_sal();
            
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("INSERT INTO salidas(valor,iva,total,fecha_sal) VALUES (?,?,?,?)");
            $stm->bindParam(1, $valor, PDO::PARAM_STR);
            $stm->bindParam(2, $iva, PDO::PARAM_STR);
            $stm->bindParam(3, $total, PDO::PARAM_STR);
            $stm->bindParam(4, $fecha, PDO::PARAM_STR);
            $exito = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al registrar la salida en bd");
        }
        return $exito;
    }


    //BUSCA LA SALIDA MAS ACTUAL OSEA LA ULTIMA VENTA HECHA VENTA 
    function buscarUtlimaSalidaDAO(){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("SELECT * FROM salidas ORDER BY id_venta DESC LIMIT 1");
            $stm->execute();
            $exito = $stm->fetch();
        } catch (Exception $ex) {
            throw new Exception("Error al buscar la ultima salida en bd");
        }
        return $exito;
    }
    
    //REGISTRO DE SALIDA EN TABLA EMPLEADO_SALIDA
    function ventaEmpleadoDAO($empleado, $idUltimo){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("INSERT INTO empleado_salida(id_empleado, id_venta) VALUES (?,?)");
            $stm->bindParam(1, $empleado, PDO::PARAM_STR);
            $stm->bindParam(2, $idUltimo, PDO::PARAM_STR);
            $exito = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al registrar la salida en tabla empleado_salida");
        }
        return $exito;
    }
    
    //REGISTRO DE SALIDA EN TABLA CLIENTE_SALIDA
    function ventaClienteDAO($idUltimo, $cliente, $estado){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("INSERT INTO cliente_salida(id_venta, id_persona, estado) VALUES (?,?,?)");
            $stm->bindParam(1, $idUltimo, PDO::PARAM_STR);
            $stm->bindParam(2, $cliente, PDO::PARAM_STR);
            $stm->bindParam(3, $estado, PDO::PARAM_STR);
            $exito = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al registrar la salida en tabla cliente_salida");
        }
        return $exito;
    }
}