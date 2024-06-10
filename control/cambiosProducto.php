<?php
require_once "../model/acessoBD.php";

$idProducto = $_POST["idProducto"];
$stock = $_POST["stock"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$estado = $_POST["estado"];

$result = AcessoBD::cambioProducto($idProducto,$stock,$nombre,$descripcion,$precio,$estado);

if($result == false){
    echo trim("0");
}else{
    echo trim("1");
}

?>
