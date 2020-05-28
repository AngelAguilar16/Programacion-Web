<?php function head(){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/resources/css/style.css">
    <title>[BLOGX]</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">BLOGX</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Intercambiar navegacion">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
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
                <button class="nav-link btn btn-link" type="button" onclick="app.view('inisesion')">Iniciar sesión</button>
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
<?php 
} 
function scripts($script=""){ ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="/resources/js/app.js"></script>
<?php echo $script; 
}
function footer($banner = "Blog excepcional en PHP | JS | CRUD"){ ?>
    <footer>
        <small><?=$banner?></small>
    </footer>
</body>
</html>
<?php } ?>