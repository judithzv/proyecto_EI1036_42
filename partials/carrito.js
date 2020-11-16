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
            var table = document.createElement('table');
            table.innerHTML = '<tr><th></th><th>Producto</th><th>Cantidad</th><th>Precio</th></tr>';
            caja.removeChild(div);
            caja.appendChild(table);
            for(i=0; i<carrito.length; i++){
            }
    }

}

function close() {
    alert("hola");
    let caja = document.getElementById('carrito_js');
    alert(caja);
    caja.className = 'oculto widget';
}

function add(row){
    var carrito = JSON.parse(localStorage.getItem('carrito'));
    alert(JSON.stringify(carrito));
    var producto = new Object();
    var id = row['product_id'];
    if(carrito && carrito[id]){
        carrito[id].cantidad += 1;
    }
    else{
        if(!carrito){
            carrito = new Object();
        }
        producto.nombre = row['name'];
        producto.precio = row['price'];
        producto.imagen = row['image'];
        producto.cantidad = 1;
        carrito[id] = producto;
        localStorage.setItem('carrito', JSON.stringify(carrito));
    }
}
    let divCaja = document.getElementById("carrito_js"); 
    divCaja.onmousedown = function(){startDrag()} 
    function startDrag() { 
    document.onmouseup = finishDrag /*-una-función-*/ 
    document.onmousemove = moveElement /*.bind(this)*/ } 
    function moveElement(e) { 
    /*this is now the element that is moving*/ 
    divCaja.style.top = (divCaja.offsetTop + e.movementY) + "px"; divCaja.style.left = (divCaja.offsetLeft + e.movementX) + "px"; } 
    function finishDrag(e) { //podemos omitir el evento e ya que no lo usamos document.onmouseup = null; 
    document.onmousemove = null; 
    } 