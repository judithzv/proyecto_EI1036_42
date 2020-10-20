<main>
	<h1>Accede a tu cuenta</h1>
	<form class="fom_usuario" action="?action=acceder" method="POST">
		<fieldset>
			<legend>Login</legend>
			<label for="username">Usuario</label>
			<br/>
			<input type="text" name="username" class="item_requerid" size="20" maxlength="20">
			<br/>
			<label for="password">Contraseña</label>
			<br/>
			<input type="password"  name="password"  class="item_requerid" size="20" maxlength="20">
			<br/>
		</fieldset>
		<p>
		<input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>