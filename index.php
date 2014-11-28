<?php
	session_start();

	include("core/Config.php");	// archivos para la conexion a la BD
	include("core/Model.php");	// archivos para la conexion a la BD

	$menu_seleccionado = 0;
?>
<!DOCTYPE html>

<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>MOGLE</title>
	<link rel="stylesheet" href="css/bootstrap.css"/>
</head>
<body style="background-image: url('images/background.png'); background-repeat:no-repeat;">
	<?php
		include("cabecera.php");
	?>

	<!-- !Container principal -->
	<div class="container" style="background-color:#F98B72;">

	</div> <!-- Fin container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.10.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>