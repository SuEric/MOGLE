<?php
	session_start();

	include("core/Config.php");	// archivos para la conexion a la BD
	include("core/Model.php");	// archivos para la conexion a la BD

	$menu_seleccionado = 1;

	/* DESPUES SE ARREGLARA
	if(!isset($_SESSION['tipo_persona'])) {
		header("Location:drivers/php/cerrar_sesion.php");
	} */

?>

<!-- !CREDITOS
	Proyecto: 	MOGLE
	Curso: 		Administración de Proyectos
	Docente:		Maria del Consuelo Molina
-->

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>MOGLE</title>
	<link rel="stylesheet" href="css/bootstrap.css"/>
</head>
<body style="background:#D2644B">

	<?php
		include("cabecera.php");
	?>

	<!-- !Container principal -->
	<div class="container-fluid" style="background-color:#F98B72;">

		</br>
		</br>
		</br>

		<div class="row">
			<div class="col-xs-12">
				<h1 class="text-center">Proyectos del usuario: <?php echo $_SESSION['nombre'] ?></h1>
			</div>
		</div>

		</br>

		<div class="row">
			<div class="col-xs-12">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Lider</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>As</td>
								<td>Asa</td>
								<td>Asas</td>
							</tr>
						</tbody>
					</table>
				</div><!-- Fin Tabla -->
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<h2>No hay proyectos existentes</h2>
			</div>
		</div>

	</div> <!-- Fin container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.10.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>