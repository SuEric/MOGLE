<?php

	//=============================
	//! Este script elimina
	//  un jefe
	//  
	//=============================

	session_start();
	
	require_once('../../core/Config.php');
	require_once('../../core/Model.php');

	$model = new Model();
	$arreglo;

	// Lectura id_alumno enviado por POST
	if(!isset($_POST["usuario"]) || !isset($_POST["contraseña"]) ){ echo "Sin parametro";  exit;}

	$usuario = $_POST["usuario"];
	$contraseña = $_POST["contraseña"];

	$str_query = "DELETE nombre,
						 usuario,
						 proyecto,
						 estado,
						 equipo
					FROM datos_personales
				   WHERE usuario ='$usuario'
				   	AND  password ='$constraseña'";

	$model->setQuery($str_query);
	$model->getResultsFromQuery();
	$arreglo = $model->getRows();

	if(!count($arreglo)) { echo "0"; exit;}
	if($usuario!=$arreglo[0]["usuario"]) { echo "0"; exit;}
	if($password!=$arreglo[0]["contraseña"]) { echo "0"; exit;}

	// Guarda variables de sesion
	$_SESSION["id_persona"] = $arreglo[0]["id_persona"];
	$_SESSION["nombre"] = $arreglo[0]["nombre"];
	$_SESSION["tipo_persona"] = $arreglo[0]["tipo_persona"];

	switch($_SESSION["tipo_persona"]){
		case 0:
			$query_asociado = "DELETE id_cliente FROM clientes WHERE id_persona ='".$arreglo[0]["id_persona"]."'";
			break;
		case 1:
			$query_asociado = "DELETE id_alumno FROM alumnos WHERE id_persona ='".$arreglo[0]["id_persona"]."'";
			break;
		case 2:
			$query_asociado = "DELETE id_admin FROM administrador WHERE id_persona ='".$arreglo[0]["id_persona"]."'";
			break;
	}

	$model->setQuery($query_asociado);
	$model->executeScalar();
	$_SESSION["id_assoc"] = $model->getScalar();

	echo '[{"nombre":"'.$arreglo[0]["nombre"].'",
			"usuario":'.$arreglo[0]["usuario"].',
			"proyecto":'.$arreglo[0]["proyecto"].',
			"estado":'.$arreglo[0]["estado"].',
			"equipo":'.$arreglo[0]["equipo"].',
			"id_assoc":'.$_SESSION["id_assoc"].'}]';

?>