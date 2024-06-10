<?php
if (isset($_GET['urlStripe'])) {
    $urlPago = $_GET['urlStripe'];
    header("Location: ".$urlPago);
    // Aquí puedes agregar tu lógica para procesar el pago
} else {
    echo "No se ha proporcionado un ID de pedido.";
}

?>

<h1>sdgasgasfas</h1>