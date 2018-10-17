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

        <!--LISTA DE MENSAJES--> 
        <div class="col-md-12 mt-5 mb-5">
            <article id="article1">
                <div class="col-md-12">
                    <h3 class="text-right-xs" style="text-align: center;"><ion-icon name="chatboxes"></ion-icon> Buzón de Mensajes</h3>
                    <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonMensajesAdmin" style="display: block;margin: auto;width: 50%;"><span class="ion-clipboard"></span> Ver Listado</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-block btn-color btn-xxl" id="enviarMensajeNuevoAdmin" style="display: block;margin: auto;width: 50%;"><ion-icon name="send"></ion-icon> Enviar Mensaje</button>
                        </div>
                    </div>
                    <div class="form-white" style="overflow:scroll;height:300px;">
                        <br>
                        <table class="table" style="border: 3px solid rgba(83,44,26,.95);">
                            <thead style="border: 3px solid rgba(83,44,26,.95);background:#FD9444;">
                                <tr>
                                    <th scope="col" style="text-align: center;">Id</th> 
                                    <th scope="col" style="text-align: center;">Nombre</th> 
                                    <th scope="col" style="text-align: center;">Asunto</th>                    
                                    <th scope="col" style="text-align: center;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="tablaMensajesAdmin">
                                <!--DATOS DE LA TABLA-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </div>

    </div>
</div>

<!--MODAL INFORMACION DEL MENSAJE-->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="VerInfoMensajeAdmin">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 5%;">
            <form id="FormInfoPromocion" method="POST">
                <h4 style="text-align: center;">Información del Mensaje</h4>
                <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                <div class="form-group">
                    <label>Remitente</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-person"></span>
                        </div>
                        <input type="text" class="form-control" id="ModalRemitenteMensaje" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-ios-email-outline"></span>
                        </div>
                        <input type="text" class="form-control" id="ModalCorreoMensaje" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Asunto</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-document-text"></span>
                        </div>
                        <input type="text" class="form-control" id="ModalAsuntoMensaje" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mensaje</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-android-done-all"></span>
                        </div>
                        <textarea rows="5" class="form-control" id="ModalMensajeMensaje" disabled></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>