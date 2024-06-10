<?php
 
?>
<div class="card mb-4">
  <img class ="productImg" src="../assets/img/<?php echo $_GET['product']['img']; ?>" class="card-img-top productImg" alt="<?php echo $_GET['product']['nombre']; ?>" tittle="<?php echo $_GET['product']['nombre']; ?>">
  <div class="card-body productosAdmin">
    <p hidden><?php echo $_GET['product']['id']; ?></p>
    <p class="stock">Existencias: <input  type="number" placeholder="0" id="stock" class="form-control stock" name="stock" value="<?php echo $_GET['product']['stock']; ?>"/></p>
    Nombre:<h5 class="card-title nombre"> <input type="text" placeholder="Nombre" class ="nombreProducto form-control" id="nombre" name="nombre" value="<?php echo $_GET['product']['nombre']; ?>"/></h5>
    Descripcion:<p class="card-text productDescription"> <textarea id="descripcion" placeholder="Descripción del libro" class ="descripcionProducto form-control" name="descripcion" rows="4"><?php echo $_GET['product']['descripcion']; ?></textarea></p>
    <p class="card-text precio">Precio: <input type="number" id="precio" placeholder="0" class="form-control precio" name="precio" value="<?php echo $_GET['product']['precio']; ?>"/></p>
    <p class="card-text precio">Dado de alta: 

    <select id="estado" name="estado" class="form-select" aria-label="Default select example" >
      <option value="Y" <?php if ($_GET['product']['activo'] == 'Y') echo 'selected'; ?>>Sí</option>
      <option value="N" <?php if ($_GET['product']['activo'] == 'N') echo 'selected'; ?>>No</option>
    </select>

</p>
    <a href="#" class="btn btn-primary" onclick="enviarCambioProducto(this)">Enviar Cambio</a>
  </div>
</div>

