<?php
    if(isset($_SESSION["Usuario"])){
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
                <div class="card h-100"><img class="card-img-top" src="http://placehold.it/700x400" alt="">
                  <div class="card-body">
                    <h4 class="card-title">¿Quienes Somos?</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100"><img class="card-img-top" src="http://placehold.it/700x400" alt="">
                  <div class="card-body">
                    <h4 class="card-title">Misión</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100"><img class="card-img-top" src="http://placehold.it/700x400" alt="">
                  <div class="card-body">
                    <h4 class="card-title">Visión</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
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
          </div>
        </div>
      </div>