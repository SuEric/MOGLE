<?php

	//=============================
	//! Este script actualiza
	//  un developer
	//  
	//=============================
	
	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	// ¿Hay parametro?
	if(!isset($_POST["id_developer"])) { echo "Sin parametro";  exit;}

	$model = new Model();
	$arreglo = array();
	$id_persona = 0;

	// Extracción por POST
	$id_developer = $_POST["id_developer"];
	$tipo_persona = $_POST["tipo_persona"];
	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$correo = $_POST["correo"];
	$nacimiento = $_POST["nacimiento"];
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];
	$id_jefe = $_POST["id_jefe"];

	// Recuperación id_persona
	$str_query = "SELECT id_persona
					FROM developers
				   WHERE id_developer = '$id_developer'";

	$model->setQuery($str_query);
	$model->executeScalar();
	
	$id_persona = $model->getScalar();

	// Actualizacion datos personales
	$str_query = "UPDATE 	datos_personales 
					 SET 	tipo_persona = '$tipo_persona',
							nombre = '$nombre',
							apellidos = '$apellidos',
							correo = '$correo',
							nacimiento = '$nacimiento',
							usuario = '$usuario',
							password = '$password'
				   WHERE	id_persona = '$id_persona'";

	$model->setQuery($str_query);
	$model->executeSingleQuery();

	// Actualizacion datos alumno
	$str_query = "UPDATE developers 
				  SET
					id_jefe = $id_jefe
				WHERE id_developer = '$id_developer'";

	$model->setQuery($str_query);
	$model->executeSingleQuery();
?>