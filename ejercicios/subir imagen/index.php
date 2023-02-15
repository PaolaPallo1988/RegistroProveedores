<!DOCTYPE html>
<html>
<head>
	<title>Subir imagen</title>
</head>
<body>
	<form data-toggle="validator" action = "index.php" method = "post" role="form" enctype="multipart/form-data">
		
		<h1>Subir imagen al servidor</h1>

		<input type="text" name="producto">
		<input type="file" name="url_imagen">

		<button type="submit">Registrar</button>
		<?php insertaImagen($id_producto,"url_imagen",$conf);

//$conf->desconectarDB();

header("Location: index.php"); ?>

	</form>

</body>
</html>