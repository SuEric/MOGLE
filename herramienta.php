<?php
	session_start();

	include("core/Config.php");	// archivos para la conexion a la BD
	include("core/Model.php");	// archivos para la conexion a la BD

	$path		= "./images/tilesets/";
	$dir_handle = @opendir($path) or die("No se pudo abrir $path");

	$menu_seleccionado = 1;

	/*
	if(!isset($_SESSION['tipo_persona'])) {
		header("Location:drivers/php/cerrar_sesion.php");
	}*/
?>

<!-- !CREDITOS
	Proyecto: 	MOGLE
	Curso: 		Bases de datos
	Docente:		Maria Somodevilla
-->

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Editor de Escenas de MOGLE</title>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<script src="js/pixi.js"></script>
	<script src="js/program.js"></script>

	<style>
		#editor_grafico {
			height: 46em;
			overflow: auto;
			padding: 10px;
			width: auto;
		}
	</style>
</head>
<body style="background:#D2644B">

	<?php
		include("cabecera.php");
	?>

	<!-- !Container principal -->
	<div class="container-fluid" style="background-color:#F98B72;">

		</br>
		</br>
		</br>

		<!--!Herramienta -->
		<div class="row">
			<div class="col-xs-8 well"> <!-- Parte izquierda -->
				<h2 id="nombre_mapa" class="text-center text-primary">Nombre mapa<span id="idMapa" style="display: none"><?=$_GET["idMapa"]?></span></h2>

				<button class="btn btn-default" onclick="importar()">
					<span class="glyphicon glyphicon-export"> Importar</span>
				</button>
				<button class="btn btn-default" onclick="exportar()">
					<span class="glyphicon glyphicon-import"> Exportar</span>
				</button>
				<div id="editor_grafico"> <!-- Elemento canvas -->
				</div> <!-- Fin elemento canvas-->

				<div class="row">
					<div class="col-xs-12">
						<h6 class="text-left text-info bg-info">Información Mapa:</h6>
					</div>
				</div>

			</div> <!-- Fin parte izquierda -->

			<div class="col-xs-4"> <!-- Parte derecha -->
				<div class="row">

					<div class="col-xs-12 center-block well">
						<h1 class="lead text-center">Herramientas</h1>
					</div>
					<div class="col-xs-12 center-block well">
						<h1 class="lead text-center">Layers</h1>
						<select id = "seleccionLayer">
							<?php
								for($i=1; $i<=$_GET["numLayers"]; $i++) echo "<option value=".$i.">".$i."</option>";
							?>
						</select>
					</div>

					<div class="col-xs-12 center-block well">
						<h1 class="lead text-center">Tiles</h1>
						<select class="form-control-xs" id="seleccionTileset">
							<?php
								while ($file = readdir($dir_handle)) {
									if ($file == '.' || $file == '..') continue;
									//echo "<a 		href =\"$file\" title=\"$file\">$file</a><br>";
									echo "<option value=\"$file\">$file</option>";
								}
								closedir($dir_handle);
							?>
						</select>
						<button type="button" class="btn btn-default" onclick="cargarTileSet()">
							<span class="glyphicon glyphicon-eye-open"></span> Cargar Tileset
						</button>

						<br>

						<div id="tileViewer" style="overflow:auto;">

						</div>
					</div>

				</div>
			</div> <!--- Fin parte derecha -->
		</div>

	</div> <!-- Fin container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="js/jquery-1.10.js"></script>
   <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="js/bootstrap.min.js"></script>

	<script>
		$(document).ready(function() {
			<?php
						echo '	createTileSet();';
						echo '	createMatrix('
					  .$_GET["mWidth"] . ' ,'
					  . $_GET["mHeight"] . ' ,'
					  . $_GET["numLayers"] . ');'
			?>

			$.ajax({
			 	type:"POST",
			 	data:"idMapa="+idMapa,
			 	dataType:"json",
			 	url:"drivers/php/mapas_tiles.php",
			 	async: true,
				success: function(datos) {
					/*$.each(datos,function(i,v) {
						var xB = v.xMapa;
						var yB = v.yMapa;
						var tileX = v.xTile;
						var tileY = v.yTile;

						selectedTileset = "./images/tilesets/"+v.url+".png";
						texturaBase     = new PIXI.BaseTexture.fromImage(selectedTileset);

						tileSetSprite.texture = new PIXI.Texture.fromImage("./images/tilesets/"+v.url+".png");

						recContenedor = new PIXI.Rectangle(v.xTile * pngSize, v.yTile * pngSize,32,32);
						console.log("Se selecciono el elemento en posicion: [" + tileX + " , " + tileY + "]");
						layerSeleccionado = v.capa;
						console.log(" [" + xB + " , " + yB + "] " + layerSeleccionado);

						spriteInfo       = new Array();

						spriteInfo[layerSeleccionado][xB][yB].textureURL = selectedTileset;
						spriteInfo[layerSeleccionado][xB][yB].x          = recContenedor.x / pngSize; //¿Magia?
						spriteInfo[layerSeleccionado][xB][yB].y          = recContenedor.y / pngSize;
						spriteInfo[layerSeleccionado][xB][yB].layer      = layerSeleccionado;

						//Actualizamos el Sprite con la textura
						//interact.target.texture = PIXI.Texture.fromImage(spriteInfo[xB][yB]);

						//interact.target.texture = new PIXI.Texture(texturaBase,recContenedor);

						spriteArray[layerSeleccionado][xB][yB].texture = new PIXI.Texture(texturaBase,recContenedor);

						console.log("Se aplico: " + JSON.stringify(spriteInfo[layerSeleccionado][xB][yB]));

						redraw();
					});*/
				}
			});
		});

		<?php
			/*
		 	echo '	createTileSet();';
		 	echo '	createMatrix('
					  .$_GET["mWidth"] . ' ,'
					  . $_GET["mHeight"] . ' ,'
					  . $_GET["numLayers"] . ');' ;*/
		?>
	</script>


</body>
</html>