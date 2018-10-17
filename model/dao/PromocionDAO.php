<?php

class PromocionDAO{
    
    //REGISTRA PROMOCION 
    function RegistroPromocionDAO($promocion){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $nombre = $promocion->getNombre();
            $descripcion = $promocion->getDescripcion();
            
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("INSERT INTO promociones(nombre, descripcion) VALUES (?,?)");
            $stm->bindParam(1, $nombre, PDO::PARAM_STR);
            $stm->bindParam(2, $descripcion, PDO::PARAM_STR);
            $exito = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al registrar la promocion en bd");
        }
        return $exito;
    }
    
    
    //LISTAR PROMOCIONES
    function ListarPromocionesDAO(){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from promociones");
            $stm->execute();
            $cadena ="";
            while($promo = $stm->fetch()){
             $cadena.= '<tr><td style="text-align: center;">'.$promo['nombre'].'</td>'
                        . '<td style="text-align: center;"><button type="button" class="ActionVer botones btn btn-outline-secondary ml-2" id="'.$promo['nombre'].'" title="Ver Información" href="#VerInfoPromocion" data-toggle="modal"><span class="ion-eye"></span></button>'
                        . '<button type="button" class="ActionEliminar botones btn btn-outline-danger ml-2" title="Eliminar Empleado" id="'.$promo['nombre'].'"><span class="ion-close-round"></span></button></td>'
                        . '</tr>';
            }

        } catch (Exception $ex) {
            throw new Exception("Error al listar promociones");
        }
        return $cadena;
    }
    
    //MOSTRAR PROMOCIONES
    function MostrarPromocionesDAO(){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("select * from promociones");
            $stm->execute();
            $cadena ="";
            while($promo = $stm->fetch()){
             $cadena.= '<li class="list-group-item">
                            <div class="card_Promociones">
                                <h2>'.$promo['nombre'].'</h2>
                                    <hr>
                                <h5>'.$promo['descripcion'].'</h5>
                            </div>
                        </li>';
            }

        } catch (Exception $ex) {
            throw new Exception("Error al listar promociones");
        }
        return $cadena;
    }
    
    
    //BUSCAR PROMOCION POR NOMBRE
    function mostrarInfoPromocionDAO($titulo){
        $conexion = Conexion::crearConexion();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("SELECT nombre,descripcion FROM promociones WHERE nombre=?");
            $stm->bindParam(1, $titulo, PDO::PARAM_STR);
            $stm->execute();
            $promo = $stm->fetch();
            $respuesta = $promo['nombre'].'ª'.$promo['descripcion'];
        } catch (Exception $ex) {
            throw new Exception("Error al buscar promocion");
        }
        return $respuesta;
    }
    
    //ELIMINAR PROMOCION 
    function eliminarPromocionDAO($titulo){
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {           
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $conexion->prepare("DELETE FROM promociones WHERE nombre=?");
            $stm->bindParam(1, $titulo, PDO::PARAM_STR);
            $exito = $stm->execute();
        } catch (Exception $ex) {
            throw new Exception("Error al eliminar la promocion");
        }
        return $exito;
    }
    
    
    
}