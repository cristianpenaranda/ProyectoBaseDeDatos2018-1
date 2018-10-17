<!--flecha subir-->
<span class="ion-chevron-up flechaSubir" title="subir"></span>

<!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg fixed-top">
      <div class="container"><img src="https://drive.google.com/uc?export=view&id=1EFjieBXuFfhTMtWJmI8H0hCXhYFMy_lv" alt="logo" title="Inicio" style="width: 2em; margin-right: 1%">
       
        <?php
    if(isset($_SESSION["Tipo"])){
      include 'model/dto/PersonaDTO.php';
      $tipo = unserialize($_SESSION['Tipo']);
      $user = unserialize($_SESSION['Usuario']);
      
      if($tipo=="Administrador"){
         echo '
        <a class="navbar-brand" style="margin-right: 5%; padding: 0.3em;" href="Inicio" title="Inicio"> Administrador</a>     
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="ion-navicon-round span"></span>
        </button><div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="Administrador_Clientes" id="Clientes" title="Clientes"><span class="ion-person-stalker"></span> Clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Administrador_Empleados" id="Empleados" title="Empleados"><span class="ion-clipboard"></span> Empleados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Administrador_Productos" id="Productos" title="Productos"><span class="ion-android-restaurant"></span> Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Administrador_Promociones" id="Promociones" title="Promociones"><span class="ion-ios-alarm-outline"></span> Promociones</a>
            </li>
            <li class="nav-item">
              <div class="btn-group">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;color:white;"><span class="ion-person"></span> '.$user->getNombre().'</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" id="Perfil" title="Mi Perfil" href="Perfil"><span class="ion-person""></span> Perfil</a>
                  <a class="dropdown-item" id="Mensajes" title="Buzón de Mensajes" href="Administrador_Mensajes"><span class="ion-android-chat"></span> Mensajes</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" id="Salir" title="Cerrar Sesión" href="Salir" style="background:red;color:white;"><span class="ion-log-out"></span> Salir</a>
                </div>
              </div>
            </li> 
          </ul>
        </div>';
      }else if($tipo=="Cliente"){
          echo '
        <a class="navbar-brand" style="margin-right: 5%; padding: 0.3em;" href="Inicio" title="Inicio"> Cliente</a>    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="ion-navicon-round span"></span>
        </button><div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="Cliente_Compra" id="Comprar" title="Compras"><span class="ion-bag"></span> Comprar</a>
            </li>
            <li class="nav-item">
              <div class="btn-group">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;color:white;"><span class="ion-person"></span> '.$user->getNombre().'</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" id="Perfil" title="Mi Perfil" href="Perfil"><span class="ion-person""></span> Perfil</a>
                  <a class="dropdown-item" id="Mensajes" title="Buzón de Mensajes" href="Cliente_Mensajes"><span class="ion-android-chat"></span> Mensajes</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" id="Salir" title="Cerrar Sesión" href="Salir" style="background:red;color:white;"><span class="ion-log-out"></span> Salir</a>
                </div>
              </div>
            </li> 
          </ul>
        </div>';
      }else{
          echo  '
        <a class="navbar-brand" style="margin-right: 5%; padding: 0.3em;" href="Inicio" title="Inicio"> Empleado </a>    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="ion-navicon-round span"></span>
        </button><div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="Empleado_RegistroCompra" id="RegistroCompra" title="Registro Compra"><span class="ion-compose"></span> Registrar Compra</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Empleado_RegistroCliente" id="RegistroCliente" title="Registro de Clientes"><span class="ion-person-add"></span> Registro Clientes</a>
            </li>
            <li class="nav-item">
              <div class="btn-group">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;color:white;"><span class="ion-person"></span> '.$user->getNombre().'</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" id="Perfil" title="Mi Perfil" href="Perfil"><span class="ion-person""></span> Perfil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" id="Salir" title="Cerrar Sesión" href="Salir" style="background:red;color:white;"><span class="ion-log-out"></span> Salir</a>
                </div>
              </div>
            </li> 
          </ul>
        </div>';
      }

    }else{      
      echo ' 
        <a class="navbar-brand" style="margin-right: 5%; padding: 0.3em;" href="Inicio" title="Inicio"> La Viña del Pan </a> 
        <a href=""><span class="ion-social-facebook-outline redes" title="Facebook"></span></a>
        <a href=""><span class="ion-social-twitter-outline redes" title="Twitter"></span></a>
        <a href=""><span class="ion-social-instagram-outline redes" title="Instagram"></span></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="ion-navicon-round span"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="Inicio" id="inicio" title="Inicio"><span class="ion-ios-home""></span> Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Panaderia" id="panaderia" title="Panadería">Panadería</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Reposteria" id="reposteria" title="Repostería">Repostería</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contacto" id="contacto" title="Contacto">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Cuenta" id="cuenta" title="Mi Cuenta"><span class="ion-person"></span> Mi Cuenta</a>
            </li>
          </ul>
        </div>';
    }
        ?>
      </div>
    </nav>