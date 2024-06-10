<?php
 
?>

<div class="card mb-4">
  <img class ="productImg" src="../assets/img/<?php echo $_GET['product']['img']; ?>" class="card-img-top productImg" alt="<?php echo $_GET['product']['nombre']; ?>" tittle="<?php echo $_GET['product']['nombre']; ?>">
  <div class="card-body productosAdmin">
    <p hidden ><?php echo $_GET['product']['id']; ?></p>
    <p class="stock" hidden ><?php echo $_GET['product']['stock']; ?></p>
    <h5 class="card-title nombre"><?php echo $_GET['product']['nombre']; ?></h5>
    <p class="card-text productDescription"><span><?php echo $_GET['product']['descripcion']; ?></span></p>
    <p class="card-text precio"><span><?php echo $_GET['product']['precio']; ?></span>€</p>
    <p class="card-text valoracion"><?php if($_GET['product']['valoracion_media'] ==1){
        ?><i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        <?php
       }elseif($_GET['product']['valoracion_media'] == 2){
        ?><i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        <?php
      }elseif($_GET['product']['valoracion_media'] == 3){
        ?><i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <?php
      }elseif($_GET['product']['valoracion_media'] == 4){
        ?>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-regular fa-star"></i>
      <?php
      }elseif($_GET['product']['valoracion_media'] == 0){
        ?><i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
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
        ?></p>
    <a href="#" class="btn btn-primary anyadirProductoAlCarrito">Comprar</a>
    <a href="../control/comentarios.php?id=<?php echo $_GET['product']['id'] ?>" class="comentarios"><i class="fa-solid fa-comment"></i>Reseña</a>
  </div>
</div>