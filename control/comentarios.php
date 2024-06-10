<?php
    require_once "../model/acessoBD.php";
    
    //$idPedido = $_POST["idPedido"];

    if(isset($_GET['id'])) {
        $id_producto = $_GET['id'];
    
        $comentarios = AcessoBD::getComments($id_producto);
        $libro_comentado = AcessoBD::getuniqueProduct($id_producto);
        $_REQUEST['comentarios'] = $comentarios;
        $_REQUEST['libro_comentado'] = $libro_comentado;
        
    } else {
       
    }
    
    
   

    include_once "../view/listacomentarios.php";

     //$OrderDetails = AcessoBD::getOrderDetails($OrderList['id']);
    //enviamos el parametro productList
    
?>