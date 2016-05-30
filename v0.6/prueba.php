<?php 
    include('conexion.php');
    session_start();
    if (isset($_SESSION['carrito'])){
        $mi_carrito=$_SESSION['carrito'];
        print_r($mi_carrito);
    }
    else{
        echo "NO EXISTE CARRITO";
    }
    echo "<br>";

    $array = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
);
    print_r($array);   

 ?>