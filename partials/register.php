<main>
<body>
<div id="container">
<div id="mincontainer">
	<b><h1>Registrar</h1></b>
	<form class="fom_usuario" action="?action=registrar" method="POST" onsubmit="return vacio(this, 'register')">
		<legend>Datos básicos</legend>
		<label for="nombre" class="fa fa-user"><b> Nombre</b></label>
		<br/>
		<input type="text" name="name" class="item_requerid" size="20"   oninput="validar(this, 40, 'register')">
		<br/>
        <label for="apellidos" class="fa fa-user-o"><b> Apellidos</b></label>
		<br/>
		<input type="text" name="surnames" class="item_requerid" size="20"   oninput="validar(this, 40, 'register')">
		<br/>
        <label for="usuario" class="fa fa-sign-in" ><b> Usuario</b></label>
		<br/>
		<input type="text" name="username" class="item_requerid" size="20"   oninput="validar(this, 20, 'register')">
		<br/>
        <label for="passwd" class="fa fa-key" ><b> Contraseña</b></label>
		<br/>
		<input type="password" name="password" class="item_requerid" size="20"   oninput="validar(this,20, 'register')">
		<br/>
		<label for="email" class="fa fa-envelope"><b> Email</b></label>
		<br/>
		<input type="text" name="mail" class="item_requerid" size="20"  oninput="validar(this, 40, 'register')">
		<br/>
        <label for="direccion" class="fa fa-address-card-o"><b> Dirección</b></label>
		<br/>
		<input type="text" name="address" class="item_requerid" size="20"  oninput="validar(this, 100, 'register')">
		<br/>
		<p><i class="fa fa-paper-plane" aria-hidden="true"></i><input type="submit" value="Enviar" id="botonaceptar">
		<i class="fa fa-ban" aria-hidden="true"></i><input type="reset" value="Deshacer" id="botondeshacer">
		</p>
	</form>
	<div id="register"></div>
</div>
</div>
<script src="/partials/code.js"></script>
</body>
</main>