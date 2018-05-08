<?php

class EmpleadoDAO{
     
    //BUSCAR AL EMPLEADO EN LA BD
    function buscarEmpleadoDAO($empleado){
        $conexion = Conexion::crearConexion();
        $usuario = $empleado->getId_persona();
        $exito = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from empleado where id_persona=?");
            $stm->bindParam(1, $usuario, PDO::PARAM_STR);
            $stm->execute();
            $resultado = $stm->rowCount();
            if($resultado>0){
               $exito = true; 
            }
        } catch (Exception $ex) {
            throw new Exception("Error al buscar el empleado en bd");
        }
        return $exito;
    }
    
    
    //REGISTRA EMPLEADO 
    function registroEmpleadoDAO($empleado){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $cedula = $empleado->getId_persona();            
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("INSERT INTO empleado(id_persona) VALUES (?)");
            $stm->bindParam(1, $cedula, PDO::PARAM_STR);
            $exito = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al registrar el empleado en bd");
        }
        return $exito;
    }
    
    
    //LISTAR EMPLEADOS
    function ListarEmpleadosDAO(){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from empleado");
            $stm->execute();
            $cadena ="";
            while($personas = $stm->fetch()){
             $cadena.= '<tr><td style="text-align: center;">'.$personas['id_persona'].'</td>'
                        . '<td style="text-align: center;"><button type="button" class="botones btn btn-outline-secondary ml-2" title="Ver Información"><span class="ion-eye"></span></button>'
                        . '<button type="button" class="botones btn btn-outline-danger ml-2" title="Eliminar Empleado"><span class="ion-close-round"></span></button></td>'
                        . '</tr>';
            }

        } catch (Exception $ex) {
            throw new Exception("Error al listar empleados");
        }
        return $cadena;
    }
    
    
}