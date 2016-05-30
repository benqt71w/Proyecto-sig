<!DOCTYPE html>
<html lang="es">
    <head>
        <?php 
            include('conexion.php');
            session_start();
        ?>
        <meta charset="utf-8">
        <title><?php echo $tituloPagina; ?></title>
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
                             <li class="<?php if($pagina=='inicio'){ echo 'active';} ?>">
                                 <a href="index.php">Inicio</a>
                             </li>
                             <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                     Productos <span class="caret"></span>
                                 </a>
                                 <ul class="dropdown-menu" role="menu">
                                    <li><a href="productos.php?pag=1">Todos los Productos</a></li>
                                    <li class="divider"></li>

                                    <?php
                                    $query = 'select distinct categoria_producto from productos';
                                    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                    while($filas=mysql_fetch_array($result)) {
                                        $categoria_producto=$filas['categoria_producto'];
                                        echo '<li><a href="productos.php?pag=1&cat=',$categoria_producto,'">',$categoria_producto,'</a></li><li class="divider"></li>','   ';
                                    }                        
                                    ?>
                                    <li><a href="ofertas.php?pag=1">Ofertas</a></li>                                     
                                 </ul>
                             </li>
                             <li class="<?php if($pagina=='nosotros'){ echo 'active';} ?>">
                                 <a href="nosotros.php">Nosotros</a>
                             </li>
                             <li class="<?php if($pagina=='ofertas'){ echo 'active';} ?>">
                                 <a href="ofertas.php?pag=1">Ofertas</a>
                             </li>
                             <li class="<?php if($pagina=='carrito'){ echo 'active';} ?>">
                                 <a href="carrito.php"><span class="glyphicon glyphicon-shopping-cart"></span>Compras</a>
                             </li>
                             <?php
                                if(session_status()==PHP_SESSION_DISABLED){
                                    echo '<li><a href="login.php">DESHABILITADO</a></li>';
                                }
                                if(session_status()==PHP_SESSION_NONE){
                                    echo '<li><a href="login.php">HABILITADA NO EXISTE UNA</a></li>';
                                }
                                if(session_status()==PHP_SESSION_ACTIVE){
                                    $existe=0;
                                    foreach ($_SESSION as $key => $value) {
                                        $existe=$existe+1;
                                    }
                                    if($existe==0){
                                        echo '<li class="';
                                        if($pagina=='login'){ echo 'active';}
                                        echo '"><a href="login.php"><span class="glyphicon glyphicon-user"></span>Ingresar</a></li>';
                                    }
                                    else{
                                        $activo=$_SESSION['usuario_activo'];
                                        echo '<li><a><span class="glyphicon glyphicon-user"></span> ¡Hola ',$activo,'!</a>
                                        </li>';
                                        echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar Sesion</a></li>';;
                                    }
                                }


                                                                
                                /*if($existe==0){
                                    echo '<li class="';
                                    if($pagina=='login'){ echo 'active';}
                                    echo '"><a href="login.php"><span class="glyphicon glyphicon-user"></span>Ingresar</a></li>';
                                }
                                else{
                                    $activo=$_SESSION['usuario_activo'];
                                    echo '<li><a><span class="glyphicon glyphicon-user"></span> ¡Hola ',$activo,'!</a>
                                    </li>';
                                    echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar Sesion</a></li>';;
                                }*/
                              ?>
                                                          
                        </ul>
                        
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