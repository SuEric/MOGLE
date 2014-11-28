<?php

	//=============================
	//! Este script lista proyectos
	//  de un usuario lider
	//=============================

	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$model = new Model();
	$arreglo = array();

	$idPersona = $_POST["idPersona"];

	$str_query = "SELECT
							idProyecto,
							Persona.nombre
						FROM
							Persona,
							Proyecto
						WHERE
							idPersona =  $idPersona AND
							idPersona = Proyecto.Persona_idPersona";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$arreglo = $model->getRows();
?>