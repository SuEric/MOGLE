<?php

	//=============================
	//! Este script actualiza
	//  un proyecto
	//  
	//=============================
	
	// Lectura id_alumno enviado por POST
	if(!isset($_POST["id_proyecto"])) { echo "Sin parametro"; exit;}

	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$model = new Model();

	// Extracción datos POST
	$id_proyecto = $_POST["id_proyecto"];
	$id_jefe = $_POST["id_jefe"];
	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	

	$str_query = "UPDATE proyectos 
						SET nombre = '$nombre',
							id_proyecto = '$id_proyecto',
							descripcion = '$despcrion',
							id_jefe = '$id_jefe'
						WHERE id_proyecto = '$id_proyecto'

	$model->setQuery($str_query);
	$model->executeSingleQuery();
?>