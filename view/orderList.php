<?php
    require_once ("../view/templates/header.php");
    $orderList = $_REQUEST['orderList'];
    
?>
<div class ="tablaPedidos">
  <div class="tituloOrderList"> 
    <h3>PEDIDOS</h3>
  </div>

    <table class="table table-striped table-hover table-bordered tableOrderDetails">
      <thead>
        <tr>
          <th scope="col" hidden>ID</th>
          <th scope="col" hidden>ID_CLIENTE <i class="fa-solid fa-user"></i></th>
          <th scope="col">FECHA_PEDIDO <i class="fa-solid fa-calendar-days"></i></th>
          <th scope="col">TOTAL_PEDIDO <i class="fa-solid fa-chart-line"></i></th>
          <th scope="col">ESTADO_PEDIDO <i class="fa-solid fa-satellite-dish"></i></th>
          <th scope="col">INFO <i class="fa-solid fa-info"></i></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($orderList as $order){
        ?>  
            <tr><?php $_GET['order'] = $order; 
                include "order.php" ?></tr>
          <?php 
        }
            ?>    
      </tbody>
    </table>
</div>
<?php require_once ("../view/templates/footer.php"); ?>