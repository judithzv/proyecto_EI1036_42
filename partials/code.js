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
    div.className = 'visible widget';
    let button = document.getElementById('subir_imagen');
    button.style.display = 'none';
    
}

function cerrarVentana() {
    let div = document.getElementById('oculto');
    div.className = 'oculto widget';
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

function vaciar(){
    let photo = document.getElementById('photo');
    photo.setAttribute("value", "");
    let canvas = document.getElementById('canvas');
    canvas.width=canvas.width;
    let img = document.getElementById('upload');
    img.value = "";
}

function cargar(){
    let instrumento = localStorage.getItem('instrumento');
    let precio = localStorage.getItem('precio');
    let photo = localStorage.getItem('photo');
    let formulario = document.forms['rellenar'];
    formulario['instrumento'].value=instrumento;
    formulario['precio'].value=precio;
    formulario['photo'].value=photo;
    vaciar(); 
    
}
function comprobartamaño(){
    let formulario = document.forms['rellenar'];
    formulario['photo'].value= document.getElementById('upload').files[0].name;
    foto=document.getElementById('upload').files[0].size;
    if (foto>2000000){
        formulario['photo'].style.color='red';
        document.getElementById('botonaceptar').disabled=true;
        document.getElementById('botonaceptar').style.color='red';
        document.getElementById('mysubmit').disabled=true;

        let div = document.getElementById('nuevo_producto');
        div.textContent = "La imagen supera los 2 MB";
        div.style.color = "red";
    }
    else{
        formulario['photo'].style.color='black';
        document.getElementById('botonaceptar').disabled=false;
        document.getElementById('botonaceptar').style.color='white';
        document.getElementById('mysubmit').disabled=false;
        document.getElementById('nuevo_producto').textContent = "";
        formulario['photo'].style.borderColor ="white";

    }
    


}
function validar(input, number, div){
    let text = input.value;
    if(text.length>number) {
        input.style.color = 'red';
        document.getElementById('botonaceptar').disabled=true;
        document.getElementById('botonaceptar').style.color='red';
        document.getElementById(div).textContent="El texto introducido supera los caracteres permitidos.";
        document.getElementById(div).style.color="red";
        input.style.borderColor ="red";

    }
    else{
        input.style.color = 'green';
        document.getElementById('botonaceptar').disabled=false;
        document.getElementById('botonaceptar').style.color='white';
        document.getElementById(div).textContent="";
        input.style.borderColor ="white";
    }     
    }

    function vacio(formulario, div){
        for(let i=0; i<formulario.length; i++){
            text=formulario[i].value;
        if (text.length==0){
            formulario[i].style.borderColor ='red';
            document.getElementById('botonaceptar').disabled=true;
            document.getElementById('botonaceptar').style.color='red';
            document.getElementById(div).textContent="Campo obligatorio";
            document.getElementById(div).style.color="red";
            return false;


        }
        else{
            formulario[i].style.borderColor ='white';
            document.getElementById('botonaceptar').disabled=false;
            document.getElementById('botonaceptar').style.color='white';
            document.getElementById(div).textContent=" ";
        }
    }
    return true;

    }
    let divCaja = document.getElementById("oculto"); 
    divCaja.onmousedown = function(){startDrag()} 
    function startDrag() { 
        document.body.className = "disableselect";
    document.onmouseup = finishDrag /*-una-función-*/ 
    document.onmousemove = moveElement /*.bind(this)*/ } 
    function moveElement(e) { 
    /*this is now the element that is moving*/ 
    divCaja.style.top = (divCaja.offsetTop + e.movementY) + "px"; divCaja.style.left = (divCaja.offsetLeft + e.movementX) + "px"; } 
    function finishDrag(e) { //podemos omitir el evento e ya que no lo usamos document.onmouseup = null; 
    document.onmousemove = null; 
    document.body.className = "";
    } 






   