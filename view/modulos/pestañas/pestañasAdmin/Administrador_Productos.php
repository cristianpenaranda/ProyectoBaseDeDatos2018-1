<div class="container">
    <div class="row mt-5 mb-5">

        <!--FORMULARIO REGISTRAR PRODUCTOS-->
        <div class="col-md-8" style="display: block;margin: auto;">
            <h3 class="text-right-xs" style="text-align: center;">Ingreso de Nuevos Productos</h3>
            <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
            <div class="form-white">
                <form id="FormRegistroProducto" method="POST" enctype="multipart/form-data">
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
                            <textarea type="text" rows="3" class="form-control" placeholder="Descripción" aria-label="apellido" aria-describedby="basic-addon1" name="registrarDescripcionProducto" id="registrarDescripcionProducto" required></textarea>
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
                            <input type="file" class="form-control" placeholder="Imagen" aria-label="titulo" aria-describedby="basic-addon1" name="registrarImagenProducto" id="registrarImagenProducto" required>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonRegistroProducto"><span class="ion-plus-round"></span> Registrar Promoción</button>
                </form>
            </div>
        </div>

    </div>
</div>
