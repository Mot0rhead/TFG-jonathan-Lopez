<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img href="/" src="../assets/img/Rimberio.png" width="100" height="100"/>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../view/inicio.php"><i class="fa-solid fa-house"></i> Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../control/productList.php"><i class="fa-solid fa-box-open"></i> Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../control/productRanking.php"><i class="fa-solid fa-ranking-star"></i> Ranking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../control/orderList.php"><i class="fa-solid fa-list"></i> Pedidos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../control/userList.php"><i class="fa fa-users"></i> Usuarios</a>
        </li>
     </ul>

     <ul class="navbar-nav ms-auto">
        <li class="nav-item nombreDeUsuario">
          <?php
            if (isset($_SESSION['username'])) {
              // Mostrar el nombre de usuario
              ?>
              <a class="nav-link" href="#"><?php
              echo $_SESSION['username'];
          }else{
            ?>
            <a class="nav-link" href="#"><i class="fa-solid fa-user">
            <?php
          }
          ?>
          </i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../control/carrito.php"><i class="fa-solid fa-cart-shopping numCarrito"></i></a>
        </li>
        <?php
            if (!isset($_SESSION["username"])) {
                ?>
        <li class="nav-item">
          <a class="nav-link" href="../view/login.php"><i class="fa fa-sign-in"></i> Iniciar Sesión</a>
        </li>
        <?php
                } else {
                ?>
        <li class="nav-item">
          <a class="nav-link" href="../control/logout.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
        </li>
        <?php
                }
                ?>
     </ul>

    </div>
  </div>
</nav>