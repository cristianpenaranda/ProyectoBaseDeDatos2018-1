<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="https://drive.google.com/uc?export=view&id=1EFjieBXuFfhTMtWJmI8H0hCXhYFMy_lv"/>
    <title>La Viña del Pan</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>-->

    <script type="text/javascript" src="view/presentacion/js/jquery.min.js"></script>

    <script type="text/javascript" src="view/presentacion/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
    <link href="view/presentacion/css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://unpkg.com/ionicons@4.2.0/dist/ionicons.js"></script>
    
    <script src="view/presentacion/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">    
    <script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
    
    <script type="text/javascript" src="view/presentacion/js/jquery.validate.js"></script>
    <!--ARCHIVOS PERSONALES-->
    <link rel="stylesheet" href="view/presentacion/css/estilos.css">
    <script type="text/javascript" src="view/presentacion/js/inicio.js"></script>
    <script type="text/javascript" src="view/presentacion/js/contacto.js"></script>
    <script type="text/javascript" src="view/presentacion/js/productos.js"></script>
    <script type="text/javascript" src="view/presentacion/js/flechaSubir.js"></script>
    <script type="text/javascript" src="view/presentacion/js/alertas.js"></script>
    <script type="text/javascript" src="view/presentacion/js/cuenta.js"></script>
    <script type="text/javascript" src="view/presentacion/js/empleado.js"></script>
    <script type="text/javascript" src="view/presentacion/js/perfil.js"></script>
    <script type="text/javascript" src="view/presentacion/js/cliente.js"></script>
    <script type="text/javascript" src="view/presentacion/js/registroCompra.js"></script>
    <script type="text/javascript" src="view/presentacion/js/administrador.js"></script>
    <script type="text/javascript" src="view/presentacion/js/listadosAdmin.js"></script>
    <script type="text/javascript" src="view/presentacion/js/salir.js"></script>
    <script type="text/javascript" src="view/presentacion/js/recuperarContraseña.js"></script>

</head>
<body>
    <?php
	session_start();
	include_once 'modulos/header.php';
	$controlador = new controlador();
	$controlador->generarVista();
	include_once 'modulos/footer.php';
    ?>
</body>
</html>