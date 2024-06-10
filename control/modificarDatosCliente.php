<?php
require_once "../model/acessoBD.php";
require_once '../assets/Stripe/stripe-php-master/init.php';

$idCliente = $_POST["id"];
$nombre = $_POST["nombre"];
$nombreUsu = $_POST["nombreUsuario"];
$password = $_POST["password"];
$direccion = $_POST["direccion"];


$result = AcessoBD::modificarDatosCliente($idCliente,$nombre,$nombreUsu,$password,$direccion);
$nombre = AcessoBD::modificarNombredeCliente($idCliente);
if($result == false){// 1 esta bien
    echo trim("0");
}else{
    session_start();
    $_SESSION["username"]=$nombre;
    echo trim("1");
}

?>
