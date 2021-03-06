<?php

	//=============================
	//! Este script lista mapas
	//  de un proyecto
	//=============================

	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$model = new Model();
	$mapas = array();

	if(!isset($_POST["idProyecto"]) ) {echo "Sin parametro";  exit;}
	$idProyecto = $_POST["idProyecto"];

	$str_query = "SELECT
							Mapa.idMapa,
							Mapa.nombre,
							Mapa.descripcion,
							anchoM,
							altoM,
							capas
						FROM
							Proyecto,
							Mapa
						WHERE
							Proyecto.idProyecto = $idProyecto AND
							idProyecto = Mapa.Proyecto_idProyecto";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$mapas = $model->getRows();
	echo json_encode($mapas);
?>