<?php require_once ("../view/templates/header.php"); ?>

<?php

    $comentarios = $_REQUEST['comentarios'];
    $libro_comentado = $_REQUEST['libro_comentado'];

    
?>
<h1>Comentarios y Valoraciones</h1><br>
    <div class="container-fluid text-center">
        <div class="row row-cols-4">
        
        <ul>
            <?php
            if(empty($comentarios)){
                ?>
                <div class="col">
                        Este articulo aun no tiene comentarios
                </div>
                <?php
            }else{
                foreach($libro_comentado as $libro){
                ?>
                <div class="card mb-4">
                   <img class ="productImg" src="../assets/img/<?php echo $libro['img']; ?>" class="card-img-top productImg" alt="<?php echo $libro['nombre']; ?>" tittle="<?php echo $libro['nombre']; ?>">
                    <div class="card-body productosAdmin">
                        <p class="stock" hidden ><?php echo $libro['precio']; ?></p>
                        <h5 class="card-title nombre"><?php echo $libro['nombre']; ?></h5>
                        <p class="card-text productDescription"><span><?php echo $libro['descripcion']; ?></span></p>
                    </div>
                    <div>
                        <h4>Comentarios: </h4>
                    </div>
                <?php
                }
                foreach($comentarios as $comentario){
                    ?>
                    <div class="col">
                        <?php
                            $_GET['comentario'] = $comentario;
                            include "comentarios.php";
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
                </div>
        </ul>
                
   
    <div class ="divSignIn divComentarios">
  
          <div class="card text-center cardComentarios" style =" width: 50% ;" >
            <div class="card-header">
               Deja tu comentario 
            </div>
            <form action="../control/procesar_comentario.php?idProduct=<?php echo $_GET['id'] ?>" method="POST">
                <label for="comentario">Comentario:</label>
                <textarea id="comentario" class="form-control" name="comentario" rows="1" required></textarea>
                <label for="valoracion">Valoración:</label>
                <select id="valoracion" name="valoracion" class= "form-select" required>
                    <option value="5">5 - Excelente</option>
                    <option value="4">4 - Muy bueno</option>
                    <option value="3">3 - Bueno</option>
                    <option value="2">2 - Regular</option>
                    <option value="1">1 - Malo</option>
                </select>
                 <div class="col-12">
                      <button type="submit" class="btn btn-primary">Enviar comentario</button>
                 </div>
            </form>
         </div>
    </div>
</div>
</div>
<?php require_once ("../view/templates/footer.php"); ?>