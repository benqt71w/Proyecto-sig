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
                             <li>
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
                             <li class="active">
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
        
        
        <!-- AQUI VA EL JUMBOTRON-->
        <section class="jumbotron">
            <div class="container">
                <h1>SoldOut.com</h1>
                <p>Mejores Productos, Mejores Precios</p>
            </div>
        </section>       
        
        <!-- AQUI VA LA INFORMACION -->
        <section class="main_container">

            <div class="form-inline post">
                <img src="imagenes/LOGO-PROYECTO.jpg" class="img-responsive imagen-nosotros center-block" alt="Responsive image">
                <p class="text-justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>

        </section>
        <!-- AQUI TERMINA LA INFORMACION -->

        
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