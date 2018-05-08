<?php

class negocio {

    //GENERA LA PLANTILLA
    public function generarPlantilla() {
        include 'view/plantilla.php';
    }

    //GENERA ENLACE DE LA BARRA DE NAVEGACION
    public function generarEnlace($enlace) {
        if ($this->validarPestañas($enlace)) {
            return "view/modulos/pestañas/" . $enlace . ".php";
        } else if ($this->validarPestañasAdmin($enlace)) {
            return "view/modulos/pestañas/pestañasAdmin/" . $enlace . ".php";
        } else if ($this->validarPestañasCliente($enlace)) {
            return "view/modulos/pestañas/pestañasCliente/" . $enlace . ".php";
        } else if ($this->validarPestañasEmpleado($enlace)) {
            return "view/modulos/pestañas/pestañasEmpleado/" . $enlace . ".php";
        } else {
            return "view/modulos/pestañas/errorpage.php";
        }
    }

    //OBTIENE A PESTAÑA DEL MENU DE ADIMINISTRADOR
    private function validarPestañasAdmin($pestaña) {
        $exito = false;
        $pestañas = array("Administrador_Clientes", "Administrador_Promociones", "Administrador_Productos", 
                           "Administrador_Empleados", "Administrador_Mensajes");
        if (in_array($pestaña, $pestañas)) {
            $exito = true;
        }
        return $exito;
    }

    //OBTIENE A PESTAÑA DEL MENU DE FUNCIONARIO
    private function validarPestañasCliente($pestaña) {
        $exito = false;
        $pestañas = array("Cliente_Compra", "Cliente_Listados", "Cliente_Mensajes");
        if (in_array($pestaña, $pestañas)) {
            $exito = true;
        }
        return $exito;
    }

    //OBTIENE A PESTAÑA DEL MENU DE ADIMINISTRADOR
    private function validarPestañasEmpleado($pestaña) {
        $exito = false;
        $pestañas = array("Empleado_RegistroCompra");
        if (in_array($pestaña, $pestañas)) {
            $exito = true;
        }
        return $exito;
    }

    //OBTIENE A PESTAÑA DEL MENU
    private function validarPestañas($pestaña) {
        $exito = false;
        $pestañas = array("Inicio", "Panaderia", "Reposteria", "Contacto", "Cuenta", "ErrorPage", "Perfil", "Salir");
        if (in_array($pestaña, $pestañas)) {
            $exito = true;
        }
        return $exito;
    }

    
    
    //METODOS ADMINISTRADOR
    public function buscarAdminNegocio($admin) {
        return AdministradorDAO::buscarAdminDAO($admin);
    }
    
    public function registroEmpleadoNegocio($empleado) {
        return EmpleadoDAO::registroEmpleadoDAO($empleado);
    }
    
    public function registrarProductoNegocio($producto) {
        return ProductoDAO::registroProductoDAO($producto);
    }
    
    public function registrarPromocionNegocio($promocion) {
        return PromocionDAO::registroPromocionDAO($promocion);
    }
    
    public function ListarPromocionesNegocio() {
        return PromocionDAO::ListarPromocionesDAO();
    }
    
    public function MostrarPromocionesNegocio() {
        return PromocionDAO::MostrarPromocionesDAO();
    }
    
    public function ListarClientesNegocio() {
        return ClienteDAO::ListarClientesDAO();
    }
    

    //METODOS CLIENTE
    public function buscarClienteNegocio($cliente) {
        return ClienteDAO::buscarClienteDAO($cliente);
    }
    
    public function registroClienteNegocio($cliente) {
        return ClienteDAO::registroClienteDAO($cliente);
    }

    
    //METODOS EMPLEADO
    public function buscarEmpleadoNegocio($empleado) {
        return EmpleadoDAO::buscarEmpleadoDAO($empleado);
    }
    
    public function ListarEmpleadosNegocio() {
        return EmpleadoDAO::ListarEmpleadosDAO();
    }
    
    
    //METODOS PERSONA
    public function buscarPersonaNegocio($usuario) {
        return PersonaDAO::buscarPersonaDAO($usuario);
    }
    
    public function verificarLoginNegocio($usuario, $contraseña){
        return PersonaDAO::loginDAO($usuario, $contraseña);
    }
    
    public function recuperarContraseñaNegocio($usuario){
        return PersonaDAO::recuperarContraseñaDAO($usuario);
    }
    
    public function registroPersonaNegocio($persona) {
        return PersonaDAO::registroPersonaDAO($persona);
    }
    
    public function cambiarContraseñaNegocio($usuario, $contraseña) {
        return PersonaDAO::cambiarContraseñaDAO($usuario, $contraseña);
    }
    
    
    
    
    


    public function recordarClave($usuario) {
        return PersonaDAO::recordarUsuario($usuario);
    }

    public function verificarUsuarioNegocio($usuario) {
        return PersonaDAO::verificarUsuario($usuario);
    }

    public function registrarFuncionarioNegocio($user) {
        return PersonaDAO::registrarFuncionarioDAO($user);
    }

    public function listarFuncionario() {
        return PersonaDAO::listarFuncionario();
    }

}
