<?php

	//=====================================
	//! Registra usuario lider o developer
	//  con sus datos personales
	//=====================================

	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$tipo_persona = $_POST['tipo_persona'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	$model = new Model();

	$str_query = "INSERT INTO Persona(Nombre,
											Apellidos,
											Correo,
											Usuario,
											Password)
						VALUES('$nombre',
								'$apellidos',
								'$correo',
								'$usuario',
								'$password')";

	$model->setQuery($str_query);
	$model->executeSingleQuery();

	$str_query = "SELECT MAX(idPersona) FROM Persona";

	$model->setQuery($str_query);
	$model->executeScalar();

	$id_persona = $model->getScalar(); // Recupera el id de insertado

	if ($tipo_persona == 0) {
		$area = $_POST['area'];
		$str_query = "INSERT INTO Desarrollador(idDesarrollador,
															Area)
							VALUES('$id_persona',
									'$area')";
	}
	else {
		$cargo = $_POST['cargo'];
		$str_query = "INSERT INTO Lider(Persona_idPersona,
												Cargo)
							VALUES('$id_persona',
									'$cargo')";
	}

	$model->setQuery($str_query);
	$model->executeSingleQuery();

	echo "$nombre";
?>