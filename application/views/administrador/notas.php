<link rel="stylesheet" href="css/dataTables.bootstrap.css">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-book fa-fw"></i> Notas</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li  class="active"><span><i class="fa fa-pencil-square-o"></i> Notas</span></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a href="<?php echo site_url('administrador/panel')?>" class="btn btn-primary pull-right mitooltip" title="Nueva" data-placement="bottom"><i class="fa fa-book fa-fw"></i></a>
	</div>
</div><br>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<table class='table'>
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Fecha</th>
							<th>Tipo</th>
							<th>Autor</th>
							<th>Publicó</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($notas as $nota) { ?>
						<tr class="<?php if($nota->status == 1) echo "activado"; else echo "desactivado";?>" >
							<td><?php echo $nota->nombre; ?></td>
							<td><?php echo $nota->fecha; ?></td>
							<td><?php if($nota->tipo_nota == 1) echo "Común"; elseif($nota->tipo_nota == 2) echo "Columna"; elseif($nota->tipo_nota == 3) echo "Video"; else echo "Galería"; ?></td>
							<td><?php if($nota->autor == "")echo "Redacción"; else echo $nota->autor; ?></td>
							<td><?php echo $nota->publicador; ?></td>
							<td>
								<a href="<?php echo site_url('administrador/notas/editar/'.$nota->id.'')?>" class="btn btn-primary" title="Detalles"><i class="fa fa-pencil"></i></a>
								<a data-status="<?php echo $nota->status;?>" class="btn btn-primary <?php if($nota->status == 1) echo "borrar-nota"; else echo "activar-nota";?>" data-id="<?php echo $nota->id?>" data-nombre="<?php echo $nota->nombre;?>" title="<?php if($nota->status) echo 'Borrar'; else echo 'Activar'; ?>"><?php if($nota->status) echo "<i class='fa fa-times'></i> ";else echo "<i class='fa fa-check'></i>";?></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- MODAL BORRAR NOTA -->
<div class="modal fade" id="borrar-nota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-sm">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button id="close-borrar" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Borrar nota</h4>
      		</div>
      		<form action="<?php echo site_url('administrador/notas/change_status')?>" method="post">
	      		<div class="modal-body">
					<div>
					   <center>¿Realmente desea borrar la nota <strong><span id="nombre-nota-delete"></span></strong>?</center>
					   <input type="hidden" id="id_nota_delete" name="id_nota">
					   <input type="hidden" id="status_nota" name="status_nota">
					</div>
	      		</div>
	      		<div id="borrar-buttons" class="modal-footer">
	        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	        		<button type="submit" id="confirma-delete" class="btn btn-primary">Borrar <i class="fa fa-check-circle"></i></button>
	      		</div>
      		</form>
    	</div>
  	</div>
</div>


<!-- MODAL ACTIVAR NOTA -->
<div class="modal fade" id="activar-nota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-sm">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button id="close-borrar" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Activar nota</h4>
      		</div>
      		<form action="<?php echo site_url('administrador/notas/change_status')?>" method="post">
	      		<div class="modal-body">
					<div>
					   <center>¿Realmente desea activar la nota <strong><span id="nombre-nota-activar"></span></strong>?</center>
					   <input type="hidden" id="id_nota_activar" name="id_nota">
					   <input type="hidden" id="status_nota" name="status_nota">
					</div>
	      		</div>
	      		<div id="borrar-buttons" class="modal-footer">
	        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	        		<button type="submit" id="confirma-delete" class="btn btn-primary">Activar <i class="fa fa-check-circle"></i></button>
	      		</div>
      		</form>
    	</div>
  	</div>
</div>

<script src="js/dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
	$(function(){
		$('.table').dataTable();
		$('.mitooltip').tooltip();

		$('.borrar-nota').click(function(){

			var id = $(this).attr('data-id');
			var nombre = $(this).attr('data-nombre');
			var status = $(this).attr('data-status');

			$('#nombre-nota-delete').html(nombre);
			$('#id_nota_delete').val(id);
			$('#status_nota').val(status);

			$('#borrar-nota').modal({
				backdrop: 'static',
			  	keyboard: false,
			});
		});

		$('.activar-nota').click(function(){

			var id = $(this).attr('data-id');
			var nombre = $(this).attr('data-nombre');
			var status = $(this).attr('data-status');

			$('#nombre-nota-activar').html(nombre);
			$('#id_nota_activar').val(id);
			$('#status_nota').val(status);

			$('#activar-nota').modal({
				backdrop: 'static',
			  	keyboard: false,
			});
		});
	});
</script>