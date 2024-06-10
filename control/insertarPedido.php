<?php
    require_once "../model/acessoBD.php";
    require_once '../assets/Stripe/stripe-php-master/init.php';
   session_start();

   if(isset($_SESSION["id"])){
  
    $listaProductos = $_REQUEST["listaProductos"];

        $resultInsertPedido = AcessoBD::setInsertCart($listaProductos);
        $stripePagoUrl = AcessoBD::pagoConStripe($listaProductos);
        if($resultInsertPedido == false){
            echo $stripePagoUrl ;
        }else{
            echo trim("0");
        }
    }else{
        echo trim("0");
    } 
    
        //echo "Tienes que logearte";
        //require_once "../view/login.php";
   
?>