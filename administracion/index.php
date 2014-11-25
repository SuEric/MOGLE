<!-- !CREDITOS
	Proyecto: 	MOGLE
	Curso: 		Administración de Proyectos
	Docente:		Ma. del Consuelo Molina García
	Autor: 		Eric García Pérez
-->

<!doctype html>

<?php

	include("../core/Config.php");	// archivos para la conexion a la BD
	include("../core/Model.php");	// archivos para la conexion a la BD

	$menu_seleccionado = 0;

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

		</br>
		</br>
		</br>

		<div class="row well">
			<div class="col-xs-12">
				<h1 class="text-center">Panel Administrativo MOGLE</h1>
				<p class="text-center lead">Bienvenido al panel administrativo. Este panel permite el acceso directo a la base de datos; ya se para agregar, editar o borrar.</p>
			</div>
		</div>

		</br>
		</br>
		</br>

		<div class="row text-center">
			<div class="col-xs-12">
				<small class="text-justify">Precaución: Puede haber pérdida de información debido a la interacción directa con la base de datos</small>
			</div>
		</div>

		</br>

		<!-- !Formulario de administrador -->
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3 well" style="padding: 20px;">
				<form class="form-horizontal bg-primary" role="form" style="padding: 15px;">
				  <div class="form-group">
				    <label for="user" class="col-sm-2 control-label glyphicon glyphicon-user">Usuario:</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" id="user" placeholder="Ingrese email">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="password" class="col-sm-2 control-label glyphicon glyphicon-lock">Contraseña:</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="password" placeholder="Ingrese contraseña">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <div class="checkbox">
				        <label>
				          <input type="checkbox"> Recuérdame
				        </label>
				      </div>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="button" class="btn btn-default" onclick="ingresarAdmin()"><span class="glyphicon glyphicon-log-in"> Ingresar</span></button>
				    </div>
				  </div>
				</form>
			</div>
		</div> <!-- Fin formulario -->

	</div> <!-- Fin container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>

<script>
	function ingresarAdmin() {
		user = $("#user").val();
		password = $("#password").val();

		error = false;
		if (user.length == 0) {
			error = true;
			$('.form-group:first-of-type').attr('class', 'form-group has-error has-feedback');
			$('.form-group:first-of-type').append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
		}

		if (password.length == 0) {
			error = true;
			$('.form-group:nth-of-type(2)').attr('class', 'form-group has-error has-feedback');
			$('.form-group:nth-of-type(2)').append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
		}

		if (!error) {
			$.ajax({
				type:"POST",
				url:"../drivers/php/login.php",
				data:"usuario="+user+"&password="+password,
				async:true,
				success: function(dato) {
					window.location.href = 'home_admin.php';
				}
			});
		}
	}
</script>