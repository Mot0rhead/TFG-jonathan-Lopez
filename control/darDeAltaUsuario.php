<?php
require_once "../model/acessoBD.php";

$id_usuario_alta = $_POST["idUsuario"];

$usuarioCancelado = AcessoBD::registerUser($id_usuario_alta);


if($usuarioCancelado == false){
    echo trim("0");
}else{
    echo trim("1");
}

?>