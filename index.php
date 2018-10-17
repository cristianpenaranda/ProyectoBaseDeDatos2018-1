<?php

//incluir archivos externos
require_once './controller/controlador.php';
require_once './model/negocio.php';
require_once './model/conexion.php';
require_once './model/mail/Mail.php';
require_once './model/dao/PersonaDAO.php';

//activar almacenamiento en el bufer de la página
ob_start();
$controlador = new controlador();
$controlador->generarPlantilla();