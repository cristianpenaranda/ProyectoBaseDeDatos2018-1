<?php
	if(isset($_SESSION["Usuario"])){
		session_destroy();
		header("Location:Inicio");
	}
?>