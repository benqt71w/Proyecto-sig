        <?php 
            $tituloPagina="SoldOut.com - Productos";
            $pagina="";
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
                        <?php
                        $query = 'select distinct subcategoria_producto from productos';
                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                        while($filas=mysql_fetch_array($result)) {
                            $subcategoria_producto=$filas['subcategoria_producto'];
                            echo '<button type="button" class="btn btn-primary">',$subcategoria_producto,'</button>','   ';
                        }                        
                        ?>
                    </div>
                    <!-- TERMINA BOTONES SUBCATEGORIAS-->
                    
                    <!--AQUI COMIENZAN LOS ARTICULOS-->
                    <!--<div id="paginador">-->
                    

                        <?php
                        //CREANDO PAGINACION
                        $query = "SELECT id_producto,nombre_producto,precio_producto,unidades_producto,imagen_producto FROM productos ORDER BY nombre_producto";
                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                        $registros=mysql_num_rows($result);
                        $articulos_por_pagina=10;
                        $cantidad_paginas=$registros/$articulos_por_pagina;
                        $cantidad_paginas=round($cantidad_paginas);
                        @$pagina_actual=$_GET['pag'];
                        if (is_numeric($pagina_actual)) {                            
                            $inicio_consulta=($pagina_actual-1)*$articulos_por_pagina;                            
                        }
                        else{
                            $inicio_consulta=0;
                        }
                        $query = "SELECT id_producto,nombre_producto,precio_producto,unidades_producto,imagen_producto FROM productos ORDER BY nombre_producto LIMIT $inicio_consulta,$articulos_por_pagina";
                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                        //FIN CREADO DE PAGINACION                      

                        while($filas=mysql_fetch_array($result)) {
                            $id_producto=$filas['id_producto'];
                            $nombre_producto=$filas['nombre_producto'];
                            $precio_producto=$filas['precio_producto'];
                            $unidades_producto=$filas['unidades_producto'];
                            $imagen_producto=$filas['imagen_producto'];                       
                        ?>
                        <article class="post clearfix" id="example" class="table table-striped table-bordered">
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
                    <!--</div>-->                 
                    <!-- AQUI TERMINAN LOS ARTICULOS-->
                </section>


                <!-- AQUI VA EL MENU LATERAL-->
                <aside class="col-med-3 hidden-xs hidden-sm menu-lateral">
                    <h4>Categorias</h4>
                    <div class="list-group">
                        <?php
                        $query = 'select distinct categoria_producto from productos';
                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());                        
                        while($filas=mysql_fetch_array($result)) {
                            $categoria_producto=$filas['categoria_producto'];
                            echo '<a href="#" class="list-group-item">',$categoria_producto,'</a>','   ';
                        }                        
                        ?>                      
                    </div>
                </aside>
                <!-- AQUI TERMINA EL MENU LATERAL -->

            </div>

             <!-- AQUI VAN LOS NUMEROS DE LA PAGINACION-->                   
            <nav>
                <div class="center-block">
                    <ul class="pagination">
                        <?php
                        if(!is_numeric($pagina_actual) or $pagina_actual==1){
                            echo '<li class="disabled"><a href="#"><span class="glyphicon glyphicon-arrow-left"></span> Anterior</a></li>';
                        }
                        else{
                            echo '<li><a href="productos.php?pag=',($pagina_actual-1),'"><span class="glyphicon glyphicon-arrow-left"></span> Anterior</a></li>';                          
                        }
                        ?>
                        <?php for($i=1; $i<=$cantidad_paginas; $i++) { 

                            if (is_numeric($pagina_actual) and $pagina_actual==$i) {                            
                                echo '<li class="active"><a href="productos.php?pag=',$i,'">',$i,'</a></li>';
                            }                        
                            else{
                                echo '<li><a href="productos.php?pag=',$i,'">',$i,'</a></li>';
                            } 
                        } ?>
                        <?php
                        if(!is_numeric($pagina_actual) or $pagina_actual==$cantidad_paginas){
                            echo '<li class="disabled"><a href="#"> Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></li>';
                        }
                        else{
                            echo '<li><a href="productos.php?pag=',($pagina_actual+1),'">Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></li>';                            
                        }                        
                        ?>
                    </ul>
                </div>
            </nav>

            <!-- AQUI TERMINAN LOS NUMEROS DE LA PAGINACION-->

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
        <script>
            $(document).ready(function(){
                $("#paginador").jPaginate();
            });
        </script>
        <script type="text/javascript" src="http://c.fzilla.com/1286136086-jquery.js">            
        </script>
        <script type="text/javascript" src="http://c.fzilla.com/1291523190-jpaginate.js">            
        </script>       
    </body>
</html>