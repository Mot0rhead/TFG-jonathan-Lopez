<?php

    class AcessoBD {
        
        const ESTADO_CANCELADO = 2;
        const ESTADO_PREPARACION = 1;
      
        private $_host = "localhost";
        private $_username = "Vendedor";
        private $_password = "1234";
        private $_database = "tienda_libreria";

        private static function connect() {
            $bbdd = mysqli_connect("localhost","Vendedor","1234","tienda_libreria");
            if (mysqli_connect_error()) {
                printf("Error conectando a la base de datos: %s\n",mysqli_connect_error());
                exit();
            }
            return $bbdd;
        }

        private static function disconnect($bbdd){
            mysqli_close($bbdd);
        }

        public static function crearClienteStripe($nombreCliente, $email){// recibir
            $stripe = new \Stripe\StripeClient('sk_test_51PICR4J5Ru1NqlVh9V3gDJFp9yIwo4V46A08rIROb62FtJD2yXV2hPzQILGB3l2oR7Qvs6indnH3T6Yd6Cs8dkXz004xX6XLtB');//poner en const
            $customer = $stripe->customers->create([
                'description' => $nombreCliente,
                'email' => $email,
               // 'payment_method' => 'card_visa',
            ]);
             return $customer["id"];
        }
  
        public static function crearPagoStripe($customerId,$totalCarrito){
            $stripe = new \Stripe\StripeClient('sk_test_51PICR4J5Ru1NqlVh9V3gDJFp9yIwo4V46A08rIROb62FtJD2yXV2hPzQILGB3l2oR7Qvs6indnH3T6Yd6Cs8dkXz004xX6XLtB'); // mi clave
            $pago = $stripe->paymentIntents->create([
            'amount' => $totalCarrito*100,  // cuanto paga
            'currency' => 'eur',// moneda
            'customer' => $customerId, // el customer 
            ]);
            $pago_id=$pago->id;
            return $pago_id;

        }
        public static function crearPrecioStripe($total){
           $stripe = new \Stripe\StripeClient('sk_test_51PICR4J5Ru1NqlVh9V3gDJFp9yIwo4V46A08rIROb62FtJD2yXV2hPzQILGB3l2oR7Qvs6indnH3T6Yd6Cs8dkXz004xX6XLtB');
           $precio = $stripe->prices->create([
                'currency' => 'eur',
                'unit_amount' => $total*100,
                //'recurring' => ['interval' => 'month'],
                'product_data' => ['name' => 'Gold Plan'],
              ]);

              return $precio->id;
        }
        public static function crearLinkPago($userID,$id_precio,$pago_id){
            $stripe = new \Stripe\StripeClient('sk_test_51PICR4J5Ru1NqlVh9V3gDJFp9yIwo4V46A08rIROb62FtJD2yXV2hPzQILGB3l2oR7Qvs6indnH3T6Yd6Cs8dkXz004xX6XLtB');
            $link = $stripe->paymentLinks->create([
            'line_items' => [
                [
                'price' => $id_precio,
                'quantity' => 1,
                ]
            ],
            'invoice_creation' => [
                'enabled' => true,
                'invoice_data' => [
                    'description' => 'Invoice for your purchase',
                    'footer' => 'Thank you for your business!',
                ]
            ],
            'after_completion' => [
                'type' => 'hosted_confirmation',
                // 'redirect' => [
                //     'url' => 'https://google.es' // Replace with your URL
                // ]
            ],
            ]);
             return $link->url;
        }
        public static function confirmarPagoStripe($pago_id){
            $stripe = new \Stripe\StripeClient('sk_test_51PICR4J5Ru1NqlVh9V3gDJFp9yIwo4V46A08rIROb62FtJD2yXV2hPzQILGB3l2oR7Qvs6indnH3T6Yd6Cs8dkXz004xX6XLtB'); // mi clave
            $stripe->paymentIntents->confirm(
            $pago_id,    
                [
                 'payment_method' => 'pm_card_visa',
                 'return_url' => 'https://www.example.com',
                ]
            );
        }
        public static function pagoConStripe($listaProductos){
             $userID = $_SESSION["id"];
             $success = '0';
             $total = 0;
 
             foreach($listaProductos as $producto){
     
                 $id = $producto["id"];
                 $unidades = $producto["unidades"];
                 $precio = $producto["precio"];
                 $total += $unidades* $precio;
             }
            
             $pago_id =  AcessoBD::crearPagoStripe($userID,$total);
             // $confirmacionPago = AcessoBD::confirmarPagoStripe($pago_id);
             $id_precio= AcessoBD::crearPrecioStripe($total);
             $linkPago = AcessoBD::crearLinkPago($userID,$id_precio,$pago_id);
             $success = $linkPago;
             return $success;
        }

        public static function getProductListRanking(){

            $bbdd=AcessoBD::connect();
            $productListRanking =[];

            if ($arrayResult = mysqli_query($bbdd,"SELECT * FROM productos where activo = 'Y' order by total_ventas desc")) {
                while ($record = mysqli_fetch_array($arrayResult)) {
                    array_push($productListRanking, $record);
                }
            }

            AcessoBD::disconnect($bbdd);
            return $productListRanking;
        }

        public static function getProductList(){

            $bbdd=AcessoBD::connect();
            $productList =[];

            if ($arrayResult = mysqli_query($bbdd,"SELECT * FROM productos where activo = 'Y'")) {
                while ($record = mysqli_fetch_array($arrayResult)) {
                    array_push($productList, $record);
                }
            }

            AcessoBD::disconnect($bbdd);
            return $productList;
        }
        public static function getuniqueProduct($id_producto){

            $bbdd=AcessoBD::connect();
            $productList =[];

            if ($arrayResult = mysqli_query($bbdd,"SELECT * FROM productos where activo = 'Y' and id = '$id_producto'")) {
                while ($record = mysqli_fetch_array($arrayResult)) {
                    array_push($productList, $record);
                }
            }

            AcessoBD::disconnect($bbdd);
            return $productList;
        }

        public static function getProductListAdmin(){

            $bbdd=AcessoBD::connect();
            $productList =[];

            if ($arrayResult = mysqli_query($bbdd,"SELECT * FROM productos")) {
                while ($record = mysqli_fetch_array($arrayResult)) {
                    array_push($productList, $record);
                }
            }

            AcessoBD::disconnect($bbdd);
            return $productList;
        }

        public static function getProductListSearch($textoBuscador){

            $bbdd=AcessoBD::connect();
            $productList =[];
            if ($arrayResult = mysqli_query($bbdd,"SELECT * FROM productos where activo = 'Y' and (UPPER(nombre) like '%$textoBuscador%' OR autor like UPPER('%$textoBuscador%') OR genero like UPPER('%$textoBuscador%') )" )) {
                while ($record = mysqli_fetch_array($arrayResult)) {
                    array_push($productList, $record);
                }
            }

            AcessoBD::disconnect($bbdd);
            return $productList;
        }

        public static function getUserList($user_id){

            $bbdd=AcessoBD::connect();
            $userList =[];
            $query = "SELECT id, nombre, nombreusu ,direccion,Activo,password FROM usuarios WHERE ID != '0'";

            if ($user_id != '0') { // Si el usuario no es el administrador
                $query .= " AND id = '$user_id'"; // Agregar la condición para el ID de usuario
            }
            if ($arrayResult = mysqli_query($bbdd,$query)) {
                while ($record = mysqli_fetch_array($arrayResult)) {
                    array_push($userList, $record);
                }
            }

            AcessoBD::disconnect($bbdd);
            return $userList;
        }

        public static function getOrderList($user_id){

            $bbdd=AcessoBD::connect();
            $orderList =[];
            $query = "SELECT id,id_cliente,fecha_pedido,total_pedido,ES.nombre_estado,direccion_pedido,
            metodo_pago,detalles_productos,info FROM pedidos INNER JOIN ESTADO ES ON ESTADO_PEDIDO=ES.ID_ESTADO";

            if ($user_id != '0') { // Si el usuario no es el administrador
                $query .= " WHERE id_cliente = '$user_id'"; // Agregar la condición para el ID de usuario
            }
            if ($arrayResult = mysqli_query($bbdd,$query)) {
                while ($record = mysqli_fetch_array($arrayResult)) {
                    array_push($orderList, $record);
                }
            }

            AcessoBD::disconnect($bbdd);
            return $orderList;
        }

        public static function getOrderDetails($order_id){

            $bbdd=AcessoBD::connect();
            $orderDetails =[];
            $query = "SELECT p.img,p.nombre,unidades,precio_unidad FROM detalles_pedido dp inner join productos p on dp.id_producto=p.id where id_pedido= $order_id;";
            if ($arrayResult = mysqli_query($bbdd,$query)) {
                while ($record = mysqli_fetch_array($arrayResult)) {
                    array_push($orderDetails, $record);
                }
            }

            AcessoBD::disconnect($bbdd);
            return $orderDetails;
        }

        public static function getComments($id_producto){

            $bbdd=AcessoBD::connect();
            $comentarios =[];
            $query = "SELECT comentario,puntuacion,u.nombre,id_libro,p.nombre as nombreProducto,p.descripcion,p.img,p.precio FROM comentarios c inner join usuarios u on c.id_usuario=u.id inner join productos p on c.id_libro = p.id where p.id= '$id_producto';";
            if ($arrayResult = mysqli_query($bbdd,$query)) {
                while ($record = mysqli_fetch_array($arrayResult)) {
                    array_push($comentarios, $record);
                }
            }

            AcessoBD::disconnect($bbdd);
            return $comentarios;
        }
        public static function getProductRanking(){
            
            $success = true;
            
            $bbdd=AcessoBD::connect();
            $query = "SELECT p.img,p.nombre,p.descripcion FROM productos p order by total_vendidos desc";


            $stmt2 = $bbdd->prepare($query);

            if (!$stmt2->execute()){ 
                $success = false;
            }

            AcessoBD::disconnect($bbdd);
            return $success;

        }

        public static function setInsertCart($listaProductos){


            $userID = $_SESSION["id"];
            $success = false;
            $fecha_pedido = date('Y-m-d H:i:s');  // Asignar el valor a una variable
            $estado_pedido = 1;
            $total = 0;

            foreach($listaProductos as $producto){
    
                $id = $producto["id"];
                $unidades = $producto["unidades"];
                $precio = $producto["precio"];
                $total += $unidades* $precio;
            }
            
            $bbdd=AcessoBD::connect();

            // $queryEstadoPedido = "Select nombre_estado from estado where id_estado = 1 ";
            // $stmt = $bbdd->prepare($queryEstadoPedido);
            // $stmt->execute();
            // $stmt->bind_result($estado_pedido);
            // $stmt->fetch();
            // $stmt1->close();

           
            $queryPedido = "INSERT INTO PEDIDOS(id_cliente,fecha_pedido,total_pedido,estado_pedido)VALUES(?,?,?,?);";
            $stmt2 = $bbdd->prepare($queryPedido);
            $stmt2->bind_param("ssss", $userID,$fecha_pedido,$total,$estado_pedido);
           // $stmt2->execute();
            if ($stmt2->execute()){ 
                $pedido_id = $stmt2->insert_id;
                //$success = true;
                AcessoBD::disconnect($bbdd);
               $success = AcessoBD::insertOrderDetails($pedido_id,$listaProductos,$userID);
            }

            //recuperar el id que se ha generado mirar como se hace en php

            
            //llamar a funcion y pasarle el id y la lista de productos
            return $success;
            
        }


        public static function insertOrderDetails($idPedido, $listaProductos, $idCliente){
            $success = true;
            // recorrer la lista de productos
            //por cada producto que encuentro en la lista se hace un insert (id pedido, pedido)
            $bbdd=AcessoBD::connect();
            foreach($listaProductos as $producto){ 
                $totalVentas =0;
                // Llamar a dos funciones dentro del bucle 
                // 1. Insertar en el detalle de pedido
                
                 $id_producto = $producto["id"];
                 $unidades = $producto["unidades"];
                 $precio = $producto["precio"];
                 $queryDetallePedido = "INSERT INTO detalles_pedido(id_pedido,id_producto,unidades,precio_unidad)VALUES(?,?,?,?);";
                
                // devolver codigo
                $stmt1 = $bbdd->prepare($queryDetallePedido);
                $stmt1->bind_param("iiid", $idPedido,$id_producto,$unidades,$precio);
                $stmt1->execute();
                $stmt1->close();
                // ACTUALIZAMOS EL CAMPO TOTAL_VENTAS
                $querySeleccionVentas = "SELECT total_ventas from productos where id = $id_producto ;";
                $stmt2 = $bbdd->prepare($querySeleccionVentas);
                $stmt2->execute();
                $stmt2->bind_result($totalVentas);
                $stmt2->fetch();
                $stmt2->close();

                $totalGeneral = $totalVentas + $unidades;
                $queryUpdateVentas = "UPDATE productos set total_ventas = ? where id = ?";
                $stmt3 = $bbdd->prepare($queryUpdateVentas);
                $stmt3->bind_param("ii", $totalGeneral, $id_producto);
                if (!$stmt3->execute()){ 
                    $success = false;
                }
                $stmt3->close();
                // 2.Actualizar el stock
                $queryUpdateStock = "UPDATE PRODUCTOS SET STOCK = STOCK - ? WHERE ID = ?;";
                $stmt4 = $bbdd->prepare($queryUpdateStock);
                $stmt4->bind_param("ii", $unidades,$id_producto);
                if (!$stmt4->execute()){ 
                    $success = false;
                }

            }

            //recuperar el id que se ha generado mirar como se hace en php

            AcessoBD::disconnect($bbdd);
            //llamar a funcion y pasarle el id y la lista de productos
            //return $success;
        }

        public static function updateVentas($idPedido, $listaProductos, $idCliente){
            $success = true;
            $totalVentas =0;
            // recorrer la lista de productos
            //por cada producto que encuentro en la lista se hace un insert (id pedido, pedido)
            $bbdd=AcessoBD::connect();
            foreach($listaProductos as $producto){ 
                $totalVentas=0;
                // Llamar a dos funciones dentro del bucle 
                // 1. Insertar en el detalle de pedido
                
                 $id_producto = $producto["id"];
                 $unidades = $producto["unidades"];
                 $querySeleccionVentas = "SELECT total_ventas from productos where id = $id_producto ;";
                 $stmt1 = $bbdd->prepare($querySeleccionVentas);
                 $stmt1->execute();
                 $stmt1->bind_result($totalVentas);

                 $queryUpdateVentas = "UPDATE productos set total_ventas = $totalVentas + $unidades where id = $id_producto ;";
            
                // devolver codigo
                $stmt2 = $bbdd->prepare($queryDetallePedido);
                $stmt2->bind_param("ssss", $idPedido,$id_producto,$unidades,$precio);

               
                if (!$stmt2->execute()){ 
                    $success = false;
                }
                // 2.Actualizar el stock
                $queryUpdateStock = "UPDATE PRODUCTOS SET STOCK = STOCK - ? WHERE ID = ?;";
                $stmt2 = $bbdd->prepare($queryUpdateStock);
                $stmt2->bind_param("ss", $unidades,$id_producto);
                if (!$stmt2->execute()){ 
                    $success = false;
                }

            }

            //recuperar el id que se ha generado mirar como se hace en php

            AcessoBD::disconnect($bbdd);
            //llamar a funcion y pasarle el id y la lista de productos
            return $success;
        }

        public static function login($username, $password){

            $result = null;
            if(empty($username) || empty($password)){
                return 0;
            }

            $bbdd=AcessoBD::connect();
            $hashed_password = md5($password);
            $query = "SELECT NOMBRE ,ID FROM usuarios WHERE NOMBREUSU= ? AND PASSWORD= ? AND Activo != 1";
            $stmt = $bbdd->prepare($query);
            $stmt->bind_param("ss", $username, $hashed_password);
            $stmt->execute();
            $stmt->bind_result($NOMBRE, $ID);
            $stmt->fetch();
            //$result = $stmt->fetch();
            
            AcessoBD::disconnect($bbdd);
            $result = array($NOMBRE,$ID);
            return $result;
        }
        
    

    public static function cancelOrder($idPedido){
        $success = false;
        $estado_cancelado = 2;
        
        $bbdd=AcessoBD::connect();

        $query = "UPDATE PEDIDOS SET ESTADO_PEDIDO = ? WHERE ID = ? ";
        $stmt = $bbdd->prepare($query);
            $stmt->bind_param("ss",$estado_cancelado,$idPedido );
            if ($stmt->execute()){ 
                $success = true;
                }
            //$result = $stmt->fetch();
            
            AcessoBD::disconnect($bbdd);
            return $success;
    }

    public static function unsubscribeUser($idUsu){

        $success = false;
        
        
        $bbdd=AcessoBD::connect();

        $query = "UPDATE usuarios SET Activo = 1 where id = '$idUsu'";
        $stmt = $bbdd->prepare($query);
           
            if ($stmt->execute()){ 
                $success = true;
                }
            //$result = $stmt->fetch();
            
            AcessoBD::disconnect($bbdd);
            return $success;
    }

    public static function registerUser($idUsu){

        $success = false;
        
        
        $bbdd=AcessoBD::connect();

        $query = "UPDATE usuarios SET Activo = 0 where id = '$idUsu'";
        $stmt = $bbdd->prepare($query);
           
            if ($stmt->execute()){ 
                $success = true;
                }
            //$result = $stmt->fetch();
            
            AcessoBD::disconnect($bbdd);
            return $success;
    }

    public static function newUser($userName,$email,$password,$adress,$city){

        $success = false;
        
        $userId = AcessoBD::crearClienteStripe($userName, $email);
        echo $userId;
        $bbdd=AcessoBD::connect();

        $queryUsu = "INSERT INTO usuarios (id,nombre,nombreusu,password,direccion,ciudad,activo) VALUES (?,?,?,?,?,?,0)";
        $stmt = $bbdd->prepare($queryUsu);
        $stmt->bind_param("ssssss",$userId,$email,$userName,md5($password),$adress,$city);

       /* $queryAdress = "INSERT INTO usuarios (nombre,nombreusuario,password,activo) VALUES (?,?,?,0)";
        $stmt = $bbdd->prepare($queryAdress);
        $stmt->bind_param("sss",$email,$userName,$password);*/


            if ($stmt->execute()){ 
                $success = true;
                }
            //$result = $stmt->fetch();
            
            AcessoBD::disconnect($bbdd);
            return $success;
    }

    public static function cambioProducto($idProducto,$stock,$nombre,$descripcion,$precio,$estado){

        
        $success = false;
        
        
        $bbdd=AcessoBD::connect();

        $queryUsu = "UPDATE productos set stock = ? , nombre = ? , descripcion = ? , precio = ? , activo = ? WHERE ID = ?";
        $stmt = $bbdd->prepare($queryUsu);
        $stmt->bind_param("ssssss",$stock,$nombre,$descripcion,$precio,$estado,$idProducto);

            if ($stmt->execute()){ 
                $success = true;
                }
            //$result = $stmt->fetch();
            
            AcessoBD::disconnect($bbdd);
            return $success;

    }
   
    public static function modificarDatosCliente($idCliente,$nombre,$nombreUsu,$password,$direccion){

        $success = false;
        $passwordVacia;
        $bbdd=AcessoBD::connect();
        
        if (empty($password)){
            $queryPass = "SELECT password FROM usuarios WHERE id = ?";
            $stmt1 = $bbdd->prepare($queryPass);
            $stmt1->bind_param("s",$idCliente);

            if ($stmt1->execute()){ 
                $stmt1->bind_result($passwordVacia);
                $stmt1->fetch();
                $stmt1->close();
                }
               

            $queryUsu = "UPDATE usuarios set nombre = ? , nombreusu = ? , password = ? , direccion = ? WHERE id = ?";
            $stmt2 = $bbdd->prepare($queryUsu);
            $stmt2->bind_param("sssss",$nombre,$nombreUsu,$passwordVacia,$direccion,$idCliente);
        
                if ($stmt2->execute()){ 
                    $success = true;
                    $stmt2->close();
                    }
        }else{
             $passwordVar = md5($password);
             $queryUsu = "UPDATE usuarios set nombre = ? , nombreusu = ? , password = ? , direccion = ? WHERE id = ?";
             $stmt = $bbdd->prepare($queryUsu);
             $stmt->bind_param("sssss",$nombre,$nombreUsu,$passwordVar,$direccion,$idCliente);
        
                if ($stmt->execute()){ 
                    $success = true;
                    }
        
            }
            AcessoBD::disconnect($bbdd);
            return $success;

     }
     public static function modificarNombredeCliente($idCliente){
        $nombre;
     
        $bbdd=AcessoBD::connect();
        $queryUsu = "SELECT nombre from usuarios WHERE id = ?";
        $stmt = $bbdd->prepare($queryUsu);
        $stmt->bind_param("s",$idCliente);
        $stmt->execute();
            
            $stmt->bind_result($nombre);
            $stmt->fetch();
            $stmt->close();
            AcessoBD::disconnect($bbdd);
        return $nombre;
     }

     public static function setComments($idCliente,$comentario,$puntuacion,$id_libro){

        $success = false;
        $puntuacionMedia =0;
        $bbdd=AcessoBD::connect();

            $queryUsu = "INSERT INTO comentarios (id_libro,comentario,puntuacion,id_usuario) VALUES(?,?,?,?)";
            $stmt1 = $bbdd->prepare($queryUsu);
            $stmt1->bind_param("ssss",$id_libro,$comentario,$puntuacion,$idCliente);
        
                if ($stmt1->execute()){ 
                    $success = true;
                    }
            $queryPuntuacionMedia = "SELECT ROUND(avg(puntuacion)) from comentarios where id_libro = ?";
            $stmt2 = $bbdd->prepare($queryPuntuacionMedia);
            $stmt2->bind_param("i",$id_libro);
                
                if ($stmt2->execute()){ 
                    $success = true;
                    }
            $stmt2->bind_result($puntuacionMedia);
            $stmt2->fetch();
            $stmt2->close();

            $queryUpdatePuntuacion = "UPDATE productos set valoracion_media = ? where id = ?";
            $stmt3 = $bbdd->prepare($queryUpdatePuntuacion);
            $stmt3->bind_param("ss",$puntuacionMedia,$id_libro);
        
                if ($stmt3->execute()){ 
                    $success = true;
                    }

            AcessoBD::disconnect($bbdd);
            return $success;

     }
     public static function calculateValuationAVRG(){

        $success = false;
        $bbdd=AcessoBD::connect();

        $avgList = [];
        if ($arrayResult = mysqli_query($bbdd, "SELECT ID_LIBRO,ROUND(AVG(puntuacion), 0) AS avg_puntuacion FROM comentarios GROUP BY ID_LIBRO")) {
            while ($record = mysqli_fetch_assoc($arrayResult)) {
                // Almacena cada registro en $avgList
                $avgList[] = $record;
            }
            // Recorre $avgList para actualizar la tabla de productos
            foreach ($avgList as $avg) {
                $id_libro = $avg['ID_LIBRO'];
                $avg_puntuacion = $avg['avg_puntuacion'];
                // Actualiza la tabla de productos con la puntuación promedio correspondiente
                $query = "UPDATE productos SET valoracion_media = $avg_puntuacion WHERE id= $id_libro";
                mysqli_query($bbdd, $query);
            }
        }

        AcessoBD::disconnect($bbdd);
     }     

     public static function subirProducto($nombreProducto,$precio,$descripcion,$existencias,$imagen,$autor,$genero,$activo){

        $success = false;
        $bbdd=AcessoBD::connect();

        $queryUsu = "INSERT INTO productos (nombre,precio,descripcion,stock,img,activo,total_ventas,autor,genero,valoracion_media) VALUES(?,?,?,?,?,?,'0',?,?,'0')";
        $stmt1 = $bbdd->prepare($queryUsu);
        $stmt1->bind_param("ssssssss",$nombreProducto,$precio,$descripcion,$existencias,$imagen,$activo,$autor,$genero,);
        
        if ($stmt1->execute()){ 
            $success = true;
        }
        AcessoBD::disconnect($bbdd);

     }

}

?>

