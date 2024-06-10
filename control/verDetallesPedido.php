<?php
    require_once "../model/acessoBD.php";
    
    //$idPedido = $_POST["idPedido"];

    $OrderID= $_GET['OrderID'];
    
    $OrderDetails = AcessoBD::getOrderDetails($OrderID);

    $_REQUEST['orderDetails'] = $OrderDetails;

    include_once "../view/OrderDetails.php";

     //$OrderDetails = AcessoBD::getOrderDetails($OrderList['id']);
    //enviamos el parametro productList
    
?>