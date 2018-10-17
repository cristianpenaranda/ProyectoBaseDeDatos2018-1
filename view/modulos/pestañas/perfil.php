<?php
    if (isset($_SESSION["Usuario"])) {
        $user = unserialize($_SESSION['Usuario']);
        $tipo = unserialize($_SESSION['Tipo']);
    } echo'
<div class="container fondoApp">
    <div class="row">
        <div class="col-md-7" style="display: block;margin: auto;margin-top: 5%;margin-bottom:5%;">
            <div class="well well-sm perfil card">
                <h2>Perfil</h2>
                <hr>
                <img src="https://drive.google.com/uc?export=view&id=1VAVdqLOT3aPd8XqyhcBVkV9TVa3n3A-z" alt="" class="img-rounded img-responsive" />
                <div class="info">
                    <h3><span class="ion-person"></span> ' .$user->getNombre().' '.$user->getApellido().'</h3>
                    <h5 id="UsuarioCambiarContraseña"><span class="ion-card"></span> '.$user->getId_persona().'</h5>
                    <span class="ion-location"></span> '.$user->getDomicilio().'
                    <p>
                        <span class="ion-email"></span> '.$user->getCorreo().'
                        <br>
                        <span class="ion-android-call"></span> '.$user->getTelefono().'
                        <br>
                        <span class="ion-person-stalker"></span> '.$tipo.'
                    </p>
                </div>
                <button class="btn btn-block btn-color btn-xxl" href="" data-toggle="modal" data-target=".bd-example-modal-sm" id="modal" style="width:70%;display:block;margin:auto;"><span class="ion-loop"></span> Cambiar Contraseña</button>                
            </div>
        </div>
    </div>
</div>

<!--MODAL CAMBIAR CONTRAASEÑA-->
<form class=" modal fade bd-example-modal-sm modalContraseña" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="FormCambiarContraseña" method="POST">
    <div class="modal-dialog">
        <div class="modal-content">
                <h5 class="modal-title mt-3 mb-3" id="exampleModalCenterTitle" style="text-align: center;">Cambiar Contraseña </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                <hr style="margin-left: 0;width: 80%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);display:block;margin:auto;">
            <div class="modal-body">
                <div class="form-group input-group" style="color:black">
                    <div class="input-group-prepend">
                        <span class="input-group-text ion-unlocked" for="AnteriorCambiarContraseña" id="basic-addon1"></span>
                    </div>
                    <input type="password" maxlength="50"  class="form-control" placeholder="Contraseña Anterior" id="AnteriorCambiarContraseña" name="AnteriorCambiarContraseña" required>
                </div>

                <div class="form-group input-group"  style="color:black">
                    <div class="input-group-prepend">
                        <span class="input-group-text ion-locked" for="NuevaCambiarContraseña" id="basic-addon1"></span>
                    </div>
                    <input type="password" maxlength="50"  class="form-control" placeholder="Contraseña Nueva" id="NuevaCambiarContraseña" name="NuevaCambiarContraseña" required>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-block btn-color btn-xxl ml-5 mr-3" id="botonCambiarContraseña" style="width:50%;">Cambiar <span class="ion-loop"></span></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="ion-close-round"></span> Cerrar</button></div>
                </div>
        </div>
    </div>
</form>'

    
?>