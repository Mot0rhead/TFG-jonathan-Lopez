<?php
require_once "../model/acessoBD.php";
$nombreProducto = $_POST["nombreProducto"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];
$existencias = $_POST["existencias"];
$imagen = $_POST["imagen"];
$autor = $_POST["autor"];
$genero = $_POST["genero"];
$activo = $_POST["estado"];
$uploadOk= true;
// if ($_FILES["imagen"]["size"] > 5000000) { // 5MB máximo
//     echo "Lo siento, tu archivo es demasiado grande.";
//     $uploadOk = false;
// }

// // Permitir ciertos formatos de archivo
// if($imagen != "jpg" && $imagen != "png" && $imagen != "jpeg" && $imagen != "gif" ) {
//     echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
//     $uploadOk = false;
// }
// if($uploadOk == true){
    $subida = AcessoBD::subirProducto($nombreProducto,$precio,$descripcion,$existencias,$imagen,$autor,$genero,$activo);

// }else{
//     echo "Error";
// }


if($subida == true ){
    header("Location: ../productList");
}else{

}
?>

