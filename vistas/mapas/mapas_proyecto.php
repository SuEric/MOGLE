<?
	for ($i=0; $i < count($arreglo); $i++) {
?>
<!-- Modal de Registro -->
<div class="modal fade" id="mapasModal<?=$arreglo[$i]['idProyecto']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Mapas</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Ancho</th>
										<th>Alto</th>
										<th>Capa</th>
										<th></th>
									</tr>
								</thead>
								<tbody id="tbody<?=$arreglo[$i]['idProyecto']?>">
								</tbody>
							</table>
						</div><!-- Fin Tabla -->
					</div>
				</div>
			</div>
		</div><!-- Fin modal-content -->
	</div><!-- Fin modal-dialog -->
</div><!-- Fin modal -->
<?
}
?>

<script>

	function abrirMapa(id) {
		$.ajax({
		 	type:"POST",
		 	data:"idMapa="+id,
		 	dataType:"json",
		 	url:"drivers/php/mapas_mapa.php",
		 	async: true,
			success: function(datos) {
				$.each(datos,function(i,v) {
					console.log("idMapa: " + v.idMapa);
					console.log("Nombre: " + v.nombre);
					console.log("Descripcion: " + v.descripcion);
					console.log("AnchoM: " + v.anchoM);
					console.log("AltoM: " + v.altoM);
					window.location.href = 'herramienta.php?idMapa='+v.idMapa+'&mHeight='+v.altoM+'&mWidth='+v.anchoM+'&numLayers='+v.capas;
				});
			}
		});
	}

</script>