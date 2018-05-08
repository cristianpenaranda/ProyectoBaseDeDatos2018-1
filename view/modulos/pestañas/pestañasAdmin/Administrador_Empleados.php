<div class="container" id="Administrador_Empleados">
    <div class="row">
        <!--REGISTRA NUEVO EMPLEADO--> 
        <div class="col-md-6 mt-5 mb-5">
            <article id="article1">
                <div class="col-md-12">
                    <h3 class="text-right-xs" style="text-align: center;">Ingresar Nuevo Empleado</h3>
                    <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                    <div class="form-white">
                        <form  id="FormRegistroEmpleado" method="POST">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text ion-person" for="registroNombreEmpleado"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nombre" aria-label="nombre" aria-describedby="basic-addon1" name="registroNombreEmpleado" id="registroNombreEmpleado" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text ion-person" for="registroApellidoEmpleado"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Apellido" aria-label="apellido" aria-describedby="basic-addon1" name="registroApellidoEmpleado" id="registroApellidoEmpleado" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text ion-android-call" for="registroTelefonoEmpleado"></span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Teléfono" aria-label="telefono" aria-describedby="basic-addon1"  name="registroTelefonoEmpleado" id="registroTelefonoEmpleado" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text ion-card" for="registroCedulaEmpleado"></span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Cédula" aria-label="cedula" aria-describedby="basic-addon1"  name="registroCedulaEmpleado" id="registroCedulaEmpleado" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text ion-email" for="registroCorreoEmpleado"></span>
                                    </div>
                                    <input type="email" class="form-control email" placeholder="Ingresa tu Correo"  name="registroCorreoEmpleado" id="registroCorreoEmpleado" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text ion-location" for="registroDomicilioEmpleado"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Ingresa tu Dirección"  name="registroDomicilioEmpleado" id="registroDomicilioEmpleado" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text ion-locked" for="registroContraseñaEmpleado"></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Contraseña" name="registroContraseñaEmpleado" id="registroContraseñaEmpleado" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonRegistroEmpleado"><span class="ion-person-add"></span> Crear Cuenta</button>
                        </form>
                    </div>
                </div>
            </article>
        </div>
        
        <!--LISTA LOS EMPLEADOS--> 
        <div class="col-md-6 mt-5 mb-5">
            <article id="article1">
                <div class="col-md-12">
                    <h3 class="text-right-xs" style="text-align: center;">Listar los Empleados</h3>
                    <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                    <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonListarEmpleado" style="display: block;margin: auto;width: 50%;"><span class="ion-clipboard"></span> Ver Listado</button>
                    <div class="form-white" style="overflow:scroll;height:400px;">
                        <br>
                        <table class="table" style="border: 3px solid rgba(83,44,26,.95);">
                            <thead style="border: 3px solid rgba(83,44,26,.95);background:#FD9444;">
                                <tr>
                                    <th scope="col" style="text-align: center;">Cédula</th>                    
                                    <th scope="col" style="text-align: center;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="tablaEmpleados">
                                <!--DATOS DE LA TABLA-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>