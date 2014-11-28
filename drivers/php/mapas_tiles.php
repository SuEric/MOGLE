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
							Mapa.idMapa,
							Mapa.nombre,
							Mapa.descripcion,
							Tile.url,
							xMapa,
							yMapa,
							xTile,
							yTile,
							Mapa_Tile.capa
						FROM
							Mapa,
							Mapa_Tile,
							Tile
						WHERE
							Mapa.idMapa = 2 AND
							idMapa = Mapa_Tile.Mapa_idMapa AND
							Mapa_Tile.Tile_idTile = Tile.idTile";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$mapa = $model->getRows();
	echo json_encode($mapa);
?>