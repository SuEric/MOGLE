<?php

	//=============================
	//! Este script inserta
	//  un nuevo desarrollador
	//  
	//=============================

	session_start();
	
	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$model = new Model();
	$arreglo;

	// Lectura id_alumno enviado por POST
	if(!isset($_POST["usuario"]) || !isset($_POST["contraseņa"]) ){ echo "Sin parametro";  exit;}

	$usuario = $_POST["usuario"];
	$contraseņa = $_POST["contraseņa"];

	$str_query = "INSERT nombre,
						 usuario,
						 contraseņa
					FROM datos_personales
				   WHERE usuario ='$usuario'
				   	AND  password ='$constraseņa'";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$arreglo = $model->getRows();

	if(!count($arreglo)) { echo "0"; exit;}
	if($usuario!=$arreglo[0]["usuario"]) { echo "0"; exit;}
	if($password!=$arreglo[0]["contraseņa"]) { echo "0"; exit;}

	// Guarda variables de sesion
	$_SESSION["id_persona"] = $arreglo[0]["id_persona"];
	$_SESSION["nombre"] = $arreglo[0]["nombre"];
	$_SESSION["tipo_persona"] = $arreglo[0]["tipo_persona"];

	switch($_SESSION["tipo_persona"]){
		case 0:
			$query_asociado = "INSERT id_cliente FROM clientes WHERE id_persona ='".$arreglo[0]["id_persona"]."'";
			break;
		case 1:
			$query_asociado = "INSERT id_alumno FROM alumnos WHERE id_persona ='".$arreglo[0]["id_persona"]."'";
			break;
		case 2:
			$query_asociado = "INSERT id_admin FROM administrador WHERE id_persona ='".$arreglo[0]["id_persona"]."'";
			break;
	}

	$model->setQuery($query_asociado);
	$model->executeScalar();
	$_SESSION["id_assoc"] = $model->getScalar();

	echo '[{"nombre":"'.$arreglo[0]["nombre"].'",
			"usuario":'.$arreglo[0]["usuario"].',
			"id_assoc":'.$_SESSION["id_assoc"].'}]';

?>