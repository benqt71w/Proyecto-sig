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

                    <!--AQUI COMIENZAN LOS PRODUCTOS-->
                    <article class="post clearfix">
                        <h1 class="post-title"> PRODUCTOS EN OFERTA</h1>
                    </article>
                    <?php
                        $query = 'SELECT id_producto,nombre_producto,precio_producto,unidades_producto,imagen_producto,oferta_producto FROM productos WHERE oferta_producto!="null"';
                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                        while($filas=mysql_fetch_array($result)) {
                            $id_producto=$filas['id_producto'];
                            $nombre_producto=$filas['nombre_producto'];
                            $precio_producto=$filas['precio_producto'];
                            $unidades_producto=$filas['unidades_producto'];
                            $imagen_producto=$filas['imagen_producto'];
                            $oferta_producto=$filas['oferta_producto'];                       
                    ?>
                    <article class="post clearfix">
                        <a href="#" class="thumb pull-left">
                            <img class="img-thumbnail" src="<?php echo $imagen_producto; ?>" alt="">
                        </a>
                        <h2 class="post-title">
                            <a href="#">
                                <?php echo $nombre_producto; ?>
                            </a>
                        </h2>
                        <p class="post-contenido text-justify">
                            <span class="glyphicon glyphicon-usd"></span><?php echo ' ',$precio_producto,' COP'; ?>
                        </p>
                        <p class="post-contenido text-justify">
                            <?php echo 'PRODUCTO EN DESCUENTO POR SOLO:  ','<span class="glyphicon glyphicon-usd"></span>',$oferta_producto,' COP'; ?>
                        </p>
                        <p class="post-contenido text-justify">                        
                            <?php echo 'Unidades disponibles: ', $unidades_producto; ?>
                        </p>
                        <input type="text" class="form-control numero-productos" placeholder="# unidades">
                        <br>
                        <div class="contenedor-botones">
                            <a href="#" class="btn btn-primary">Ver Producto</a>                            
                            <a href="#" class="btn btn-success">Agregar al Carrito <span class="glyphicon glyphicon-shopping-cart"></span></a>
                        </div>
                    </article>
                    <?php } ?> 
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
                    <!--AQUI TERMINAN LOS PRODUCTOS -->
                    
                    

                    <!-- AQUI VAN LOS NUMEROS DE LA PAGINACION-->                    
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