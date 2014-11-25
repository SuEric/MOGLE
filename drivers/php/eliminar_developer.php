<?php

	//=============================
	//! Este script elimina
	//  un developer
	//
	//=============================

	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	// ¿Hay parametro?
	if(!isset($_POST["id_developer"])) { echo "Sin parametro";  exit;}

	$model = new Model();
	$id_persona = 0;

	$id_developer = $_POST["id_developer"];

	// Recuperación id_persona
	$str_query = "SELECT id_persona
					FROM developers
				   WHERE id_developer = '$id_developer'";

	$model->setQuery($str_query);
	$model->executeScalar();

	$id_persona = $model->getScalar();

	// Borrado de developers
	$str_query = "DELETE FROM developers
						WHERE id_developer = '$id_developer'";

	$model->setQuery($str_query);
	$model->executeSingleQuery();

	// Borrado de tabla datos_personales
	$str_query = "DELETE FROM datos_personales
						WHERE id_persona = '$id_persona'";

	$model->setQuery($str_query);
	$model->executeSingleQuery();
?>