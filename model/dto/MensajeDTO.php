<?php

class MensajeDTO{
    
    private $persona;
    private $remitente;
    private $correo;
    private $asunto;
    private $texto;
    
    function __construct($persona, $remitente, $correo, $asunto, $texto) {
        $this->persona = $persona;
        $this->remitente = $remitente;
        $this->correo = $correo;
        $this->asunto = $asunto;
        $this->texto = $texto;
    }

    function getPersona() {
        return $this->persona;
    }

    function getRemitente() {
        return $this->remitente;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getAsunto() {
        return $this->asunto;
    }

    function getTexto() {
        return $this->texto;
    }

    function setPersona($persona) {
        $this->persona = $persona;
    }

    function setRemitente($remitente) {
        $this->remitente = $remitente;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setAsunto($asunto) {
        $this->asunto = $asunto;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }


}