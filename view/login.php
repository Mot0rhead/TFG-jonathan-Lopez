<?php
    session_start();
    require_once ("../view/templates/header.php");

  if(isset($_REQUEST["usuarioNoEncontrado"])){
    ?>
    <script>

      toast("Usuario o Password incorrecto","red");

    </script>
    
    <?php
  }

  
?>


<form class="formLogin" method="post" action="../control/login.php">
  <div class="mb-3">
    <label for="usernameLogin" class="form-label">UserName</label>
    <input type="text" class="form-control" id="usernameLogin" name="usernameLogin">
  </div>
  <div class="mb-3">
    <label for="paswordLogin" class="form-label">Password</label>
    <input type="password" class="form-control" id="passwordLogin" name="passwordLogin">
  </div>
  <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
  <a href="../view/createAccount.php" class="btn btn-primary">Crear cuenta</a>
</form>

