<?php

	//=============================
	//! Este script inserta
	//  un nuevo jefe
	//
	//=============================

	require_once("../../core/Config.php");
	require_once("../../core/Model.php");

	$model = new Model();

	// Extracción por POST
	$tipo_persona = $_POST["tipo_persona"];
	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$correo = $_POST["correo"];
	$nacimiento = $_POST["nacimiento"];
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];
	$id_proyecto = $_POST["id_proyecto"];

	// Insercion en datos_personales
	$str_query = "INSERT INTO datos_personales(
																tipo_persona,
																nombre,
																apellidos,
																correo,
																nacimiento,
																usuario,
																password
															)
				VALUES (
							'$tipo_persona',
							'$nombre',
							'$apellidos',
							'$correo',
							'$nacimiento',
							'$usuario',
							'$password',
							'$id_proyecto'
						)"

	// Recuperación id_persona
	$str_query = "SELECT MAX(id_persona) FROM datos_personales";

	$model->setQuery($str_query);
	$model->executeScalar();

	$id_persona = $model->getScalar();

	// Insercion en jefes
	$str_query = "INSERT INTO jefes(
												id_persona,
												id_proyecto
											)
				  VALUES(
				  				$id_persona,
				  				$id_proyecto
				  			)";

	$model->setQuery($str_query);
	$model->executeSingleQuery();
?>