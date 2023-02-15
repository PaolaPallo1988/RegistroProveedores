<?php

include('conexion.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Dinamicos</title>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-es.js"></script>
  <style>
    .top-buffer {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div id="container ">
    <div class="row-fluid top-buffer">
      <div class="col-lg-6 col-lg-offset-3 text-center">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
          <?php require('guarda.php'); ?>
          <div class='col-sm-12'><br>
            <labe>EJERCICIO DE INPUT FILE </labe>
            <br>
            <input placeholder='Documentos Específicos' accept="application/pdf" type="file" name="archivo" id="archivo"> </br>
          </div>
          <div class="form-group row">
            <button name="btnguardar" id="btnguardar" type="submit" class="btn btn-success">Guardar</button>
          </div><br>
          <?php
          //PARA BUSCAR EL ULTIMO NUMERO INGRESADO 
          $rs = mysqli_query($conn_registro, "SELECT MAX(id_documento) AS id_documento FROM documento");
          if ($row = mysqli_fetch_row($rs)) {
            $id = trim($row[0]);
          }
          //PARA BUSCAR EL ULTIMO NUMERO INGRESADO 
          ?>

          <!-- VISUALIZAR LA INFORMACION DE LA TABLA PARA MODIFICARLA O ELIMINARLA  -->
          <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>CODIGO</th>
                <th>RUTA</th>
                <th>ACCION</th>
              </tr>
            </thead>
            <?php
            $consulta = mysqli_query($conn_registro, "SELECT * FROM documento ");
            while ($archivo = mysqli_fetch_array($consulta)) {
            ?>
              <tbody>
                <tr>
                  <td>
                    <?php echo $archivo['id_documento'] ?>
                  </td>
                  <td>
                    <?php echo $archivo['ruta_documento'] ?>
                  </td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-app" href="ventana_edita.php?id_archivo_actualiza=<?php echo $archivo['id_documento']; ?> "><i class='fa fa-user-plus' aria-hidden='true'></i> Editar</a>
                      <a class="btn btn-app" href="usuario_desactiva.php?id_archivo_elimina=<?php echo  $archivo['id_documento']; ?>"><i class='fa fa-user-times' aria-hidden='true'></i> Eliminar</a>
                      <a class="btn btn-app" href="usuario_desactiva.php?id_archivo_ver=<?php echo  $archivo['id_documento']; ?>"><i class='fa fa-user-times' aria-hidden='true'></i> Ver</a>
                </tr>
              </tbody>
            <?php
            }
            ?>
          </table>
          <!-- VISUALIZAR LA INFORMACION DE LA TABLA PARA MODIFICARLA O ELIMINARLA  -->
      </div>
    </div>
    </form>

    
  </div>
</body>

</html>