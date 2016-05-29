       <?php 
            $tituloPagina="SoldOut.com - Inicio";
            $pagina="inicio";
        ?>
       <?php 
            include('header.php');
        ?>

       <!--SECTION PRINCIPAL-->
       <div class="container">
            <!-- AQUI VA EL BANNER-->
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="imagenes/ejemplo.jpg" alt="BANNER1">
                  <div class="carousel-caption">
                    <!--aqui va el texto que se muestra sobre la imagen-->
                  </div>
                </div>
                <div class="item">
                  <img src="imagenes/ejemplo.jpg" alt="BANNER2">
                  <div class="carousel-caption">
                    <!--aqui va el texto que se muestra sobre la imagen-->
                  </div>
                </div>
                
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <!-- AQUI TERMINA EL BANNER-->



            <div class="row post">
                <!-- AQUI EMPIEZAN LAS CATEGORIAS-->
                <div class="col-sm-6 col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-thumbnail img-responsive" src="imagenes/categorias/mercado.jpg" alt="">
                        <div class="caption">
                            <h3>Mercado</h3>        
                            <p><a href="#" class="btn btn-success" role="button">Ver más</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-thumbnail img-responsive" src="imagenes/categorias/deporte.png" alt="">
                        <div class="caption">
                            <h3>Deporte</h3>        
                            <p><a href="#" class="btn btn-success" role="button">Ver más</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-thumbnail img-responsive" src="imagenes/categorias/juguetes.jpg" alt="">
                        <div class="caption">
                            <h3>Juguetes</h3>        
                            <p><a href="#" class="btn btn-success" role="button">Ver más</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-thumbnail img-responsive" src="imagenes/categorias/electrodomesticos.jpg" alt="">
                        <div class="caption">
                            <h3>Electrodomésticos</h3>        
                            <p><a href="#" class="btn btn-success" role="button">Ver más</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-thumbnail img-responsive" src="imagenes/categorias/muebles.jpg" alt="">
                        <div class="caption">
                            <h3>Muebles</h3>        
                            <p><a href="#" class="btn btn-success" role="button">Ver más</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-thumbnail img-responsive" src="imagenes/categorias/ferreteria.jpg" alt="">
                        <div class="caption">
                            <h3>Ferreteria</h3>        
                            <p><a href="#" class="btn btn-success" role="button">Ver más</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-thumbnail img-responsive" src="imagenes/categorias/educacion.jpg" alt="">
                        <div class="caption">
                            <h3>Educacion</h3>        
                            <p><a href="#" class="btn btn-success" role="button">Ver más</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-thumbnail img-responsive" src="imagenes/categorias/musica.jpg" alt="">
                        <div class="caption">
                            <h3>Musica</h3>        
                            <p><a href="#" class="btn btn-success" role="button">Ver más</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-thumbnail img-responsive" src="imagenes/categorias/peliculasyseries.jpg" alt="">
                        <div class="caption">
                            <h3>Peliculas y Series</h3>        
                            <p><a href="#" class="btn btn-success" role="button">Ver más</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-thumbnail img-responsive" src="imagenes/categorias/ropa.jpg" alt="">
                        <div class="caption">
                            <h3>Ropa</h3>        
                            <p><a href="#" class="btn btn-success" role="button">Ver más</a></p>
                        </div>
                    </div>
                </div>

                
                <!--AQUI TERMINAN LAS CATEGORIAS-->

            </div>          
       </div>
       <!--AQUI TERMINA SECTION PRINCIPAL-->
        
        <!-- AQUI VA EL FOOTER-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-xs-9">
                        <p class="texto-footer">
                            Desarrollado por: Jorge Luis Goyeneche Mora y Carlos Alberto Vacca Diaz
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- AQUI TERMINA EL FOOTER-->
        
        
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>