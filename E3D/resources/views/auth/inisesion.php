<?php include '../layouts/main.php'; head(); ?>

<div class="container">
    <div class="card mt-5 w-50">
        <div class="card-body">
            <form action="" id="inisesionform">
                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="passwd">Contraseña</label>
                    <input type="password" name="passwd" id="passwd" class="form-control">
                </div>
                <small id="error" class="form-text text-danger d-none mb-2">Los datos de inicio de sesion son incorrectos.</small>
                <button class="btn btn-primary" type="submit">Iniciar sesion</button>
            </form>
        </div>
    </div>
</div>

<?php scripts(); ?>

<script type="text/javascript">
    $(document).ready(function(){
        const isf = $("#inisesionform");
        isf.on("submit", function(e){
            e.preventDefault();
            e.stopPropagation();
            const datos = new FormData();
            datos.append("email", $("#email").val());
            datos.append("passwd", $("#passwd").val());
            datos.append("login", '');
            fetch(app.routes.login, {
                    method: "POST",
                    body: datos
            }).then(response => response.json()).then(resp => {
            console.log("Resultado del response en el modulo de inicio de sesion: ", resp.r);
            if(resp.r !== false) location.href = "../home.php";
            else $("#error").removeClass("d-none");
        }).catch(error => console.log("Error -> " + error));
        });
    });
</script>

<?php footer(); ?>