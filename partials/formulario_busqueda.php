
<body>
<div id="container">
<div id="mincontainer">
<h1>Buscar artículo por precio</h1>
<form class="fom_usuario" action="?action=precios" method="POST">
<label for="min">Precio mínimo</label><br>
<input type="range" name="min" id="min" value="0" min="0" max="5000" oninput="this.nextElementSibling.value = this.value">
<output>0</output><br>
<label for="max">Precio máximo</label><br>
<input type="range" name="max" id="max" value="500" min="0" max="5000" oninput="this.nextElementSibling.value = this.value">
<output>100</output><br>
<p><i class="fa fa-search" aria-hidden="true"></i><input type="submit" value="Buscar" id="botonaceptar">
</form>
</div>
</div>
</body>