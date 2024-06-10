<?php

session_start();
    require_once "../model/acessoBD.php";

    if (!isset($_SESSION["username"])){
        header("Location: ../view/login.php");
        exit;
    }
    $idProducto =  $_GET["idProduct"];
    $comentario = $_POST["comentario"];
    $puntuacion = $_POST["valoracion"];
    $idCliente = $_SESSION["id"];
    $userList = AcessoBD::setComments($idCliente,$comentario,$puntuacion,$idProducto);
    AcessoBD::calculateValuationAVRG();
    //enviamos el parametro productList
    $_REQUEST['userList'] = $userList;

    header("Location: ../control/productList.php");

?>