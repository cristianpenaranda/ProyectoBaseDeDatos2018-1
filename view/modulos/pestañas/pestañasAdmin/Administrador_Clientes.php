<?php
if (!isset($_SESSION["Tipo"])) {
    $tipo = unserialize($_SESSION['Tipo']);
    if ($tipo != "Administrador"){
        header("Location:ErrorPage");
    }
}else{
    $tipo = unserialize($_SESSION['Tipo']);
    if ($tipo != "Administrador"){
        header("Location:ErrorPage");
    }
}
?>

<div class="container">
    <div class="row">       
        
        <!--LISTA LAS CLIENTES--> 
        <div class="col-md-6 mt-5 mb-5" style="display:block;margin:auto;">
            <article id="article1">
                <div class="col-md-12">
                    <h3 class="text-right-xs" style="text-align: center;">Listar los Clientes</h3>
                    <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                    <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonListarClientes" style="display: block;margin: auto;width: 50%;"><span class="ion-clipboard"></span> Ver Listado</button>
                    <div class="form-white" style="overflow:scroll;height:300px;">
                        <br>
                        <table class="table" style="border: 3px solid rgba(83,44,26,.95);">
                            <thead style="border: 3px solid rgba(83,44,26,.95);background:#FD9444;">
                                <tr>
                                    <th scope="col" style="text-align: center;">Cédula</th>                    
                                    <th scope="col" style="text-align: center;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="tablaCliente">
                                <!--DATOS DE LA TABLA-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </div>
        
    </div>
</div>


<!--MODAL INFORMACION DEL CLIENTE-->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="VerInfoCliente">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 5%;">
            <form id="FormInfoCliente" method="POST">
                <h4 style="text-align: center;">Información del Cliente</h4>
                <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                <div class="form-group">
                    <label>Cédula</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-card"></span>
                        </div>
                        <input type="text" class="form-control" id="ModalCedulaCliente" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nombres</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-person"></span>
                        </div>
                        <input type="text" class="form-control" id="ModalNombresCliente" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-person"></span>
                        </div>
                        <input type="text" class="form-control" id="ModalApellidosCliente" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Teléfono</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-android-call"></span>
                        </div>
                        <input type="text" class="form-control" id="ModalTelefonoCliente" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Domicilio</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-location"></span>
                        </div>
                        <input type="text" class="form-control" id="ModalDomicilioCliente" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-email"></span>
                        </div>
                        <input type="text" class="form-control" id="ModalCorreoCliente" disabled>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="display:block;margin:auto;"><span class="ion-close-round"></span> Cerrar</button>
            </form>
        </div>
    </div>
</div>
