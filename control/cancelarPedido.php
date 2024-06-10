<?php
    require_once "../model/acessoBD.php";
    
    $idPedido = $_POST["idPedido"];

    if (!isset($_SESSION["username"])){
        echo 0;
    }
    
    $pedidoBorrado = AcessoBD::cancelOrder($idPedido);

    if($pedidoBorrado == false){
        echo trim("0");
    }else{
        echo trim("1");
    }
?>