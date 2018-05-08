<div class="container">
    <div class="row">

        <!--FORMULARIO REGISTRAR PROMOCIONES-->
        <div class="col-md-6 mt-5 mb-5">
            <div class="col-md-12">
                <h3 class="text-right-xs" style="text-align: center;">Registrar Promoción</h3>
                <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                <div class="form-white">
                    <form  id="FormRegistroPromocion" method="POST">
                        <div class="form-group">
                            <label for="titulo">Título de la Promoción</label>    
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ion-android-done-all" for="registroTituloPromocion"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Título" aria-label="titulo" aria-describedby="basic-addon1" name="registroTituloPromocion" id="registroTituloPromocion" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ion-android-list" for="registroDescripcionPromocion"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Descripción" aria-label="apellido" aria-describedby="basic-addon1" name="registroDescripcionPromocion" id="registroDescripcionPromocion" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonRegistroPromocion"><span class="ion-plus-round"></span> Registrar Promoción</button>
                    </form>
                </div>
            </div>
        </div>
        
        
        <!--LISTA LAS PROMOCIONES--> 
        <div class="col-md-6 mt-5 mb-5">
            <article id="article1">
                <div class="col-md-12">
                    <h3 class="text-right-xs" style="text-align: center;">Listar las Promociones</h3>
                    <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                    <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonListarPromociones" style="display: block;margin: auto;width: 50%;"><span class="ion-clipboard"></span> Ver Listado</button>
                    <div class="form-white" style="overflow:scroll;height:300px;">
                        <br>
                        <table class="table" style="border: 3px solid rgba(83,44,26,.95);">
                            <thead style="border: 3px solid rgba(83,44,26,.95);background:#FD9444;">
                                <tr>
                                    <th scope="col" style="text-align: center;">Título</th>                    
                                    <th scope="col" style="text-align: center;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="tablaPromocion">
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
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="VerInfoPromocion">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 5%;">
            <form id="FormInfoPromocion" method="POST">
                <h4 style="text-align: center;">Información de la Promoción</h4>
                <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                <div class="form-group">
                    <label for="cedula">Título</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-android-done-all" for="recuperarUsuario"></span>
                        </div>
                        <input type="text" class="form-control" id="recuperarUsuario" name="recuperarUsuario" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cedula">Descripción</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-android-list" for="recuperarUsuario"></span>
                        </div>
                        <input type="text" class="form-control" id="recuperarUsuario" name="recuperarUsuario" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>