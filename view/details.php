<?php

?>
      <th scope="row" id="IdProduct"><img class ="productImgOrderDetails" src="../assets/img/<?php echo $_GET['details']['img']; ?>"></th>
      <td><?php echo $_GET['details']['nombre'] ?></td>
      <td><?php echo $_GET['details']['unidades'] ?></td>
      <td><?php echo $_GET['details']['precio_unidad'] ?></td>
      <td><?php echo $_GET['details']['precio_unidad'] * $_GET['details']['unidades'] ?></td>