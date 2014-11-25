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

	$str_query = "SELECT developers.id_developer,
								datos_personales.nombre,
								datos_personales.apellidos,
								datos_personales.correo,
								datos_personales.nacimiento,
								developers.id_jefe as id_jef_dev,
								(SELECT datos_personales.nombre
									  FROM datos_personales, jefes
									  WHERE datos_personales.id_persona = jefes.id_persona AND jefes.id_jefe = id_jef_dev) AS nombre_jefe
						    FROM	developers,
						    		datos_personales,
						    		jefes
						   WHERE 	developers.id_persona = datos_personales.id_persona
							 AND	jefes.id_jefe = developers.id_jefe
						ORDER BY datos_personales.nombre ASC";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$arreglo = $model->getRows();
	echo json_encode($arreglo);
?>