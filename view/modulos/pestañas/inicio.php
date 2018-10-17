<?php
if (isset($_SESSION["Usuario"])) {
    header("Location:Perfil");
}
?>
<div class="container">
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" data-interval="3000"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1" data-interval="3000"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2" data-interval="3000"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('https://drive.google.com/uc?export=view&id=1A4h9fnHbSfWfmoVJWEZ07XFNIKstDQQx')">
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('https://drive.google.com/uc?export=view&id=1cmdqAwoE6b29GrS9vreTOKyJWOXZcLts')">
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('https://drive.google.com/uc?export=view&id=1bKVpEo2VDf6fYtPI2QtuMM6ThYZ0WYaf')">
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </header>

    <div class="container">

        <h1 class="my-4" style="text-align: center;"> ¡La Viña del Pan! </h1>
        <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
        <br>
        <div class="row">            
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100"><img class="card-img-top" src="https://drive.google.com/uc?export=view&id=1uJCjzj_togrY9qZEmpBisa7w__3fVhQR" alt="">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;">Misión</h4>
                        <p class="card-text" style="text-align: justify;">Somos una empresa nortesantandereana que se dedica a la elaboración y comercialización de productos de panadería y pastelería, cumpliendo con los estándares de calidad y siendo fieles a la tradición del pan cucuteño, nuestros productos tienen el único objetivo de seducir a nuestros clientes a través del inigualable sabor que estos tienen.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100"><img class="card-img-top" src="https://drive.google.com/uc?export=view&id=1Nwn6cxE1EDVKyJ9NZg4GoYhKR6VYccn5" alt="">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;">¿Quienes Somos?</h4>
                        <p class="card-text" style="text-align: justify;">Somos una empresa de panadería y repostería, que desde hace 5 años se dedica a comercializar este tipo de productos en la ciudad de Cúcuta, garantizar la calidad de nuestros productos, destacándonos en la excelente atención y el exquisito sabor. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100"><img class="card-img-top" src="https://drive.google.com/uc?export=view&id=1zLe0MfNECB4GOI4_DW5WFHv9mNPK15vh" alt="">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;">Visión</h4>
                        <p class="card-text" style="text-align: justify;">Ser una empresa líder en la ciudad en lo que compete al área de panaderías y pastelerías, ofreciendo una gran variedad de productos de exquisito sabor, además de una atención al cliente del mayor nivel, garantizando así mismo cumplir con los estándares de calidad y apoyar el desarrollo sostenible de la región.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h2 style="text-align:center;">¡ Promociones !</h2>
                <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
                <ul id="ListaPromociones" class="list-group" style="overflow:scroll;height:350px;">
                    <!--LISTADO DE LAS PROMOCIONES-->
                </ul>
            </div>
            <div class="col-lg-6">
                <a href="Cuenta">
                    <img class="img-fluid rounded" src="https://drive.google.com/uc?export=view&id=1hhhHxXfA96ytXwVnMHeN2n6kTOzmXXKg" title="Regístrate AQUI"></a>
                <br><br>
                <a href="Contacto"><img class="img-fluid rounded" src="https://drive.google.com/uc?export=view&id=1wjyOcxkZiRYaTFXBZ5D133jTu0bcw9sL" title="Haz Click AQUI" id="anuncioOpinion"></a>
            </div><br>
        </div>
        <br><br>

    </div>
    <!-- /.container -->
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalPrincipal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 1%;">
            <div class="modalImg">
                <img src="https://letrujil.files.wordpress.com/2017/07/cropped-publicacic3b3n1.jpg?w=300&h=300" title="UFPS">
                <img src="https://drive.google.com/uc?export=view&id=1EFjieBXuFfhTMtWJmI8H0hCXhYFMy_lv" title="Panadería y Repostería La Viña del Pan">
                <img src="http://cawi.ufps.edu.co/public/img/ing_sistemas_ufps.png" title="Ing Sistemas">
            </div>
            <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
            <div>
                <h3 style="text-align: center;">Proyecto Base de Datos 2018-1</h3>
                <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
            </div>
            <button type="button" class="btn btn-secondary mt-2 mb-3" data-dismiss="modal" style="display:block;margin:auto;width:30%;"><span class="ion-close-round"></span> Cerrar</button></div>
    </div>
</div>