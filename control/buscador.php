<?php
require_once "../model/acessoBD.php";

$textoBuscador = $_POST["textoBuscador"];

$productList = AcessoBD::getProductListSearch($textoBuscador);
$_REQUEST['productList'] = $productList;
include_once "../view/productList.php";
?>
