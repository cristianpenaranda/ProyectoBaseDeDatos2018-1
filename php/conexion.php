<?php
	//Funcion para Conexion a la Base de datos
	function conexion()
	{
		
		global $DB_HOST;
		global $DB_USER;
		global $DB_PASSWORD;
		global $DB_NAME;

		$DB_HOST='localhost';
		$DB_USER='root';
		$DB_PASSWORD='';
		$DB_NAME='panaderia';

		$mysqli= @new mysqli($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
		if (mysqli_connect_errno()) {
			printf(error_db_connect());
			exit();
		}
		return $mysqli;
	}
?>