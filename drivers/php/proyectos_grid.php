<?php

	//=============================
	//! Este script actualiza
	//  un developer
	//
	//=============================

	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$model = new Model();
	$arreglo = array();

	$str_query = "SELECT proyectos.id_proyecto,
								proyectos.nombre
								proyectos.descripcion,
								jefes.id_jefe,
								
						    FROM	
											proyectos,
											jefes,
											datos_personales
								WHERE proyectos.id_jefe = jefes.id_jefe";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$arreglo = $model->getRows();
	echo json_encode($arreglo);
?>