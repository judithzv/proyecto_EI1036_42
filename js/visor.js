function getVisor(rows){

    rows.forEach(producto => anyadir(producto));

}

function anyadir(producto){
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
    var button = document.createElement('button');
    button.textContent = "Comprar";
    button.addEventListener('click', function(){add_product(producto)});
    div.appendChild(img);
    div.appendChild(p);
    div.appendChild(button);
    visor.appendChild(div);
}