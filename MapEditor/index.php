<?php
	$path		= "./tilesets/";
	$dir_handle = @opendir($path) or die("No se pudo abrir $path");
?>

<html>
<head>
    <title> Editor de Escenas de MOGLE</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #222222;
        }
    </style>
    <script src="pixi.js"></script>
</head>

<body>
	<script src=program.js></script>

	<select id="seleccionTileset">
		<?php
			while ($file = readdir($dir_handle)) {
				//echo "<a 		href =\"$file\" title=\"$file\">$file</a><br>";
				echo "<option value=\"$file\">$file</option>";
			}
			closedir($dir_handle);
		?>
	</select>

	<button onclick="cargarTileSet()"> Cargar Tileset </button>
	<button onclick="exportar()"> Exportar </button>
	<button onclick="importar()"> Importar </button>


	<select id = "seleccionLayer">
		<?php
			for($i=1; $i<=$_GET["numLayers"]; $i++) echo "<option value=".$i.">".$i."</option>";
		?>
	</select>

	<br>

	<?php
	 	echo " <script> \n";
	 	echo '	createTileSet();';
		echo '	createMatrix('
				  .	$_GET["mWidth"] . ' ,'
				  . $_GET["mHeight"] . ' ,'
				  . $_GET["numLayers"] . ');' ;
	 	echo "</script>";
	?>

 </body>
</html>
