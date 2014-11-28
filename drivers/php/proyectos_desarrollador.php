<?php

	//=============================
	//! Este script lista proyectos
	//  de un usuario desarrollador
	//=============================

	require_once('core/Config.php');
	require_once('core/Model.php');

	$model = new Model();
	$arreglo = array();

	$idPersona = $_POST["idPersona"];

	$str_query = "SELECT
							Proyecto.idProyecto,
							Proyecto.nombre,
							Proyecto.descripcion
						FROM
							Persona,
							Proyecto_Desarrollador,
							Proyecto
						WHERE
							Persona.idPersona =  4 AND
							Proyecto_Desarrollador.Persona_idPersona = Persona.idPersona AND
							Proyecto_Desarrollador.Proyecto_idProyecto = Proyecto.idProyecto";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$arreglo = $model->getRows();
?>