function	handleFiles(e)	{
    let ctx	=	document.getElementById('canvas').getContext('2d');
    let img	=	new	Image;
    img.src	=	URL.createObjectURL(e.target.files[0]);
    img.onload	=	function()	{
                    ctx.drawImage(img,	20,20, 300, 150);
    }
    comprobartamaño();
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
    let formulario = document.forms['rellenar'];
    let instrumento = formulario['instrumento'].value;
    let precio = formulario['precio'].value;
    let photo = formulario['photo'].value;
    localStorage.setItem('instrumento',instrumento);
    localStorage.setItem('precio', precio);
    localStorage.setItem('photo', photo);
    
}



function cargar(){
    let instrumento = localStorage.getItem('instrumento');
    let precio = localStorage.getItem('precio');
    let photo = localStorage.getItem('photo');
    let formulario = document.forms['rellenar'];
    formulario['instrumento'].value=instrumento;
    formulario['precio'].value=precio;
    formulario['photo'].value=photo;
    localStorage.clear(); 
    
}
function comprobartamaño(){
    let formulario = document.forms['rellenar'];
    formulario['photo'].value= document.getElementById('upload').files[0].name;
    foto=document.getElementById('upload').files[0].size;
    if (foto>2000000){
    alert("La imagen supera los 2MB");
    formulario['photo'].style.color='red';
    document.getElementById('mysubmit').disabled=true;
    }
    

}
function validar(input){
    let text = input.value;
    if(text.length>20) 
        input.style.color = 'red';
    else
        input.style.color = 'green';



}