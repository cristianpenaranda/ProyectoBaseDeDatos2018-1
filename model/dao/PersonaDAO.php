<?php

class PersonaDAO{

    //VERIFICA USUARIO Y CONTRASEÑA
    function LoginDAO($usuario, $contraseña){
        $conexion = Conexion::crearConexion();
        $persona = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("SELECT nombre FROM persona WHERE id_persona=? AND contraseña=?");
            $stm->bindParam(1, $usuario, PDO::PARAM_STR);
            $stm->bindParam(2, $contraseña, PDO::PARAM_STR);
            $stm->execute();
            $row = $stm->rowCount();
            if ($row>0) {
                $persona = true;
            }
        } catch (Exception $ex) {
            throw new Exception("Error al verificar usuario y contraseña");
        }
        return $persona;
    }

    //BUSCA DATOS DE PERSONA
    function buscarPersonaDAO($usuario){
        $conexion = Conexion::crearConexion();
        $persona = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("SELECT nombre,apellido,id_persona,telefono,correo,domicilio FROM persona WHERE id_persona=?");
            $stm->bindParam(1, $usuario, PDO::PARAM_STR);
            $stm->execute();
            $persona = $stm->fetch();
        } catch (Exception $ex) {
            throw new Exception("Error al buscar la persona en bd");
        }
        return $persona;
    }

    
    //REGISTRA PERSONA 
    function registroPersonaDAO($persona){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $cedula = $persona->getId_persona();
            $nombre = $persona->getNombre();
            $apellido = $persona->getApellido();
            $telefono = $persona->getTelefono();
            $domicilio = $persona->getDomicilio();
            $contraseña = $persona->getContraseña();
            $correo = $persona->getCorreo();
            
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("INSERT INTO persona(id_persona, nombre, apellido, telefono, domicilio, contraseña, correo) VALUES (?,?,?,?,?,?,?)");
            $stm->bindParam(1, $cedula, PDO::PARAM_STR);
            $stm->bindParam(2, $nombre, PDO::PARAM_STR);
            $stm->bindParam(3, $apellido, PDO::PARAM_STR);
            $stm->bindParam(4, $telefono, PDO::PARAM_STR);
            $stm->bindParam(5, $domicilio, PDO::PARAM_STR);
            $stm->bindParam(6, $contraseña, PDO::PARAM_STR);
            $stm->bindParam(7, $correo, PDO::PARAM_STR);
            $exito = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al registrar el cliente en bd");
        }
        return $exito;
    }
    
    //RECUPERAR CONTRASEÑA
    function recuperarContraseñaDAO($usuario){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select nombre,apellido,correo,contraseña from persona where id_persona=?");
            $stm->bindParam(1, $usuario, PDO::PARAM_STR);
            $stm->execute();
            $persona = $stm->fetch();
        } catch (Exception $ex) {
            throw new Exception("Error al recuperar contraseña");
        }
        return $persona;
    }
    
    //CAMBIAR CONTRASEÑA
    function cambiarContraseñaDAO($usuario, $contraseña){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("UPDATE persona SET contraseña=? WHERE id_persona=?");
            $stm->bindParam(1, $contraseña, PDO::PARAM_STR);
            $stm->bindParam(2, $usuario, PDO::PARAM_STR);
            $stm->execute();
            $exito = true;
        } catch (Exception $ex) {
            throw new Exception("Error al cambiar contraseña");
        }
        return $exito;
    }
    
    
    //ELIMINAR PERSONA 
    function eliminarPersonaDAO($usuario){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {           
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("DELETE FROM persona WHERE id_persona=?");
            $stm->bindParam(1, $usuario, PDO::PARAM_STR);
            $exito = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al eliminar la persona");
        }
        return $exito;
    }
    
    
}

