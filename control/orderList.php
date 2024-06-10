<?php
session_start();
    require_once "../model/acessoBD.php";
    require_once '../assets/Stripe/stripe-php-master/init.php';

    if (!isset($_SESSION["username"])){
        header("Location: ../view/login.php");
        exit;
    }
    $user_id = $_SESSION["id"];
    $OrderList = AcessoBD::getOrderList($user_id);

    //enviamos el parametro productList
    $_REQUEST['orderList'] = $OrderList;

   

    include_once "../view/OrderList.php";

?>