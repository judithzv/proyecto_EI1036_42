<?php $datos=null ?>

<body onload=getVisor()>

<div id='container'>
<div id='mincontainer'>

<datalist id='lista_productos'></datalist>
<input id='input_list' list='lista_productos' name='lista_productos' type='text' onchange='cambio_visor(this)'>
<i class='fa fa-search' aria-hidden='true'></i></br>

<label for="minimo">Precio mínimo</label><br>

<input type="range" name="min" id="minimo" value="0" min="0" max="5000" oninput="this.nextElementSibling.value = this.value">
<output>0</output><br>

<label for="maximo">Precio máximo</label><br>

<input type="range" name="max" id="maximo" value="5000" min="0" max="5000" oninput="this.nextElementSibling.value = this.value">
<output>5000</output><br>

<button name="buscar" onclick=mostrarPrecios()>Buscar</button>

</div></div>

<div class='visor'></div>
<script src='/../js/visor.js'></script>
</body>