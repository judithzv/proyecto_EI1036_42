<main>
<div id="container">
<div id="mincontainer">
	<b><h1>Datos de la tarjeta</h1></b>
	<form class="fom_usuario" action="?action=pagar" method="POST">
		<label for="numero"class="fa fa-credit-card"><b> Número</b></label>
		<br/>
		<input type="text" name="numero" class="item_requerid" size="20" maxlength="40">
		<br/>
        <label for="mes" class="fa fa-calendar-o"><b> Mes de vencimiento</b></label>
		<br/>
		<input type="text" name="mes" class="item_requerid" size="20" maxlength="40">
		<br/>
        <label for="año" class="fa fa-calendar"" ><b> Año de vencimiento</b></label>
		<br/>
		<input type="text" name="año" class="item_requerid" size="20" maxlength="20">
		<br/>
        <label for="CVV" class="fa fa-cc-visa" ><b> CVV</b></label>
		<br/>
		<input type="text" name="CVV" class="item_requerid" size="20" maxlength="20">
        <br/>
		<p><i class="fa fa-paper-plane" aria-hidden="true"></i><input type="submit" value="Pagar" id="botonaceptar">
		<i class="fa fa-ban" aria-hidden="true"></i><input type="reset" value="Deshacer" id="botondeshacer">
		</p>
	</form>
</div>
</div>
</main>