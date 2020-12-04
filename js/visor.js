function getVisor(rows){
    $Prod2ID={};
    rows.forEach(producto => anyadir(producto));

}

function anyadir(producto){
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
    document.getElementById(id).scrollIntoView();
}
function getVisor1(rows){
    rows.forEach(producto => mostrar(producto));

}
function mostrar(producto){
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
    div.appendChild(img);
    div.appendChild(p);
    visor.appendChild(div);
    contenedor.appendChild(visor);
}
