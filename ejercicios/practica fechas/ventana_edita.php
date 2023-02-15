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
        
          <?php require('edita.php'); 
                    $edita = !empty($_GET['id_archivo_actualiza']) ? $_GET['id_archivo_actualiza'] : null;

                    $sql = "SELECT * FROM documento WHERE id_documento='" . $edita . "'";
                    $mysqli = mysqli_query($conn_registro, $sql);
                    while ($id = mysqli_fetch_array($mysqli)) {
                        $id = $id[0] . "||" . 
                        $id[1];
                            
                    ?>
                        <input type='text' class="form-control" name="id_documento" name="id_documento" value="<?php echo $id['0'] ?>" />
                    <?php 
                      }    
          ?>

          <div class='col-sm-12'><br>
            EDITA EL ARCHIVO PDF GUARDADO EN LA BASE DE DATOS
            


            <input accept="application/pdf" type="file" name="archivo" id="archivo"> </br>
          </div>
          <div class="form-group row">
            <button name="btnEditar" id="btnEditar" type="submit" class="btn btn-success">EDITAR</button>
          </div><br>
</body>

</html>
