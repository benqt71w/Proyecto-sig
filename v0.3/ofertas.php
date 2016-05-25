        <?php 
            $tituloPagina="SoldOut.com - Ofertas";
            $pagina="ofertas";
        ?>
        <?php 
            include('header.php');
         ?>
        
        <!-- AQUI VA EL SECTION PRINCIPAL-->
        <section class="main_container">
            <div class="row">
                <section class="posts col-md-9">
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
                    
                    <nav>
                        <div class="center-block">
                            <ul class="pagination">
                                <li class="disabled"><a href="#"><span class="glyphicon glyphicon-arrow-left"></span> Anterior</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#">Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></li>
                            </ul>
                        </div>
                    </nav>
                    
                </section>
            </div>
        </section>
        <!-- AQUI TERMINA EL SECTION PRINCIPAL-->
        
        
        
        
        
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