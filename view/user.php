<tr>
  <th scope="row" hidden><?php echo $_GET['user']['id'] ?></th>
  <td><input type="email" class ="nombreProducto form-control" placeholder="Nombre" id="nombre" name="nombre" value="<?php echo $_GET['user']['nombre']  ?>"/> </td>
  <td><input type="text" class ="NombreUsuario form-control" placeholder="Nombre Usuario" id="nombreUsu" name="nombreUsu" value="<?php echo $_GET['user']['nombreusu'] ?>"/></td>
  <td><input type="text" class ="direccion form-control" placeholder="Direccion" id="direccion" name="direccion" value="<?php echo $_GET['user']['direccion'] ?>"/></td>
  <td><input type="password" class ="Contraseña form-control" placeholder="Contraseña" id="password" name="password" value=""/><i class="fa-solid fa-eye-slash" id="icono_ojo" onclick ="mostrarContrasenya(this)"></i></td>
  <?php 

    if($_SESSION["id"]== 0){

      if($_GET['user']['Activo'] == "0"){
  ?>

  <td><button type="button" class="btn btn-warning rounded-pill px-3 btnSesion btnBajaUsuario" onclick="darBajaUsario(this)">Dar de baja Usuario</button></td>

  <?php 
      }else{
  ?>
  <td><button type="button" class="btn btn-warning rounded-pill px-3 btnSesion btnBajaUsuario" onclick="darAltaUsario(this)">Dar de alta Usuario</button></td>

  
  <?php
      }
    }
  ?>
  <td><button type="button" class="btn btn-warning rounded-pill px-3 btnSesion btnBajaUsuario" onclick="modificarDatosCliente(this)">Enviar datos</button></td>  
  <!-- <td><?php //echo $_GET['user']['direccion'] ?></td>
  <td><?php //echo $_GET['user']['pais'] ?></td>
  <td><?php //echo $_GET['user']['ciudad'] ?></td>
  <td><?php //echo $_GET['user']['password'] ?></td> -->
</tr>