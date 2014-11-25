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

	$menu_seleccionado = 3;


	if(!isset($_SESSION["tipo_persona"]) || $_SESSION["tipo_persona"] != 2){
		$logeado = false;
		header("Location:index.php");
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
				<h1 class="text-center">Mapas</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 text-right"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus text-justify"> Nuevo proyecto</span></button></div>
		</div>

		<img src="" alt="" />

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
								<th>Descripción</th>
								<th>Ancho</th>
								<th>Alto</th>
								<th>Tile Length</th>
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
</html>