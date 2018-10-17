<?php
if (!isset($_SESSION["Tipo"])) {
    $tipo = unserialize($_SESSION['Tipo']);
    if ($tipo != "Empleado"){
        header("Location:ErrorPage");
    }
}else{
    $tipo = unserialize($_SESSION['Tipo']);
    if ($tipo != "Empleado"){
        header("Location:ErrorPage");
    }
}
?>

<div class="wrapper body-inverse"> <!-- wrapper -->
    <div class="container">
        <div class="row">
            <!-- Sign Up form -->
            <div class="col-sm-8 sign mt-3 mb-3 " style="display: block;margin: auto;">
                <h3 class="text-right-xs">Regístrar un Cliente Nuevo</h3>
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