        <?php 
            $tituloPagina="SoldOut.com - Productos";
        ?>
        <?php 
            include('header.php');
         ?>
        
        <!-- AQUI VA EL SECTION PRINCIPAL-->
        <section class="main_container">
            <div class="row">
                <section class="posts col-md-9">

                    <!--BOTONES SUBCATEGORIAS-->
                    <div class="post text-center">                        
                            <button type="button" class="btn btn-primary">SUBCATEGORIA 1</button>                       
                    </div>
                    <!-- TERMINA BOTONES SUBCATEGORIAS-->
                    
                    <!--AQUI COMIENZAN LOS ARTICULOS-->
                    <article class="post clearfix">
                        <a href="#" class="thumb pull-left">
                            <img class="img-thumbnail" src="imagenes/ejemplo.jpg" alt="">
                        </a>
                        <h2 class="post-title">
                            <a href="#">
                                Producto 1
                            </a>
                        </h2>
                        <p class="post-contenido text-justify">
                            Contenido del producto
                        </p>
                        <div class="contenedor-botones">
                            <a href="#" class="btn btn-primary">Ver Producto</a>
                            <a href="#" class="btn btn-success">Agregar al Carrito <span class="glyphicon glyphicon-shopping-cart"></span></a>
                        </div>
                    </article>
                    <!-- AQUI TERMINAN LOS ARTICULOS-->
                </section>


                <!-- AQUI VA EL MENU LATERAL-->
                <aside class="col-med-3 hidden-xs hidden-sm menu-lateral">
                    <h4>Categorias</h4>
                    <div class="list-group">
                        <a href="#" class="list-group-item active"> Categoria #1</a>                      
                    </div>
                </aside>
                <!-- AQUI TERMINA EL MENU LATERAL -->

            </div>
        </section> 
        <!-- AQUI TERMINA EL MAIN_CONTAINER -->

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
        </footer>   <!-- TERMINA FOOTER -->
        
        
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>