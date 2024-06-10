<?php

require_once "../model/acessoBD.php";
require_once '../assets/Stripe/stripe-php-master/init.php';

$userName = $_POST["inputUserName"];
$email = $_POST["inputEmail4"];
$password = $_POST["inputPassword4"];
$adress = $_POST["inputAddress"];
$city = $_POST["inputCity"];

$usuarioCreado = AcessoBD::newUser($userName,$email,$password,$adress,$city);

if($usuarioCreado == true){
    header("Location: ../control/productList.php");
}else{
    http_response_code(401);
    $_REQUEST["usuarioNoEncontrado"]="Usuario no enciootnrado";
    include_once "../view/login.php";
}

?>