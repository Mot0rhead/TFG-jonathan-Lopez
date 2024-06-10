<?php

?>


      <th scope="row" id="IdProduct" hidden><?php echo $_GET['order']['id'] ?></th>
      <td hidden><?php echo $_GET['order']['id_cliente'] ?></td>
      <td><?php echo $_GET['order']['fecha_pedido'] ?></td>
      <td><?php echo $_GET['order']['total_pedido'] ?></td>
      <td><?php echo $_GET['order']['nombre_estado'] ?></td>
      <td><?php echo $_GET['order']['info'] ?></td>

      
    <td><button type="button" class="btn btn-warning rounded-pill px-3 btnSesion btnCancelarPedido"><a class="nav-link" href="../control/verDetallesPedido.php?OrderID=<?php echo $_GET['order']['id'] ?>"><i class="fa-solid fa-magnifying-glass"></button></td>
    <td><button type="button" class="btn btn-warning rounded-pill px-3 btnSesion btnCancelarPedido" onclick="cancelarPedido(this)">Cancelar</button></td>
 
