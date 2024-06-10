<?php
    require_once "../model/acessoBD.php";

    session_start();
    
    if(isset($_SESSION["id"])){

        $user_id = $_SESSION["id"];
        if($user_id == 0 ){
            $productList = AcessoBD::getProductListAdmin();
            $_REQUEST['productList'] = $productList;
            include_once "../view/productListAdmin.php";
            
        }else{
            $productList = AcessoBD::getProductList();
            $_REQUEST['productList'] = $productList;
            include_once "../view/productList.php";
            
        }
        
    }else{
        $productList = AcessoBD::getProductList();
        $_REQUEST['productList'] = $productList;
        include_once "../view/productList.php";

    }

?>