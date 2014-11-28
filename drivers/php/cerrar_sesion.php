<?php
	session_start();

	unset($_SESSION["idPersona"]);
	unset($_SESSION["usuario"]);
	unset($_SESSION["area"]);
	unset($_SESSION["cargo"]);
	header("Location: ../../index.php");
?>