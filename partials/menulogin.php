<html>
<body>
<main>
<nav>
		<a href="./portal.php?action=info" id="nm"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
		<a href="?action=home" id="nm"><i class="fa fa-home" aria-hidden="true"></i></a>
		<a href='./portal.php?action=miscompras' id="nm"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
		<a href='#' id="nm" onclick='mostrarCarrito()'><i class="fa fa-shopping-cart"></i></a>
		<a href="./portal.php?action=nuevo_producto" id="nm"><i class="fa fa-plus" aria-hidden="true"></i></a>
		<a href="?action=logout" id="lnm"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
		<b><i id="usu"><?php  echo  $_COOKIE["login"]; ?></i></b>
</nav> 
<nav id="margen"></nav>
</main>
<div class='oculto widget' id='carrito_js'> <a href="#" class="close cerrar" data-dismiss="alert" aria-label="close" onclick="ventanaCerrar()">&times;</a></div>
<div id='carrito_div'></div>
</div>
<script src="/partials/carrito.js"></script>
</body>
