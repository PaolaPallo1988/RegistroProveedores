<?php
include('conexion.php');


if (isset($_POST['btnguardar'])) {

    $directorio = ("Archivos/");
    $permitidos = array("application/pdf");
    
    $nombre_archivo = $directorio . date("d-m-y") . "-" . "DOC_GENERALES" . ".PDF";
    $contador= mysqli_query($conn_registro,"SELECT COUNT(id_documento) FROM documento");
    


    if (!empty($_FILES['archivo']['name'])) {

        if (($_FILES['archivo']['size']) <= 3000000) {  

            if (in_array($_FILES['archivo']['type'], $permitidos)) {

                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777, true);
                }
                if (move_uploaded_file($_FILES['archivo']['tmp_name'], $nombre_archivo)) {
                    $sqlfile = "INSERT INTO documento (ruta_documento, tamano_documento, tipo_documento ) 
                                VALUE ('" . $nombre_archivo . "','" . $_FILES['archivo']['size'] . "','" . $_FILES['archivo']['type'] . "')";
                   
                   if (mysqli_query($conn_registro, $sqlfile)) {
                        echo "GUARDADO CORRECTAMENTE";
                    } else {
                        echo "Error: " . $sqlfile . "<br>" . mysqli_error($conn_registro);
                    }
                }
            } else {
                echo "EL ARCHIVO DEBE SER FORMATO PDF";
            }

        } else {
            echo "EXEDE RANGO ESTABLECIDO";
        }
    } else {
        echo ('NO SE A SUBIDO DOCUMENTO');
    }
}
