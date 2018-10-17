<?php

class ClienteDAO{
      
    //BUSCAR AL CLIENTE EN LA BD
    function buscarClienteDAO($cliente){
        $conexion = Conexion::crearConexion();
        $usuario = $cliente->getId_persona();
        $exito = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from cliente where id_persona=?");
            $stm->bindParam(1, $usuario, PDO::PARAM_STR);
            $stm->execute();
            $resultado = $stm->rowCount();
            if($resultado>0){
               $exito = true; 
            }
        } catch (Exception $ex) {
            throw new Exception("Error al buscar el cliente en bd");
        }
        return $exito;
    }
    
    
    //REGISTRA CLIENTE 
    function registroClienteDAO($cliente){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $cedula = $cliente->getId_persona();            
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("INSERT INTO cliente(id_persona) VALUES (?)");
            $stm->bindParam(1, $cedula, PDO::PARAM_STR);
            $exito = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al registrar el cliente en bd");
        }
        return $exito;
    }
    
    
    //LISTAR CLIENTES
    function ListarClientesDAO(){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from cliente");
            $stm->execute();
            $cadena ="";
            while($personas = $stm->fetch()){
             $cadena.= '<tr><td style="text-align: center;">'.$personas['id_persona'].'</td>'
                        . '<td style="text-align: center;"><button id="'.$personas['id_persona'].'" type="button" class="ActionVerCliente botones btn btn-outline-secondary ml-2" title="Ver Información" href="#VerInfoCliente" data-toggle="modal"><span class="ion-eye"></span></button>'
                        . '</tr>';
            }

        } catch (Exception $ex) {
            throw new Exception("Error al listar empleados");
        }
        return $cadena;
    }
    
    
}