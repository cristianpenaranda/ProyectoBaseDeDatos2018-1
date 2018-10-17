<?php
if (!isset($_SESSION["Tipo"])) {
    $tipo = unserialize($_SESSION['Tipo']);
    if ($tipo != "Cliente"){
        header("Location:ErrorPage");
    }
}else{
    $tipo = unserialize($_SESSION['Tipo']);
    if ($tipo != "Cliente"){
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
                    <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonMensajesAdmin" style="display: block;margin: auto;width: 50%;"><span class="ion-clipboard"></span> Ver Listado</button>
                    <div class="form-white" style="overflow:scroll;height:300px;">
                        <br>
                        <table class="table" style="border: 3px solid rgba(83,44,26,.95);">
                            <thead style="border: 3px solid rgba(83,44,26,.95);background:#FD9444;">
                                <tr>
                                    <th scope="col" style="text-align: center;">Id</th> 
                                    <th scope="col" style="text-align: center;">Nombre</th> 
                                    <th scope="col" style="text-align: center;">Correo</th> 
                                    <th scope="col" style="text-align: center;">Asunto</th> 
                                    <th scope="col" style="text-align: center;">Mensaje</th>                    
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

<!--MODAL INFORMACION DE LA PROMOCION-->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="VerInfoMensajeAdmin">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 5%;">
            <form id="FormInfoPromocion" method="POST"><div class="form-group">
                    <label for="name">Mensaje</label>
                    <div class="input-group mb-3">
                      <textarea name="textarea" rows="5" cols="50" placeholder="Escriba su respuesta aquí"></textarea>
                   </div>
                 </div>
                <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonResponderMensajesAdmin" style="display: block;margin: auto;width: 50%;"><span class="ion-forward"></span> Responder</button>
            </form>
        </div>
    </div>
</div>