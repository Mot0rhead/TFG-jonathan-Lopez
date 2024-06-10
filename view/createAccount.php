<?php require_once ("../view/templates/header.php"); ?>

<div class ="divSignIn">
  <div class="card text-center" style =" width: 60% ;" >
    <div class="card-header">
      Sign in 
    </div>
    <div class="card-body">
      <form class="row g-3"  method = "post" action ="../control/createAccount.php" >
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label"><i class="fa-solid fa-envelope"></i>Email</label>
          <input type="email" class="form-control" id="inputEmail4" name="inputEmail4" required>
        </div>
        <div class="col-md-6">
          <label for="inputUserName" class="form-label"><i class="fa-solid fa-user"></i>Nombre de usuario</label>
          <input type="text" class="form-control" id="inputUserName" name="inputUserName" required>
        </div>  
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label"><i class="fa-solid fa-key"></i>Contraseña</label>
          <input type="password" class="form-control" id="inputPassword4" name="inputPassword4" required> 
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label"><i class="fa-solid fa-location-dot"></i>Direccion</label>
          <input type="text" class="form-control" id="inputAddress" name="inputAddress"placeholder="1234 Main St" required>
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label"><i class="fa-solid fa-city"></i>Ciudad</label>
          <input type="text" class="form-control" id="inputCity" name="inputCity" required>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </form>
    </div>
  </div>
</div>