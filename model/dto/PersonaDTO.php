<?php

class PersonaDTO{
    
    private $id_persona;
    private $nombre;
    private $apellido;
    private $telefono;
    private $domicilio;
    private $contraseña;
    private $correo;
    
    function __construct($id_persona, $nombre, $apellido, $telefono, $domicilio, $contraseña, $correo) {
        $this->id_persona = $id_persona;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
        $this->contraseña = $contraseña;
        $this->correo = $correo;
    }

    function getId_persona() {
        return $this->id_persona;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getDomicilio() {
        return $this->domicilio;
    }

    function getContraseña() {
        return $this->contraseña;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }


}

