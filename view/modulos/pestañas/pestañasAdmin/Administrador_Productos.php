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
    <div class="row mt-5">

        <!--FORMULARIO REGISTRAR PRODUCTOS-->
        <div class="col-md-5 mb-5">
            <h3 class="text-right-xs" style="text-align: center;">Ingreso de Nuevos Productos</h3>
            <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
            <div class="form-white">
                <form id="FormRegistroProducto" method="POST">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-android-restaurant" id="basic-addon1" for="registrarTipoProducto"></span>       
                            <select id="registrarTipoProducto" name="registrarTipoProducto" class="form-control" required> 
                                <option value="">Seleccione tipo de Producto</option>
                                <option value="1">Panadería</option>
                                <option value="2">Repostería</option>
                            </select>
                            <label class="bg-danger" id="error-tipoUsuarioI"></label>     
                        </div>
                    </div>
                    <div class="form-group">   
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text ion-android-done-all" for="registrarNombreProducto"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre" aria-label="titulo" aria-describedby="basic-addon1" name="registrarNombreProducto" id="registrarNombreProducto" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text ion-android-list" for="registrarDescripcionProducto"></span>
                            </div>
                            <textarea type="text" rows="6" class="form-control" placeholder="Descripción" aria-label="apellido" aria-describedby="basic-addon1" name="registrarDescripcionProducto" id="registrarDescripcionProducto" required></textarea>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text ion-pound" for="registrarCantidadProducto"></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Cantidad" aria-label="titulo" aria-describedby="basic-addon1" name="registrarCantidadProducto" id="registrarCantidadProducto" required>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text ion-social-usd" for="registrarValorFabricacionProducto"></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Valor de Fabricación" aria-label="titulo" aria-describedby="basic-addon1" name="registrarValorFabricacionProducto" id="registrarValorFabricacionProducto" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text ion-social-usd" for="registrarPrecioProducto"></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Precio" aria-label="titulo" aria-describedby="basic-addon1" name="registrarPrecioProducto" id="registrarPrecioProducto" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="producto">Imágen</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text ion-android-restaurant" for="registrarImagenProducto"></span>
                            </div>
                            <input type="file" class="form-control" placeholder="Imagen" aria-label="titulo" aria-describedby="basic-addon1" name="registrarImagenProducto" id="registrarImagenProducto" required="">
                        </div>
                        <img src="https://drive.google.com/uc?export=view&id=1uWWhjXrDtl59gBiMMeDQliguVxlLLVT9" class="imgProducto" style="width:60%;margin:auto;display:block;border:2px double #FD9444;">
                    </div>
                    <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonRegistroProducto"><span class="ion-plus-round"></span> Registrar Promoción</button>
                </form>
            </div>
        </div>

        <!--LISTAR PRODUCTOS-->
        <div class="col-md-7 mb-5">
            <h3 class="text-right-xs" style="text-align: center;">Listar los Productos</h3>
            <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
            <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonListarProductos" style="display: block;margin: auto;width: 50%;"><span class="ion-clipboard"></span> Ver Listado</button>
            <div class="form-white" style="overflow:scroll;height:450px;">
                <br>
                <table class="table" style="border: 3px solid rgba(83,44,26,.95);">
                    <thead style="border: 3px solid rgba(83,44,26,.95);background:#FD9444;">
                        <tr>
                            <th scope="col" style="text-align: center;">Id</th>
                            <th scope="col" style="text-align: center;">Nombre</th>                    
                            <th scope="col" style="text-align: center;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaProducto">
                    <!--DATOS DE LA TABLA-->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>



<!--MODAL INFORMACION DEL PRODUCTO-->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="VerInfoProducto">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 5%;">
            <form id="FormInfoCliente" method="POST">
                <h4 style="text-align: center;">Información del Producto</h4>
                <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-android-done-all""></span>
                        </div>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" id="ModalNombreProducto" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-android-list"></span>
                        </div>
                        <textarea type="text" rows="6" class="form-control" aria-describedby="basic-addon1" id="ModalDescripcionProducto" disabled></textarea>
                    </div>
                </div>
                <div class="form-group"> 
                    <label>Cantidad</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-pound" for="registrarCantidadProducto"></span>
                        </div>
                        <input type="number" class="form-control"  aria-describedby="basic-addon1" id="ModalCantidadProducto" disabled>
                    </div>
                </div>
                <div class="form-group"> 
                    <label>Valor de Fabricación</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-social-usd"></span>
                        </div>
                        <input type="number" class="form-control"  aria-describedby="basic-addon1" id="ModalValorFabricacionProducto" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Precio del Producto</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text ion-social-usd"></span>
                        </div>
                        <input type="number" class="form-control" aria-describedby="basic-addon1" id="ModalPrecioProducto" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Imágen</label>
                    <img src="" class="imgProducto" style="width:70%;margin:auto;display:block;" id="ModalImagenProducto" >
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="display:block;margin:auto;"><span class="ion-close-round"></span> Cerrar</button>
            </form>
        </div>
    </div>
</div>

