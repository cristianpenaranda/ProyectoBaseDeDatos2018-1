<?php

//include database connection file
require_once 'config.php';

//define database object
global $dbc;

$stmt = $dbc->prepare("SELECT P.cedula from persona P 
						WHERE P.cedula='".$_POST['cedula']."'");

$stmt->execute();

$row = $stmt->rowCount();

if ($row > 0){

	$adm = $dbc->prepare("SELECT P.clave from persona P 
						  INNER JOIN administrador C 
						  WHERE C.cedula = '".$_POST['cedula']."'
						  AND P.clave='".$_POST['clave']."'");
	$adm->execute();

	$row2 = $adm->rowCount();

	if ($row2 > 0){
		echo 'admincorrect';
		exit;
	}

	$cli = $dbc->prepare("SELECT P.clave from persona P 
						  INNER JOIN cliente C 
						  WHERE C.cedula = '".$_POST['cedula']."'
						  AND P.clave='".$_POST['clave']."'");
	$cli->execute();

	$row3 = $cli->rowCount();

	if ($row3 > 0){
		echo 'clientecorrect';
		exit;
	}
} else{
    echo 'wrong';
}

?>