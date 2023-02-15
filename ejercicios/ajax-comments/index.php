<?php require('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Envio de comentarios con jQuery, AJAX y PHP Demo</title>
<meta name="description" content="Envio de comentarios con jQuery, AJAX y PHP ejemplo..."/>
<meta name="author" content="Jose Aguilar">
<link rel="shortcut icon" href="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/favicon.ico" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#submitComment").click(function() {
        var name = $("input#name").val();
        var comment = $("textarea#comment").val();
        var now = new Date();
        var date_show = now.getDate() + '-' + now.getMonth() + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + + now.getMinutes() + ':' + + now.getSeconds();

        if (name == '') {
            alert('Debes añadir un nombre.');
            return false;
        }
        
        if (comment == '') {
            alert('Debes añadir un comentario.');
            return false;
        }

        var dataString = 'name=' + name + '&comment=' + comment;

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "process.php",
            data: dataString,
            success: function(response) {
                if (response) {
                    $('#new-comment').show();
                    $('#new-comment').find('#author-name').text(response.name);
                    $('#new-comment').find('.comment-text').text(response.comment);
                    $('#new-comment').find('#date-show').text(response.date_show);
                }
            }
        });
        return false;
    });
});
</script>
</head>

<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="https://www.jose-aguilar.com/">
        <img src="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/images/jose-aguilar.png" width="30" height="30" alt="Jose Aguilar">
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="https://www.jose-aguilar.com/scripts/jquery/ajax-comments/">Demo <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="https://www.jose-aguilar.com/scripts/jquery/ajax-comments/ajax-comments.zip">Descargar</a>
            <a class="nav-item nav-link" href="https://www.jose-aguilar.com/blog/como-enviar-comentarios-con-jquery-ajax/">Tutorial</a>
            <a class="nav-item nav-link" href="https://www.jose-aguilar.com/">&copy; Jose Aguilar</a>
        </div>
    </div>
</nav>
<div class="container">
    <h1>Envio de comentarios con jQuery, AJAX y PHP</h1>
    <h2 class="lead">Demostración</h2>
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="https://www.jose-aguilar.com/blog/">Blog</a></li>
          <li class="breadcrumb-item"><a href="#">Tutorial</a></li>
          <li class="breadcrumb-item active">Comentarios</li>
        </ol>
    </nav>
    
    <div class="row">
        <div id="content" class="col-lg-12">
            <h2>Comentarios</h2>
            <?php
            $result = $conexion->query(
                'SELECT name, text, DATE_FORMAT(date_added, "%d/%m/%Y %H:%i:%s") as date_show 
                FROM comments 
                ORDER BY date_added DESC LIMIT 0,10'
            );
            if ($result->num_rows > 0) {
                ?>
                <div class="row items">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="col-lg-12">
                            <div class="comment">
                                <div class="row">
                                    <div class="col-lg-2 comment-avatar">
                                        <img class="img-fluid" width="250" height="250" src="images/user.png" />	
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="comment-autor">
                                            <strong><?php echo $row['name']; ?></strong> dice:<br/>
                                            <small><?php echo $row['date_show']; ?></small>
                                        </div>
                                        <div class="comment-text"><?php echo nl2br($row['text']); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div id="new-comment" class="col-lg-12" style="display:none;">
                        <div class="comment">
                            <div class="row">
                                <div class="col-lg-2 comment-avatar">
                                    <img class="img-fluid" width="250" height="250" src="images/user.png" />	
                                </div>
                                <div class="col-lg-10">
                                    <div class="comment-autor">
                                        <strong><span id="author-name"></span></strong> dice:<br/>
                                        <small><span id="date-show"></span></small>
                                    </div>
                                    <div class="comment-text"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <h2>Envia un comentario con JQUERY/AJAX</h2>
    <div id="register_form" class="row">
        <div class="col-lg-12">
            <form method="post">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Tu nombre">
                </div>
                <div class="form-group">
                    <label for="comment">Comentario</label>
                    <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                </div>
                <button type="button" id="submitComment" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Bloque de anuncios adaptable -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-6676636635558550"
                 data-ad-slot="8523024962"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
    
    <div class="card">
        <h5 class="card-header">Comparte en las redes sociales</h5>
        <div class="card-body">
            <h5 class="card-title">¿Te ha servido este ejemplo? Comparte con tus amigos</h5>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4ecc1a47193e29e4" async="async"></script>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div>
        </div>
    </div>

    <div class="footer-content row">
        <div class="col-lg-12">
            <div class="pull-right">
                <a href="https://www.jose-aguilar.com/blog/como-enviar-comentarios-con-jquery-ajax/" class="btn btn-secondary">
                    <i class="fa fa-reply"></i> volver al tutorial
                </a>
                <a href="https://www.jose-aguilar.com/scripts/jquery/ajax-comments/ajax-comments.zip" class="btn btn-primary">
                    <i class="fa fa-download"></i> Descargar
                </a>
            </div>
        </div>
    </div>
    
</div>
<footer class="footer bg-dark">
    <div class="container">
        <span class="text-muted"><a href="https://www.jose-aguilar.com/">&copy; Jose Aguilar</a></span>
    </div>
</footer>
</body>
</html>
