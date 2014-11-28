<!-- Barra de navegación -->
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container-fluid">
	    <!-- Marca y toggle para móviles -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <img class="img-responsive img-rounded" src="images/mogle_logo.png" alt="Auxus logo" width="200"/>
	    </div>

	    <!-- Contenido del toggle -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li <?php if($menu_seleccionado == 0) echo "class='active'";?>><a href="index.php">Inicio</a></li>
			  <li <?php if($menu_seleccionado == 1) echo "class='active'";?>><a href="proyectos.php">Proyectos</a></li>
	        <li <?php if($menu_seleccionado == 2) echo "class='active'";?>><a href="acerca.php">Acerca de</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li> <!-- !¿Login?-->
		        	<?php
		        		if(!isset($_SESSION['cargo']) && !isset($_SESSION['area']))
		        			echo "<a href='#loginModal' data-toggle='modal' style='color:white;' role='button'>Login</a>";
		        		else
		        			echo '<button type="button" class="btn btn-default" onclick="cerrar_sesion()"><span class="glyphicon glyphicon-log-out"> Cerrar sesión</span></button>';
		        	?>
			  </li>
			  <li>
	        		<?php
	        			if(!isset($_SESSION['tipo_persona']))
	        				echo "<a href='#registroModal' data-toggle='modal' style='color:white;' role='button'>Registro</a>";
	        		?>
	        	</li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
</nav>

<script>
	function cerrar_sesion() {
		window.location.href = 'drivers/php/cerrar_sesion.php';
	}
</script>

<?php
	include("vistas/registro.html");
	include("vistas/login.html");
?>