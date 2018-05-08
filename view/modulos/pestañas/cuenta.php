<?php
if (isset($_SESSION["Usuario"])) {
    header("Location:Perfil");
}
?>


<div class="fondo">
    <img src="https://drive.google.com/uc?export=view&id=1bKVpEo2VDf6fYtPI2QtuMM6ThYZ0WYaf">
</div>

<div class="wrapper body-inverse"> <!-- wrapper -->

    <div class="container">
        <div class="row">

            <!-- Sign In form -->
            <div class="col-sm-5 col-sm-offset-1 sign">
                <h3>Iniciar Sesión</h3>
                <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                <p class="text-muted">
                    Complete el formulario para iniciar sesión en su cuenta.
                </p>
                <div>
                    <form  id="FormLogin" method="POST">
                        <div class="form-group">
                            <label for="cedula">Cédula</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ion-person" for="ingresarUsuario"></span>
                                </div>
                                <input type="text" maxlength="11"  class="form-control" placeholder="Cédula" aria-label="cedula" aria-describedby="basic-addon1" name="ingresarUsuario" id="ingresarUsuario" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ion-locked" for="ingresarContraseña"></span>
                                </div>
                                <input type="password" maxlength="50"  class="form-control" placeholder="Contraseña" aria-label="password" aria-describedby="basic-addon1" name="ingresarContraseña" id="ingresarContraseña" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Tipo de Usuario</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text ion-person-stalker" id="basic-addon1" for="ingresarTipo"></span>       
                                <select id="ingresarTipo" name="ingresarTipo" class="form-control" required> 
                                    <option value="">Seleccione tipo de usuario</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="empleado">Empleado</option>
                                    <option value="cliente">Cliente</option>
                                </select>
                                <label class="bg-danger" id="error-tipoUsuarioI"></label>     
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Recordarme
                            </label>
                        </div>
                        <button type="submit" class="btn btn-block btn-color btn-xxl"><span class="ion-android-exit"></span> Ingresar</button>
                    </form>
                    <hr>
                    <p><a href="#recuperarClave" id="lost-btn" data-toggle="modal">Olvidaste tu contraseña?</a></p>
                    <div class="form-avatar hidden-xs">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-user fa-stack-1x"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Sign Up form -->
            <div class="col-sm-5 sign">
                <h3 class="text-right-xs">Regístrese en su Cuenta</h3>
                <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                <p class="text-muted text-right-xs">
                    Complete el formulario para crear una nueva cuenta.
                </p>
                <div class="form-white">
                    <form  id="FormRegistroCliente" method="POST">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ion-person" for="registroNombreCliente"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nombre" aria-label="nombre" aria-describedby="basic-addon1" name="registroNombreCliente" id="registroNombreCliente" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ion-person" for="registroApellidoCliente"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Apellido" aria-label="apellido" aria-describedby="basic-addon1" name="registroApellidoCliente" id="registroApellidoCliente" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ion-android-call" for="registroTelefonoCliente"></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Teléfono" aria-label="telefono" aria-describedby="basic-addon1"  name="registroTelefonoCliente" id="registroTelefonoCliente" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ion-card" for="registroCedulaCliente"></span>
                                </div>
                                <input type="number" maxlength="11"  class="form-control" placeholder="Cédula" aria-label="cedula" aria-describedby="basic-addon1"  name="registroCedulaCliente" id="registroCedulaCliente" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ion-email" for="registroCorreoCliente"></span>
                                </div>
                                <input type="email" class="form-control email" placeholder="Ingresa tu Correo"  name="registroCorreoCliente" id="registroCorreoCliente" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ion-location" for="registroDomicilioCliente"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Ingresa tu Dirección"  name="registroDomicilioCliente" id="registroDomicilioCliente" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row" style="background:white;">
                                <div class="col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text ion-locked" for="registroContraseñaCliente"></span>
                                        </div>
                                        <input maxlength="50"  type="password" class="form-control" placeholder="Contraseña" name="registroContraseñaCliente" id="registroContraseñaCliente" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonRegistroCliente"><span class="ion-person-add"></span> Crear Cuenta</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>  


<!--MODAL RECUPERAR CONTRASEÑA-->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="recuperarClave">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 5%;">
            <form id="FormRecuperar" method="POST">
                <h4 style="text-align: center;">Recuperar Contraseña</h4>
                <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                <div class="form-group">
                    <label for="cedula">Cédula</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-person" for="recuperarUsuario"></span>
                        </div>
                        <input type="text" class="form-control" id="recuperarUsuario" name="recuperarUsuario" placeholder="Cédula" aria-label="cedula" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-block btn-color btn-xxl" href="#"><span class="ion-forward"></span> Recuperar</button>
            </form>
        </div>
    </div>
</div>