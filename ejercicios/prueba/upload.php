<?php
//var_dump($_FILES["file"]);

$directorio = "imagenes/";

$archivo = $directorio . date("m-d-y") .  "-" . date("H-i-s") . basename($_FILES["file"]["name"]);

$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

// valida que es imagen
$checarSiImagen = filesize($_FILES["file"]["tmp_name"]);  //getimagesize

//var_dump($size);


if ($checarSiImagen != false) {
    
    //validando tamaño del archivo
    $size = $_FILES["file"]["size"];

    if ($size > 500000) {
        echo "El archivo tiene que ser menor a 500kb";
    } else {

        //validar tipo de imagen
        if ($tipoArchivo == "pdf" || $tipoArchivo == "docx") {
            // se validó el archivo correctamente
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)) {
                echo "El archivo se subió correctamente";
            } else {
                echo "Hubo un error en la subida del archivo";
            }
        } else {
            echo "Solo se admiten archivos pdf/docx";
        }
    }
} else {
    echo "no SE A CARGADO ELM DOCUMENTO";
}
