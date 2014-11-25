<!doctype html>

<?php

	session_start();

	include("core/Config.php");	// archivos para la conexion a la BD
	include("core/Model.php");	// archivos para la conexion a la BD

	$registrado = false;

	$menu_seleccionado = 6;
?>

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

	<?php
		include("vistas/registro.html");
	?>

	<!-- !Container principal -->
	<div class="container" style="background-color:#F98B72;">
		<h1>Acerca</h1>
			<div class="row">
				<div class="col-xs-6">
					<h2>¿Qué es MOGLE?</h2>
					<p class="lead  text-justify">MOGLE es un sistema web cuyo propósito es satisfacer las necesidades de la comunidad Gamer, a traves de un editor de niveles en linea, el cual puede gestionar y crear Tile Maps. (Massive Online Game Level Editor)</p>
				</div>
				<div class="col-xs-6">
					<img src="images/comunicacion.png" alt="MOGLE" class="img-responsive img-rounded"/>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<h2>¿Por qué MOGLE?</h2>
					<p class="lead  text-justify">MOGLE es una herramienta masiva que permite a la comunidad Gamer trabajar en conjunto y crear niveles con posibilidades infinitas, así como tambien probarlos en tiempo real.</p>
				</div>
				<div class="col-xs-6">
					<img src="images/mogle.png" alt="MOGLE Logo" class="img-responsive img-rounded"/>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<h2>¿Quiénes somos?</h2>
					<p class="lead  text-justify">Somos un equipo de estudiantes de la Benemerita Universidad Autonoma de Puebla, de la Facultad de Ciencias de la Computación.
												  </br>
												  </br>Nuestro Equipo esta conformado de 5 Integrantes:
												  </br>
												  </br>&bull; Eric Garcia Perez
												  </br>&bull; Nahúm Águila Pichón
												  <!--
												  </br>&bull; Mario Pacheco Ramírez Rol: Gerente de Planeación
												  </br>&bull; Ricardo Camacho Garza Rol: Gerente de Soporte
												  </br>&bull; Ricardo Quintero Salazár Rol: Gerente de Desarrollo
												  </br>&bull; Gerardo Bernal Ortíz 	Rol: Gerente de Calidad	</p> -->





				</div>
				<div class="col-xs-6">
					<img src="images/logo_buap.png" alt="MOGLE buap" class="img-responsive" />
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<h2>Recursos, herramientas entre otros utilizados</h2>
					<p class="lead  text-justify">&bull; Bootstrap.
												  </br>&bull; Wamp Server
												  </br>&bull; Ajax
												  </br>&bull; HMTL 5
												  </br>&bull; CSS 3
												  </br>&bull; PHP
												  </br>&bull; Pixi js
												  </br>&bull; Java Script
												  </br>&bull; Apache Server
												  </br>&bull; MYSQL Server
											  	  </br>&bull; JQuery </p>
				</div>
				<div class="col-xs-6">
					<img src="images/herramientas.png" alt="MOGLE herramientas" class="img-responsive" />
				</div>
			</div>
	</div> <!-- Fin container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>