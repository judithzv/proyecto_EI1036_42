<main>
<div id="container">
<div id="mincontainer">
	<h1>Accede a tu cuenta</h1>
	<form class="fom_usuario" action="?action=acceder" method="POST">
			<legend>Login</legend>
			<label for="username"  class="fa fa-sign-in"><b> Usuario</b></label>
			<br/>
			<input type="text" name="username" class="item_requerid" size="20" maxlength="20">
			<br/>
			<label for="password" class="fa fa-key"><b> Contraseña</b></label>
			<br/>
			<input type="password"  name="password"  class="item_requerid" size="20" maxlength="20">
			<br/>
		<p>
		<p><i class="fa fa-paper-plane" aria-hidden="true"></i>
		<input type="submit" value="Enviar" id="botonaceptar">
		<i class="fa fa-ban" aria-hidden="true"></i>
		<input type="reset" value="Deshacer" id="botondeshacer">
		</p>
	</form>
</div>
</div>
</main>