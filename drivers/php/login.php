<?php
	session_start();

	//=============================
	//! Este script autentica e
	//  identifica usuario jefe o
	//  desarrollador
	//=============================

	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$model = new Model();
	$arreglo;

	// Lectura id_alumno enviado por POST
	if(!isset($_POST["usuario"]) || !isset($_POST["password"]) ) {echo "Sin parametro";  exit;}

	$usuario = $_POST["usuario"];
	$password = $_POST["password"];

	$str_query = "SELECT idPersona,
						 nombre,
						 usuario,
						 password,
						 cargo,
						 area
					FROM Persona
				   WHERE usuario ='$usuario'
				   	AND  password ='$password'";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$arreglo = $model->getRows();

	if(!count($arreglo)) { echo "0"; exit;}
	if($usuario != $arreglo[0]["usuario"]) { echo "0"; exit;}
	if($password != $arreglo[0]["password"]) { echo "0"; exit;}

	// Guarda variables de sesion
	$_SESSION["idPersona"] = $arreglo[0] ["idPersona"];
	$_SESSION["usuario"] = $arreglo[0]["usuario"];

	if ($arreglo[0]["cargo"] != NULL) $_SESSION["cargo"] = $arreglo[0]["cargo"];
	else $_SESSION["area"] = $arreglo[0]["area"];
?>