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
                                <div class="contenedor-botones">
                                    <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Quitar del Carrito</a>
                                </div>
                            </article>
                                    <?php $total=($datos[$i]['precio']*$datos[$i]['unidades'])+$total;?>



                    <?php
                        }
                    ?>      
                    <article class="post clearfix">                        
                        <h2 class="post-title">
                            Total: <span class="glyphicon glyphicon-usd"></span><?php echo $total;?> COP
                        </h2>
                        <div class="contenedor-botones">
                            <a href="productos.php?pag=1" class="btn btn-primary">Volver al catalogo</a>
                        </div>
                    </article>        
                <?php
                    }
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