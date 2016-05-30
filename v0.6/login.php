		<?php 
            $tituloPagina="SoldOut.com - Inicio";
            $pagina="login";
        ?>
       <?php
            include('header.php');
        ?>
		
		<div class="container">
			<div class="row text-center">
                <!-- INICIO DE SESION -->
				<div class="col-sm-6 col-md-4 text-center">
                    <h2>Tienes cuenta? Inicia sesión!</h2>
                    <form action="" method="post">
                        <div class="thumbnail">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon" id="sizing-addon3">Usuario <span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" class="form-control" placeholder="Usuario" aria-describedby="sizing-addon3" name="logear_usuario">
                            </div>
                        </div>
                        <div class="thumbnail">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon " id="sizing-addon3">Contraseña <span class="glyphicon glyphicon-asterisk"></span></span>
                                <input type="password" class="form-control" placeholder="Contraseña" aria-describedby="sizing-addon3" name="logear_pass">
                            </div>
                        </div>
                        <button type="submit" name="logear" class="btn btn-success">Iniciar Sesion</button>
                    </form>
                </div>
                
                <div class="col-sm-6 col-md-4 text-center">
                </div>
                <!-- FIN DE INICIO DE SESION -->

                <!-- REGISTRO -->
                <div class="col-sm-6 col-md-4 text-center">
                    <h2>Eres nuevo? Registrate!</h2>
                    <form action="" method="post">
                        <div class="thumbnail">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon" id="sizing-addon3">Nombres y Apellidos</span>
                                <input type="text" class="form-control" placeholder="¿Como te llamas?" aria-describedby="sizing-addon3" name="nuevo_nombre">
                            </div>
                        </div>
                        <div class="thumbnail">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon" id="sizing-addon3">Dirección de residencia</span>
                                <input type="text" class="form-control" placeholder="¿Donde vives?" aria-describedby="sizing-addon3" name="nuevo_direccion">
                            </div>
                        </div>
                        <div class="thumbnail">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon" id="sizing-addon3">Telefono <span class="glyphicon glyphicon-earphone"></span></span>
                                <input type="text" class="form-control" placeholder="Danos tu numero!" aria-describedby="sizing-addon3" name="nuevo_telefono">
                            </div>
                        </div>
                        <div class="thumbnail">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon" id="sizing-addon3">Nombre de usuario <span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" class="form-control" placeholder="Usuario" aria-describedby="sizing-addon3" name="nuevo_usuario">
                            </div>
                        </div>
                        <div class="thumbnail">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon " id="sizing-addon3">Contraseña <span class="glyphicon glyphicon-asterisk"></span></span>
                                <input type="password" class="form-control" placeholder="Contraseña" aria-describedby="sizing-addon3" name="nuevo_pass">
                            </div>
                        </div>
                        <button type="submit" name="registrar" class="btn btn-success">Registrarse</button>
                    </form>
                </div>
                <!--FIN DE REGISTRO -->				
			</div>
            <div class="row post text-center">
                <div class="col-sm-6 col-md-4"></div>
                <div class="col-sm-6 col-md-4">
                    <?php
                        //AQUI VAMOS A EJECUTAR EL REGISTRO DE UN NUEVO USUARIO
                        if (isset($_POST['registrar'])) {
                            $nombre=$_POST['nuevo_nombre'];
                            $direccion=$_POST['nuevo_direccion'];
                            $telefono=$_POST['nuevo_telefono'];
                            $usuario=$_POST['nuevo_usuario'];
                            $pass=$_POST['nuevo_pass'];

                            $campos_llenos=strlen($nombre)*strlen($direccion)*strlen($telefono)*strlen($usuario)*strlen($pass);
                            if($campos_llenos>0){
                                $query = "INSERT INTO `tienda`.`usuarios` (`id_usuario`, `nombre_usuario`, `direccion_usuario`, `telefono_usuario`, `cuenta_usuario`, `pass_usuario`) VALUES (NULL, '$nombre', '$direccion', '$telefono', '$usuario', '$pass')";
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                echo '<div class="alert alert-success" role="alert">Bienvenido a SoldOut.com ',$nombre,'</div>';
                            }
                            else{
                                echo '<div class="alert alert-danger" role="alert">Por favor llene TODOS los campos</div>';
                            }
                        }
                     ?>

                    <?php 
                        //AQUI VAMOS A INICIAR UNA SESION
                        if(isset($_POST['logear'])){
                            $login_usuario=$_POST['logear_usuario'];
                            $login_pass=$_POST['logear_pass'];
                            $query = "SELECT cuenta_usuario,pass_usuario FROM usuarios where cuenta_usuario='$login_usuario' AND pass_usuario='$login_pass'";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                            if(mysql_num_rows($result)==1){
                                $_SESSION['usuario_activo']=$login_usuario;
                                echo '<div class="alert alert-success" role="alert">Hola ',$login_usuario,'!</div>';
                            }
                            else{
                                echo '<div class="alert alert-danger" role="alert">USUARIO O CONTRASEÑA INVALIDO</div>';
                            }
                        }    
                    ?>
                 </div>
            </div>
		</div>

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