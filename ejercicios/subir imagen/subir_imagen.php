<?php 

function insertaImagen($tipo_imagen){

	if(empty($_FILES[$tipo_imagen]["name"]))
	return;

	$file_name = $_FILES[$tipo_imagen]["name"];
	$extension = pathinfo($_FILES[$tipo_imagen]["name"],PATHINFO_EXTENSION);
	$ext_formatos = array('png','gif','jpg','jpeg','pdf');


	if(!in_array(strtolower($extension),$ext_formatos))
		return;

	if($_FILES[$tipo_imagen]["size"] > 33000003008000)
		return;


	$targetDir = "../Imagen_Perfil/";

	@rmdir($targetDir);

	if (!file_exists($targetDir)){

		@mkdir($targetDir,077,true);
	}

	$token = md5(uniqid(rand(), true));
	$file_name = $token.'.'.$extension;

	$add = $targetDir.$file_name;
	//$db_url_img = "$file_name";

	if(move_uploaded_file($_FILES[$tipo_imagen]["tmp_name"],$add)){

		//$sql = "UPDATE productos SET $tipo_imagen = '$db_url_img' WHERE id_producto = $id_producto";
		//$conf ->actualizacion($sql);

	}


}

 ?>