<main>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="container">
<div id="mincontainer">
	<b><h1>Registrar</h1></b>
	<form class="fom_usuario" action="?action=registrar" method="POST">
		<legend>Datos básicos</legend>
		<label for="nombre" class="fa fa-user"><b> Nombre</b></label>
		<br/>
		<input type="text" name="name" class="item_requerid" size="20" maxlength="40">
		<br/>
        <label for="apellidos" class="fa fa-user-o"><b> Apellidos</b></label>
		<br/>
		<input type="text" name="surnames" class="item_requerid" size="20" maxlength="40">
		<br/>
        <label for="usuario" class="fa fa-sign-in" ><b> Usuario</b></label>
		<br/>
		<input type="text" name="username" class="item_requerid" size="20" maxlength="20">
		<br/>
        <label for="passwd" class="fa fa-key" ><b> Contraseña</b></label>
		<br/>
		<input type="password" name="password" class="item_requerid" size="20" maxlength="20">
		<br/>
		<label for="email" class="fa fa-envelope"><b> Email</b></label>
		<br/>
		<input type="text" name="mail" class="item_requerid" size="20" maxlength="40">
		<br/>
        <label for="direccion" class="fa fa-address-card-o"><b> Dirección</b></label>
		<br/>
		<input type="text" name="address" class="item_requerid" size="20" maxlength="100">
		<br/>
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</div>
</div>
</main>