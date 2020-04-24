<?php 

function head(){

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <!--<link rel="stylesheet" href="/resources/css/bootstrap.min.css" type="text/css">-->
    <!-- <link rel="stylesheet" href="/resources/css/styles.css" type="text/css"> -->
</head>
<body>
   <div id="app" class="container mw-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                <img src="/resources/images/Logo_AA_2020_P2.png" class="mt-3px" style="height:50px;" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" data-filtro="todos">Pubicaciones más recientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Nueva publicación (próximamente)</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" id="buscar-post" placeholder="Buscar en publicaciones" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="app.buscarPosts()" >Buscar</button>
                    </form>
                </div>
            </nav>            


<?php 

} 

function foot(){
?>

   
   </div> 
   <div class="modal" id="modal-foto"></div>
    <script src="/resources/js/jquery.min.js" type="text/javascript"></script>
    <script src="/resources/js/popper.min.js" type="text/javascript"></script>
    <script src="/resources/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/resources/js/app.js"></script>
</body>
</html>

<?php } ?>