<?php

	//=============================
	//! Este script actualiza
	//  un mapa
	//  
	//=============================
	
	// Lectura id_alumno enviado por POST
	if(!isset($_POST["id_mapa"])) { echo "Sin parametro"; exit;}

	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$model = new Model();

	// Extracción datos POST
	$id_mapa = $_POST["id_mapa"];
	$nombre = $_POST["nombre"];
	$id_proyecto = $_POST["id_proyecto"];
	$descripcion = $_POST["descripcion"];
	$ancho = $_POST["ancho"];
	$alto = $_POST["alto"];
	$tile_length = $_POST["tile_length"];

	$str_query = "UPDATE mapas 
						SET nombre = '$nombre',
							id_proyecto = '$id_proyecto',
							descripcion = '$despcrion',
							ancho = '$ancho',
							alto = '$alto',
							tile_length = '$tile_length'
						WHERE id_mapa ='$id_mapa'

	$model->setQuery($str_query);
	$model->executeSingleQuery();
?>