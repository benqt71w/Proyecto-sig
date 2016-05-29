<?php
//$enlace =  mysql_connect('localhost', 'root', '');
//if (!$enlace) {
//    die('No pudo conectarse: ' . mysql_error());
//}
//echo 'Conectado satisfactoriamente';
//mysql_close($enlace);

//MOSTRAR TODOS LOS ERRORES MENOS LOS DE E_DEPRECATED
error_reporting(E_ALL ^ E_DEPRECATED);

// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('tienda') or die('No se pudo seleccionar la base de datos');
?>