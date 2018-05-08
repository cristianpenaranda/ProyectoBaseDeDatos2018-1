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
    
    public function registrarPromocionControlador($promocion){
        return $this->negocio->registrarPromocionNegocio($promocion);
    }
    
    public function ListarPromocionesControlador(){
        return $this->negocio->ListarPromocionesNegocio();
    }
    
    public function MostrarPromocionesControlador(){
        return $this->negocio->MostrarPromocionesNegocio();
    }
    
    public function ListarClientesControlador(){
        return $this->negocio->ListarClientesNegocio();
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
    

    
    

}