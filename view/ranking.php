<?php
 
?>
<div class="card mb-4">
  <img class ="productImg" src="../assets/img/<?php echo $_GET['product']['img']; ?>" class="card-img-top productImg" alt="<?php echo $_GET['product']['nombre']; ?>" tittle="<?php echo $_GET['product']['nombre']; ?>">
  <div class="card-body">
    <p hidden ><?php echo $_GET['product']['id']; ?></p>
    <p class="stock" hidden ><?php echo $_GET['product']['stock']; ?></p>
    <h5 class="card-title nombre"><?php echo $_GET['product']['nombre']; ?></h5>
        <?php
            if($_GET['podio']== 1){
                ?>
                <p class="card-text productDescription"><a class="podio"><i class="fa-solid fa-1"></i></a> puesto con un total de ventas de: <?php echo $_GET['product']['total_ventas']; ?></p>
              

               <?php 
            } elseif($_GET['podio']== 2){
                ?>
                <p class="card-text productDescription"><a class="podio"><i class="fa-solid fa-2"></i></a> puesto con un total de ventas de: <?php echo $_GET['product']['total_ventas']; ?></p>
               
               <?php 

            }elseif($_GET['podio']== 3){
                ?>
                <p class="card-text productDescription"><a class="podio"><i class="fa-solid fa-3"></i></a> puesto con un total de ventas de: <?php echo $_GET['product']['total_ventas']; ?></p>
               

               <?php 
            }else{
              ?>
                 <p class="card-text productDescription">Total de ventas de: <?php echo $_GET['product']['total_ventas']; ?></p>
              <?php
            }
            ?>
    
  </div>
</div>