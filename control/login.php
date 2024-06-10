<?php
    require_once "../model/acessoBD.php";
    require_once '../assets/Stripe/stripe-php-master/init.php';
    
    
    $username = $_POST["usernameLogin"];
    $password = $_POST["passwordLogin"];

    //$email = "emaildeprueba@gmail.com";
    //$totalCarrito = 1000;
    $result = AcessoBD::login($username,$password);
    // $cliente = AcessoBD::crearClienteStripe($username,$email);
    // $pago = AcessoBD::crearPagoStripe($cliente,$totalCarrito);

    if (!isset($result)){
        include_once "../view/login.php";
    }
    else{
        $NOMBRE = $result[0];
        $ID = $result[1];
        /*si la info es correcta poner la variable de usuario en la session*/
        if(isset($ID)){
            session_start();
            $_SESSION["username"]=$NOMBRE;
            $_SESSION["id"]=$ID;
            header("Location: ../control/productList.php");
        }else{
             http_response_code(401);
             $_REQUEST["usuarioNoEncontrado"]="Usuario no encontrado";
             include_once "../view/login.php";
            }
  }


