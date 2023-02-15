<?php
include('conexion.php');


if (isset($_POST['btnEditar'])) {



    $edita = $_POST['id_documento'];
    $directorio = ("Archivos/");
    $permitidos = array("application/pdf");
    $nombre_archivo = $directorio . date("d-m-y") . "-" . "DOC_GENERALES" . ".PDF";

    if (!empty($_FILES['archivo']['name'])) {

        if (($_FILES['archivo']['size']) <= 3000000) {   //3MB
            if (in_array($_FILES['archivo']['type'], $permitidos)) {

                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777, true);
                }
                if (move_uploaded_file($_FILES['archivo']['tmp_name'], $nombre_archivo)) {
                    $sql = "UPDATE documento SET ruta_documento='$nombre_archivo' WHERE id_documento='$edita' ";

                    if (mysqli_query($conn_registro, $sqlfile)) {
                        echo "ACTUALIZADO CORRECTAMENTE";
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
