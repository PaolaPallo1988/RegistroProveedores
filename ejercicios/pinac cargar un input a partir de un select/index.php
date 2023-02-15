<?php
require('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>


    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <!--- UTILIZAR JAX --->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
           // $('#lista1').val(1);
            recargarLista();
            $('#lista1').change(function() {
                recargarLista();
            });
        })
    </script>
    <script type="text/javascript">
        function recargarLista() {
            $.ajax({
                type: "POST",
                url: "recargar.php",
                data: "usuarios=" + $('#lista1').val(),
                success: function(r) {
                    $('#select2lista').html(r);
                    $('#nit').html(r);
                }
            });
        }
    </script>

    <script>
        function selectNit(e) {
            var nit = e.target.selectedOptions[0].getAttribute("data-nit")
            document.getElementById("nit").value = nit;
        }
    </script>

</head>

<body>



    <div class="container mt-3">
        <h2>Stacked form</h2>
        <form action="/action_page.php">
            <div class="mb-3 mt-3">
                <label for="email">Perfil:</label>
                <select  class="form-control" name="perfil" id="lista1" required>
                    <option value="">SELECCIONAR...</option>
                    <?php
                    include('conexion.php');
                    $sql = "SELECT * FROM perfil_usuario";
                    $query = mysqli_query($conn_registro, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $id_perfil_usuario = $row['ID_PERFIL_USUARIO'];
                        $nombre_perfil_usuario = $row['NOMBRES_PERFIL_USUARIO'];
                    ?>
                        <option value="<?php echo $id_perfil_usuario ?>"><?php echo $nombre_perfil_usuario ?></option>
                    <?php }
                    mysqli_free_result($query);
                    mysqli_close($conn_registro); ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="pwd">Nombres:</label>
                <div class="form-group">
                    <div onclick="selectNit(event)" id="select2lista"></div>
                </div>
            </div>

            <div class="mb-3">
                <label for="pwd">Correo:</label>
                <input  type="text" class="form-control" id="nit" placeholder="Enter email" disabled>
            </div>
        </form>
    </div>

</body>

</html>