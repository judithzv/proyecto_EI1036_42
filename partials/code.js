function	handleFiles(e)	{
    let ctx	=	document.getElementById('canvas').getContext('2d');
    let img	=	new	Image;
    img.src	=	URL.createObjectURL(e.target.files[0]);
    img.onload	=	function()	{
                    ctx.drawImage(img,	20,20, 300, 150);
    }
    let photo = document.getElementById('photo');
    photo.setAttribute("value", document.getElementById('upload').files[0].name);
    guardar()
}

function mostrarFormulario() {
    let div = document.getElementById('oculto');
    div.style.display = 'block';
    let button = document.getElementById('subir_imagen');
    button.style.display = 'none';
}

function cerrarVentana() {
    let div = document.getElementById('oculto');
    div.style.display = 'none';
    let button = document.getElementById('subir_imagen');
    button.style.display = 'inline';
}

function guardar(){
    alert(document.getAttributeById('instrumento').value);
    localStorage.setItem('instrumento', document.getAttributeById('instrumento').value);
    localStorage.setItem('precio', document.getAttributeById('precio').value);
    localStorage.setItem('photo', document.getAttributeById('photo').value);}

function cargar(){
    let instrumento = localStorage.getItem('instrumento');
    let precio = localStorage.getItem('precio');
    let photo = localStorage.getItem('photo');
    if(!empty(instrumento)){
        document.getElementById('instrumento').innerHTML = instrumento;
    }
    if(!empty(precio)){
        document.getElementById('precio').setAttribute('value', precio);
    }
    if(!empty(photo)){
        document.getElementById('photo').setAttribute('value', photo);
    }
}