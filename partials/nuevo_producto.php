<main>
<body onload=cargar()>
<div id="container">
<div id="mincontainer">
	<b><h1>Registrar producto</h1></b>
	<form class="fom_usuario" action="?action=insertar_producto" method="POST" id="rellenar">
		<legend>Datos básicos del producto</legend>
		<label for="name" class="fa fa-product-hunt"><b> Nombre</b></label>
		<br/>
		<input type="text" name="name" id="instrumento" class="item_requerid" size="20" maxlength="40">
		<br/>
        <label for="price" class="fa fa-money"><b> Precio</b></label>
		<br/>
		<input type="text" name="price" id="precio" class="item_requerid" size="20" maxlength="40">
		<br/>
        <label for="image" class="fa fa-file-image-o" ><b> Imagen</b></label>
		<br/>
		<input type="text" id="photo" name="photo" class="item_requerid" readonly value="">
		<br/>
		<br/>
		<input type="button" id="subir_imagen" onclick="mostrarFormulario()" value="Subir imagen">
		<br/>
		<p><i class="fa fa-paper-plane" aria-hidden="true"></i><input type="submit" value="Enviar" id="botonaceptar">
		<i class="fa fa-ban" aria-hidden="true"></i><input type="reset" value="Deshacer" id="botondeshacer">
		</p>
	</form>
	<div id="oculto" class="widget"><a href="#" id="cerrar" class="close" data-dismiss="alert" aria-label="close" onclick="cerrarVentana()">&times;</a>
		<form action="?action=upload" method="post" enctype="multipart/form-data" onsubmit="guardar()">
			Selecciona	una	imagen:
			<input type="file" accept="image/*" name="image" id="upload" onchange=handleFiles(event)>
			<canvas id="canvas"></canvas>
			<input type="submit" value="SUBIR" name="submit">
		</form>
	</div>
	<br/>
</div>
</div>
<script src="/partials/code.js"></script>
</body>
</main>