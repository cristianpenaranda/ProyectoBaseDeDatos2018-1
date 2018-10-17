<?php

//IMPORTAR DTO's
include_once '../../model/dto/PersonaDTO.php';
include_once '../../model/dto/AdministradorDTO.php';
include_once '../../model/dto/ClienteDTO.php';
include_once '../../model/dto/EmpleadoDTO.php';
include_once '../../model/dto/ProductoDTO.php';
include_once '../../model/dto/PromocionDTO.php';
include_once '../../model/dto/SalidasDTO.php';
include_once '../../model/dto/MensajeDTO.php';

//IMPORTAR DAO's
require_once '../../model/dao/PersonaDAO.php';
require_once '../../model/dao/AdministradorDAO.php';
require_once '../../model/dao/EmpleadoDAO.php';
require_once '../../model/dao/ClienteDAO.php';
require_once '../../model/dao/ProductoDAO.php';
require_once '../../model/dao/PromocionDAO.php';
require_once '../../model/dao/SalidasDAO.php';
require_once '../../model/dao/MensajeDAO.php';

require_once '../../controller/controlador.php';
require_once '../../model/negocio.php';
require_once '../../model/mail/Mail.php';
require_once '../../model/conexion.php';

class Ajax {
    
    ///////////METODOS GENERALES///////////////
    //
    //
    //LOGUEO
    public function LoguearUsuarioAjax($usuario, $contraseña, $tipoUsuario) {
        $exito = false;
        $busqueda = false;
        try {
            $controlador = new controlador();
            switch ($tipoUsuario) {
                case "Administrador": $admin = new AdministradorDTO($usuario);
                    $busquedaAdmin = $controlador->buscarAdminControlador($admin);
                    if ($busquedaAdmin) {
                        $busqueda = true;
                    }
                    break;
                case "Cliente": $cliente = new ClienteDTO($usuario);
                    $busquedaCliente = $controlador->buscarClienteControlador($cliente);
                    if ($busquedaCliente) {
                        $busqueda = true;
                    }
                    break;
                case "Empleado": $empleado = new EmpleadoDTO($usuario);
                    $busquedaEmpleado = $controlador->buscarEmpleadoControlador($empleado);
                    if ($busquedaEmpleado) {
                        $busqueda = true;
                    }
                    break;
            }

            if ($busqueda) {

                $verficarLogin = $controlador->verificarLoginControlador($usuario, $contraseña);
                if ($verficarLogin) {
                    $nombreLogueado = $controlador->buscarPersonaControlador($usuario);
                    session_start();
                    $user = new PersonaDTO($nombreLogueado['id_persona'], $nombreLogueado['nombre'], $nombreLogueado['apellido'], $nombreLogueado['telefono'], $nombreLogueado['domicilio'], null, $nombreLogueado['correo']);
                    $_SESSION["Usuario"] = serialize($user);
                    $_SESSION["Tipo"] = serialize($tipoUsuario);
                    $exito = true;
                }
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "Revise su Usuario y contraseña"));
        }
    }

    //RECUPERAR CONTRASEÑA
    public function RecuperarContraseña($usuario) {
        try {
            $controlador = new controlador();
            $mail = new Mail();
            $consulta = $controlador->buscarPersonaControlador($usuario);
            if (isset($consulta)) {
                $recuperar = $controlador->recuperarContraseñaControlador($usuario);

                $mail->enviarCorreoRecordarContraseña($recuperar['nombre'], $recuperar['apellido'], $recuperar['correo'], $recuperar['contraseña']);
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($mail) {
            echo "exito";
        } else {
            echo "No se pudo recuperar la contraseña";
        }
    }

    //ENVIO DE MENSAJE AL ADMINISTRADOR PESTAÑA CONTACTO
    public function envioMensajeAjax($nombre, $correo, $asunto, $mensaje) {
        $exito = false;
        try {
            $controlador = new controlador();
            $administrador = $controlador->buscarCedulaAdminControlador();
            $mensajeDTO = new MensajeDTO($administrador["id_persona"], $nombre, $correo, $asunto, $mensaje);
            $ingresoEnvio = $controlador->envioMensajeControlador($mensajeDTO);
            if($ingresoEnvio){
                $exito = true;
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo enviar el mensaje"));
        }
    }
    
    //CAMBIAR CONTRASEÑA
    public function cambiarContraseñaAjax($usuario, $anterior, $nueva) {
        $exito = false;
        try {
            $controlador = new controlador();
            $verificar = $controlador->verificarLoginControlador($usuario, $anterior);
            if ($verificar) {
                $actualizar = $controlador->cambiarContraseñaControlador($usuario, $nueva);
                $exito = true;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        if ($exito) {
            echo 'exito';
        } else {
            echo 'no';
        }
    }

    ///////////METODOS CLIENTES///////////////
    //
    //
    //REGISTRO DE CLIENTE
    public function RegistroClienteAjax($usuario, $nombre, $apellido, $telefono, $domicilio, $contraseña, $correo) {
        $exito = false;
        try {
            $controlador = new controlador();
            $cliente = new ClienteDTO($usuario);
            $consulta = $controlador->buscarClienteControlador($cliente);
            if (!$consulta) {
                //registra en tabla persona
                $persona = new PersonaDTO($usuario, $nombre, $apellido, $telefono, $domicilio, $contraseña, $correo);
                $registroPersona = $controlador->registroPersonaControlador($persona);
                //registra en tabla cliente
                $registroCliente = $controlador->registroClienteControlador($cliente);
                $exito = true;
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo registrar el cliente"));
        }
    }

    //LISTAR LOS CLIENTES
    public function ListarClientesAjax() {
        $controlador = new Controlador();
        echo $controlador->ListarClientesControlador();
    }
    
    //MOSTRAR INFORMACIÓN DEL CLIENTE EN MODAL
    public function mostrarInfoClienteAjax($usuario) {
        $exito = false;
        $respuesta = "";
        try {
            $controlador = new controlador();
            $consulta = $controlador->buscarPersonaControlador($usuario);
            if (isset($consulta)) {
                $exito = true;
                $respuesta = $consulta['id_persona'].'ª'.$consulta['nombre'].'ª'.$consulta['apellido'].'ª'.
                             $consulta['telefono'].'ª'.$consulta['domicilio'].'ª'.$consulta['correo'].'ª';
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("respuesta" => $respuesta));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo mostrar la informacion"));
        }
    }

    
    
    ///////////METODOS EMPLEADOS///////////////
    //
    //
    //REGISTRO DE EMPLEADO
    public function RegistroEmpleadoAjax($usuario, $nombre, $apellido, $telefono, $domicilio, $contraseña, $correo) {
        $exito = false;
        try {
            $controlador = new controlador();
            $empleado = new EmpleadoDTO($usuario);
            $consulta = $controlador->buscarEmpleadoControlador($empleado);
            if (!$consulta) {
                //registra en tabla persona
                $persona = new PersonaDTO($usuario, $nombre, $apellido, $telefono, $domicilio, $contraseña, $correo);
                $registroPersona = $controlador->registroPersonaControlador($persona);
                //registra en tabla empleado
                $registroEmpleado = $controlador->registroEmpleadoControlador($empleado);
                $exito = true;
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo registrar el empleado"));
        }
    }

    //LISTAR LOS MENSAJES DEL ADMINISTRADOR
    public function listarMensajesAdminAjax(){
        $controlador = new Controlador();
        echo $controlador->listarMensajesAdminControlador();
    }

    //LISTAR LOS EMPLEADOS
    public function ListarEmpleadosAjax() {
        $controlador = new Controlador();
        echo $controlador->ListarEmpleadosControlador();
    }
    
    //MOSTRAR INFORMACIÓN DEL EMPLEADO EN MODAL
    public function mostrarInfoEmpleadoAjax($usuario) {
        $exito = false;
        $respuesta = "";
        try {
            $controlador = new controlador();
            $consulta = $controlador->buscarPersonaControlador($usuario);
            if (isset($consulta)) {
                $exito = true;
                $respuesta = $consulta['id_persona'].'ª'.$consulta['nombre'].'ª'.$consulta['apellido'].'ª'.
                             $consulta['telefono'].'ª'.$consulta['domicilio'].'ª'.$consulta['correo'].'ª';
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("respuesta" => $respuesta));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo mostrar la informacion"));
        }
    }
    
    //ELIMINAR EMPLEADO
    public function eliminarEmpleadoAjax($usuario) {
        $exito = false;
        try {
            $controlador = new controlador();
            $consulta = $controlador->eliminarEmpleadoControlador($usuario);
            if ($consulta) {
                $consulta2 = $controlador->eliminarPersonaControlador($usuario);
                if ($consulta2) {
                    $exito = true;
                }
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo eliminar empleado"));
        }
    }

    
    ///////////METODOS PRODUCTOS///////////////
    //
    //
    //REGISTRAR PRODUCTO
    public function RegistroProductoAjax($tipo, $nombre, $descripcion, $cantidad, $valor, $precio, $imagen) {
        $exito = false;
        try {
            $controlador = new controlador();
            $ruta = "C:/xampp/htdocs/Proyecto_Bd/view/presentacion/img/";
            $archivo = "C:/Users/CRISTIAN/Desktop/".$imagen;
            $archivoNew = $ruta.$imagen; 
            copy($archivo,$archivoNew);
            $producto = new ProductoDTO(null, $cantidad, $valor, $precio, $tipo, $nombre, $descripcion, $archivoNew);
            //REGISTRA EL PRODUCTO
            $consulta = $controlador->registrarProductoControlador($producto);
            if ($consulta) {
                $exito = true;
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo registrar el producto"));
        }
    }
    
    //MOSTRAR INFORMACIÓN DEL MENSAJE EN MODAL
    public function mostrarInfoMensajeAjax($id) {
        $exito = false;
        $respuesta = "";
        try {
            $controlador = new controlador();
            $consulta = $controlador->mostrarInfoMensajeControlador($id);
            if (!empty($consulta)) {
                $exito = true;
                $respuesta = $consulta;
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("respuesta" => $respuesta));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo mostrar la informacion"));
        }
    }

    //LISTAR LOS PRODUCTOS EN TABLA
    public function ListarProductosAjax() {
        $controlador = new Controlador();
        echo $controlador->ListarProductosControlador();
    }

    //LISTAR LOS PRODUCTOS DE PANADERIA EN EL INICIO 
    public function ListarProductosPanaderiaAjax() {
        $controlador = new Controlador();
        echo $controlador->ListarProductosPanaderiaControlador();
    }

    //LISTAR LOS PRODUCTOS DE REPOSTERIA EN EL INICIO
    public function ListarProductosReposteriaAjax() {
        $controlador = new Controlador();
        echo $controlador->ListarProductosReposteriaControlador();
    }

    //LISTAR LOS PRODUCTOS DE PANADERIA EN LA COMPRA DEL CLIENTE 
    public function ListarProductosCompraPanaderiaAjax() {
        $controlador = new Controlador();
        echo $controlador->ListarProductosCompraPanaderiaControlador();
    }

    //LISTAR LOS PRODUCTOS DE REPOSTERIA EN LA COMPRA DEL CLIENTE 
    public function ListarProductosCompraReposteriaAjax() {
        $controlador = new Controlador();
        echo $controlador->ListarProductosCompraReposteriaControlador();
    }
    
    //MOSTRAR INFORMACIÓN DE PRODUCTO EN MODAL
    public function mostrarInfoProductoAjax($id) {
        $exito = false;
        $respuesta = "";
        try {
            $controlador = new controlador();
            $consulta = $controlador->mostrarInfoProductoControlador($id);
            if (!empty($consulta)) {
                $exito = true;
                $respuesta = $consulta;
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("respuesta" => $respuesta));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo mostrar la informacion"));
        }
    }

    //ELIMINAR PRODUCTO
    public function eliminarProductoAjax($producto) {
        $exito = false;
        try {
            $controlador = new controlador();
            $buscar = $controlador->mostrarInfoProductoControlador($producto);
            if(!empty($buscar)){
                $eliminar = explode("ª", $buscar);
                unlink($eliminar[5]);
                $consulta = $controlador->eliminarProductoControlador($producto);
                if ($consulta) {
                    $exito = true;
                }
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo eliminar producto"));
        }
    }
       
    
    
    ///////////METODOS PROMOCIONES///////////////
    //
    //
    //REGISTRAR PROMOCION
    public function RegistroPromocionAjax($titulo, $descripcion) {
        $exito = false;
        try {
            $controlador = new controlador();
            $promocion = new PromocionDTO(null, $titulo, $descripcion);
            $consulta = $controlador->registrarPromocionControlador($promocion);
            if ($consulta) {
                $exito = true;
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo registrar el empleado"));
        }
    }

    //LISTAR LAS PROMOCIONES
    public function ListarPromocionesAjax() {
        $controlador = new Controlador();
        echo $controlador->ListarPromocionesControlador();
    }
    
    
    //LISTAR LAS PROMOCIONES
    public function MostrarPromocionesAjax() {
        $controlador = new Controlador();
        echo $controlador->MostrarPromocionesControlador();
    }
    
    //MOSTRAR INFORMACIÓN DE PROMOCION EN MODAL
    public function mostrarInfoPromocionAjax($titulo) {
        $exito = false;
        $respuesta = "";
        try {
            $controlador = new controlador();
            $consulta = $controlador->mostrarInfoPromocionControlador($titulo);
            if (!empty($consulta)) {
                $exito = true;
                $respuesta = $consulta;
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("respuesta" => $respuesta));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo mostrar la informacion"));
        }
    }
    
    //ELIMINAR PROMOCION
    public function eliminarPromocionAjax($titulo) {
        $exito = false;
        try {
            $controlador = new controlador();
            $consulta = $controlador->eliminarPromocionControlador($titulo);
            if ($consulta) {
                $exito = true;
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo eliminar"));
        }
    }
    
    
    ///////////METODOS COMPRAS///////////////
    //
    //
    //BUSCAR CLIENTE
    public function buscarClienteEmpleadoAjax($id) {
        $exito = false;
        try {
            $controlador = new controlador();
            $cliente = new ClienteDTO($id);
            $consulta = $controlador->buscarClienteEmpleadoControlador($cliente);
            if ($consulta) {
                $exito = true;
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo encontrar el cliente"));
        }
    }

    //REGISTRAR VENTA EN LA TIENDA HECHA POR EL EMPLEADO
    public function registroVentaEmpleadoAjax($cliente,$valor,$empleado,$fecha) {
        $exito = false;
        try {
            $controlador = new controlador();
            $iva = ($valor/100)*19;
            $total = $valor+$iva;
            $salida = new SalidasDTO(null, $valor, $iva, $total, $fecha);
            $registroSalida = $controlador->registroVentaEmpleadoControlador($salida);
            if ($registroSalida) {
                $buscarUltimaSalida = $controlador->buscarUtlimaSalidaControlador();
                $idUltimo = $buscarUltimaSalida["id_venta"];
                $ventaEmpleado = $controlador->ventaEmpleadoControlador($empleado, $idUltimo);
                $ventaCliente = $controlador->ventaClienteControlador($idUltimo, $cliente, "Entregado");
                $exito = true;
            }
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo registrar la compra"));
        }
    }

}

//   Se crea una instancia de la clase Ajax, para poder acceder a los metodos que contiene
$ajax = new Ajax();


//   Si esta variable es diferente de Null se debe ingresar el usuario
$loguear = isset($_POST["ingresarUsuario"], $_POST["ingresarContraseña"], $_POST["ingresarTipo"]);
$envioMensaje = isset($_POST["envioPersona"], $_POST["envioCorreo"], $_POST["envioAsunto"], $_POST["envioMensaje"]);
$recuperarContraseña = isset($_POST["recuperarUsuario"]);
$cambiarContraseña = isset($_POST["UsuarioCambiarContraseña"],$_POST["AnteriorCambiarContraseña"], $_POST["NuevaCambiarContraseña"]);
$registroCliente = isset($_POST["registroCedulaCliente"], $_POST["registroNombreCliente"], $_POST["registroApellidoCliente"], $_POST["registroTelefonoCliente"], $_POST["registroDomicilioCliente"], $_POST["registroContraseñaCliente"], $_POST["registroCorreoCliente"]);
$registroEmpleado = isset($_POST["registroCedulaEmpleado"], $_POST["registroNombreEmpleado"], $_POST["registroApellidoEmpleado"], $_POST["registroTelefonoEmpleado"], $_POST["registroDomicilioEmpleado"], $_POST["registroContraseñaEmpleado"], $_POST["registroCorreoEmpleado"]);
$registroProducto = isset($_POST["registrarTipoProducto"], $_POST["registrarNombreProducto"], $_POST["registrarDescripcionProducto"], $_POST["registrarCantidadProducto"], $_POST["registrarValorFabricacionProducto"], $_POST["registrarPrecioProducto"], $_POST["registrarImagenProducto"]);
$registroPromocion = isset($_POST["registroTituloPromocion"], $_POST["registroDescripcionPromocion"]);
$listarProductosPanaderia = isset($_GET["listarProductosPanaderia"]);
$listarProductosReposteria = isset($_GET["listarProductosReposteria"]);
$listarProductosCompraPanaderia = isset($_GET["listarProductosCompraPanaderia"]);
$listarProductosCompraReposteria = isset($_GET["listarProductosCompraReposteria"]);
$listarEmpleados = isset($_GET["listarEmpleados"]);
$listarPromociones = isset($_GET["listarPromociones"]);
$listarClientes = isset($_GET["listarClientes"]);
$listarProductos = isset($_GET["listarProductos"]);  
$listarMensajesAdmin = isset($_GET["listarMensajesAdmin"]);  
$MostrarPromociones = isset($_GET["MostrarPromociones"]);
$mostrarInfoPromocion = isset($_POST["idPromocion"]);
$mostrarInfoEmpleado = isset($_POST["idEmpleado"]);   
$mostrarInfoCliente = isset($_POST["idCliente"]);   
$mostrarInfoProducto= isset($_POST["idProducto"]);    
$mostrarInfoMensajeAdmin= isset($_POST["idMensaje"]);    
$eliminarPromocion = isset($_POST["idPromocionEliminar"]); 
$eliminarEmpleado = isset($_POST["idEmpleadoEliminar"]);  
$eliminarProducto = isset($_POST["idProductoEliminar"]);  
$buscarClienteEmpleado = isset($_POST["CedulaVentaEmpleado"]);  
$registroVentaEmpleado = isset($_POST["RegistroVentaEmpleado"],$_POST["RegistroVentaValor"],$_POST["cedulaEmpleadoVenta"],$_POST["fechaVenta"]);  


if ($loguear) {
    $ajax->LoguearUsuarioAjax($_POST["ingresarUsuario"], $_POST["ingresarContraseña"], $_POST["ingresarTipo"]);
} else if ($envioMensaje) {
    $ajax->envioMensajeAjax($_POST["envioPersona"], $_POST["envioCorreo"], $_POST["envioAsunto"], $_POST["envioMensaje"]);
} else if ($registroCliente) {
    $ajax->RegistroClienteAjax($_POST["registroCedulaCliente"], $_POST["registroNombreCliente"], $_POST["registroApellidoCliente"], $_POST["registroTelefonoCliente"], $_POST["registroDomicilioCliente"], $_POST["registroContraseñaCliente"], $_POST["registroCorreoCliente"]);
} else if ($recuperarContraseña) {
    $ajax->RecuperarContraseña($_POST["recuperarUsuario"]);
} else if ($registroEmpleado) {
    $ajax->RegistroEmpleadoAjax($_POST["registroCedulaEmpleado"], $_POST["registroNombreEmpleado"], $_POST["registroApellidoEmpleado"], $_POST["registroTelefonoEmpleado"], $_POST["registroDomicilioEmpleado"], $_POST["registroContraseñaEmpleado"], $_POST["registroCorreoEmpleado"]);
} else if ($listarEmpleados && $_GET["listarEmpleados"]) {
    $ajax->ListarEmpleadosAjax();
} else if ($registroProducto) {
    $ajax->RegistroProductoAjax($_POST["registrarTipoProducto"], $_POST["registrarNombreProducto"], $_POST["registrarDescripcionProducto"], $_POST["registrarCantidadProducto"], $_POST["registrarValorFabricacionProducto"], $_POST["registrarPrecioProducto"], $_POST["registrarImagenProducto"]);
} else if ($registroPromocion) {
    $ajax->RegistroPromocionAjax($_POST["registroTituloPromocion"], $_POST["registroDescripcionPromocion"]);
} else if ($listarProductosPanaderia && $_GET["listarProductosPanaderia"]) {
    $ajax->listarProductosPanaderiaAjax();
} else if ($listarProductosReposteria && $_GET["listarProductosReposteria"]) {
    $ajax->listarProductosReposteriaAjax();
}  else if ($listarProductosCompraPanaderia && $_GET["listarProductosCompraPanaderia"]) {
    $ajax->listarProductosCompraPanaderiaAjax();
} else if ($listarProductosCompraReposteria && $_GET["listarProductosCompraReposteria"]) {
    $ajax->listarProductosCompraReposteriaAjax();
} else if ($listarPromociones && $_GET["listarPromociones"]) {
    $ajax->ListarPromocionesAjax();
}  else if ($listarMensajesAdmin && $_GET["listarMensajesAdmin"]) {
    $ajax->listarMensajesAdminAjax();
} else if ($MostrarPromociones && $_GET["MostrarPromociones"]) {
    $ajax->MostrarPromocionesAjax();
} else if ($listarClientes && $_GET["listarClientes"]) {
    $ajax->ListarClientesAjax();
} else if ($cambiarContraseña) {
    $ajax->cambiarContraseñaAjax($_POST["UsuarioCambiarContraseña"], $_POST["AnteriorCambiarContraseña"], $_POST["NuevaCambiarContraseña"]);
} else if ($mostrarInfoPromocion) {
    $ajax->mostrarInfoPromocionAjax($_POST["idPromocion"]);
} else if ($mostrarInfoEmpleado) {
    $ajax->mostrarInfoEmpleadoAjax($_POST["idEmpleado"]);
} else if ($mostrarInfoCliente) {
    $ajax->mostrarInfoClienteAjax($_POST["idCliente"]);
} else if ($mostrarInfoMensajeAdmin) {
    $ajax->mostrarInfoMensajeAjax($_POST["idMensaje"]);
} else if ($eliminarPromocion) {
    $ajax->eliminarPromocionAjax($_POST["idPromocionEliminar"]);
} else if ($eliminarEmpleado) {
    $ajax->eliminarEmpleadoAjax($_POST["idEmpleadoEliminar"]);
} else if ($listarProductos && $_GET["listarProductos"]) {
    $ajax->ListarProductosAjax();
} else if ($mostrarInfoProducto) {
    $ajax->mostrarInfoProductoAjax($_POST["idProducto"]);
} else if ($eliminarProducto) {
    $ajax->eliminarProductoAjax($_POST["idProductoEliminar"]);
} else if ($buscarClienteEmpleado) {
    $ajax->buscarClienteEmpleadoAjax($_POST["CedulaVentaEmpleado"]);
}else if ($registroVentaEmpleado) {
    $ajax->registroVentaEmpleadoAjax($_POST["RegistroVentaEmpleado"],$_POST["RegistroVentaValor"],$_POST["cedulaEmpleadoVenta"],$_POST["fechaVenta"]);
} 

?>