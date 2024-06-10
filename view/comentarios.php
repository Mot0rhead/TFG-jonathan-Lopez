<?php require_once ("../view/templates/header.php"); ?>
<li>

<div class="card  mb-3">
  <div class="card-header"><?php echo $_GET['comentario']['nombre']; ?></div>
  <div class="card-body">
    <h5 class="card-title"><?php
      if($_GET['comentario']['puntuacion'] == 1){
        ?><i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        <?php
       }elseif($_GET['comentario']['puntuacion'] == 2){
        ?><i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        <?php
      }elseif($_GET['comentario']['puntuacion'] == 3){
        ?><i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <?php
      }elseif($_GET['comentario']['puntuacion'] == 4){
        ?>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-regular fa-star"></i>
      <?php
      }else{
        ?>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <?php
      }
        ?>
    </h5>
    <p class="card-text"><?php echo $_GET['comentario']['comentario']; ?>.</p>
  </div>
</div>
</li>