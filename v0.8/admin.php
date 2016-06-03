        <?php 
            $tituloPagina="SoldOut.com - Productos";
            $pagina="";
        ?>
        <?php 
            include('header.php');
            @$editar=$_GET['edit'];
            @$eliminar=$_GET['elim'];
            @$opcion=$_GET['opc'];
            @$pagina=$_GET['pag']
         ?>
        <!-- SECTION PRINCIPAL-->
        
        <section class="main_container">
            <div class="row">



            <?php if(is_null($opcion)){ ?>
                <section class="posts col-md-9">
                </section>
            <?php } ?>           


                
            <!-- aqui se veran los productos al oprimir editar productos-->
            <?php if(!is_null($opcion) and $opcion=='editproductos'){ ?>


                <section class="posts col-md-9">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <td>ID</td>
                            <td>NOMBRE ARTICULO</td>
                            <td>CATEGORIA</td>
                            <td>SUBCATEGORIA</td>
                            <td>BOTONES</td>
                        </thead>
                        <tbody>
                        <?php 
                            $query = "SELECT * from productos";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                            $registros=mysql_num_rows($result);
                            $articulos_por_pagina=10;
                            $cantidad_paginas=$registros/$articulos_por_pagina;
                            $cantidad_paginas=intval(ceil($cantidad_paginas));
                                                       
                            $inicio_consulta=($pagina-1)*$articulos_por_pagina;

                            $query = "SELECT * from productos LIMIT $inicio_consulta,$articulos_por_pagina";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                            while($filas=mysql_fetch_array($result)) {
                                $id=$filas['id_producto'];
                                $nombre=$filas['nombre_producto'];
                                $categoria=$filas['categoria_producto'];
                                $subcategoria=$filas['subcategoria_producto'];
                         ?>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $nombre;?></td>
                                <td><?php echo $categoria;?></td>
                                <td><?php echo $subcategoria;?></td>
                                <td>
                                    <div class="contenedor-botones">
                                        <a href="admin.php?opc=editproductos&pag=<?php echo $pagina;?>&edit=<?php echo $id;?>" class="btn btn-success">Editar</a>
                                        <a href="admin.php?opc=editproductos&pag=<?php echo $pagina;?>&elim=<?php echo $id;?>" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>                                
                        </tbody>
                    </table>

                    <nav>
                        <div class="center-block">
                            <ul class="pagination">
                                <li class="<?php if($pagina==1){echo "disabled";}?>"><a href="admin.php?opc=editproductos&pag=<?php echo ($pagina-1) ?>"><span class="glyphicon glyphicon-arrow-left"></span> Anterior</a></li>
                            <?php  
                                for($i=1; $i<=$cantidad_paginas; $i++) {
                                    echo "<li><a href='admin.php?opc=editproductos&pag=$i'>$i</a></li>";
                                }
                            ?>
                                <li class="<?php if($pagina==$cantidad_paginas){echo "disabled";}?>"><a href="admin.php?opc=editproductos&pag=<?php echo ($pagina+1) ?>">Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></li> 
                            </ul>
                        </div>
                    </nav>
                    <!-- aqui va un formulario para editar productos-->
                    <?php 
                        if(!is_null($editar)){
                            //echo "EDITE EL PRODUCTO $editar";
                            $query = "SELECT * FROM productos WHERE id_producto='$editar'";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                            while($filas=mysql_fetch_array($result)) {
                                $id_producto=$filas['id_producto'];
                                $nombre_producto=$filas['nombre_producto'];
                                $precio_producto=$filas['precio_producto'];
                                $unidades_producto=$filas['unidades_producto'];
                                $descripcion_producto=$filas['descripcion_producto'];
                                $categoria_producto=$filas['categoria_producto'];
                                $subcategoria_producto=$filas['subcategoria_producto'];                                
                                $imagen_producto=$filas['imagen_producto'];
                                $oferta_producto=$filas['oferta_producto'];
                            }
                            
                     ?>
                        <div class="col-md-9 thumbnail">
                            <h4>Editar producto</h4> 
                            <form action="" method="post">
                                <h5>Nombre</h5><input type="text" name="form_nombre" class="form-control size-editar" value="<?php echo $nombre_producto?>">
                                <h5>Precio</h5><input type="text" name="form_precio" class="form-control size-editar" value="<?php echo $precio_producto?>">
                                <h5>Unidades</h5><input type="text" name="form_unidades" class="form-control size-editar" value="<?php echo $unidades_producto?>">
                                <h5>Descripcion</h5><input type="text" name="form_descripcion" class="form-control size-editar-descripcion" value="<?php echo $descripcion_producto?>">
                                <h5>Categoria</h5><input type="text" name="form_categoria" class="form-control size-editar" value="<?php echo $categoria_producto?>">
                                <h5>Subcategoria</h5><input type="text" name="form_subcategoria" class="form-control size-editar" value="<?php echo $subcategoria_producto?>">
                                <h5>Imagen</h5><input type="text" name="form_imagen" class="form-control size-editar" value="<?php echo $imagen_producto?>">
                                <h5>Precio Oferta</h5><input type="text" name="form_oferta" class="form-control size-editar" value="<?php echo $oferta_producto?>"> <br>
                                <button type="submit" name="editar-producto" class="btn btn-success">Editar Producto</button>
                            </form>
                        </div>       
                    <?php
                        }

                        // LO QUE SUCEDERA CUANDO OPRIMA EDITAR PRODUCTO
                        if (isset($_POST['editar-producto'])) {                            
                            $form_nombre=$_POST['form_nombre'];
                            $form_precio=$_POST['form_precio'];
                            $form_unidades=$_POST['form_unidades'];
                            $form_descripcion=$_POST['form_descripcion'];
                            $form_categoria=$_POST['form_categoria'];
                            $form_subcategoria=$_POST['form_subcategoria'];
                            $form_imagen=$_POST['form_imagen'];
                            $form_oferta=$_POST['form_oferta'];
                            if($form_oferta==""){
                                $query = "UPDATE `productos` SET `nombre_producto`='$form_nombre',`precio_producto`=$form_precio,`unidades_producto`=$form_unidades,`descripcion_producto`='$form_descripcion',`categoria_producto`='$form_categoria',`subcategoria_producto`='$form_subcategoria',`imagen_producto`='$form_imagen',`oferta_producto`=NULL WHERE id_producto=$editar";
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                echo '<script language="javascript">window.location="admin.php?opc=editproductos"</script>';    
                            }
                            else{
                                $query = "UPDATE `productos` SET `nombre_producto`='$form_nombre',`precio_producto`=$form_precio,`unidades_producto`=$form_unidades,`descripcion_producto`='$form_descripcion',`categoria_producto`='$form_categoria',`subcategoria_producto`='$form_subcategoria',`imagen_producto`='$form_imagen',`oferta_producto`=$form_oferta WHERE id_producto=$editar";
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                echo '<script language="javascript">window.location="admin.php?opc=editproductos"</script>';
                            }
                            
                        }
                        //TERMINA EDITAR PRODUCTO




                        // LO QUE SUCEDE CUANDO OPRIMA ELIMINAR PRODUCTO
                        if(!is_null($eliminar)){
                            $query = "DELETE FROM `productos` WHERE id_producto=$eliminar";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                            echo '<script language="javascript">window.location="admin.php?opc=editproductos"</script>';
                        }
                        //TERMINA ELIMINAR PRODUCTO
                    ?>
                    <!-- aqui termina formulario para editar objetos-->



                    
                </section>
            <?php } ?>
            <!-- aqui termina donde se veran los productos al oprimir editar productos-->
            


            <!-- aqui se vera el formulario para agregar productos-->
            <?php if(!is_null($opcion) and $opcion=='addproductos'){ ?>
                <section class="posts col-md-9">
                    <div class="col-md-9 thumbnail">
                            <h4>Insertar Producto</h4> 
                            <form action="" method="post">                                
                                <h5>Nombre</h5><input type="text" name="add_nombre" class="form-control size-editar" value="">
                                <h5>Precio</h5><input type="text" name="add_precio" class="form-control size-editar" value="">
                                <h5>Unidades</h5><input type="text" name="add_unidades" class="form-control size-editar" value="">
                                <h5>Descripcion</h5><input type="text" name="add_descripcion" class="form-control size-editar-descripcion" value="">
                                <h5>Categoria</h5><input type="text" name="add_categoria" class="form-control size-editar" value="">
                                <h5>Subcategoria</h5><input type="text" name="add_subcategoria" class="form-control size-editar" value="">
                                <h5>Imagen</h5><input type="text" name="add_imagen" class="form-control size-editar" value="">
                                <h5>Precio Oferta</h5><input type="text" name="add_oferta" class="form-control size-editar" value=""> <br>
                                <button type="submit" name="add-producto" class="btn btn-success">Agregar producto</button>
                            </form>
                        </div>
                </section>


                <?php
                        if (isset($_POST['add-producto'])) {
                            $add_nombre=$_POST['add_nombre'];
                            $add_precio=$_POST['add_precio'];
                            $add_unidades=$_POST['add_unidades'];
                            $add_descripcion=$_POST['add_descripcion'];
                            $add_categoria=$_POST['add_categoria'];
                            $add_subcategoria=$_POST['add_subcategoria'];
                            $add_imagen=$_POST['add_imagen'];
                            $add_oferta=$_POST['add_oferta'];
                            if($add_oferta==""){
                                $query="INSERT INTO `productos`(`id_producto`, `nombre_producto`, `precio_producto`, `unidades_producto`, `descripcion_producto`, `categoria_producto`, `subcategoria_producto`, `imagen_producto`, `oferta_producto`) VALUES (NULL,'$add_nombre',$add_precio,$add_unidades,'$add_descripcion','$add_categoria','$add_subcategoria','$add_imagen',NULL)";
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                echo '<script language="javascript">window.location="admin.php?opc=addproductos"</script>';
                            }
                            else{
                                $query="INSERT INTO `productos`(`id_producto`, `nombre_producto`, `precio_producto`, `unidades_producto`, `descripcion_producto`, `categoria_producto`, `subcategoria_producto`, `imagen_producto`, `oferta_producto`) VALUES (NULL,'$add_nombre',$add_precio,$add_unidades,'$add_descripcion','$add_categoria','$add_subcategoria','$add_imagen',$add_oferta)";
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                echo '<script language="javascript">window.location="admin.php?opc=addproductos"</script>';
                            }
                        }    
                ?>                
            
            <?php } ?>
            <!-- aqui termina donde se vera el formulario para agregar productos-->


                
            <!-- aqui se veran las ventas de la tienda -->
            <?php if(!is_null($opcion) and $opcion=='ventas'){ ?>
                <section class="posts col-md-9">
                    <form action="" method="post">
                        <section class="posts col-md-4">
                            <h5>inicia en: </h5><input type="text" name="inicio" class="form-control size-ventas" value="" placeholder="yyyy-mm-dd">
                        </section>
                        <section class="posts col-md-4">
                            <h5>termina en:</h5><input type="text" name="fin" class="form-control size-ventas" value="" placeholder="yyyy-mm-dd">
                        </section>
                        <section class="posts col-md-4">
                            <br>
                            <button type="submit" name="ver-ventas" class="btn btn-primary">Ver ventas</button>
                        </section>
                    </form>

                    <!-- EJECUTAR LA CONSULTA POR FECHAS DE INICIO Y FIN -->
                    <?php if (isset($_POST['ver-ventas'])) { 

                        $fecha_ini=$_POST['inicio'];
                        $fecha_fin=$_POST['fin'];

                    ?>

                        <!-- TERMINA EJECUTAR LA CONSULTA POR FECHAS DE INICIO Y FIN -->

                        <table class="table table-striped table-bordered">
                            <thead>
                                <td>PRODUCTO</td>
                                <td>CLIENTE</td>
                                <td>CANTIDAD</td>
                                <td>FECHA</td>
                            </thead>
                            <tbody>
                            <?php 
                                $query = "select nombre_usuario, nombre_producto, cantidad,fecha from usuarios,productos,compra where usuarios.id_usuario=compra.fk_id_usuario and productos.id_producto=fk_id_producto and fecha>='$fecha_ini' and fecha<='$fecha_fin'";
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                                while($filas=mysql_fetch_array($result)) {
                                    $producto=$filas['nombre_producto'];
                                    $cliente=$filas['nombre_usuario'];
                                    $cantidad=$filas['cantidad'];
                                    $fecha=$filas['fecha'];
                             ?>
                                <tr>
                                    <td><?php echo $producto;?></td>
                                    <td><?php echo $cliente;?></td>
                                    <td><?php echo $cantidad;?></td>
                                    <td><?php echo $fecha;?></td>
                                </tr>
                            <?php
                                }
                            ?>                                
                            </tbody>
                        </table>
                    <?php } ?>

                </section>
            <?php } ?>    
            <!--aqui termina se veran las ventas de la tienda

















                <!-- aqui inicia el menu lateral-->
                <aside class="col-med-3 hidden-xs hidden-sm menu-lateral">
                    <h4>Administrar</h4>
                    <div class="list-group">
                        <a href="admin.php?opc=addproductos" class="list-group-item <?php if($opcion=="addproductos"){ echo "active";} ?>">Agregar productos</a>
                        <a href="admin.php?opc=editproductos&pag=1" class="list-group-item <?php if($opcion=="editproductos"){ echo "active";} ?>">Editar productos</a>
                        <a href="admin.php?opc=ventas" class="list-group-item <?php if($opcion=="ventas"){ echo "active";} ?>">Ver ventas</a>
                        <a href="admin.php?opc=addproveedores" class="list-group-item <?php if($opcion=="addproveedores"){ echo "active";} ?>">Agregar proveedores</a>
                        <a href="admin.php?opc=editproveedores" class="list-group-item <?php if($opcion=="editproveedores"){ echo "active";} ?>">Editar proveedores</a>
                    </div>
                </aside>
                <!-- aqui termina el menu lateral -->            
            </div>
        </section>
        <!-- TERMINA SECTION PRINCIPAL --> 

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
