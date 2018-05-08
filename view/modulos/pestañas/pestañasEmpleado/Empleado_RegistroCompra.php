<?php

if (isset($_SESSION["Usuario"])) {
    $user = unserialize($_SESSION['Usuario']);
}echo '
        <div class="container">
            <div class="row">       

                <div class="col-md-4 mt-5">
                    <div class="card">
                        <h5 style="text-align:center;">Empleado</h5>
                        <hr>
                        <img src="https://drive.google.com/uc?export=view&id=1VAVdqLOT3aPd8XqyhcBVkV9TVa3n3A-z" alt="" class="img-rounded img-responsive mb-3" style="width:30%;display:block;margin:auto;" />
                        <h5 style="text-align:center;">'.$user->getNombre().' '.$user->getApellido().'</h5>
                    </div>
                </div>
                <!--REGISTRO DE VENTAS DEL EMPLEADO--> 
                <div class="col-md-8 mt-5 mb-5">
                    <article id="article1">
                        <div class="col-md-12">
                            <h3 class="text-right-xs" style="text-align: center;">Registro de Ventas</h3>
                            <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                            <form id="FormRegistroVenta" method="POST" class="col-md-6" style="display:block;margin:auto;">
                                <div class="form-group">
                                    <label for="cedula">Cédula del Cliente</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text ion-person" for="RegistroVentaCliente"></span>
                                        </div>
                                        <input type="text" maxlength="11" class="form-control" id="RegistroVentaCliente" name="RegistroVentaCliente" placeholder="Cédula" aria-label="cedula" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cedula">Valor de la Compra</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text ion-social-usd" for="RegistroVentaValor"></span>
                                        </div>
                                        <input type="number" class="form-control" id="RegistroVentaValor" name="RegistroVentaValor" placeholder="Valor" aria-label="cedula" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-color btn-xxl" id="botonRegistroVenta"> Registrar Venta</button>
                            </form>
                        </div>
                    </article>
                </div>

            </div>
        </div>';
?>