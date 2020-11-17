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
            var carrito = JSON.parse(localStorage.getItem('carrito'));
            //alert(JSON.stringify(carrito));
            if(document.getElementById('carrito_div').textContent!=" "){
                document.getElementById('carrito_div').textContent=" ";
            }

            if(caja.getElementsByTagName('table').length!=0){
                caja.removeChild(caja.lastChild);
                
            }
            else{
                var h1=document.createElement("h1");
                h1.textContent="CARRITO DE LA COMPRA";
                caja.appendChild(h1);
            }

            var tabla =document.createElement("table");
            var tblbody = document.createElement("tbody");      
            var tr1 = document.createElement("tr");
            var th1 = document.createElement("th");
            th1.textContent="Nombre";
            var th2 = document.createElement("th");
            th2.textContent="Precio";
            var th3 = document.createElement("th");
            th3.textContent="Imagen";
            var th4 = document.createElement("th");
            th4.textContent="Cantidad";
            tr1.appendChild(th1);
            tr1.appendChild(th2);
            tr1.appendChild(th3);
            tr1.appendChild(th4);
            tblbody.appendChild(tr1);
       
            for (key in carrito){
                var tr = document.createElement("tr");
                for (object in carrito[key]){
                    var td= document.createElement("td");
                    var añadir=carrito[key][object];
                    if (object=="imagen"){
                        var imagen=document.createElement("img")
                        imagen.src=carrito[key]['imagen'];
                        imagen.style.width = "100px";
                        imagen.style.height = "100px";
                        td.appendChild(imagen);
                    }
                    else{
                        if (object=="precio"){
                            añadir*=carrito[key]['cantidad'];
                        }
                        td.textContent=añadir;
                    }
                    tr.append(td);

                }
                tblbody.appendChild(tr);

            }
            tabla.appendChild(tblbody);
            tabla.setAttribute("border", "2");
            caja.appendChild(tabla);
    
        }

            



}

function ventanaCerrar() {
    let caja = document.getElementById('carrito_js');
    caja.className = 'oculto widget';
}

function add(row){
    var carrito = JSON.parse(localStorage.getItem('carrito'));
    //alert(JSON.stringify(carrito));
    var id = row['product_id'];
    //alert(id);
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
}
    let caja = document.getElementById("carrito_js"); 
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