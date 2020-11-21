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
            div.textContent = "Todavía no se ha añadido ningún producto.";
            var imagen=document.createElement("img")
            imagen.src="./img/carrito.jpg";
            imagen.setAttribute("id","imagen_vacio");
            caja.append(imagen);      
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
            if(document.getElementById('imagen_vacio')){
                document.getElementById('imagen_vacio').remove();
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
       
            for (key in carrito){
                let id_producto = key;
                var tr = document.createElement("tr");
                //imagen salga primero
                var td= document.createElement("td");
                var imagen=document.createElement("img")
                imagen.src=carrito[key]['imagen'];
                imagen.setAttribute("id","imagen_instrumento");
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
                boton_borrar.textContent = "Quitar ";
                boton_borrar.addEventListener('click', function(){borrar(id_producto, cliente);});
                var icon = document.createElement('i');
                icon.className = 'fa fa-trash';
                boton_borrar.appendChild(icon);
                td.appendChild(boton_borrar);
                tr.appendChild(td);

                tblbody.appendChild(tr);
            }

            var tr = document.createElement('tr');
            tr.appendChild(document.createElement('td'));
            tr.appendChild(document.createElement('td'));
            var td = document.createElement('td');
            td.textContent = "Total (" + productos + " productos)";
            tr.appendChild(td);
            td = document.createElement('td');
            td.textContent = total + "€";
            tr.appendChild(td);
            
            td = document.createElement('td');
            var form = document.createElement('form');
            form.action = './portal.php?action=pagar';
            form.method = 'POST';

            productos = "";
            cantidades = "";
            for(key in carrito){
                productos += key + ',';
                cantidades += carrito[key]['cantidad'] + ',';
            }
            productos = productos.slice(0, -1);
            cantidades = cantidades.slice(0, -1);
            var input_productos = document.createElement('input');
            input_productos.name = 'productos';
            input_productos.value = productos;
            input_productos.type = 'hidden';

            var input_cantidades = document.createElement('input');
            input_cantidades.name = 'cantidades';
            input_cantidades.value = cantidades;
            input_cantidades.type = 'hidden';

            var boton_pagar = document.createElement('input');
            boton_pagar.type = 'submit';
            boton_pagar.name = 'bntSubmit';
            boton_pagar.className = 'btn fa-input';
            boton_pagar.value = 'Pagar';
            form.onsubmit = function(){vaciarCarrito(event, cliente, this)};
            var icon = document.createElement('i');
            icon.className = 'fa fa-credit-card';

            form.appendChild(input_cantidades);
            form.appendChild(input_productos);
            form.appendChild(boton_pagar);
            boton_pagar.appendChild(icon);
            td.appendChild(form);
            tr.appendChild(td);

            tblbody.appendChild(tr);

            tabla.appendChild(tblbody);

            caja.appendChild(tabla);
        }

    function vaciarCarrito(event, cliente, form){
        event.preventDefault();
        localStorage.removeItem(cliente);
        var carrito = document.getElementById('carrito_js');
        carrito.className = 'oculto';
        form.submit();
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
    div.id = 'inner-message';
    div.className = "alert alert-success alert-dismissable";
    div.textContent = "El producto ha sido añadido a la cesta correctamente";
    var link = document.createElement('a');
    link.href="#";
    link.className = "close";
    link.setAttribute("data-dismiss", "alert");
    link.setAttribute("aria-label", close);
    link.innerHTML = "&times;";
    div.appendChild(link);
    var container = document.getElementById("message_container");
    container.appendChild(div);
    actualizarCarrito(cliente);
}

function borrar(producto, cliente){
    var carrito = JSON.parse(localStorage.getItem(cliente));
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