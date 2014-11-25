<?php

	//=============================
	//! Este script elimina
	//  un mapa
	//
	//=============================

	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$model = new Model();

	// Lectura id_alumno enviado por POST
	if(!isset($_POST["id_mapa"])) { echo "Sin parametro"; exit;}

	// Extracción por metodo POST
	$id_mapa = $_POST["id_mapa"];

	$str_query = "DELETE FROM mapas where id_mapa = '$id_mapa'";

	$model->setQuery($str_query);
	$model->executeSingleQuery();
?>