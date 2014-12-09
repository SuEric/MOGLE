<?php

	//=============================
	//! Este script lista mapas
	//  de un proyecto
	//=============================

	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$model = new Model();
	$mapa = array();

	$idMapa = $_POST["idMapa"];

	$str_query = "SELECT
							idMapa,
							nombre,
							descripcion,
							anchoM,
							altoM,
							capas
						FROM
							Mapa
						WHERE
							idMapa = $idMapa";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$mapa = $model->getRows();
	echo json_encode($mapa);
?>