<?php

class controlador{
    private $negocio;
	
    public function __construct(){
	$this->negocio = new negocio();
    }

    public function generarPlantilla(){
	return negocio::generarPlantilla();
    }

    //CARGA ARCHIVO DEL ENLACE
    public function generarVista(){
	$enlace = filter_input(INPUT_GET, "ubicacion");
	if($enlace){
        	$enlace = $this->negocio->generarEnlace($enlace);
	}else {
		$enlace = $this->negocio->generarEnlace("Inicio");
	}
      	include_once $enlace;
    } 
    
      
    //METODOS ADMINISTRADOR
    public function buscarAdminControlador($admin){
        return $this->negocio->buscarAdminNegocio($admin);
    }
    
    public function registroEmpleadoControlador($empleado){
        return $this->negocio->registroEmpleadoNegocio($empleado);
    }
    
    public function registrarProductoControlador($producto){
        return $this->negocio->registrarProductoNegocio($producto);
    }
    
    public function ListarProductosControlador(){
        return $this->negocio->ListarProductosNegocio();
    }  
    
    public function ListarProductosPanaderiaControlador(){
        return $this->negocio->ListarProductosPanaderiaNegocio();
    }  
    
    public function ListarProductosReposteriaControlador(){
        return $this->negocio->ListarProductosReposteriaNegocio();
    } 
    
    public function ListarProductosCompraPanaderiaControlador(){
        return $this->negocio->ListarProductosCompraPanaderiaNegocio();
    }  
    
    public function ListarProductosCompraReposteriaControlador(){
        return $this->negocio->ListarProductosCompraReposteriaNegocio();
    }    
    
    public function mostrarInfoProductoControlador($id){
        return $this->negocio->mostrarInfoProductoNegocio($id);
    }
    
    public function registrarPromocionControlador($promocion){
        return $this->negocio->registrarPromocionNegocio($promocion);
    }
    
    public function ListarPromocionesControlador(){
        return $this->negocio->ListarPromocionesNegocio();
    }
    
    public function MostrarPromocionesControlador(){
        return $this->negocio->MostrarPromocionesNegocio();
    }
    
    public function EliminarPromocionControlador($titulo){
        return $this->negocio->EliminarPromocionNegocio($titulo);
    }
    
    public function mostrarInfoPromocionControlador($titulo){
        return $this->negocio->mostrarInfoPromocionNegocio($titulo);
    }
    
    public function mostrarInfoMensajeControlador($id){
        return $this->negocio->mostrarInfoMensajeNegocio($id);
    }
    
    public function ListarClientesControlador(){
        return $this->negocio->ListarClientesNegocio();
    }
    
    public function listarMensajesAdminControlador(){
        return $this->negocio->listarMensajesAdminNegocio();
    }
    
    public function EliminarEmpleadoControlador($usuario){
        return $this->negocio->EliminarEmpleadoNegocio($usuario);
    }
    
    public function EliminarPersonaControlador($usuario){
        return $this->negocio->EliminarPersonaNegocio($usuario);
    }
    
    public function eliminarProductoControlador($producto){
        return $this->negocio->eliminarProductoNegocio($producto);
    }
    
    
    //METODOS CLIENTE
    public function buscarClienteControlador($cliente){
        return $this->negocio->buscarClienteNegocio($cliente);
    }
    
    public function registroClienteControlador($cliente){
        return $this->negocio->registroClienteNegocio($cliente);
    }
    
    
    
    //METODOS EMPLEADO
    public function buscarEmpleadoControlador($empleado){
        return $this->negocio->buscarEmpleadoNegocio($empleado);
    }
    
    public function ListarEmpleadosControlador(){
        return $this->negocio->ListarEmpleadosNegocio();
    }
    
    public function buscarClienteEmpleadoControlador($cliente){
        return $this->negocio->buscarClienteEmpleadoNegocio($cliente);
    }
    
    public function registroVentaEmpleadoControlador($salida){
        return $this->negocio->registroVentaEmpleadoNegocio($salida);
    }
    
    public function buscarUtlimaSalidaControlador(){
        return $this->negocio->buscarUtlimaSalidaNegocio();
    }
    
    public function ventaEmpleadoControlador($empleado, $idUltimo){
        return $this->negocio->ventaEmpleadoNegocio($empleado, $idUltimo);
    }
    
    public function ventaClienteControlador($idUltimo, $cliente, $estado){
        return $this->negocio->ventaClienteNegocio($idUltimo, $cliente, $estado);
    }
    
    
    
    //METODOS PERSONA
    public function buscarPersonaControlador($usuario){
        return $this->negocio->buscarPersonaNegocio($usuario);
    }
    
    public function verificarLoginControlador($usuario, $contraseña){
        return $this->negocio->verificarLoginNegocio($usuario, $contraseña);
    }
    
    public function recuperarContraseñaControlador($usuario){
        return $this->negocio->recuperarContraseñaNegocio($usuario);
    }
    
    public function registroPersonaControlador($persona){
        return $this->negocio->registroPersonaNegocio($persona);
    }
    
    public function cambiarContraseñaControlador($usuario, $contraseña){
        return $this->negocio->cambiarContraseñaNegocio($usuario, $contraseña);
    }
    
    public function buscarCedulaAdminControlador(){
        return $this->negocio->buscarCedulaAdminNegocio();
    }
    
    public function envioMensajeControlador($mensajeDTO){
        return $this->negocio->envioMensajeNegocio($mensajeDTO);
    }
    

    
    

}