<?php
include 'conexion/conexion.php';
include 'controlador/envia_correo.php';
$token_enlace = !empty($_GET['token']) ? $_GET['token'] : null;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Inicio de Sessión</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="login/css/sourcesanspro-font.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="login/css/style.css" />
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="production/css/sweetalert2/sweetalert2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.7.0/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="production/js/sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript" src="scripts/seguirdad.js"></script>
    <script type="text/javascript" src="assets/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="assets/sweetalert2.css" />
    <script src="js/libreria.js"></script>
    <!-- Mostrando el código JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- SWEETALER library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.js"></script>
      <!-- Sweetalert2 -->
	<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js?render=6Lebs4khAAAAADag0NOZim3fdOBwzHs1izzlTaD2'></script>
</head>

<body class="form-v8">
    <div class="page-content">
        <div class="form-v8-content">
            <div class="form-left">
                <img src="login/images/nueva_contrasena.png" alt="form">
            </div>
            <div class="form-right">
                <?php
                ?>
                <form class="form-detail" id="formNuevaContrasena" name="formNuevaContrasena" method="POST" action="">
                    <div class="tabcontent" id="sign-in">
                        <center>
                            <div class="container">
                                <div class="jumbotron">
                                    <h1>RESETEO DE CONTRASEÑA</h1>
                                    <p>SISTEMA DE CALIFICACION DE PROVEEDORES</p><br>
                                </div>
                            </div>
                        </center>
                        <br>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <span class="label">Contraseña Generada</span><br>
                                <input type="text" name="token_enlace" id="token_enlace" class="input-text" value="<?php echo $token_enlace ?>" disabled >
                            </label><br>
                            <label class="form-row-inner">
                                <input type="password" autocomplete="off" name="new_password" id="new_password" class="input-text" autocomplete="off" onclick="mostrarPassword()" required>
                                <span class="label">Nueva Contraseña &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="fa fa-eye-slash icon"></span>
                                    <span class="border"></span>
                            </label><br>
                            <label class="form-row-inner">
                                <input type="password" autocomplete="off" name="newv_password" id="newv_password" class="input-text" autocomplete="off" onclick="mostrarPasswordv()" required>
                                <span class="label">Confirme Contraseña &nbsp;&nbsp;<span class="fa fa-eye-slash icon"></span>
                            </label>
                        </div>
                        <center>
                            <div class="form-row-last">
                                <button type="submit" name="nuevo_password" id="nuevo_password" class="register"><u>GUARDAR</u></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="register"><a type="button" href="index.php">CANCELAR</a></button>
                            </div>
                        </center>
                        <div class="form-group">
                            <div class="alert alert-warning">
                                <center> Dirección de Tecnologias de la Información y Comunicación</center>
                                <br>
                                <center>Ministerio de Defensa Nacional-2022</center>
                                <br>
                            </div>
                        </div>
                </form>

                <script type="text/javascript">
                    function mostrarPassword() {
                        var cambio = document.getElementById("new_password");
                        if (cambio.type == "password") {
                            cambio.type = "text";
                            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                        } else {
                            cambio.type = "password";
                            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                        }
                    }

                    function mostrarPasswordv() {
                        var cambio = document.getElementById("newv_password");
                        if (cambio.type == "password") {
                            cambio.type = "text";
                            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                        } else {
                            cambio.type = "password";
                            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                        }
                    }
                </script>

                <script type="text/javascript">
                    function openCity(evt, cityName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";
                    }
                    // Get the element with id="defaultOpen" and click on it
                    document.getElementById("defaultOpen").click();
                </script>

                <script>
                    window.onload = function() {
                        document.addEventListener("contextmenu", function(e) {
                            e.preventDefault();
                        }, false);
                        document.addEventListener("keydown", function(e) {
                            //document.onkeydown = function(e) {
                            // "I" key
                            if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                                disabledEvent(e);
                            }
                            // "J" key
                            if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                                disabledEvent(e);
                            }
                            // "S" key + macOS
                            if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                                disabledEvent(e);
                            }
                            // "U" key
                            if (e.ctrlKey && e.keyCode == 85) {
                                disabledEvent(e);
                            }
                            // "F12" key
                            if (event.keyCode == 123) {
                                disabledEvent(e);
                            }
                        }, false);

                        function disabledEvent(e) {
                            if (e.stopPropagation) {
                                e.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                            e.preventDefault();
                            return false;
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</body>

</html>