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
	      <img class="img-responsive img-rounded" src="../images/mogle_logo.png" alt="Auxus logo" width="200"/>
	    </div>

	    <!-- Contenido del toggle -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li <?php if($menu_seleccionado == 0) echo "class='active'";?>><a href="home_admin.php">Jefes</a></li>
	        <li <?php if($menu_seleccionado == 1) echo "class='active'";?>><a href="developers.php">Developers</a></li>
	        <li <?php if($menu_seleccionado == 2) echo "class='active'";?>><a href="proyectos.php">Proyectos</a></li>
			  <li <?php if($menu_seleccionado == 3) echo "class='active'";?>><a href="mapas.php">Mapas</a></li>
			  <li <?php if($menu_seleccionado == 4) echo "class='active'";?>><a href="#">Pendiente</a></li>
	        <li <?php if($menu_seleccionado == 5) echo "class='active'";?>><a href="#">Pendiente2</a></li>
	        <li <?php if($menu_seleccionado == 6) echo "class='active'";?>><a href="#">Pendiente3</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li style="padding: 10px;"><button type="button" class="btn btn-default" onclick="cerrar_sesion()"><span class="glyphicon glyphicon-log-out"> Cerrar sesión</span></button></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
</nav>

<script>
	function cerrar_sesion() {
		window.location.href = '../drivers/php/cerrar_sesion.php';
	}
</script>