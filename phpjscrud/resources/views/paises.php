<?php 

include 'layouts/main.php';

head();

?>


<div class="container">
	<div class="card" style="width:90%;margin: 30px auto;">
		<div class="card-header">
			<div class="row">
				<div class="col-2">
					Paises de: 
				</div>
				<div class="col-7">
					<select name="continente" id="continente" class="form-control"></select>
				</div>
				<div class="col-3">
					<button class="btn btn-primary disabled" id="ver-paises">Ver</button>
					<button class="btn btn-warning" id="nuevo-pais" data-toggle="modal" data-target="#modal-insertar-pais">Nuevo</button>
				</div>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped" id="tciudades">
				<thead>
					<tr>
						<th>Ciudad</th>
						<th>Código del país</th>
						<th>Población</th>
						<th><i class="fas fa-cog"></i></th>
					</tr>
				</thead>
				<tbody id="lista-paises">
					
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modal-insertar-ciudad">
  <div class="modal-dialog" role="document">
  	<form action="#" id="form-nueva-ciudad" onsubmit="app.ciudadGuardar(event)">
  		<input type="hidden" name="idciudad" id="idciudad" value="">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Nueva ciudad</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
       
       <div class="form-group">
       		<label for="Name">Ciudad</label>
       		<input type="text" class="form-control" name="Name" id="Name" required="required">
       </div>
       <div class="form-group">
       		<label for="District">Distrito</label>
       		<input type="text" class="form-control" name="District" id="District" required="required">
       </div>
       <div class="form-group">
       		<label for="Population">Población</label>
       		<input type="number" class="form-control" name="Population" id="Population" required="required">
       </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php scripts(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		app.paisesCargar();
		//$("#ver-ciudades").removeClass("disabled");
		$("#nav-paises").addClass("active");
		$("#ver-ciudades").click(function(){
			app.ciudadesCargar($("#pais").val());
		});
		$("#nueva-ciudad").click(function(){
			document.querySelector("#form-nueva-ciudad").reset();
		});
	});
</script>

<?php footer(); ?>