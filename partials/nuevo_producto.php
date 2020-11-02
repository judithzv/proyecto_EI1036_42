<main>
<body>
<div id="container">
<div id="mincontainer">
	<b><h1>Registrar producto</h1></b>
	<form class="fom_usuario" action="?action=insertar_producto" method="POST">
		<legend>Datos básicos del producto</legend>
		<label for="name" class="fa fa-product-hunt"><b> Nombre</b></label>
		<br/>
		<input type="text" name="name" class="item_requerid" size="20" maxlength="40">
		<br/>
        <label for="price" class="fa fa-money"><b> Precio</b></label>
		<br/>
		<input type="text" name="price" class="item_requerid" size="20" maxlength="40">
		<br/>
        <label for="image" class="fa fa-file-image-o" ><b> Imagen</b></label>
		<br/>
		<input type="button" onclick="ventanaSecundaria('/partials/caja_flotante.php')" value="Subir imagen">
		<br/>
		<p><i class="fa fa-paper-plane" aria-hidden="true"></i><input type="submit" value="Enviar" id="botonaceptar">
		<i class="fa fa-ban" aria-hidden="true"></i><input type="reset" value="Deshacer" id="botondeshacer">
		</p>
	</form>
</div>
</div>
<script src="/partials/canvas.js"></script>
</body>
</main>