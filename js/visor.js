function getVisor(){
    $Prod2ID={};
    fetch('/partials/datos.php').then(response => response.json()).then(data => anyadir(data));

}

function anyadir(productos){
        productos.forEach(producto => {
        var contenedor= document.getElementById("mincontainer");
        var visor = document.getElementsByClassName("visor")[0];
        var div = document.createElement('div');
        div.id = producto.product_id;
        div.className = "item";
        var img = document.createElement('img');
        img.src = producto.image;
        img.width = 200;
        img.height = 200;
        var p = document.createElement('p');
        p.textContent = producto.name + " " + producto.price + "€";
        datalist(producto.name);
        var button = document.createElement('button');
        button.textContent = "Comprar";
        button.addEventListener('click', function(){add_product(producto)});
        div.appendChild(img);
        div.appendChild(p);
        div.appendChild(button);
        visor.appendChild(div);
        contenedor.appendChild(visor);
        $Prod2ID[producto.name]=producto.product_id;
    });

    if(productos.length == 0){
        var div = document.createElement('div');
        div.id = 'inner-message';
        div.className = "alert alert-warning alert-dismissable";
        div.textContent = "No hay productos en ese rango de precios";
        var link = document.createElement('a');
        link.href="#";
        link.className = "close";
        link.setAttribute("data-dismiss", "alert");
        link.setAttribute("aria-label", close);
        link.innerHTML = "&times;";
        div.appendChild(link);
        var container = document.getElementById("message_container");
        container.appendChild(div);
    }
}

function datalist(nombre){
    var lista=document.getElementById("lista_productos");
    var opcion= document.createElement("option");
    opcion.value=nombre;
    lista.appendChild(opcion);
}
function cambio_visor(elemento){
    nombre=elemento.value;
    id=$Prod2ID[nombre];
    if(id){
        document.getElementById(id).scrollIntoView();
    }
}
function mostrarPrecios(){
    var min = document.getElementById('minimo').value;
    var max = document.getElementById('maximo').value;
    $Prod2ID={};
    var visor = document.getElementsByClassName('visor')[0];
    visor.innerHTML="";
    var lista=document.getElementById("lista_productos");
    var input = document.getElementById('input_list');
    input.value="";
    lista.innerHTML="";
    fetch('/partials/precios.php?min='+min+'&max='+max).then(response => response.json()).then(data => anyadir(data));
}
