<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selects dependientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

</head>
<body>
    <div class="container m-4">
        <form class="row form" action="" method="post">
            <div class="form-group col-lg-3">
                <label for="category">Producto</label>
                <select name="category" id="category" class="form-control">
                    <option value="1" selected>Ropa</option>
                    <option value="2">Moda</option>
                    <option value="3">Calzado</option>
                </select>
            </div>
            <div class="form-group col-lg-3">
                <label for="subCategory">Tipo</label>
                <select name="subCategory" id="subCategory" class="form-control">
                    <option value="1">Camisas</option>
                    <option value="2">Vestidos</option>
                    <option value="3">Playeras</option>
                </select>
            </div>       
        </form>  
    </div>
    
</body>
<script language="javascript">
    $(document).ready(function(){
        $("#category").on('change', function () {
            $("#category option:selected").each(function () {
                category=$(this).val();
                $.post("datos.php", { category: category }, function(data){
                    $("#subCategory").html(data);
                });			
            });
       });
    });
    </script>
</html>