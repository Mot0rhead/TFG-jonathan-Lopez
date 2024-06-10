<?php require_once ("../view/templates/header.php"); ?>

<table class="table table-striped table-hover table-bordered" id="tabla_carrito">
  <thead>
    <tr>
      <th scope="col">CÓDIGO</th>
      <th scope="col">#</th>
      <th scope="col">IMG</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">PRECIO</th>
      <th scope="col">UNIDADES</th>
      <th scope="col">AÑADIR</th>
      <th scope="col">RESTAR</th>
    </tr>
  </thead>
 
  <tbody>
     <script> 
         pintarTablaCarrito();
     </script>
  
  </tbody>
  <tfoot>
    <th scope="col">TOTAL</th>
    <script>
      var listaProductos = obtenerLocalStorage();
      var table = document.getElementById("tabla_carrito");
      var tfoot = table.getElementsByTagName("tfoot")[0];
      var fila = tfoot.insertRow(1);
      fila.className ="totalCarrito";
      var total= 0;
      for (let index = 0; index < listaProductos.length; index++) {
        total += listaProductos[index].unidades * listaProductos[index].precio;
      
      }
      fila.insertCell(0).innerHTML = total
    </script>
  </tfoot>
</table>

<button type="button" class="btn btn-warning rounded-pill px-3 btnSesion btnComprarCarrito" onclick="enviarCarrito()">Comprar</button>

<?php require_once ("../view/templates/footer.php"); ?>