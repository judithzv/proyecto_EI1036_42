<main>
<body>
	<?php
if(!empty($_COOKIE['error_login'])){
    $result='<div class="alert alert-danger alert-dismissable">El usuario o la contraseña introducidos son incorrectos <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
    echo $result;
    setcookie('error_login', "", time()-3600);
} 
if(!empty($_COOKIE['no_login'])){
    $result='<div class="alert alert-success alert-dismissable">Inicia sesión para poder añadir el producto al carrito <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
    echo $result;
    setcookie('no_login', "", time()-3600);
} ?>
<div id="container">
<div id="mincontainer">
	<h1>Accede a tu cuenta</h1>
	<form class="fom_usuario" action="?action=acceder" method="POST">
			<legend>Login</legend>
			<label for="username"  class="fa fa-sign-in"><b> Usuario</b></label>
			<br/>
			<input type="text" name="username" class="item_requerid" size="20"  required oninput="validar(this, 20, 'login')">
			<br/>
			<label for="password" class="fa fa-key"><b> Contraseña</b></label>
			<br/>
			<input type="password"  name="password"  class="item_requerid" size="20" required oninput="validar(this, 20, 'login' )">
			<br/>
		<p>
		<p><i class="fa fa-paper-plane" aria-hidden="true"></i>
		<input type="submit" value="Enviar" id="botonaceptar">
		<i class="fa fa-ban" aria-hidden="true"></i>
		<input type="reset" value="Deshacer" id="botondeshacer">
		</p>
	</form>
	<div id="login"></div>
</div>
</div>
<script src="/partials/code.js"></script>
</body>
</main>