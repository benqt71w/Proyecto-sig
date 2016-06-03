        <?php 
            $tituloPagina="SoldOut.com - Ofertas";
            $pagina="ofertas";
        ?>
        <?php 
            include('header.php');
            @$pagina_actual=$_GET['pag'];
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
                        $query = 'SELECT id_producto, nombre_producto, precio_producto, unidades_producto, imagen_producto, oferta_producto, descripcion_producto FROM productos WHERE oferta_producto!="null"';
                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                        $registros=mysql_num_rows($result);
                        $articulos_por_pagina=10;
                        $cantidad_paginas=$registros/$articulos_por_pagina;
                        $cantidad_paginas=intval(ceil($cantidad_paginas));
                                                   
                        $inicio_consulta=($pagina_actual-1)*$articulos_por_pagina;

                        while($filas=mysql_fetch_array($result)) {
                            $id_producto=$filas['id_producto'];
                            $nombre_producto=$filas['nombre_producto'];
                            $precio_producto=$filas['precio_producto'];
                            $unidades_producto=$filas['unidades_producto'];
                            $imagen_producto=$filas['imagen_producto'];
                            $oferta_producto=$filas['oferta_producto'];
                            $descripcion_producto=$filas['descripcion_producto'];                       
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
                        <p>
                                <?php echo $descripcion_producto,'.';?>
                        </p>
                        <form action="" method="post">
                                <input type="text" name="<?php $cantidad=$id_producto . "cantidad"; echo $cantidad;?>" class="form-control numero-productos" placeholder="# unidades">
                                <br>
                                <div class="contenedor-botones">
                                    <button type="submit" name="<?php echo $id_producto;?>" class="btn btn-success">Agregar al Carrito <span class="glyphicon glyphicon-shopping-cart"></span></button>
                                </div>
                        </form>


                        <!--CREANDO FUNCIONALIDAD DE AGREGAR AL CARRITO-->
                            <?php
                                //CREANDO LO QUE OCURRE CUANDO OPRIMA AGREGAR AL CARRITO
                                if(isset($_POST[$id_producto])){
                                    echo "<p>HOLA MUNDO</p>";
                                    //echo $_POST[$nombre_producto];
                                    if (isset($_SESSION['usuario_activo'])){
                                        $unidades=$_POST[$cantidad];
                                        if($unidades==""){
                                            $unidades=1;
                                        }
                                        if(isset($_SESSION['carrito'])){
                                            $agregarcarrito=$_SESSION['carrito'];
                                            $agregarcarrito[]=array('id' => $id_producto,
                                                                    'nombre' => $nombre_producto,
                                                                    'unidades' => $unidades,
                                                                    'precio' => $oferta_producto,
                                                                    'imagen' => $imagen_producto);
                                            //$array = array_values($array);
                                            //$array[] = 7;
                                            $_SESSION['carrito']=$agregarcarrito;
                                            print_r($_SESSION['carrito']);
                                        }
                                        else{
                                            $agregarcarrito[]=array('id' => $id_producto,
                                                                    'nombre' => $nombre_producto,
                                                                    'unidades' => $unidades,
                                                                    'precio' => $oferta_producto,
                                                                    'imagen' => $imagen_producto);
                                            $_SESSION['carrito']=$agregarcarrito;
                                            print_r($_SESSION['carrito']);
                                        }
                                        echo "<br><div class='alert alert-success' role='alert'>¡Agregaste $unidades unidades de $nombre_producto al carrito!</div>";
                                    }
                                    else{
                                        echo "<br><div class='alert alert-danger' role='alert'>Si desea comprar, por favor, inicie sesión.</div>";
                                    }
                                }
                                

                            ?>
                        <!--TERMINA CREANDO FUNCIONALIDAD DE AGREGAR AL CARRITO-->
                    </article>
                    <?php } ?>                     
                    <!--AQUI TERMINAN LOS PRODUCTOS -->                    
                </section>
            </div>

            <!-- AQUI VAN LOS NUMEROS DE LA PAGINACION-->                   
            <nav>
                <div class="center-block">
                    <ul class="pagination">
                        <!--COMIENZA BOTON ANTERIOR -->
                        <?php
                            if(!is_numeric($pagina_actual) or $pagina_actual==1){
                                    echo '<li class="disabled"><a><span class="glyphicon glyphicon-arrow-left"></span> Anterior</a></li>';
                            }
                            else{
                                    echo '<li><a href="ofertas.php?pag=',($pagina_actual-1),'">','<span class="glyphicon glyphicon-arrow-left"></span> Anterior</a></li>';
                            } 
                            
                        ?>
                        <!--TERMINA BOTON ANTERIOR -->

                        <!-- COMIENZAN BOTONES POR PAGINAS-->
                        <?php 
                            for($i=1; $i<=$cantidad_paginas; $i++) { 

                                if ($pagina_actual==$i) {                            
                                    echo '<li class="active"><a>',$i,'</a></li>';
                                }                        
                                 else{
                                    echo '<li><a href="ofertas.php?pag=',$i,'">',$i,'</a></li>';
                                } 
                            }
                        ?>
                        <!-- TERMINAN BOTONES POR PAGINAS -->
                        
                        <!-- COMIENZA BOTON SIGUIENTE-->
                        <?php
                            if(!is_numeric($pagina_actual) or $pagina_actual==1){
                                    echo '<li class="disabled"><a><span class="glyphicon glyphicon-arrow-right"></span> Anterior</a></li>';
                            }
                            else{
                                    echo '<li><a href="ofertas.php?pag=',($pagina_actual-1),'">','Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></li>';
                            } 
                            
                        ?>
                        <!-- TERMINA BOTON SIGUIENTE -->
                    </ul>
                </div>
            </nav>
        </section>
        <!-- AQUI TERMINA EL SECTION PRINCIPAL-->    
        
        <!-- AQUI VAN LOS NUMEROS DE LA PAGINACION-->                    
         <!--           <nav>
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
                    </nav>-->
        
        
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