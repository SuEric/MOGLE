<?php
	session_start();
	unset($_SESSION["id_persona"]);
	unset($_SESSION["nombre"]);
	unset($_SESSION["tipo_persona"]);
	unset($_SESSION["id_assoc"]);
	header("Location: ../../index.php");
?>