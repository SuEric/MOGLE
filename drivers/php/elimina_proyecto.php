<?php

	//=============================
	//! Este script elimina
	//  un proyecto
	//  
	//=============================
	
	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$model = new Model();

	// Lectura id_alumno enviado por POST
	if(!isset($_POST["id_proyecto"])) { echo "Sin parametro"; exit;}

	// Extracción por metodo POST
	$id_proyecto = $_POST["id_proyecto"];

	$str_query = "DELETE FROM proyectos where id_proyecto = $id_proyecto";

	

	$str_query = "DELETE FROM proyectos 
						WHERE id_proyecto = '$id_proyecto'";
						
	$model->setQuery($str_query);
	$model->executeSingleQuery();

?>