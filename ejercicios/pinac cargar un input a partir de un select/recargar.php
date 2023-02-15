<?php
include("conexion.php");

$usuarios=$_POST['usuarios'];


$sql="SELECT ID_USUARIO,
		 PERFIL_USUARIO,
		 NOMBRE_USUARIO,
         APELLIDO_USUARIO,
         CORREO_USUARIO
	from  usuarios
	where PERFIL_USUARIO='$usuarios'";

$result=mysqli_query($conn_registro,$sql);

$cadena="<select id='lista2' name='usuarios' class='form-control' required >";

while ($ver=mysqli_fetch_row($result)) {
	$cadena=$cadena.'<option  data-nit='.$ver[4].'  value='.$ver[0].'> '.utf8_encode($ver[2]).' '.utf8_encode($ver[3]).'</option>';
}
echo  $cadena."</select>";


 ?>