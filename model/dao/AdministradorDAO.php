<?php

class AdministradorDAO{
    
    //BUSCAR AL ADMINISTRADOR EN LA BD
    function buscarAdminDAO($admin){
        $conexion = Conexion::crearConexion();
        $usuario = $admin->getId_persona();
        $exito = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from administrador where id_persona=?");
            $stm->bindParam(1, $usuario, PDO::PARAM_STR);
            $stm->execute();
            $resultado = $stm->rowCount();
            if($resultado>0){
               $exito = true; 
            }
        } catch (Exception $ex) {
            throw new Exception("Error al buscar el administrador en bd");
        }
        return $exito;
    }

    //BUSCAR LA CEDULA DEL ADMINISTRADOR EN LA BD
    function buscarCedulaAdminDAO(){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select id_persona from administrador");
            $stm->execute();
            $exito = $stm->fetch();            
        } catch (Exception $ex) {
            throw new Exception("Error al buscar la cedula del administrador en bd");
        }
        return $exito;
    }
    
}