<?php

class MensajeDAO{
    
    //INGRESA EL MENSAJE EN LA BD
    function envioMensajeDAO($mensajeDTO){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $persona = $mensajeDTO->getPersona();
            $remitente = $mensajeDTO->getRemitente();
            $correo = $mensajeDTO->getCorreo();
            $asunto = $mensajeDTO->getAsunto();
            $texto = $mensajeDTO->getTexto();            
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("INSERT INTO mensaje(id_persona,remitente,correo,asunto,texto) VALUES (?,?,?,?,?)");
            $stm->bindParam(1, $persona, PDO::PARAM_STR);
            $stm->bindParam(2, $remitente, PDO::PARAM_STR);
            $stm->bindParam(3, $correo, PDO::PARAM_STR);
            $stm->bindParam(4, $asunto, PDO::PARAM_STR);
            $stm->bindParam(5, $texto, PDO::PARAM_STR);
            $exito = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al ingresar el en bd-".$ex->getMessage());
        }
        return $exito;
    }
    
    //LISTAR MENSAJES DEL ADMINISTRADOR
    function listarMensajesAdminDAO(){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from mensaje");
            $stm->execute();
            $cadena ="";
            while($men = $stm->fetch()){
             $cadena.= '<tr><td style="text-align: center;">'.$men['id'].'</td>'
                        . '<td style="text-align: center;">'.$men['remitente'].'</td>'
                        . '<td style="text-align: center;">'.$men['asunto'].'</td>'
                        . '<td style="text-align: center;"><button type="button" class="ActionVerMensajeAdmin botones btn btn-outline-secondary ml-2" id="'.$men['id'].'" title="Ver Información" href="#VerInfoMensajeAdmin" data-toggle="modal"><span class="ion-eye"></span></button>'
                        . '</tr>';
            }

        } catch (Exception $ex) {
            throw new Exception("Error al listar mensajes");
        }
        return $cadena;
    }
    
    
    //MOSTRAR INFORMACION DEL MENSAJE
    function mostrarInfoMensajeDAO($id){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("SELECT * FROM mensaje WHERE id=?");
            $stm->bindParam(1, $id, PDO::PARAM_STR);
            $stm->execute();
            $men = $stm->fetch();
            $respuesta = $men['remitente'].'ª'.$men['correo'].'ª'.$men['asunto'].'ª'.$men['texto'];
        } catch (Exception $ex) {
            throw new Exception("Error al buscar promocion");
        }
        return $respuesta;
    }
    
    
}