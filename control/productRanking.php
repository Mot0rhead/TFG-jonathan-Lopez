<?php
    require_once "../model/acessoBD.php";

    session_start();

    $productRanking= AcessoBD::getProductListRanking();
    $_REQUEST['productRanking'] = $productRanking;
    include_once "../view/productRanking.php";
        
   

?>