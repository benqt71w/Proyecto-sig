        <?php 
            $tituloPagina="SoldOut.com - Productos";
            $pagina="";
        ?>
        <?php 
            include('header.php');
            @$categoria_actual=$_GET['cat'];
            @$pagina_actual=$_GET['pag'];
            @$subcategoria_actual=$_GET['subcat'];

            //HACIENDO PRUEBA
            // Crear un array simple.
            /*$array = array(1, 2, 3, 4, 5);
            print_r($array);
            $_SESSION['carrito']=$array;*/
         ?>     
        <!-- AQUI VA EL SECTION PRINCIPAL-->
        <section class="main_container">
            <div class="row">
                <section class="posts col-md-9">

                    <!--BOTONES SUBCATEGORIAS-->
                    <div class="post text-center">
                        <nav>
                            <div class="center-block">
                                <ul class="pagination">
                                    <?php
                                        $query = "select distinct subcategoria_producto from productos where categoria_producto='$categoria_actual'";
                                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                        while($filas=mysql_fetch_array($result)) {
                                            $subcategoria_producto=$filas['subcategoria_producto'];
                                            if($subcategoria_producto==$subcategoria_actual){                                            
                                                echo '<li class="active"><a>',$subcategoria_producto,'</a></li>','   ';
                                            }else{
                                                echo '<li> <a href="productos.php?pag=1&cat=',$categoria_actual,'&subcat=',$subcategoria_producto,'">',$subcategoria_producto,'</a></li>','   ';
                                            }
                                        }                                                                              
                                    ?>
                                </ul>
                            </div>
                        </nav>
                        <?php
                            if(!is_null($subcategoria_actual)){
                                echo '<h2> Pagina: ',$pagina_actual,' /Categoria: ',$categoria_actual,' /Subcategoria: ',$subcategoria_actual,'</h2>';
                            }
                            elseif(!is_null($categoria_actual)){
                                echo '<h2> Pagina: ',$pagina_actual,' /Categoria: ',$categoria_actual,'</h2>';
                            }
                            else{
                                echo '<h2> Pagina: ',$pagina_actual,'</h2>';
                            }
                         ?>
                    </div>
                    <!-- TERMINA BOTONES SUBCATEGORIAS-->
                    

                        <?php
                        //AQUI SE HIZO LA PAGINACION DE LOS PRODUCTOS
                        if (!is_null($subcategoria_actual)) {
                            $query = "SELECT id_producto,nombre_producto,precio_producto,unidades_producto,imagen_producto FROM productos WHERE categoria_producto='$categoria_actual' AND subcategoria_producto='$subcategoria_actual' ORDER BY nombre_producto";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                        }
                        elseif(is_null($subcategoria_actual) and !is_null($categoria_actual)){
                            $query = "SELECT id_producto,nombre_producto,precio_producto,unidades_producto,imagen_producto FROM productos WHERE categoria_producto='$categoria_actual' ORDER BY nombre_producto";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                        }
                        elseif(is_null($categoria_actual)){
                            $query = "SELECT id_producto,nombre_producto,precio_producto,unidades_producto,imagen_producto FROM productos ORDER BY nombre_producto";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                        }

                        $registros=mysql_num_rows($result);
                        $articulos_por_pagina=10;
                        $cantidad_paginas=$registros/$articulos_por_pagina;
                        $cantidad_paginas=intval(ceil($cantidad_paginas));
                                                   
                        $inicio_consulta=($pagina_actual-1)*$articulos_por_pagina;                            
                        
                        if (!is_null($subcategoria_actual)) {
                            $query = "SELECT id_producto,nombre_producto,precio_producto,unidades_producto,descripcion_producto,imagen_producto FROM productos WHERE categoria_producto='$categoria_actual' AND subcategoria_producto='$subcategoria_actual' ORDER BY nombre_producto LIMIT $inicio_consulta,$articulos_por_pagina";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                        }
                        elseif(is_null($subcategoria_actual) and !is_null($categoria_actual)){
                            $query = "SELECT id_producto,nombre_producto,precio_producto,unidades_producto,descripcion_producto,imagen_producto FROM productos WHERE categoria_producto='$categoria_actual' ORDER BY nombre_producto LIMIT $inicio_consulta,$articulos_por_pagina";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                        }
                        elseif(is_null($categoria_actual)){
                            $query = "SELECT id_producto,nombre_producto,precio_producto,unidades_producto,descripcion_producto,imagen_producto FROM productos ORDER BY nombre_producto LIMIT $inicio_consulta,$articulos_por_pagina";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                        }
                        //FIN CREADO DE PAGINACION


                        //AQUI COMIENZAN A MOSTRARSE LOS PRODUCTOS
                        while($filas=mysql_fetch_array($result)) {
                            $id_producto=$filas['id_producto'];
                            $nombre_producto=$filas['nombre_producto'];
                            $precio_producto=$filas['precio_producto'];
                            $unidades_producto=$filas['unidades_producto'];
                            $imagen_producto=$filas['imagen_producto']; 
                            $descripcion_producto=$filas['descripcion_producto'];
                            //$_POST[$id_producto]=$nombre_producto;                      
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
                            <p>
                                <?php echo $descripcion_producto,'.';?>
                            </p>
                            <form action="" method="post">
                                <input type="text" name="<?php echo $id_producto;?>" class="form-control numero-productos" placeholder="# unidades">
                                <br>
                                <div class="contenedor-botones">
                                    <button type="submit" name="<?php echo $nombre_producto;?>" class="btn btn-success">Agregar al Carrito <span class="glyphicon glyphicon-shopping-cart"></span></button>
                                </div>
                            </form>

                            <!--CREANDO FUNCIONALIDAD DE AGREGAR AL CARRITO-->
                            <?php
                                //CREANDO LO QUE OCURRE CUANDO OPRIMA AGREGAR AL CARRITO
                                if(isset($_POST[$nombre_producto])){
                                    //echo $_POST[$nombre_producto];
                                    if (isset($_SESSION['usuario_activo'])){
                                        $unidades=$_POST[$id_producto];
                                        if($unidades==""){
                                            $unidades=1;
                                        }
                                        if(isset($_SESSION['carrito'])){
                                            $agregarcarrito=$_SESSION['carrito'];
                                            $agregarcarrito[]=array('id' => $id_producto,
                                                                    'nombre' => $nombre_producto,
                                                                    'unidades' => $unidades,
                                                                    'precio' => $precio_producto,
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
                                                                    'precio' => $precio_producto,
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

                        </article>


                    
                    <?php }
                     ?>

                    </article>                                           
                    <!-- AQUI TERMINAN LOS ARTICULOS-->
                </section>


                <!-- AQUI VA EL MENU LATERAL-->
                <aside class="col-med-3 hidden-xs hidden-sm menu-lateral">
                    <h4>Categorias</h4>
                    <div class="list-group">
                        <?php 
                            if(is_null($categoria_actual)){                                            
                                    echo '<a class="list-group-item active">Todos los Productos</a>';
                                }else{
                                    echo '<a href="productos.php?pag=1" class="list-group-item">Todos los Productos</a>';
                                }
                         ?>
                        
                        <?php
                            $query = 'select distinct categoria_producto from productos';
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                            while($filas=mysql_fetch_array($result)) {
                                $categoria_producto=$filas['categoria_producto'];
                                if($categoria_producto==$categoria_actual){                                            
                                    echo '<a class="list-group-item active">',$categoria_producto,'</a>','   ';
                                }else{
                                    echo '<a href="productos.php?pag=1&cat=',$categoria_producto,'" class="list-group-item">',$categoria_producto,'</a>','   ';
                                }
                            }                                                                              
                                                                
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
                        <!--COMIENZA BOTON ANTERIOR -->
                        <?php
                            if (!is_null($subcategoria_actual)) {
                                if(!is_numeric($pagina_actual) or $pagina_actual==1){
                                    echo '<li class="disabled"><a><span class="glyphicon glyphicon-arrow-left"></span> Anterior</a></li>';
                                }
                                else{
                                    echo '<li><a href="productos.php?pag=',($pagina_actual-1),'&cat=',$categoria_actual,'&subcat=',$subcategoria_actual,'">','<span class="glyphicon glyphicon-arrow-left"></span> Anterior</a></li>';
                                } 
                            }
                            elseif(is_null($subcategoria_actual) and !is_null($categoria_actual)){
                                if(!is_numeric($pagina_actual) or $pagina_actual==1){
                                    echo '<li class="disabled"><a><span class="glyphicon glyphicon-arrow-left"></span> Anterior</a></li>';
                                }
                                else{
                                    echo '<li><a href="productos.php?pag=',($pagina_actual-1),'&cat=',$categoria_actual,'">','<span class="glyphicon glyphicon-arrow-left"></span> Anterior</a></li>';
                                } 
                            }
                            elseif(is_null($categoria_actual)){
                                if(!is_numeric($pagina_actual) or $pagina_actual==1){
                                    echo '<li class="disabled"><a><span class="glyphicon glyphicon-arrow-left"></span> Anterior</a></li>';
                                }
                                else{
                                    echo '<li><a href="productos.php?pag=',($pagina_actual-1),'">','<span class="glyphicon glyphicon-arrow-left"></span> Anterior</a></li>';
                                } 
                            }
                        ?>
                        <!--TERMINA BOTON ANTERIOR -->

                        <!-- COMIENZAN BOTONES POR PAGINAS-->
                        <?php 
                            if (!is_null($subcategoria_actual)) {
                                for($i=1; $i<=$cantidad_paginas; $i++) { 

                                    if (is_numeric($pagina_actual) and $pagina_actual==$i) {                            
                                        echo '<li class="active"><a href="productos.php?pag=',$i,'&cat=',$categoria_actual,'&subcat=',$subcategoria_actual,'">',$i,'</a></li>';
                                    }                        
                                    else{
                                        echo '<li><a href="productos.php?pag=',$i,'&cat=',$categoria_actual,'&subcat=',$subcategoria_actual,'">',$i,'</a></li>';
                                    } 
                                }
                            }
                            elseif(is_null($subcategoria_actual) and !is_null($categoria_actual)){
                                for($i=1; $i<=$cantidad_paginas; $i++) { 

                                    if (is_numeric($pagina_actual) and $pagina_actual==$i) {                            
                                        echo '<li class="active"><a href="productos.php?pag=',$i,'&cat=',$categoria_actual,'">',$i,'</a></li>';
                                    }                        
                                    else{
                                        echo '<li><a href="productos.php?pag=',$i,'&cat=',$categoria_actual,'">',$i,'</a></li>';
                                    } 
                                }
                            }
                            elseif(is_null($categoria_actual)){
                                for($i=1; $i<=$cantidad_paginas; $i++) { 

                                    if (is_numeric($pagina_actual) and $pagina_actual==$i) {                            
                                        echo '<li class="active"><a href="productos.php?pag=',$i,'">',$i,'</a></li>';
                                    }                        
                                    else{
                                        echo '<li><a href="productos.php?pag=',$i,'">',$i,'</a></li>';
                                    } 
                                }
                            }
                        ?>
                        <!-- TERMINAN BOTONES POR PAGINAS -->
                        
                        <!-- COMIENZA BOTON SIGUIENTE-->
                        <?php
                            if (!is_null($subcategoria_actual)) {
                                if(!is_numeric($pagina_actual) or $pagina_actual==$cantidad_paginas){
                                    echo '<li class="disabled"><a>Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></li>';
                                }
                                else{
                                    echo '<li><a href="productos.php?pag=',($pagina_actual+1),'&cat=',$categoria_actual,'&subcat=',$subcategoria_actual,'">',' Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></li>';
                                } 
                            }
                            elseif(is_null($subcategoria_actual) and !is_null($categoria_actual)){
                                if(!is_numeric($pagina_actual) or $pagina_actual==$cantidad_paginas){
                                    echo '<li class="disabled"><a>Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></li>';
                                }
                                else{
                                    echo '<li><a href="productos.php?pag=',($pagina_actual+1),'&cat=',$categoria_actual,'">',' Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></li>';
                                } 
                            }
                            elseif(is_null($categoria_actual)){
                                if(!is_numeric($pagina_actual) or $pagina_actual==$cantidad_paginas){
                                    echo '<li class="disabled"><a>Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></li>';
                                }
                                else{
                                    echo '<li><a href="productos.php?pag=',($pagina_actual+1),'">',' Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></li>';
                                } 
                            }
                        ?>
                        <!-- TERMINA BOTON SIGUIENTE -->
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