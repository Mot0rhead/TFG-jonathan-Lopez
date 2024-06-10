<?php
    require_once ("../view/templates/header.php");
    $orderDetails = $_REQUEST['orderDetails'];
    
?>

<div class="titulo">PEDIDOS</div>

<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">IMAGEN</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">UNIDADES</th>
      <th scope="col">PRECIO</th>
      <th scope="col">TOTAL</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($orderDetails as $details){
    ?>  
        <tr><?php  $_GET['details'] = $details;
             include "details.php" ?></tr>
       <?php 
    }
        ?>    
  </tbody>
</table>
<?php require_once ("../view/templates/footer.php"); ?>