<?php
	session_start();

	include("../core/Config.php");	// archivos para la conexion a la BD
	include("../core/Model.php");	// archivos para la conexion a la BD

	$logeado = false;

	$menu_seleccionado = 1;

/*
	if(!isset($_SESSION['tipo_persona']) || $_SESSION['tipo_persona'] != 2) {
		header("Location:cerrar_sesion.php");
	}
	*/
?>
<!DOCTYPE html>
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
				<h1 class="text-center">Jefes</h1>
			</div>

		<div class="row">
			<div class="col-xs-12 text-right">
				<button href='#developerNuevoModal' data-toggle='modal' style='color:white;' type="button" class="btn btn-primary" role='button'>
					<span class="glyphicon glyphicon-plus text-justify"> Nuevo developer</span>
				</button>
				<?php
					include("../vistas/jefes/jefes_nuevo.html");
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
								<th>Nombre</th>
								<th>Persona</th>
								<th>Apellidos</th>
								<th>Correo</th>
								<th>Fecha de nacimiento</th>
								<th>Proyecto</th>
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

</script>

</html>