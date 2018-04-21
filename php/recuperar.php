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
	


} else{
    echo 'wrong';
}

?>