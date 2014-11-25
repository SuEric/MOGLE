<?php

	//=============================
	//! Este script autentica e
	//  identifica usuario jefe o
	//  desarrollador
	//=============================

	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	session_start();

	$model = new Model();
	$arreglo;

	// Lectura id_alumno enviado por POST
	if(!isset($_POST["usuario"]) || !isset($_POST["password"]) ){ echo "Sin parametro";  exit;}

	$usuario = $_POST["usuario"];
	$password = $_POST["password"];

	$str_query = "SELECT idPersona,
						 Nombre,
						 Usuario,
						 Password
					FROM Persona
				   WHERE Usuario ='$usuario'
				   	AND  Password ='$password'";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$arreglo = $model->getRows();

	if(!count($arreglo)) { echo "0"; exit;}
	if($usuario!=$arreglo[0]["Usuario"]) { echo "0"; exit;}
	if($password!=$arreglo[0]["Password"]) { echo "0"; exit;}

	// Guarda variables de sesion
	$_SESSION["idPersona"] = $arreglo[0]["idPersona"];
	$_SESSION["nombre"] = $arreglo[0]["Nombre"];

	// ESTO YA NO VA IR
	// $_SESSION["tipo_persona"] = $arreglo[0]["tipo_persona"];

	$id_persona = $arreglo[0]["idPersona"];

	$str_query = "SELECT
							Area
							Equipo_idEquipo
						FROM Desarrollador
						WHERE idDesarrollador = '$id_persona'";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$arreglo = $model->getRows();

	if(count($arreglo) > 0)

	$str_query = "SELECT
							Area
							Equipo_idEquipo
						FROM Desarrollador
						WHERE idDesarrollador = '$id_persona'";

	switch($_SESSION["tipo_persona"]){
		case 0:
			$query_asociado = "SELECT Persona_idPersona FROM Lider WHERE idPersona ='".$arreglo[0]["idPersona"]."'";
			break;
		case 1:
			$query_asociado = "SELECT idDesarrollador FROM Desarrollador WHERE idPersona ='".$arreglo[0]["idPersona"]."'";
			break;
		case 2:
			$query_asociado = "SELECT id_admin FROM administrador WHERE idPersona ='".$arreglo[0]["idPersona"]."'";
			break;
	}

	$model->setQuery($query_asociado);
	$model->executeScalar();
	$_SESSION["id_assoc"] = $model->getScalar();

/*
	echo '[{"idPersona":'.$arreglo[0]["idPersona"].',
			"Nombre":"'.$arreglo[0]["Nombre"].'",
			"tipo_persona":'.$arreglo[0]["tipo_persona"].',
			"id_assoc":'.$_SESSION["id_assoc"].'}]';
*/
?>