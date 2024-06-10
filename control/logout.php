<?php
session_start();
    if(isset($_SESSION["username"])){
        

        // Elimina todas las variables de sesión
        session_unset();

        // Destruye la sesión
        session_destroy();
        header("Location: ../view/login.php");
        exit();
    }else{
        header("Location: ../control/productList.php");
        exit();
    }
echo "logout";
?>
