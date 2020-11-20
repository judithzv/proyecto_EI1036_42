function mostrarCarrito(cliente){
    var carrito =  JSON.parse(localStorage.getItem(cliente));
    var caja = document.getElementById('carrito_js');
    caja.className = 'visible widget';
    //h1 con emoticono compra
    if(!document.getElementById("titulo_carrito")){
        var h1=document.createElement("h1");
        h1.id = "titulo_carrito";
        h1.textContent="CARRITO DE LA COMPRA";
        var emoticono=document.createElement('i')
        emoticono.innerHTML='<i class="fa fa-cart-plus" aria-hidden="true"></i>';
        h1.appendChild(emoticono);
        caja.appendChild(h1);
    }
    var div = document.getElementById('carrito_div');
    if(!carrito || Object.entries(carrito).length === 0){
        if(div.textContent == ""){
            var tabla = document.getElementById("tabla_carrito");
            if(tabla){
                tabla.remove();
            }
            div.textContent = "Todavía no se ha añadido ningún producto a la cesta";
            caja.appendChild(div);
        }
    }
    else{ 
        actualizarCarrito(cliente);
    }

}

function ventanaCerrar() {
    var caja = document.getElementById('carrito_js');
    caja.className = 'oculto widget';
}
function actualizarCarrito(cliente){
    var caja = document.getElementById('carrito_js');
    var carrito = JSON.parse(localStorage.getItem(cliente));
            //dquitar texto de cesta vacía
            if(document.getElementById('carrito_div').textContent!=""){
                document.getElementById('carrito_div').textContent="";
            }

            //eliminar tabla para rehacerla
            if(caja.getElementsByTagName('table').length!=0){
                caja.removeChild(document.getElementById('tabla_carrito'));
                
            }
   
            var tabla =document.createElement("table");
            tabla.id = "tabla_carrito";
            var tblbody = document.createElement("tbody");   
             //cabecera   
            var tr1 = document.createElement("tr");
            tr1.innerHTML='<th>Imagen</th><th>Nombre</th><th>Precio</th><th>Cantidad</th><th></th>'
            tblbody.appendChild(tr1);

            var total = 0;
            var productos = 0;

            var id_producto = "";
       
            for (key in carrito){
                id_producto = key;
                var tr = document.createElement("tr");
                //imagen salga primero
                var td= document.createElement("td");
                var imagen=document.createElement("img")
                imagen.src=carrito[key]['imagen'];
                total += parseInt(carrito[key]['precio'])*parseInt(carrito[key]['cantidad']);
                productos += carrito[key]['cantidad'];
                td.appendChild(imagen);
                tr.append(td);
                //bucle demás atributos
                for (object in carrito[key]){
                    var td= document.createElement("td");
                    var añadir=carrito[key][object];
                    if (object!="imagen"){
                        if (object=="precio"){
                            añadir*=carrito[key]['cantidad'];
                        }
                        td.textContent=añadir;
                        tr.append(td);
                    }
                }
                td= document.createElement("td");
                let boton_borrar = document.createElement('a');
                boton_borrar.href = "#";
                boton_borrar.value = "Delete";
                boton_borrar.id = "delete";
                boton_borrar.textContent = "Quitar";
                boton_borrar.addEventListener('click', function(){borrar(id_producto, cliente);});
                var icon = document.createElement('i');
                icon.className = 'fa fa-trash';
                boton_borrar.appendChild(icon);
                td.appendChild(boton_borrar);
                tr.appendChild(td);

                tblbody.appendChild(tr);
            }

            var tr = document.createElement('tr');
            tr.appendChild(document.createElement('th'));
            tr.appendChild(document.createElement('th'));
            var th = document.createElement('th');
            th.textContent = "Total (" + productos + " productos)";
            tr.appendChild(th);
            th = document.createElement('th');
            th.textContent = total + "€";
            tr.appendChild(th);
            var boton_pagar = document.createElement('a');
            productos = "";
            cantidades = "";
            for(key in carrito){
                productos += key + ',';
                cantidades += carrito[key]['cantidad'] + ',';
            }
            productos = productos.slice(0, -1);
            cantidades = cantidades.slice(0, -1);
            boton_pagar.href = './portal.php?action=pagar&productos='+productos+'&cantidades='+cantidades;
            boton_pagar.value = 'pagar';
            boton_pagar.id = 'pagar';
            boton_pagar.textContent = "Pagar ";
            boton_pagar.addEventListener('click', function(){vaciarCarrito(cliente)});
            var icon = document.createElement('i');
            icon.className = 'fa fa-credit-card';
            boton_pagar.appendChild(icon);
            tr.appendChild(boton_pagar);
            tblbody.appendChild(tr);

            tabla.appendChild(tblbody);
            caja.appendChild(tabla);
        }

    function vaciarCarrito(cliente){
        localStorage.removeItem(cliente);
        actualizarCarrito(cliente);

    }


function add_product(row){
    var cliente = row['login'];
    var carrito = JSON.parse(localStorage.getItem(cliente));
    var id = row['product_id'];
    if(carrito && carrito[id]){
        carrito[id].cantidad+=1;
        localStorage.setItem(cliente, JSON.stringify(carrito));
  
    }
    else{
        if(!carrito){
            carrito = new Object();
        }
        var producto=new Object();
        producto.nombre = row['name'];
        producto.precio = row['price'];
        producto.imagen = row['image'];
        producto.cantidad = 1;
        carrito[id] = producto;
        localStorage.setItem(cliente, JSON.stringify(carrito));
    }
    var div = document.createElement('div');
    div.className = "alert alert-success alert-dismissable";
    div.textContent = "El producto ha sido eliminado de la cesta correctamente";
    var link = document.createElement('a');
    link.href="#";
    link.className = "close";
    link.setAttribute("data-dismiss", "alert");
    link.setAttribute("aria-label", close);
    link.innerHTML = "&times;";
    div.appendChild(link);
    document.body.insertBefore(div, document.getElementById('container').parentNode);
    actualizarCarrito(cliente);
}

function borrar(producto, cliente){
    var carrito = JSON.parse(localStorage.getItem(cliente));
    console.log(producto);
    console.log(carrito[producto]['nombre']);
    var cantidad = carrito[producto]['cantidad'];
    if(cantidad == 1){
        delete carrito[producto];
    }
    else{
        carrito[producto]['cantidad'] -= 1;
    }

    localStorage.setItem(cliente, JSON.stringify(carrito));
    mostrarCarrito(cliente);
}
    var caja = document.getElementById("carrito_js");
    if(caja){
        caja.onmousedown = function(){empezarArrastrar()} 
        function empezarArrastrar() { 
            document.body.className = "disableselect";
        document.onmouseup = finalizarArrastrar /*-una-función-*/ 
        document.onmousemove = moverElemento /*.bind(this)*/ } 
        function moverElemento(e) { 
        /*this is now the element that is moving*/ 
        caja.style.top = (caja.offsetTop + e.movementY) + "px"; caja.style.left = (caja.offsetLeft + e.movementX) + "px"; } 
        function finalizarArrastrar(e) { //podemos omitir el evento e ya que no lo usamos document.onmouseup = null; 
        document.onmousemove = null; 
        document.body.className = "";
        } 
    }