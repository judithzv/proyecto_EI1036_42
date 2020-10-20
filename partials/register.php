<main>
	<h1>Registrar</h1>
	<form class="fom_usuario" action="?action=registrar" method="POST">

		<legend>Datos básicos</legend>
		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="name" class="item_requerid" size="20" maxlength="40">
		<br/>
        <label for="apellidos">Apellidos</label>
		<br/>
		<input type="text" name="surnames" class="item_requerid" size="20" maxlength="40">
		<br/>
        <label for="usuario">Usuario</label>
		<br/>
		<input type="text" name="username" class="item_requerid" size="20" maxlength="20">
		<br/>
        <label for="passwd">Contraseña</label>
		<br/>
		<input type="password" name="password" class="item_requerid" size="8" maxlength="20">
		<br/>
		<label for="email">Email</label>
		<br/>
		<input type="text" name="mail" class="item_requerid" size="20" maxlength="40">
		<br/>
        <label for="direccion">Dirección</label>
		<br/>
		<input type="text" name="address" class="item_requerid" size="20" maxlength="100">
		<br/>
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>