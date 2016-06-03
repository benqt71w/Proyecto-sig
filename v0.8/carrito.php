        <?php 
            $tituloPagina="SoldOut.com - Carrito de compras";
            $pagina="carrito";
        ?>
        <?php 
            include('header.php');
         ?>
        
        
        <!-- AQUI VA EL SECTION PRINCIPAL-->
        <section class="main_container">
            <div class="row">
                <section class="posts col-md-9">
                <?php 
                    if(isset($_SESSION['carrito'])){
                        $datos=$_SESSION['carrito'];
                        $total=0;
                        for ($i=0; $i < count($datos); $i++) { 
                            
                        
                 ?>

                            <article class="post clearfix">
                                <a href="#" class="thumb pull-left">
                                    <img class="img-thumbnail" src="<?php echo $datos[$i]['imagen'];?>" alt="">
                                </a>
                                <h2 class="post-title">
                                    <a href="#">
                                        <?php echo $datos[$i]['nombre'];?>
                                    </a>
                                </h2>
                                <p class="post-contenido text-justify">
                                   Unidades: <?php echo $datos[$i]['unidades'];?>
                                </p>
                                <p class="post-contenido text-justify">
                                   Precio de todas las unidades: <?php echo $datos[$i]['precio']*$datos[$i]['unidades'];?>
                                </p>
                                <form action="" method="post">
                                    <div class="contenedor-botones">
                                        <button type="submit" name="<?php echo $datos[$i]['id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Quitar del carrito</button>
                                    </div>
                                </form>

                                    <!--CREANDO FUNCIONALIDAD DE AGREGAR AL CARRITO-->
                                <?php
                                    //CREANDO LO QUE OCURRE CUANDO OPRIMA QUITAR DEL CARRITO
                                    if(isset($_POST[$datos[$i]['id']])){
                                        unset($datos[$i]);
                                        $datos=array_values($datos);
                                        print_r($datos);
                                        if(count($datos)==0){
                                            unset($_SESSION['carrito']);
                                        }
                                        else{
                                            $_SESSION['carrito']=$datos;
                                        }
                                        echo '<script language="javascript">window.location="carrito.php"</script>';//recargar una pagina
                                    }
                                    

                                ?>
                                <!--TERMINA CREANDO FUNCIONALIDAD DE QUITAR DEL CARRITO-->

                            </article>
                                    <?php $total=($datos[$i]['precio']*$datos[$i]['unidades'])+$total;?>

                    <?php
                        }//termina for donde se crean los articulos del carrito
                    ?>
                    <article class="post clearfix">                        
                        <h2 class="post-title">
                            Total: <span class="glyphicon glyphicon-usd"></span><?php echo $total;?> COP
                        </h2>
                        <div class="contenedor-botones">
                            <form action="" method="post">
                                <button type="submit" name="comprar" class="btn btn-success">¡Comprar articulos!</button>
                                <a href="productos.php?pag=1" class="btn btn-primary">Volver al catalogo</a>
                            </form>

                            <!-- CREANDO FUNCIONALIDAD COMPRAR ARTICULOS -->
                            <?php 
                                if(isset($_POST['comprar'])){
                                    $activo=$_SESSION['usuario_activo'];
                                    $query= "SELECT id_usuario FROM usuarios WHERE cuenta_usuario='$activo'";
                                    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                    while($filas=mysql_fetch_array($result)) {
                                        $id_usuario=$filas['id_usuario'];
                                    }
                                    echo $id_usuario;
                                    for ($i=0; $i < count($datos); $i++) {
                                        $cantidad=$datos[$i]['unidades'];
                                        $producto=$datos[$i]['id'];
                                        date_default_timezone_set('America/Bogota');
                                        $fecha=date('Y-m-d');

                                        //GUARDANDO LAS COMPRAS QUE SE HICIERON EN LA BASE DE DATOS, TABLA=COMPRAS
                                        $query= "INSERT INTO `compra`(`cantidad`, `fk_id_usuario`, `fk_id_producto`,`fecha`) VALUES ($cantidad,$id_usuario,$producto,'$fecha')";
                                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                                        //DESCONTANDO UNIDADES EN BODEGA DE PRODUCTOS

                                        $query= "SELECT unidades_producto FROM productos WHERE id_producto='$producto'";
                                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                        while($filas=mysql_fetch_array($result)) {
                                            $bodega=$filas['unidades_producto'];
                                        }
                                        
                                        $bodega=$bodega-$cantidad;// DESCONTANDO UNIDADES EN LA BASE DE DATOS
                                        $query= "UPDATE `productos` SET `unidades_producto`=$bodega WHERE id_producto=$producto";
                                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                                    }
                                    unset($_SESSION['carrito']);
                                    echo '<script language="javascript">window.location="carrito.php"</script>';//recargar una pagina
                                }
                            ?>

                        </div>
                    </article>               
                <?php
                    }//termina if para existencia de carrito
                    else{                       
                 ?>
                        <article class="post clearfix">                        
                        <h2 class="post-title">
                            Aun no hay productos dentro del carrito.
                        </h2>
                        <div class="contenedor-botones">
                            <a href="productos.php?pag=1" class="btn btn-primary">Volver al catalogo</a>
                        </div>
                    </article>  
                <?php
                    }
                ?>
                </section>                
            </div>
        </section>
        
        
        
        
        
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
        
        
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>