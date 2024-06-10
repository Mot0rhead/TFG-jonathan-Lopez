function toast(mensaje,color){
	$.toast({
		text: mensaje,
		bgColor: color == undefined ? "blue" : color ,
		position: 'top-right',
		stack: false
	})
}

function obtenerLocalStorage(){
	// si tenemos un storage lo recuperamos
	var storage = JSON.parse(localStorage.getItem("carrito"));
	if(storage == null){
		//si no existe creamos un storage vacio para que no rompa nada
		storage = [];
	}

	return storage;
}

$(document).on('click', '.anyadirProductoAlCarrito', function(){
	
	debugger;
	var precio=this.parentNode.childNodes[9].childNodes[0].innerText;
	var id = this.parentNode.childNodes[1].innerText;
	var existencias = this.parentNode.getElementsByClassName("stock")[0].innerText;
	var nombre = this.parentNode.getElementsByClassName("nombre")[0].innerText;
	
	var img = this.parentNode.parentNode.getElementsByClassName("productImg")[0].src;
	 
		
	var carrito = obtenerLocalStorage();

	// ver si el producto existe en el carrito
	var result = carrito.filter(obj => { 
		return obj.id === id;
	});

	if(existencias <= 0){
		toast("No hay existencias","red");
		return;
	}

	if(result[0] != undefined && result[0].unidades >= existencias ){
		toast("Solo quedan "+existencias+" unidades en stock","red");
		return;
	}

	if(result.length == 1){
		result[0].unidades++;
		toast("Producto añadido al carrito","green");
	}else{
		var producto =  data = {
			id: id,
			precio: precio,
			existencias: existencias,
			nombre : nombre,
			img : img,
			unidades: 1
		};
		// se añade al carrito
		carrito.push(producto);
		
		toast("Producto añadido al carrito","green");
	}

	// guardamos en el sitio carrito todo el carrito con todos los productos que tiene dentro
	localStorage.setItem("carrito",JSON.stringify(carrito));
	actualizarContadorCarrito();
});

function actualizarContadorCarrito(){
	//sumar unidades en un for each
	var total = 0;
	var carrito = obtenerLocalStorage();
	carrito.forEach(x => {total += x.unidades});
	console.log(total);
	$(".numCarrito").html(total);
}



function restarUnidadesProducto(btn){
	var carrito = obtenerLocalStorage();

	var id = btn.parentNode.parentNode.childNodes[0].innerText;
	
	
	var result = carrito.filter(obj => { 
		return obj.id === id;
	});

	if(result[0] != undefined && result[0].unidades == 1 ){
		
		var index = carrito.indexOf(result[0]);
		carrito.splice(index,1);
		localStorage.setItem("carrito",JSON.stringify(carrito));
		pintarTablaCarrito();
		actualizarContadorCarrito();
		calcularTotalCarrito();
	}else{
		result[0].unidades--;
		btn.parentNode.parentNode.childNodes[5].innerText=result[0].unidades;
		localStorage.setItem("carrito",JSON.stringify(carrito));
		actualizarContadorCarrito();
		calcularTotalCarrito();
		toast("Se ha restado una unidad","green");
	}

	
}
function calcularTotalCarrito(){
	//sumar unidades en un for each
	var total = 0;
	var carrito = obtenerLocalStorage();
	carrito.forEach(x => {total += x.precio*x.unidades});
	console.log(total);
	debugger;
	$(".totalCarrito td").html(total);
}

function pintarTablaCarrito(){
	var listaProductos = obtenerLocalStorage();
	var table = document.getElementById("tabla_carrito");
	var tbody = table.getElementsByTagName("tbody")[0];	
 
		//limpiar antes de añadir 
	while(tbody.firstChild){
		tbody.removeChild(tbody.firstChild);
	};
		
	
	
	
	for (let index = 0; index < listaProductos.length; index++) {
		 var fila = tbody.insertRow(index);

		 fila.insertCell(0).innerHTML = listaProductos[index].id;
		 fila.insertCell(1).innerHTML = index;
		 fila.insertCell(2).innerHTML = '<img src='+listaProductos[index].img+' weigth="50"  height="50">';
		 fila.insertCell(3).innerHTML = listaProductos[index].nombre;
		 fila.insertCell(4).innerHTML = listaProductos[index].precio;
		 fila.insertCell(5).innerHTML = listaProductos[index].unidades;
		 fila.insertCell(6).innerHTML = "<button onclick='anyadirUnidadesProducto(this)' class='fa-solid fa-plus'></button>";
		 fila.insertCell(7).innerHTML = "<button onclick='restarUnidadesProducto(this)'class='fa-solid fa-minus'></button>";
	}
}


function anyadirUnidadesProducto(btn){
	
	var carrito = obtenerLocalStorage();
	
	var id = btn.parentNode.parentNode.childNodes[0].innerText;
	
	var result = carrito.filter(obj => { 
		return obj.id === id;
	});

	var existencias = result[0].existencias;
	
	if(result[0] != undefined && result[0].unidades >= existencias ){
		toast("Solo quedan "+existencias+" unidades en stock","red");
	}else{
		result[0].unidades++;
		btn.parentNode.parentNode.childNodes[5].innerText=result[0].unidades;
		localStorage.setItem("carrito",JSON.stringify(carrito));
		actualizarContadorCarrito();
		calcularTotalCarrito();
		toast("Se ha añadido una unidad","green");
	}
	
}


function enviarCarrito(){

	var carrito = obtenerLocalStorage();
	if(carrito.length == 0){
		toast("No se puede tramitar un pedido vacío.","red");
		return;
	}

	// 	const cors = require('cors');
	// 	const corsOptions ={
	// 		origin:'http://localhost:3000', 
	// 		credentials:true,            //access-control-allow-credentials:true
	// 		optionSuccessStatus:200
	// 	}
	// app.use(cors(corsOptions));
	$.ajax({

		method:"POST",
		url:"../control/insertarPedido.php",
		data:{
			listaProductos : carrito
		},
		success:function(response){
			debugger;
			if (response != 0){
				toast("Pedido añadido correctamente","green");
				localStorage.removeItem("carrito");
				window.location.replace('../view/pagoStripe.php?urlStripe='+response);
				// setTimeout(function() {
				// 	// Recargar la página después de 3 segundos
				// 	location.reload();
				// }, 3000)
			}else{	
				toast("No se ha podido tramitar el pedido. Asegurese de estar logeado","red");
			}	
		}
	});

}
function cancelarPedido(btn){
	
	var id = btn.parentNode.parentNode.childNodes[1].innerText;

	$.ajax({

		method:"POST",
		url:"../control/cancelarPedido.php",
		data:{
			idPedido : id
		},
		success:function(response){
			//debugger;
			if (response == 1){
				toast("Pedido cancelado correctamente.","green");
				
			}else{	
				toast("No se ha podido cancelar el pedido.","red");
			}	
		}
	});
	
}

function darBajaUsario(btn){
	
	var id = btn.parentNode.parentNode.childNodes[1].innerText;

	$.ajax({

		method:"POST",
		url:"../control/darDeBajaUsuario.php",
		data:{
			idUsuario : id
		},
		success:function(response){
			debugger;
			if (response == 1){
				toast("Usuario dado de baja correctamente.","green");
				
			}else{	
				toast("No se ha podido dar de baja el usuario.","red");
			}	
		}
	});

}

function darAltaUsario(btn){
	debugger;
	var id = btn.parentNode.parentNode.childNodes[1].innerText;

	$.ajax({

		method:"POST",
		url:"../control/darDeAltaUsuario.php",
		data:{
			idUsuario : id
		},
		success:function(response){
			//debugger;
			if (response == 1){
				toast("Usuario dado de alta correctamente.","green");
				
			}else{	
				toast("No se ha podido dar de alta el usuario.","red");
			}	
		}
	});

}

function enviarCambioProducto(btn){
	debugger;
	var id = btn.parentNode.parentNode.childNodes[3].firstElementChild.innerText;
	var stock = btn.parentNode.parentNode.querySelector('.stock input').value
	var nombre = btn.parentNode.parentNode.querySelector('.nombreProducto').value
	var descripcion = btn.parentNode.parentNode.querySelector('.descripcionProducto').value
	var precio = btn.parentNode.parentNode.querySelector('#precio').value
	var estado = btn.parentNode.parentNode.querySelector('#estado').value

	if(precio < 0 || stock < 0){
		toast("Por favor introduce un precio o cantidad de existencias mayor a 0","red");
		return;
	}

	$.ajax({

		method:"POST",
		url:"../control/cambiosProducto.php",
		data:{
			idProducto : id,
			stock : stock,
			nombre : nombre,
			descripcion : descripcion,
			precio : precio,
			estado : estado
		},
		success:function(response){
			//debugger;
			if (response == 1){
				toast("Cambios realizados","green");
				setTimeout(function() {
					// Recargar la página después de 3 segundos
					location.reload();
				}, 3000)
				
			}else{	
				toast("No se ha podido ver los detalles del pedido.","red");
			}	
		}
	});
}

function modificarDatosCliente(btn){
	debugger;
	var id = btn.parentNode.parentNode.childNodes[1].innerText;
	var nombre = btn.parentNode.parentNode.childNodes[3].childNodes[0].value;
	var nombreUsuario = btn.parentNode.parentNode.childNodes[5].childNodes[0].value;
	var direccion = btn.parentNode.parentNode.childNodes[7].childNodes[0].value;
	var password = btn.parentNode.parentNode.childNodes[9].childNodes[0].value;

	if(!nombre.includes('@')){
		toast("Por favor inserta un email valido","red");
		return;
	}
	$.ajax({

		method:"POST",
		url:"../control/modificarDatosCliente.php",
		data:{
			id : id,
			nombre : nombre,
			nombreUsuario : nombreUsuario,
			password : password,
			direccion : direccion
		},
		success:function(response){
			debugger;
			if (response == 1){
				toast("Cambios realizados","green");
				// $(".nombreDeUsuario").html(btn.parentNode.parentNode.childNodes[3].childNodes[0].value);
				setTimeout(function() {
					// Recargar la página después de 3 segundos
					location.reload();
				}, 3000)
				
			}else{	
				toast("No se ha podido realizar los cambios en el cliente.","red");
			}	
		}
	});
}

function verDetallesPedido(btn){
	debugger;
	var id = btn.parentNode.parentNode.parentNode.parentNode.childNodes[1].innerText;

	$.ajax({

		method:"POST",
		url:"../control/verDetallesPedido.php",
		data:{
			idPedido : id
		},
		success:function(response){
			//debugger;
			if (response == 1){
				
			}else{	
				toast("No se ha podido ver los detalles del pedido.","red");
			}	
		}
	});

}
function toggleDetalle(elemento) {
    var detalleRow = elemento.closest('tr').nextElementSibling;
    if (detalleRow.style.display === "table-row" || detalleRow.style.display === "") {
        detalleRow.style.display = "none";
    } else {
        detalleRow.style.display = "table-row";
    }
	verDetallesPedido(elemento);
	//recuperar el id del pedido
	//lanzar consulta para ver los productos de ese pedido
	//llamar funcion que muestre el listado de productos
}

let flag = true;
function mostrarContrasenya(btn){

	var elemento = btn.parentNode.parentNode.childNodes[9].childNodes[1];

	if(flag == true){
		btn.parentNode.parentNode.childNodes[9].childNodes[0].type = "text";
		elemento.classList.remove("fa-eye-slash");
		elemento.classList.add("fa-eye");
	}else{
		btn.parentNode.parentNode.childNodes[9].childNodes[0].type = "password";
		elemento.classList.remove("fa-eye");
		elemento.classList.add("fa-eye-slash");
	}

	flag =! flag ;
	
}