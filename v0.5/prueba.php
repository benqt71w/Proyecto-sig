<?php
//MOSTRAR TODOS LOS ERRORES MENOS LOS DE E_DEPRECATED
error_reporting(E_ALL ^ E_DEPRECATED);

// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('tienda') or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL
$query = 'SELECT * FROM productos';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$registros=mysql_num_rows($result);
$articulos_por_pagina=1;
$cantidad_paginas=$registros/$articulos_por_pagina;

//$query = 'SELECT * FROM productos limit 0,5';
//$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

for($i=1; $i<=$cantidad_paginas; $i++) { 
    /*if($i==$numero_pagina_actual){
    	echo $i,'  ';
    }*/
    //else{
        echo '<a href="productos.php?pag=',$i,'">',$i,'</a>';
        echo $i;
    //}	
}
 

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?>

<!DOCTYPE html>
            <html>
            <head>
                <title></title>
            </head>
            <body>
                    
            </body>
            </html>            
                     
</body>
</html>