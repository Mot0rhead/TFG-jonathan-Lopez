<?php
    require_once ("../view/templates/header.php");
?>

<div class ="divSignIn">
  <div class="card text-center" style =" width: 60% ;" >
    <div class="card-header">
     Subir Producto 
    </div>
    <div class="card-body">
      <form class="row g-3"  method = "post" action ="../control/subirProducto.php" >
        <div class="col-md-6">
          <label for="nombreProducto" class="form-label"><i class="fa-solid fa-signature"></i>Nombre del producto</label>
          <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" required>
        </div>
        <div class="col-md-6">
          <label for="precio" class="form-label"><i class="fa-solid fa-tag"></i>Precio</label>
          <input type="number" min="0" class="form-control" id="nombreProducto" name="precio"  required>
        </div>
        <div class="col-md-6">
          <label for="descripcion" class="form-label"><i class="fa-solid fa-comment"></i>Descripcion</label>
          <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>  
        <div class="col-md-6">
          <label for="existencias" class="form-label"><i class="fa-solid fa-boxes-stacked"></i>Existencias</label>
          <input type="number" min="0" class="form-control" id="existencias" name="existencias" required> 
        </div>
        <div class="col-12">
          <label for="imagen" class="form-label"><i class="fa-solid fa-image"></i>Imagen</label>
          <input type="file" id="imagen" name="imagen" accept="imagen" required>
        </div>
        <div class="col-md-6">
          <label for="autor" class="form-label"><i class="fa-solid fa-user"></i>Autor</label>
          <input type="text" class="form-control" id="inputCity" name="autor" required>
        </div>
        <div class="col-md-6">
          <label for="genero" class="form-label"><i class="fa-solid fa-book"></i>Genero</label>
          <input type="text" class="form-control" id="inputUserName" name="genero" required>
        </div>  
        <div class="col-md-6">
          <label for="activo" class="form-label"><i class="fa-solid fa-up-down"></i>Activo</label>
          <select id="estado" name="estado" class="form-select" aria-label="Default select example" >
              <option value="Y">Sí</option>
              <option value="N">No</option>
         </select>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>