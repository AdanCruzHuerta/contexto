<link rel="stylesheet" href="css/dataTables.bootstrap.css">
<script src="js/dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
		
		$(document).ready(function(){
			
			$('#allusuario').dataTable({});

			$('#click-status').click(function(){
				var id =  $('#valor-usuario').val();
				var status = $('#valor-status').val();
				var formulario = $('#form-eliminausuario').serialize();

				$.ajax({
					type: "POST",
					url:"<?php echo site_url('usuario/cambiastatus'); ?>",
					data:formulario,
					success: function(res){
							if(res.resp){
								location.reload();
								return false;
							}
						}
					})	
				});	

				$('.mitooltip').tooltip();
		});
		

		function editar(id)
		{
    		var valor = id;
    			$.ajax({
				type: "POST",
				url:"<?php echo site_url('usuario/obtienenombre'); ?>",
				data:{valor:valor},
				success: function(msg){
					var datos = jQuery.parseJSON(msg);
					$('.nombre-usuario').html(datos.nombre+" "+datos.apellidos);
					$('#valor-usuario').val(datos.id);
					$('#valor-status').val(datos.status);
				}
			});
		}
		
		function editardatos(id) {

			var id = id;
			$('#usuario').val(id);
			document.llamaeditar.submit()
    			
		}

</script>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-users fa-fw"></i> Usuarios</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li  class="active"><span><i class="fa fa-users fa-fw"></i> Usuarios</span></li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a href="<?php echo site_url('administrador/usuarios/crear')?>" class="btn btn-primary pull-right mitooltip" title="Nuevo" data-placement="bottom"><i class="fa fa-user"></i></a>
	</div>
</div><br>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table" id="allusuario">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Email</th>
							<th>Tipo de usuario</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($personas as $per) { ?>
							<?php if ($per->status == 1): ?>
								<tr style="background-color:#DFF0D8;">
							<?php else: ?>
								<tr style="background-color:#F2DEDE;">
							<?php endif ;?>
							<td><?php echo $per->nombre.' '.$per->apellidos;?></td>
							<td><?php echo $per->email;?></td>
							<td><?php echo $per->rol;?></td>
							<td align="center">
								<button onClick="editardatos(this.id)" id="<?php echo $per->id; ?>" type="submit" class="btn btn-primary  fa fa-pencil"></button>
								<?php if($per->status == 1): ?>
									<button onClick="editar(this.id)" type="submit" class="btn btn-primary  fa fa-times" data-toggle="modal" data-target="#modal-borrar-usuario" id="<?php echo $per->id; ?>"></button>
								<?php else: ?>
									<button onClick="editar(this.id)" type="submit" class="btn btn-primary  fa fa-check" data-toggle="modal" data-target="#modal-borrar-usuario" id="<?php echo $per->id; ?>"></button>
								<?php endif; ?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
	</div>	
</div>
</div>
	
	<div class="modal fade" id="modal-borrar-usuario">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
						<span class="sr-only">Cerrar</span></button>
						<h4 class="modal-tittle">Suspender Usuario</h4>
				</div>
				<form id="form-eliminausuario" action="" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<center id="mensaje-modal">Realmente desea cambiar el estado a: <span class="nombre-usuario"></span>?</center>
								<input id="valor-usuario" type="hidden" name="id"/>
								<input id="valor-status" type="hidden" name="status"/>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button id="click-status" type="submit" class="btn btn-primary">Borrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>


<div class="hidden-xs hidden-sm hidden-md hidden-lg">
	<form name="llamaeditar" action="<?php echo site_url('usuario/alteruser') ?>" method="post">
		<input type="hidden" name="usuario" id="usuario">
		<input type="submit" id="eveditar">
	</form>
</div>

