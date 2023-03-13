<?php
session_start();
include('conexion/conexion.php');

if (isset($_POST['login'])) {
	$username = trim(mysqli_real_escape_string($conn_registro, $_POST['cedula_usuario']));
	$password = trim($_POST['password_usuario']);

	$sql = "SELECT * FROM usuario WHERE  cedula_usuario = '" . $username . "'";
	$rs = mysqli_query($conn_registro, $sql);
	$numRows = mysqli_num_rows($rs);


	if ($numRows >= 1) {
        $row = mysqli_fetch_assoc($rs);
        if (password_verify($password, $row['password_usuario'])) {
         
            $_SESSION['id_usuario']             = $row['id_usuario'];
            $_SESSION['nombre_usuario']         = $row['nombre_usuario'];
            $_SESSION['apellido_usuario']       = $row['apellido_usuario'];
            $_SESSION['cedula_usuario']         = $row['cedula_usuario'];
            $_SESSION['correo_usuario']         = $row['correo_usuario'];
            $_SESSION['perfil_id']              = $row['perfil_id'];
            $_SESSION['estado_id']              = $row['estado_id'];

            /// Se manejan las sesiones
            if ($_SESSION['perfil_id'] == 1 && $_SESSION['estado_id'] == 1) {
                header('location: vistas/principal.php');
            } else if ($_SESSION['perfil_id'] == 2 && $_SESSION['estado_id'] == 1) {
                header('location: vistas/secretario.php');
            } else if ($_SESSION['perfil_id'] == 3 && $_SESSION['estado_id'] == 1) {
                header('location: vistas/analista.php');
            } else if ($_SESSION['perfil_id'] == 4 && $_SESSION['estado_id'] == 1) {
                header('location: vistas/postulante.php');
            }
        }

        

        echo "<script>          
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Usuario o Contraseña Incorrecta!',
                footer: '<a href>Intente Nuevamente?</a>'
                    }
                ).then(function() {
                    window.location = 'index.php';
                });
                    </script>";

        

             
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Usuario no Existe!',
            footer: '<a href>Comuniquese con el Administrador?</a>'
        }
        ).then(function() {
            window.location = 'index.php';
        });
            </script>";
    }
}

