<?php $datos=null ?>

<body onload=getVisor()>
<div id='container'>
<div id='mincontainer'>
<datalist id='lista_productos'></datalist>
<input id='input_list' list='lista_productos' name='lista_productos' type='text' onchange='cambio_visor(this)'>
<i class='fa fa-search' aria-hidden='true'></i>
</div></div>

<div class='visor'></div>
<script src='/../js/visor.js'></script>
</body>