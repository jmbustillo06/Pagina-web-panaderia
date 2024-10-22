<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos
require 'conexion.php';
//echo "venta";
$nombre = $_GET["nombre"];
$precio = $_GET["precio"];
$cantidad = $_GET["cantidad"];
$_SESSION = array();
session_destroy();
//$lista_producto[] = array("producto" => $nombre,"precio"=>$precio,"cantidad"=>$cantidad);
//print_r($lista_producto);
session_start();
if(!isset($_SESSION["compras"])){
    $_SESSION["compras"] = array();
}


$producto -> cantidad = $cantidad;
$producto -> nombre = $nombre;
$producto -> precio = $precio;
array_push ($_SESSION["compras"] , $producto);
print_r($_SESSION["compras"]); //$_SESSION["compras"];