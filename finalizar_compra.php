<?php
require 'conexion.php'; session_start();


$sql = "INSERT INTO ventas_db (fecha_venta) VALUES (NOW())";
$resultado = $conn->query($sql);


$sql =" SELECT  id_venta FROM ventas_db order by id_venta desc limit 1";
$resultado = $conn->query($sql);
while($row = $resultado->fetch_assoc()) {
    // Acceder a los datos de cada fila
    $id_venta = $row["id_venta"];
}


foreach($_SESSION['compras'] as $compras) {
    if($compras ->cantidad >0 ){
    $sql = "INSERT INTO items_venta(id_venta,producto,cantidad,precio)VALUES('$id_venta','$compras->nombre','$compras->cantidad','$compras->precio')";
    $resultado =  $conn->query($sql);
    $total_facturas +=$compras->precio;
    
  }
}

$sql ="UPDATE usuarios SET total_compra = total_compra + 1 WHERE id_user =".$_SESSION['user']['id_user'];
$resultado = $conn->query($sql);

// Suponiendo que $id_usuario es el ID del usuario que realiza la compra
// y $total_compra es el monto total de la compra.

// Obtener la información del usuario
$sql= "SELECT total_compra FROM `usuarios` WHERE id_user =". $_SESSION['user']['id_user'];
$resultado = $conn->query($sql);
$total_compras = mysqli_fetch_assoc($resultado);
$total_compra = $total_compra ['total_compra'] ;

// Inicializar el descuento
$descuento = 0;

if($total_compra >=5){
    $descuento = 20 / 100 * $total_facturas; 
}
elseif($total_compra >= 0 and $total_compra <=5){
    $descuento = 10 / 100 * $total_facturas;
}
elseif($total_compra =0 and  $total >=50000 ){
    $descuento = 5 / 100 * $total_facturas;
}

// Calcular el total después del descuento
$total_final = $total_facturas - $descuento;
echo "TOTAL: " .$total_facturas."pesos"."<br>";
echo "DESCUENTO: ".$descuento."pesos"."<br>";
// Mostrar el total final
echo "El total después del descuento es: $total_final"."pesos";

unset($_SESSION['compras']);

echo (" Su compra fue exitosa"."<br>")

?>