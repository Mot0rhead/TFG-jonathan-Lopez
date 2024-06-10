<?php
    require_once ("../view/templates/header.php");
    $userList = $_REQUEST['userList'];

?>
<div class ="tablaUsuarios">
  <div class="titulo">
    <h3>USUARIOS</h3>
  </div>

  <table class="table table-striped table-hover table-bordered ">
    <thead>
      <tr>
        <th scope="col" hidden>ID</th>
        <th scope="col">Nombre <i class="fa-solid fa-signature"></i></th>
        <th scope="col">Nombre Usuario <i class="fa-solid fa-user"></i></th>
        <th scope="col">Direccion <i class="fa-solid fa-user"></i></th>
        <th scope="col">Contraseña <i class="fa-solid fa-user"></i></th>
        <?php if($_SESSION["id"]== 0){ ?>
        <th scope="col">Estado <i class="fa-solid fa-user"></i></th>
          <?php }?>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($userList as $user){
      ?>  
          <tr><?php $_GET['user'] = $user; 
              include "user.php" ?></tr>
        <?php 
      }
          ?>    
    </tbody>
  </table>
</div>