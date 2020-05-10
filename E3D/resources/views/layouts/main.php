<?php function head(){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/css/bootstrapp.min.css">
    <link rel="stylesheet" href="/resources/css/style.css">
    <title>[BLOGX]</title>
</head>
<body>
    <nav class="navbar navbar-expanded-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">BLOGX</a>
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Intercambiar navegacion">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse-navbar-collapse">
            <ul class="navbar-nav mr-auto">
            <?php if(true){ ?>
                <li class="nav-item active">
                    <a href="/resources/views/publicaciones.php" class="nav-link">Mis publicaciones</a>
                </li>
            <?php } ?>    
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item dropdown">
            <?php if(true){ ?>
                <button class="nav-link btn btn-link" type="button" onclick="">Iniciar sesión</button>
            <?php }else{ ?>
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nombre de Usuario(PHP)</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <button class="dropdown-item" onclick="">Cerrar sesión</button>
                </div>
            <?php } ?>        
                </li>
            </ul>
        </div>    
    </nav>    
</body>
</html>
<?php } ?>