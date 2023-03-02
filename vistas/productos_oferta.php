<?php
require('../conexion/conexion.php');
require('../login/session.php');
$result = mysqli_query($conn_registro, "SELECT * FROM usuario u INNER JOIN perfil p ON u.id_usuario='$session_id' AND p.id_perfil= u.perfil_id") or die('Error In Session');
$row = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario | Ingreso Usuario </title>
    <!-- <Validación de Formulario con Javascript>-->
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- COLAPSE PARA MOSTRAR LA INFORMACIÓN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="libreria.js"></script>
    <!-- Sweetalert2 -->
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <!-- usar calendario -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- BOOSTRAP 5 CHECKED -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--- UTILIZAR JAX --->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--- FORMATO DE BOTONES --->
    <link href="../css/botones.css" rel="stylesheet">
    <!-- INTERLINIADO -->
    <link href="../css/botones.css" rel="stylesheet">

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view"><br><br>
                    <div class="navbar nav_title" style="border: 140;">
                        <a href="postulante.php" class="site_title"><i class="fa fa-desktop"></i> <span><b>PROVEEDORES</b></span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <figure class="full-box">
                            <?php
                            $nombre_postulante = $row['nombre_usuario'];
                            $nombre_imagen = "../Fotos_Perfil/$nombre_postulante/$nombre_postulante.JPG";
                            if (file_exists($nombre_imagen)) {
                            ?>
                                <div align="center"><img src="../Fotos_Perfil/<?php echo $row['nombre_usuario'] ?>/<?php echo $row['nombre_usuario']; ?>.JPG" alt="..." class="img-circle profile_img"></div><br>
                            <?php
                            } else {
                            ?>
                                <div align="center"><img src="../images/AdminLTELogo.png" alt="..." class="img-circle profile_img"></div><br>
                            <?php
                            }
                            ?>
                            <figcaption class="text-center text-titles">
                                <font size='3' face="times new rowman"><?php echo $row['nombre_usuario'] . " " . $row['apellido_usuario']; ?></font><br>
                                <font size='3' face="times new rowman"><?php echo $row['nombre_perfil']; ?></font><br><br>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- sidebar menu --><!-- /menu footer buttons -->
                    <br><br><br>
                    <?php
                    $cedula_postulante = $row['cedula_usuario'];
                    $sqlestado = "SELECT * FROM estado_formulario WHERE cedula_usuario_estado= '$cedula_postulante'";
                    $resultado = mysqli_query($conn_registro, $sqlestado);
                    if ($estado = mysqli_fetch_array($resultado)) {
                        if (($estado['estado_calificacion'] === '1') && ($estado['estado_productosOferta'] === '1')) {
                            include('../cabeceras/menu_lateral.php');
                        } else {
                            if (($estado['estado_calificacion'] === '2') && ($estado['estado_productosOferta'] === '1')) {
                                include('../cabeceras/menu_lateral_calificacion.php');
                            } else {
                                include('../cabeceras/menu_lateral_productosOferta.php');
                            }
                        }
                    }
                    ?>
                    <!-- /sidebar menu --><!-- /menu footer buttons -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="../Fotos_Perfil/<?php echo $row['nombre_usuario'] ?>/<?php echo $row['nombre_usuario']; ?>.JPG" alt=""><?php echo  $row['nombre_usuario'] . " " . $row['apellido_usuario']; ?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Perfiles</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Ajustes</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">Ayuda</a>
                                    <a class="dropdown-item" id="salir" href="../login/logout.php"><i class="fa fa-sign-out pull-right"></i> Salir</a>
                                </div>
                            </li>
                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="../Fotos_Perfil/<?php echo $row['nombre_usuario'] ?>/<?php echo $row['nombre_usuario']; ?>.JPG" alt="Profile Image" /></span>
                                            <span>
                                                <span><?php echo  $row['nombre_usuario'] . " " . $row['apellido_usuario']; ?></span>
                                                <span class="time"> </span>
                                            </span>
                                            <span class="message">
                                                No esta configurado...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item">
                                                <strong>Ver todas las alertas</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel"><br>
                            <font size="4" face="arial">
                                <form class="form-label-left input_mask" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                    <?php include("../controlador/guarda_productos_oferta.php"); ?>
                                    <input type='hidden' class="form-control" required name="usuario_id" id="usuario_id" value="<?php echo  $row['id_usuario']; ?>" />
                                    <input type='hidden' class="form-control" required name="cedula_postulante" id="cedula_postulante" value="<?php echo  $row['cedula_usuario']; ?>" />
                                    <input type='hidden' class="form-control" required name="nombre_postulante" id="nombre_postulante" value="<?php echo  $row['nombre_postulante']; ?>" />
                                    <input type='hidden' class="form-control" required name="estado_id" id="estado_id" value="1" readonly />
                                    <div class="container p-2 my-2 text-white" style="background-color:#0A307C">
                                        <font size=6> PRODUCTOS O SERVICIOS QUE OFERTA</font>
                                    </div>
                                    <div class="container"><br>
                                        <div class="row">
                                            <div class='col-sm-9'>
                                                <div class="form-check">
                                                    <font size=5 style="color:#0A307C">SISTEMAS C4IVR</font><br>
                                                    &nbsp; <input type="checkbox" id="check1" name="option1[]" value="SISTEMAS DE GUERRA ELECTRONICA">
                                                    <label class="text-body" for="check1"> &nbsp;&nbsp;SISTEMAS DE GUERRA ELECTRONICA </label></br>
                                                    &nbsp; <input type="checkbox" id="check2" name="option1[]" value="SISTEMAS DE COMUNICACIONES MILITARES">
                                                    <label class="text-body" for="check2"> &nbsp;&nbsp;SISTEMAS DE COMUNICACIONES MILITARES </label></br>
                                                    &nbsp; <input type="checkbox" id="check3" name="option1[]" value="SISTEMAS DE MANDO Y CONTROL DE CIBERDEFENSA">
                                                    <label class="text-body" for="check3"> &nbsp;&nbsp;SISTEMAS DE MANDO Y CONTROL DE CIBERDEFENSA </label></br>
                                                    &nbsp; <input type="checkbox" id="check4" name="option1[]" value="SISTEMAS DE ENTRETENIMIENTO EN CIBERDEFENSA">
                                                    <label class="text-body" for="check4"> &nbsp;&nbsp;SISTEMAS DE ENTRETENIMIENTO EN CIBERDEFENSA (SIMULADOR)</label>
                                                    </br><label style="color:#0A307C" for="comment">Especificar el bien a proveer si es necesario</label>
                                                    <textarea class="form-control" name="c4ivr_opt1" rows="5" onkeyup="javascript:this.value=this.value.toUpperCase();"> </textarea>
                                                </div></br></br>
                                                <div class="form-check">
                                                    <font size=5 style="color:#0A307C">AERONAVES DE ALA FIJA Y SUS COMPONENTES</font><br>
                                                    &nbsp; <input type="checkbox" id="check5" name="option2[]" value="AVIONES DE COMBATE">
                                                    <label class="text-body" for="check5"> &nbsp;&nbsp;AVIONES DE COMBATE </label></br>
                                                    &nbsp; <input type="checkbox" id="check6" name="option2[]" value="AVIONES DE TRANSPORTE Y CARGA ">
                                                    <label class="text-body" for="check6"> &nbsp;&nbsp;AVIONES DE TRANSPORTE Y CARGA </label></br>
                                                    &nbsp; <input type="checkbox" id="check7" name="option2[]" value="AVIONES DE ENTRENAMIENTO">
                                                    <label class="text-body" for="check7"> &nbsp;&nbsp;AVIONES DE ENTRENAMIENTO </label></br>
                                                    &nbsp; <input type="checkbox" id="check8" name="option2[]" value="AVIONES DE REABESTECIMIENTO EN VUELO">
                                                    <label class="text-body" for="check8"> &nbsp;&nbsp;AVIONES DE REABESTECIMIENTO EN VUELO </label>
                                                    </br><label for="comment">Especificar el bien a proveer si es necesario</label>
                                                    <textarea class="form-control" name="areonavefija_opt2" rows="5" onkeyup="javascript:this.value=this.value.toUpperCase();"> </textarea>
                                                </div></br></br>
                                                <div class="form-check">
                                                    <font size=5 style="color:#0A307C">DEFENSA AÉREA</font><br>
                                                    &nbsp; <input type="checkbox" id="check9" name="option3[]" value="RADARES DE ALERTA TEMPRANA">
                                                    <label class="text-body" for="check9"> &nbsp;&nbsp;RADARES DE ALERTA TEMPRANA </label></br>
                                                    &nbsp; <input type="checkbox" id="check10" name="option3[]" value="AVIONES NO TRIPULADOS (UAV) Y SISTEMA DE CONTROL (ALTA AUTONOMÍA)">
                                                    <label class="text-body" for="check10"> &nbsp;&nbsp;AVIONES NO TRIPULADOS (UAV) Y SISTEMA DE CONTROL (ALTA AUTONOMÍA) </label>
                                                    </br><label style="color:#0A307C" for="comment">Especificar el bien a proveer si es necesario</label>
                                                    <textarea class="form-control" name="defensaaerea_opt3" rows="5" onkeyup="javascript:this.value=this.value.toUpperCase();"> </textarea>
                                                </div></br></br>
                                                <div class="form-check">
                                                    <font size=5 style="color:#0A307C">AERONAVES DE ALA ROTATORIA</font><br>
                                                    &nbsp; <input type="checkbox" id="check11" name="option4[]" value="HELICÓPTEROS DE COMBATE">
                                                    <label class="text-body" for="check11"> &nbsp;&nbsp;HELICÓPTEROS DE COMBATE </label></br>
                                                    &nbsp; <input type="checkbox" id="check12" name="option4[]" value="HELICÓPTEROS MULTIPROPÓSITO">
                                                    <label class="text-body" for="check12"> &nbsp;&nbsp;HELICÓPTEROS MULTIPROPÓSITO </label>
                                                    </br><label style="color:#0A307C" for="comment">Especificar el bien a proveer si es necesario</label>
                                                    <textarea class="form-control" name="aeronaverot_opt4" rows="5" onkeyup="javascript:this.value=this.value.toUpperCase();"> </textarea>
                                                </div></br></br>
                                                <div class="form-check">
                                                    <font size=5 style="color:#0A307C">ARMAMENTO Y APOYO DE FUEGO</font><br>
                                                    &nbsp; <input type="checkbox" id="check13" name="option5[]" value="MISILES MULTIPROPÓSITO (TIERRA-AIRE, AIRE-TIERRA, AIRE-AIRE)">
                                                    <label class="text-body" for="check13"> &nbsp;&nbsp;MISILES MULTIPROPÓSITO (TIERRA-AIRE, AIRE-TIERRA, AIRE-AIRE) </label></br>
                                                    &nbsp; <input type="checkbox" id="check14" name="option5[]" value="SISTEMAS DE MISILES MULTIPROPÓSITO">
                                                    <label class="text-body" for="check14"> &nbsp;&nbsp;SISTEMAS DE MISILES MULTIPROPÓSITO </label></br>
                                                    &nbsp; <input type="checkbox" id="check15" name="option5[]" value="MISILES DE CORTO Y LARGO ALCANCE">
                                                    <label class="text-body" for="check15"> &nbsp;&nbsp;MISILES DE CORTO Y LARGO ALCANCE </label></br>
                                                    &nbsp; <input type="checkbox" id="check16" name="option5[]" value="MISILES Y BOMBAS GUIADAS Y DE PRECISIÓN">
                                                    <label class="text-body" for="check16"> &nbsp;&nbsp;MISILES Y BOMBAS GUIADAS Y DE PRECISIÓN </label></br>
                                                    &nbsp; <input type="checkbox" id="check17" name="option5[]" value="TORPEDOS">
                                                    <label class="text-body" for="check17"> &nbsp;&nbsp;TORPEDOS </label></br>
                                                    &nbsp; <input type="checkbox" id="check18" name="option5[]" value="MUNICIONES (CALIBRE 7.62 mm, 9mm, 5.56mm) ">
                                                    <label class="text-body" for="check18"> &nbsp;&nbsp;MUNICIONES (CALIBRE 7.62 mm, 9mm, 5.56mm) </label></br>
                                                    &nbsp; <input type="checkbox" id="check19" name="option5[]" value="MUNICION Y EXPLOSIVOS ">
                                                    <label class="text-body" for="check19"> &nbsp;&nbsp;MUNICION Y EXPLOSIVOS </label></br>
                                                    &nbsp; <input type="checkbox" id="check20" name="option5[]" value="ARMAMENTO MENOR (FUSILES Y AMETRALLADORAS)">
                                                    <label class="text-body" for="check20"> &nbsp;&nbsp;ARMAMENTO MENOR (FUSILES Y AMETRALLADORAS) </label></br>
                                                    &nbsp; <input type="checkbox" id="check21" name="option5[]" value="ARMAMENTO MAYOR (MORTEROS DESDE CAL. 60mm HASTA 120mm, 4.2PULG, OBUSES, FUSILES SIN RETROCESO,COHETES)">
                                                    <label class="text-body" for="check21"> &nbsp;&nbsp;ARMAMENTO MAYOR (MORTEROS DESDE CAL. 60mm HASTA 120mm, 4.2PULG, OBUSES, FUSILES SIN RETROCESO,COHETES)</label></br>
                                                    &nbsp; <input type="checkbox" id="check221" name="option5[]" value="LANZADORES INDIVIDUALES, MÚLTIPLES Y COHETES ">
                                                    <label class="text-body" for="check221"> &nbsp;&nbsp;LANZADORES INDIVIDUALES, MÚLTIPLES Y COHETES </label>
                                                    </br><label style="color:#0A307C" for="comment">Especificar el bien a proveer si es necesario</label>
                                                    <textarea class="form-control" rows="5" name="armamento_opt5" onkeyup="javascript:this.value=this.value.toUpperCase();"> </textarea>
                                                </div></br></br>
                                                <div class="form-check">
                                                    <font size=5 style="color:#0A307C">MEDIOS DE COMBATE NAVAL Y FLUVIAL</font><br>
                                                    &nbsp; <input type="checkbox" id="check22" name="option6[]" value="FRAGATAS">
                                                    <label class="text-body" for="check22"> &nbsp;&nbsp;FRAGATAS </label></br>
                                                    &nbsp; <input type="checkbox" id="check23" name="option6[]" value="CORBETAS">
                                                    <label class="text-body" for="check23"> &nbsp;&nbsp;CORBETAS </label></br>
                                                    &nbsp; <input type="checkbox" id="check24" name="option6[]" value="BLOQUE MULTIPROPÓSITO">
                                                    <label class="text-body" for="check24"> &nbsp;&nbsp;BLOQUE MULTIPROPÓSITO </label></br>
                                                    &nbsp; <input type="checkbox" id="check25" name="option6[]" value="LANCHAS MISILARES">
                                                    <label class="text-body" for="check25"> &nbsp;&nbsp;LANCHAS MISILARES </label></br>
                                                    &nbsp; <input type="checkbox" id="check26" name="option6[]" value="SUBMARINOS">
                                                    <label class="text-body" for="check26"> &nbsp;&nbsp;SUBMARINOS </label>
                                                    </br><label style="color:#0A307C" for="comment">Especificar el bien a proveer si es necesario</label>
                                                    <textarea class="form-control" rows="5" name="combate_opt6" onkeyup="javascript:this.value=this.value.toUpperCase();"> </textarea>
                                                </div></br></br>
                                                <div class="form-check">
                                                    <font size=5 style="color:#0A307C">VEHICULOS BLINDADOS Y MECANIZADOS</font><br>
                                                    &nbsp; <input type="checkbox" id="check27" name="option7[]" value="VEHICULOS BLINDADOS BAJO ESPECIFICACIONES MILITARES DE TODO TIPO DE RUEDA Y ORUGA">
                                                    <label class="text-body" for="check27"> &nbsp;&nbsp;VEHICULOS BLINDADOS BAJO ESPECIFICACIONES MILITARES DE TODO TIPO DE RUEDA Y ORUGA </label></br>
                                                    &nbsp; <input type="checkbox" id="check28" name="option7[]" value="VEHICULOS BLINDADOS MULTIPROPÓSITO">
                                                    <label class="text-body" for="check28"> &nbsp;&nbsp;VEHICULOS BLINDADOS MULTIPROPÓSITO </label></br>
                                                    &nbsp; <input type="checkbox" id="check29" name="option7[]" value="HOSPITAL MÓVIL">
                                                    <label class="text-body" for="check29"> &nbsp;&nbsp;HOSPITAL MÓVIL </label>
                                                    </br><label style="color:#0A307C" for="comment">Especificar el bien a proveer si es necesario</label>
                                                    <textarea class="form-control" rows="5" name="blindados_opt7" onkeyup="javascript:this.value=this.value.toUpperCase();"> </textarea>
                                                </div></br></br>
                                                <div class="form-check">
                                                    <font size=5 style="color:#0A307C">CONTRAMEDIDAS DEFENSIVAS DE AERONAVES</font><br>
                                                    &nbsp; <input type="checkbox" id="check30" name="option8[]" value="VEHICULOS BLINDADOS BAJO ESPECIFICACIONES MILITARES DE TODO TIPO DE RUEDA Y ORUGA">
                                                    <label class="text-body" for="check30"> &nbsp;&nbsp;CHAFF </label></br>
                                                    &nbsp; <input type="checkbox" id="check31" name="option8[]" value="VEHICULOS BLINDADOS MULTIPROPÓSITO">
                                                    <label class="text-body" for="check31"> &nbsp;&nbsp;FLARE </label>
                                                    </br><label style="color:#0A307C" for="comment">Especificar el bien a proveer si es necesario</label>
                                                    <textarea class="form-control" rows="5" name="contramedidas_opt8" onkeyup="javascript:this.value=this.value.toUpperCase();"> </textarea>
                                                </div></br></br>
                                                <div class="form-check">
                                                    <font size=5 style="color:#0A307C">SEMOVIENTES</font><br>
                                                    &nbsp; <input type="checkbox" id="check32" name="option9[]" value="ADQUISICIÓN DE ANIMALES">
                                                    <label class="text-body" for="check32"> &nbsp;&nbsp;ADQUISICIÓN DE ANIMALES </label>
                                                    </br><label style="color:#0A307C" for="comment">Especificar el bien a proveer si es necesario</label>
                                                    <textarea class="form-control" rows="5" name="armamento_opt9" onkeyup="javascript:this.value=this.value.toUpperCase();"> </textarea>
                                                </div></br></br>
                                                <div class="form-check">
                                                    <font size=5 style="color:#0A307C">ARMAMENTO Y EQUIPO NO LETAL</font><br>
                                                    &nbsp; <input type="checkbox" id="check34" name="option10[]" value="ARMAMENTO NO LETAL">
                                                    <label class="text-body" for="check34"> &nbsp;&nbsp;ARMAMENTO NO LETAL </label></br>
                                                    &nbsp; <input type="checkbox" id="check35" name="option10[]" value="EQUIPO NO LETAL">
                                                    <label class="text-body" for="check35"> &nbsp;&nbsp;EQUIPO NO LETAL </label></br>
                                                    &nbsp; <input type="checkbox" id="check36" name="option10[]" value="MUNICIÓN NO LETAL">
                                                    <label class="text-body" for="check36"> &nbsp;&nbsp;MUNICIÓN NO LETAL </label>
                                                    </br><label style="color:#0A307C" for="comment">Especificar el bien a proveer si es necesario</label>
                                                    <textarea class="form-control" rows="5" name="armamento_opt10" onkeyup="javascript:this.value=this.value.toUpperCase();"> </textarea>
                                                </div></br></br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="ln_solid"></div>
                                        <div class="col-md-9 col-sm-9  offset-md-3">
                                            <button type="submit" id="guarda_oferta" name="guarda_oferta" class="boton btn btn-primary" style="background-color:#0A307C"> GUARDAR </button>
                                            <a type="button" href="productos_oferta.php" class="boton btn btn-primary" style="background-color:#0A307C">CANCELAR</a>
                                        </div>
                                    </div>
                                </form>
                            </font>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- SWEETALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- SEGURIDAD -->
    <script src="../js/seguridad.js"></script>
    <!-- footer content -->
    <?php include('../cabeceras/pie_pagina.php'); ?>
    <!-- /footer content -->
    <!-- <Validación de Formulario con Javascript>-->
    <script src="../js/formulario_postulante.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
</body>

</html>