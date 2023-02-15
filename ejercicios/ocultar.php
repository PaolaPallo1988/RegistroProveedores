<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mostrar div al seleccionar una opcion</title>
    
    <script>
    function mostrar(dato){
        if(dato=="1"){
            document.getElementById("nombre").style.display = "block";
            document.getElementById("apellidos").style.display = "none";
            document.getElementById("edad").style.display = "none";
        }
        if(dato=="2"){
            document.getElementById("nombre").style.display = "none";
            document.getElementById("apellidos").style.display = "block";
            document.getElementById("edad").style.display = "none";
        }
        if(dato=="3"){
            document.getElementById("nombre").style.display = "none";
            document.getElementById("apellidos").style.display = "none";
            document.getElementById("edad").style.display = "block";
        }
    }
    </script>
</head>
<body>
    <div class="row">
            <div class="col-md-5 col-md-offset-3">
<form action="" method="POST"  enctype="multipart/form-data" >
                <div class="form-group" id="opciones" >
                    <label for="">Opciones:</label>
                    <input type="radio" name="opc" value="1" onchange="mostrar(this.value);">Solo nombre
                    <input type="radio" name="opc" value="2"  onchange="mostrar(this.value);">Solo apellidos 
                    <input type="radio" name="opc" value="3"  onchange="mostrar(this.value);">Solo edad
                </div>
                <div class="form-group" id="nombre" style="display:none;">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" name="nombre"  >
                </div>
                <div class="form-group" id="apellidos" style="display:none;">
                    <label for="">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos"  >
                </div>
                <div class="form-group" id="edad" style="display:none;">
                    <label for="">Edad:</label>
                    <input type="text" class="form-control" name="edad"  >
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>