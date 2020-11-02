<body>
<form action="?action=upload" method="post" enctype="multipart/form-data">
	Selecciona	una	imagen:
    <input type="file" accept="image/*" name="image" id="upload" onchange=handleFiles(event)>
    <canvas id="canvas"></canvas>
	<input type="submit" value="SUBIR" name="submit">
</form>
<script src=/partials/canvas.js></script>
</body>