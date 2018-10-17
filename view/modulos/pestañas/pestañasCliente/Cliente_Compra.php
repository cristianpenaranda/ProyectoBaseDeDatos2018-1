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
        
        <!--LISTA DE PRODUCTOS--> 
        <div class="col-md-8 mt-5 mb-5">
            <article id="article1">
                    <h3 class="text-right-xs" style="text-align: center;">Productos</h3>
                    <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" title="Productos de Panadería" class="mt-3 btn btn-block btn-color btn-xxl" id="botonCompraPanaderia">Panadería</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" title="Productos de Repostería" class="mt-3 btn btn-block btn-color btn-xxl" id="botonCompraReposteria">Repostería</button>
                        </div>
                    </div>
                    <section id="articulosCompra" class="form-white mt-3" style="overflow:scroll;height:500px;border: 1px solid  rgba(83,44,26,.95);box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                        <ul id="CampoDeCompra">
                            
                        </ul>
                    </section>
            </article>
        </div>
        
        <!--CARRITO DE COMPRAS--> 
        <div class="col-md-4 mt-5 mb-5">
            <article id="article1">
                <div class="col-md-12">
                    <h3 class="text-right-xs" style="text-align: center;">Carrito de Compras</h3>
                    <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                    <img src="http://www.freepngimg.com/download/cart/10-2-cart-png-pic.png" style="width:50%;display:block;margin:auto;">
                    <section id="CarritoDeCompras" class="form-white mb-2" style="overflow:scroll;height:350px;border: 1px solid  rgba(83,44,26,.95);box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                        
                    </section>
                    <button type="submit" title="Realizar Compra" class="btn btn-block btn-color btn-xxl" id="botonRealizarCompra" style="width: 100%;">Realizar Compra</button>
                </div>
            </article>
        </div>
        
        
    </div>
</div>