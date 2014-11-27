<?php

	//=============================
	//! Este script elimina
	//  un jefe
	//
	//=============================

	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$model = new Model();

	// Lectura id_alumno enviado por POST
	if(!isset($_POST["id_jefe"])) { echo "Sin parametro"; exit;}

	// Extracción por metodo POST
	$id_jefe = $_POST["id_jefe"];

	$str_query = "DELETE FROM jefes where id_jefe = $id_jefe";



	$str_query = "DELETE FROM jefes
						WHERE id_jefe = '$id_jefe'";

	$model->setQuery($str_query);
	$model->executeSingleQuery();

?>