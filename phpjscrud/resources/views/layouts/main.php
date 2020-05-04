<?php

function head(){
   
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
            <link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css">
            <link rel="stylesheet" href="/resources/css/app.css">
            <title>CRUD JS + PHP</title>
        </head>
        <body>

        <nav class="navbar navbar-expand-lg navbar-dark" id="top-bar">
            <a class="navbar-brand" href="/">WORLD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>	
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li id="nav-ciudades" class="nav-item">
                        <a class="nav-link" href="/resources/views/ciudades.php">Ciudades</a>
                    </li>
                    <li id="nav-paises" class="nav-item">
                        <a class="nav-link" href="/resources/views/paises.php">Paises</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a href="#" class="nav-link disabled">Iniciar sesión</a>
                    </li>
                </ul>
            </div>
        </nav>

    <?php
    

}

function scripts(){
    ?>
        <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="../js/app.js"></script>        

    <?php
}


function footer($banner = 'AA 2020'){
    ?>

        <footer>
	        <small><?=$banner?></small>
        </footer>
    </body>
    </html>
    <?php
}