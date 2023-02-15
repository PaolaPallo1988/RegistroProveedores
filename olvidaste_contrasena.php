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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body class="form-v8">
    <div class="page-content">
        <div class="form-v8-content">
            <div class="form-left">
                <img src="login/images/recuperar_contraseña.png" alt="form">
            </div>
            <div class="form-right">
                <?php
                include('controlador/envia_correo.php');
                ?>
                <form class="form-detail" method="post" action="olvidaste_contrasena.php">
                    <div class="tabcontent" id="sign-in">
                        <center>
                            <div class="container">
                                <div class="jumbotron">
                                    <h1>Ingrese el correo electrónico de su cuenta para restablecer su contraseña</h1>
                                    <p>SISTEMA DE CALIFICACION DE PROVEEDORES</p><br>
                                    <?php include('controlador/mensajes.php'); ?>
                                </div>
                            </div>
                        </center><br>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="email" name="email" id="email" class="input-text" autocomplete="off" required>
                                <span class="label">Correo</span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <center>
                            <div class="form-row-last">
                                <button type="submit" name="reset_password" style="color:#060505;" id="reset_password" class="register"><u>ENVIAR</u></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="register"><a type="button" style="color:#060505;" href="index.php">CANCELAR</a></button>
                            </div>
                        </center>
                        <div class="form-group">
                            <div class="alert alert-warning">
                                <center> Dirección de Tecnologias de la Información y Comunicación</center>
                                <center>Ministerio de Defensa Nacional-2022</center><br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


<script>
    $(document).ready(function() {
        $("#email").on('paste', function(e) {
            e.preventDefault();
            alert("Esta acción está prohibida");
        })
        $("#bloquear").on('copy', function(e) {
            e.preventDefault();
            alert("Esta acción está prohibida");
        })
    })
</script>

<script>
    document.oncontextmenu = function(e) {
        return false;
    }
</script>

<script>
    function limpia() {
        var val = document.getElementById("email").value;
        var tam = val.length;
        for (i = 0; i < tam; i++) {
            if (!isNaN(val[i]))
                document.getElementById("email").value = '';
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
    //edit: removed ";" from last "}" because of javascript error
</script>


</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>