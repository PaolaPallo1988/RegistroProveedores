<?php
include "../conexion/conexion.php"; //CONEXION A LA BASE DE DATOS//

if (isset($_POST['guarda_oferta'])) {
    $usuario_id = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["usuario_id"], ENT_QUOTES)));
    $cedula_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["cedula_postulante"], ENT_QUOTES)));
    $nombre_postulante = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["nombre_postulante"], ENT_QUOTES)));

    $producto_oferta = "2";

    //validar que se esta guardando un tipo array sin valor
    $option1 = isset($_POST['option1']) && is_array($_POST['option1']) ? $_POST['option1'] : [];
    $option1 = implode(',', $option1);
    $option2 = isset($_POST['option2']) && is_array($_POST['option2']) ? $_POST['option2'] : [];
    $option2 = implode(',', $option2);
    $option3 = isset($_POST['option3']) && is_array($_POST['option3']) ? $_POST['option3'] : [];
    $option3 = implode(',', $option3);
    $option4 = isset($_POST['option4']) && is_array($_POST['option4']) ? $_POST['option4'] : [];
    $option4 = implode(',', $option4);
    $option5 = isset($_POST['option5']) && is_array($_POST['option5']) ? $_POST['option5'] : [];
    $option5 = implode(',', $option5);
    $option6 = isset($_POST['option6']) && is_array($_POST['option6']) ? $_POST['option6'] : [];
    $option6 = implode(',', $option6);
    $option7 = isset($_POST['option7']) && is_array($_POST['option7']) ? $_POST['option7'] : [];
    $option7 = implode(',', $option7);
    $option8 = isset($_POST['option8']) && is_array($_POST['option8']) ? $_POST['option8'] : [];
    $option8 = implode(',', $option8);
    $option9 = isset($_POST['option9']) && is_array($_POST['option9']) ? $_POST['option9'] : [];
    $option9 = implode(',', $option9);
    $option10 = isset($_POST['option10']) && is_array($_POST['option10']) ? $_POST['option10'] : [];
    $option10 = implode(',', $option10);
    $option11 = isset($_POST['option11']) && is_array($_POST['option11']) ? $_POST['option11'] : [];
    $option11 = implode(',', $option11);

    $c4ivr_opt1 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["c4ivr_opt1"] ?? null, ENT_QUOTES)));
    $areonavefija_opt2 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["areonavefija_opt2"] ?? null, ENT_QUOTES)));
    $defensaaerea_opt3 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["defensaaerea_opt3"] ?? null, ENT_QUOTES)));
    $aeronaverot_opt4 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["aeronaverot_opt4"] ?? null, ENT_QUOTES)));
    $armamento_opt5 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["armamento_opt5"] ?? null, ENT_QUOTES)));
    $combate_opt6 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["combate_opt6"] ?? null, ENT_QUOTES)));
    $blindados_opt7 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["blindados_opt7"] ?? null, ENT_QUOTES)));
    $contramedidas_opt8 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["contramedidas_opt8"] ?? null, ENT_QUOTES)));
    $semoviente_opt9 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["semoviente_opt9"] ?? null, ENT_QUOTES)));
    $armamento_opt10 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["armamento_opt10"] ?? null, ENT_QUOTES)));
    $equipo_opt11 = mysqli_real_escape_string($conn_registro, (strip_tags($_POST["equipo_opt11"] ?? null, ENT_QUOTES)));


    $sqlusuario = "SELECT * FROM producto_oferta WHERE usuario_id_oferta='$usuario_id'";
    $result = mysqli_query($conn_registro, $sqlusuario);

    if (mysqli_num_rows($result) > 0) {
        // Si es mayor a cero imprimimos que ya existe la causa
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ya existe documentación de # $nombre_postulante!',
                footer: 'Ministerio de Defensa Nacional'
            }
                ).then(function() {
                    window.location = '../vistas/postulante_principal.php';
                });
            </script>";
    } else {

        $sqlactualizar = "UPDATE usuario SET estado_productosOferta='$producto_oferta' WHERE cedula_usuario='$cedula_postulante'";
        $sqlproducto_oferta = mysqli_query($conn_registro, $sqlactualizar);

        $sqlcalificacion = "INSERT INTO producto_oferta  (usuario_id_oferta,cedula_postulante_oferta,
                                option1,option2,option3,option4,option5,option6,option7,option8,option9,option10,option11,
                                c4ivr_opt1,areonavefija_opt2,defensaaerea_opt3,aeronaverot_opt4,armamento_opt5,combate_opt6, blindados_opt7,contramedidas_opt8, semoviente_opt9, armamento_opt10,equipo_opt11) VALUES 
                                ('" . $usuario_id . "','" . $cedula_postulante . "',
                                '" . $c4ivr_opt1 . "','" . $areonavefija_opt2 . "','" . $defensaaerea_opt3 . "','" . $aeronaverot_opt4 . "','" . $armamento_opt5 . "','" . $combate_opt6 . "','" . $blindados_opt7 . "','" . $contramedidas_opt8 . "','" . $semoviente_opt9 . "','" . $armamento_opt10 . "','" . $equipo_opt11 . "',
                                '" . $option1 . "','" . $option2 . "','" . $option3 . "','" . $option4 . "','" . $option5 . "','" . $option6 . "','" . $option7 . "','" . $option8 . "','" . $option9 . "','" . $option10 . "','".$option11."')";
        if (mysqli_query($conn_registro, $sqlcalificacion)) {
            echo "<script>
                                        Swal.fire({
                                        icon:  'success',
                                        title: 'Bien...',
                                        text:  'Datos Ingresados Correctamente!',
                                        footer: 'Ministerio de Defensa Nacional'
                                    }
                                        ).then(function() {
                                            window.location = '../vistas/confirmacion_carga.php';
                                        });
                                    </script>";
        } else {
            echo "Error: " . $sqlcalificacion . "<br>" . mysqli_error($conn_registro);
        }
    }
}

// Cerramos la conexi�n
$conn_registro->close();
