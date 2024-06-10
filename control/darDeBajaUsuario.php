<?php
require_once "../model/acessoBD.php";

$id_usuario_baja = $_POST["idUsuario"];

$usuarioCancelado = AcessoBD::unsubscribeUser($id_usuario_baja);


if($usuarioCancelado == false){
    echo trim("0");
}else{
    echo trim("1");
}

?>