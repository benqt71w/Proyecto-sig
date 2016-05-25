<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>SoldOut.com</title>
        <meta name="viewport" content="widht=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimun scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilos.css">
        
    </head>
    <body>
        <!-- AQUI VA LA CABECERA Y LA BARRA DE NAVEGACION -->        
        <header>
            <nav class="navbar navbar-inverse navbar-static-top" role="navigation">            
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-dtq">
                            <span class="sr-only">Desplegar/Ocultar Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="index.php" class="navbar-brand">SoldOut.com</a>
                    </div>
                    
                    <!-- menu de navegacion -->
                    <div class="collapse navbar-collapse" id="navegacion-dtq">
                        <ul class="nav navbar-nav">
                             <li class="active">
                                 <a href="index.php">Inicio</a>
                             </li>
                             <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                     Productos <span class="caret"></span>
                                 </a>
                                 <ul class="dropdown-menu" role="menu">
                                     <li><a href="productos.php">Categoria #1</a></li>
                                     <li class="divider"></li>
                                     <li><a href="productos.php">Categoria #2</a></li>
                                     <li class="divider"></li>
                                     <li><a href="productos.php">Categoria #3</a></li>
                                     <li class="divider"></li>
                                     <li><a href="productos.php">Categoria #4</a></li>
                                     <li class="divider"></li>
                                     <li><a href="productos.php">Categoria #5</a></li>
                                     <li class="divider"></li>
                                     <li><a href="productos.php">Categoria #6</a></li>
                                     <li class="divider"></li>
                                     <li><a href="productos.php">Categoria #7</a></li>
                                     <li class="divider"></li>
                                     <li><a href="productos.php">Categoria #8</a></li>
                                     <li class="divider"></li>
                                     <li><a href="productos.php">Categoria #9</a></li>
                                     <li class="divider"></li>
                                     <li><a href="productos.php">Categoria #10</a></li>
                                     <li class="divider"></li>                                     
                                     <li><a href="productos.php">Ofertas</a></li>                                     
                                 </ul>
                             </li>
                             <li>
                                 <a href="nosotros.php">Nosotros</a>
                             </li>
                             <li>
                                 <a href="ofertas.php">Ofertas</a>
                             </li>
                             <li>
                                 <a href="carrito.php"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                             </li>                             
                        </ul>
                        <form action="" class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="buscar">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <!-- AQUI TERMINA LA CABECERA Y LA BARRA DE NAVEGACION-->
        
        <!-- AQUI VA EL JUMBOTRON-->
        <section class="jumbotron">
            <div class="container">
                <h1>SoldOut.com</h1>
                <p>Mejores Productos, Mejores Precios</p>
            </div>
        </section>
        <!-- AQUI TERMINA JUMBOTRON-->
        
        
        
       <!--SECTION PRINCIPAL-->
       <div class="container">
            <div class="row post">
                <div class="col-sm-6 col-md-4 text-center">
                    <div class="thumbnail">
                        <img class="img-thumbnail" src="imagenes/ejemplo.jpg" alt="">
                        <div class="caption">
                            <h3>Categoria 1</h3>        
                            <p><a href="#" class="btn btn-primary" role="button">Ver más</a></p>
                        </div>
                    </div>
                </div>

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