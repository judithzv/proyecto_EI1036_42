function	handleFiles(e)	{
    let ctx	=	document.getElementById('canvas').getContext('2d');
    let img	=	new	Image;
    img.src	=	URL.createObjectURL(e.target.files[0]);
    img.onload	=	function()	{
                    ctx.drawImage(img,	20,20, 300, 150);
    }
}

function ventanaSecundaria(URL) {
    window.open(URL, "ventana1", "width=300,height=300,scrollbars=NO");
}