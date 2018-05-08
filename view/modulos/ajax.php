<?php

//IMPORTAR DTO's
include_once '../../model/dto/PersonaDTO.php';
include_once '../../model/dto/AdministradorDTO.php';
include_once '../../model/dto/ClienteDTO.php';
include_once '../../model/dto/EmpleadoDTO.php';
include_once '../../model/dto/ProductoDTO.php';
include_once '../../model/dto/PromocionDTO.php';

//IMPORTAR DAO's
require_once '../../model/dao/PersonaDAO.php';
require_once '../../model/dao/AdministradorDAO.php';
require_once '../../model/dao/EmpleadoDAO.php';
require_once '../../model/dao/ClienteDAO.php';
require_once '../../model/dao/ProductoDAO.php';
require_once '../../model/dao/PromocionDAO.php';

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
                case "administrador": $admin = new AdministradorDTO($usuario);
                    $busquedaAdmin = $controlador->buscarAdminControlador($admin);
                    if ($busquedaAdmin) {
                        $busqueda = true;
                    }
                    break;
                case "cliente": $cliente = new ClienteDTO($usuario);
                    $busquedaCliente = $controlador->buscarClienteControlador($cliente);
                    if ($busquedaCliente) {
                        $busqueda = true;
                    }
                    break;
                case "empleado": $empleado = new EmpleadoDTO($usuario);
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

    //LISTAR LOS EMPLEADOS
    public function ListarEmpleadosAjax() {
        $controlador = new Controlador();
        echo $controlador->ListarEmpleadosControlador();
    }

    
    ///////////METODOS PRODUCTOS///////////////
    //
    //
    //REGISTRAR PRODUCTO
    public function RegistroProductoAjax($tipo, $nombre, $descripcion, $cantidad, $valor, $precio, $imagen) {
        $exito = false;
        try {
            $controlador = new controlador();
            /*$foto = $_FILES["registrarImagenProducto"]["name"];
            $ruta = $_FILES["registrarImagenProducto"]["tmp_name"];
            echo ("nombreeeeeeeeeeeeeeeee-" . $foto);
            $destino = "view/presentacion/img/" . foto;
            echo ($foto);
            copy($ruta, $destino);
            $producto = new ProductoDTO(null, $cantidad, $valor, $precio, $tipo, $nombre, $descripcion, $imagen);
            //REGISTRA EL PRODUCTO
            $consulta = $controlador->registrarProductoControlador($producto);
            if ($consulta) {
                $exito = true;
            }*/
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo registrar el empleado"));
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

}

//   Se crea una instancia de la clase Ajax, para poder acceder a los metodos que contiene
$ajax = new Ajax();


//   Si esta variable es diferente de Null se debe ingresar el usuario
$loguear = isset($_POST["ingresarUsuario"], $_POST["ingresarContraseña"], $_POST["ingresarTipo"]);
$registroCliente = isset($_POST["registroCedulaCliente"], $_POST["registroNombreCliente"], $_POST["registroApellidoCliente"], $_POST["registroTelefonoCliente"], $_POST["registroDomicilioCliente"], $_POST["registroContraseñaCliente"], $_POST["registroCorreoCliente"]);
$recuperarContraseña = isset($_POST["recuperarUsuario"]);
$registroEmpleado = isset($_POST["registroCedulaEmpleado"], $_POST["registroNombreEmpleado"], $_POST["registroApellidoEmpleado"], $_POST["registroTelefonoEmpleado"], $_POST["registroDomicilioEmpleado"], $_POST["registroContraseñaEmpleado"], $_POST["registroCorreoEmpleado"]);
$listarEmpleados = isset($_GET["listarEmpleados"]);
$registroProducto = isset($_POST["registrarTipoProducto"], $_POST["registrarNombreProducto"], $_POST["registrarDescripcionProducto"], $_POST["registrarCantidadProducto"], $_POST["registrarValorFabricacionProducto"], $_POST["registrarPrecioProducto"], $_POST["registrarImagenProducto"]);
$registroPromocion = isset($_POST["registroTituloPromocion"], $_POST["registroDescripcionPromocion"]);
$listarPromociones = isset($_GET["listarPromociones"]);
$MostrarPromociones = isset($_GET["MostrarPromociones"]);
$listarClientes = isset($_GET["listarClientes"]);
$cambiarContraseña = isset($_POST["UsuarioCambiarContraseña"],$_POST["AnteriorCambiarContraseña"], $_POST["NuevaCambiarContraseña"]);

if ($loguear) {
    $ajax->LoguearUsuarioAjax($_POST["ingresarUsuario"], $_POST["ingresarContraseña"], $_POST["ingresarTipo"]);
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
} else if ($listarPromociones && $_GET["listarPromociones"]) {
    $ajax->ListarPromocionesAjax();
} else if ($MostrarPromociones && $_GET["MostrarPromociones"]) {
    $ajax->MostrarPromocionesAjax();
} else if ($listarClientes && $_GET["listarClientes"]) {
    $ajax->ListarClientesAjax();
} else if ($cambiarContraseña) {
    $ajax->cambiarContraseñaAjax($_POST["UsuarioCambiarContraseña"], $_POST["AnteriorCambiarContraseña"], $_POST["NuevaCambiarContraseña"]);
}
?>