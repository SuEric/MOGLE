<!-- !CREDITOS
	Proyecto: 	Auxus
	Curso: 		Ingeniería de Software Avanzada
	Docente:		Dr. Mario Anzúres García
	Autor: 		Eric García Pérez
-->

<!doctype html>

<?php
	session_start();

	include("../core/Config.php");	// archivos para la conexion a la BD
	include("../core/Model.php");	// archivos para la conexion a la BD

	$logeado = false;

	$menu_seleccionado = 1;

	if(!isset($_SESSION['tipo_persona']) || $_SESSION['tipo_persona'] != 2) {
		header("Location:cerrar_sesion.php");
	}

?>

<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Administración MOGLE</title>
	<link rel="stylesheet" href="../css/bootstrap.css"/>
</head>
<body style="background:#D2644B">

	<!-- !Container principal -->
	<div class="container-fluid" style="background-color:#F98B72;">
		<div class="row">
			<div class="col-xs-12">
				<?php
					include("admin_cabecera.php");
				?>
			</div>
		</div>

		</br>
		</br>
		</br>

		<div class="row well">
			<div class="col-xs-12">
				<h1 class="text-center">Developers</h1>
			</div>

		<div class="row">
			<div class="col-xs-12 text-right">
				<button href='#developerNuevoModal' data-toggle='modal' style='color:white;' type="button" class="btn btn-primary" role='button'>
					<span class="glyphicon glyphicon-plus text-justify"> Nuevo developer</span>
				</button>
				<?php
					include("../vistas/developers/developer_nuevo.html");
				?>
			</div>
		</div>

		</br>

		<div class="row">
			<div class="col-xs-12">
				<!-- !Tabla -->
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Proyecto</th>
								<th>Nombre</th>
								<th>Apellidos</th>
								<th>Correo</th>
								<th>Fecha de nacimiento</th>
								<th>Usuario</th>
								<th>Contraseña</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div><!-- Fin Tabla -->
			</div>
		</div>

	</div> <!-- Fin container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
</body>

<script>
	$(document).ready(function() {
		$.ajax({
				type:"POST",
				dataType:"json",
				url:"../drivers/php/jefes_grid.php",
				async:true,
				success: function(datos) {
					valores = "<option value='-1'>Sin jefe</option>";

					$.each(datos,function(i,v) {
						valores += "<option value='"+v.id_jefe+"'>"+v.nombre+"</option>";
					});

					$('#jefes_opciones').html(valores);
				}
		});
	});
</script>

</html>