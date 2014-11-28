<?php
	session_start();

/*
	include("core/Config.php");	// archivos para la conexion a la BD
	include("core/Model.php");	// archivos para la conexion a la BD
*/
	$menu_seleccionado = 1;

	if(!isset($_SESSION['cargo']) && !isset($_SESSION['area'])) {
		header("Location:drivers/php/cerrar_sesion.php");
	}
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
				<h1 class="text-center">Proyectos del usuario: <?php echo $_SESSION['usuario'] ?></h1>
				<?php
					if (isset($_SESSION["cargo"])) {
						$html = "<p>Cargo: ";
						$texto = $_SESSION["cargo"];
						include('drivers/php/proyectos_lider.php');
					}
					else {
						$html = "<p>Especializado en: ";
						$texto = $_SESSION["area"];
						include('drivers/php/proyectos_desarrollador.php');
					}
				echo $html.$texto."</p>"
				?>
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
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?
						for ($i=0; $i < count($arreglo); $i++) {
						?>
							<tr id="<?=$arreglo[$i]['idProyecto']?>fila">
								<td><?=$arreglo[$i]['nombre']?></td>
								<td><?=$arreglo[$i]['descripcion']?></td>
								<td>Falta</td>
								<td>
									<a id="<?=$arreglo[$i]['idProyecto']?>" href='#mapasModal<?=$arreglo[$i]['idProyecto']?>' data-toggle='modal' style='color:black;' role='button' onClick="verMapas(this.id)">Ver Mapas<a>
								</td>
							</tr>
						<?
						}
						?>
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

    <?php
		include 'vistas/mapas/mapas_proyecto.php';
	 ?>

	 <script>
	 	function verMapas(id) {
		 	$.ajax({
			 	type:"POST",
			 	data:"idProyecto="+id,
			 	dataType:"json",
			 	url:"drivers/php/mapas_proyecto.php",
			 	async: true,
				success: function(datos){

					$.each(datos,function(i,v) {

						$('#tbody'+id).append('<tr id='+v.idMapa+'fila"><td>'+v.nombre+'</td><td>'+v.descripcion+'</td><td class="ancho">'+v.anchoM+'</td><td>'+v.altoM+'</td><td>'+v.capa+'</td><td><button id="'+v.idMapa+'" type="button" class="btn btn-primary" onClick="abrirMapa(this.id)">Abrir Mapa</button></td></tr>');
					});
				}
			});
		}
	 </script>
</body>
</html>