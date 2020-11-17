function mostrarCarrito(){
    var carrito =  JSON.parse(localStorage.getItem('carrito'));
    var caja = document.getElementById('carrito_js');
    caja.className = 'visible widget';
    var div = document.getElementById('carrito_div');
    if(!carrito){
        if(div.textContent == ""){
            div.textContent = "Todavía no se ha añadido ningún producto a la cesta";
            caja.appendChild(div);
        }
    }
        else{ 
            actualizarCarrito();
        }

}

function ventanaCerrar() {
    var caja = document.getElementById('carrito_js');
    caja.className = 'oculto widget';
}
function actualizarCarrito(){
    var caja = document.getElementById('carrito_js');
    var carrito = JSON.parse(localStorage.getItem('carrito'));
            //dquitar texto de cesta vacía
            if(document.getElementById('carrito_div').textContent!=" "){
                document.getElementById('carrito_div').textContent=" ";
            }

            //eliminar tabla para rehacerla
            if(caja.getElementsByTagName('table').length!=0){
                caja.removeChild(caja.lastChild);
                
            }
            else{
                //h1 con emoticono compra
                var h1=document.createElement("h1");
                h1.textContent="CARRITO DE LA COMPRA";
                var emoticono=document.createElement('i')
                emoticono.innerHTML='<i class="fa fa-cart-plus" aria-hidden="true"></i>';
                h1.appendChild(emoticono);
                caja.appendChild(h1);
            }
   
            var tabla =document.createElement("table");
            var tblbody = document.createElement("tbody");   
             //cabecera   
            var tr1 = document.createElement("tr");
            tr1.innerHTML='<th>Imagen</th><th>Nombre</th><th>Precio</th><th>Cantidad</th>'
            tblbody.appendChild(tr1);
       
            for (key in carrito){
                var tr = document.createElement("tr");
                //imagen salga primero
                var td= document.createElement("td");
                var imagen=document.createElement("img")
                imagen.src=carrito[key]['imagen'];
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
                tblbody.appendChild(tr);
            }
            tabla.appendChild(tblbody);
            caja.appendChild(tabla);
    
        
    }


function add(row){
    var carrito = JSON.parse(localStorage.getItem('carrito'));
    var id = row['product_id'];
    if(carrito && carrito[id]){
        carrito[id].cantidad+=1;
        localStorage.setItem('carrito', JSON.stringify(carrito));
  
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
        localStorage.setItem('carrito', JSON.stringify(carrito));
    }
    actualizarCarrito();
}
    var caja = document.getElementById("carrito_js"); 
    caja.onmousedown = function(){empezarArrastrar()} 
    function empezarArrastrar() { 
    document.onmouseup = finalizarArrastrar /*-una-función-*/ 
    document.onmousemove = moverElemento /*.bind(this)*/ } 
    function moverElemento(e) { 
    /*this is now the element that is moving*/ 
    caja.style.top = (caja.offsetTop + e.movementY) + "px"; caja.style.left = (caja.offsetLeft + e.movementX) + "px"; } 
    function finalizarArrastrar(e) { //podemos omitir el evento e ya que no lo usamos document.onmouseup = null; 
    document.onmousemove = null; 
    } 