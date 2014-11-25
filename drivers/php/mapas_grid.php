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

	$str_query = "SELECT jefes.id_jefe,
					        datos_personales.nombre,
					        datos_personales.apellidos,
					        datos_personales.correo,
					        datos_personales.nacimiento,
					        (SELECT proyectos.nombre
					          FROM proyectos
					          WHERE proyectos.id_proyecto = jefes.id_proyecto) AS nombre_proyecto
					          FROM developers,
					            datos_personales,
					            jefes
					         WHERE  jefes.id_persona = datos_personales.id_persona
					        AND jefes.id_jefe = developers.id_jefe
					      ORDER BY datos_personales.nombre ASC";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$arreglo = $model->getRows();
?>