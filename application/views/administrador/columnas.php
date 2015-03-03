<link rel="stylesheet" href="css/dataTables.bootstrap.css">
<style type="text/css">
.file-preview-frame{width: 100% !important;margin: 0 auto !important;}
td a{margin-left: 5px !important;}
</style>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-file-text-o"></i> Columnas</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li  class="active"><span><i class="fa fa-file-text-o"></i> Columnas</span></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a class="btn btn-primary pull-right mitooltip" title="Nueva" data-placement="bottom" data-toggle="modal" data-target="#nueva-columna"><i class="fa fa-file-text-o"></i></a>
	</div>
</div><br>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<table class='table table-hover'>
					<thead>
						<tr>
							<th><center>Nombre</center></th>
							<th><center>Fecha creación</center></th>
							<th><center>Opciones</center></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($columnas as $columna) { ?>
						<tr>
							<td><center><?php echo $columna->nombre?></center></td>
							<td><center><?php echo $columna->fecha?></center></td>
							<td><center>
								<a href="javascript:;" data-id="<?php echo $columna->id?>" data-nombre="<?php echo $columna->nombre?>" data-imagen="<?php echo $columna->imagen_columna?>" title="Editar" class="btn btn-primary editar-columna"><i class="fa fa-pencil"></i></a>
								<a href="javascript:;" class="btn btn-primary" data-id="<?php echo $columna->id?>" data-nombre="<?php echo $columna->nombre?>" title="Borrar"><i class="fa fa-times"></i></a>
							</center></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal nueva columna-->
<div class="modal fade" id="nueva-columna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Nueva Columna</h4>
      		</div>
      		<form id="form-addcolumna">
	      		<div class="modal-body">
	      			<div id="alerta"></div>
						<div class="form-group" >
						    <label for="nombre">Nombre</label>
						    <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre de columna">
					  	</div>
					  	<div class="form-group" >
						    <label for="imagen">Imagen</label>
							<center><input type="file" class="file" name="imgColumna" id="imagen"></center>
						</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	        		<button type="submit" class="btn btn-primary">Guardar</button>
	      		</div>
      		</form>
    	</div>
  	</div>
</div>

<!-- Modal editar columna-->
<div class="modal fade" id="editar-columna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Editar Columna</h4>
      		</div>
      		<form id="form-editar-columna">
	      		<div class="modal-body">
	      			<div id="alerta-editar"></div>
						<div class="form-group">
						    <label for="nombre">Nombre</label>
						    <input type="text" class="form-control" name="nombre" id="editar-nombre" placeholder="Nombre de columna">
						    <input type="hidden" name="id" id="editar-id">
						    <input type="hidden" name="imagen" id="ruta-imagen">
					  	</div>
					  	<div class="form-group" >
						    <label for="imagen">Imagen</label>
							<center><input type="file" class="file" name="imgColumna" id="editar-imagen"></center>
						</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	        		<button type="submit" class="btn btn-primary">Guardar</button>
	      		</div>
      		</form>
    	</div>
  	</div>
</div>

<!-- Modal borrar columna-->
<div class="modal fade" id="borrar-columna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Borrar Columna</h4>
      		</div>
      		<form id="">
	      		<div class="modal-body">
	      			<div id="alerta"></div>
					<div class="form-group" >
					    <label for="nombre">Nombre</label>
					    <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre de columna">
				  	</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	        		<button type="submit" class="btn btn-primary">Guardar</button>
	      		</div>
      		</form>
    	</div>
  	</div>
</div>

<script type="text/javascript" src="js/fileinput.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script src="js/dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<script>
	var file = [];
	var file_edita = [];
	var imagen;

	$(function(){
		$('.table').dataTable();
		$('.mitooltip').tooltip();

		$('.editar-columna').click(function(){
			var id = $(this).attr('data-id');
			var nombre = $(this).attr('data-nombre');
			var imagen = $(this).attr('data-imagen');


			$('#editar-nombre').val(nombre);
			$('#editar-id').val(id);
			$('#ruta-imagen').val(imagen);

			$("#editar-columna").find("#update_imagen_columna").attr('src',imagen);

			$('#editar-columna').modal({
				backdrop: 'static',
			  	keyboard: false,
			});
		});

		var nuevaColumna = $('#form-addcolumna').validate({
	    	errorElement: "span",
	    	errroClass: "help-block",
	    	rules: {
	    		nombre:{required:true},
	    		imgColumna:{required:true}
	    	},
	    	highlight: function(element, error) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			submitHandler: function() {

				var formulario = $("#form-addcolumna").serialize();
				
				imagen = new FormData();
				$.each(file, function(key, value)
				{
					imagen.append(key, value);
				});

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('administrador/columnas/guardar');?>?"+ formulario,
					cache: false,
					processData: false,
					contentType: false,
					data: imagen,
					success: function(result){
						var datos = $.parseJSON(result);
										
						if(datos.resp){
							$('#alerta').html('<div class="alert alert-success animated bounceIn" role="alert"><i class="fa fa-check"></i> '+datos.mensaje+'</div>');
							$('#form-addcolumna')[0].reset();
							// hago la consulta de todas las columnas
							$.ajax({
								type: "POST",
								url: "<?php echo site_url('administrador/columnas')?>",
								cache: false,
								processData: false,
								contentType: false,
								success: function(result){
									var datos2 = $.parseJSON(result);
									$('.table').DataTable().clear().draw();
									for(var i = 0; i< datos2.length; i++){
										$('.table').DataTable().row.add([
											'<center>'+datos2[i]["nombre"]+'</center>',
											'<center>'+datos2[i]["fecha"]+'</center>',
											'<center><a href="javascript:;" data-id="'+datos2[i]["id"]+'" title="Editar" class="btn btn-primary" data-toggle="modal" data-target="#editar-columna"><i class="fa fa-pencil"></i></a><a href="javascript:;" data-id="'+datos2[i]["id"]+'" title="Borrar" class="btn btn-primary" data-toggle="modal" data-target="#borrar-columna"><i class="fa fa-times"></i></a></center>'
										]).draw();
									}
								}
							});
						}else{
							$('#alerta').html('<div class="alert alert-warning animated bounceIn" role="alert"><i class="fa fa-times">'+datos.mensaje+'</i></div>');
						}
					}
				});
			}
	 	});

		var actualizaColumna = $('#form-editar-columna').validate({
			errorElement: "span",
	    	errroClass: "help-block",
	    	rules: {
	    		nombre:{required:true}

	    	},
	    	highlight: function(element, error) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			submitHandler: function() {

				var formulario = $("#form-editar-columna").serialize();
				
				imagen = new FormData();
				
				$.each(file_edita, function(key, value)
				{
					imagen.append(key, value);
				});
				
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('administrador/columnas/actualizar');?>?"+formulario,
					cache: false,
					processData: false,
					contentType: false,
					data: imagen,
					success: function(result){
						var datos = $.parseJSON(result);
						if(datos.resp){

							$('#editar-nombre').val('');
							$('#editar-id').val('');
							$('#editar-imagen').fileinput('reset');

							$('#alerta-editar').html('<div class="alert alert-success animated bounceIn" role="alert"><i class="fa fa-check"></i>'+datos.mensaje+'</i></div>');

							$('.table').DataTable().clear().draw();
							for(var i=0; i<datos.columnas.length;i++){
								$('.table').DataTable().row.add([
									'<center>'+datos.columnas[i]["nombre"]+'</center>',
									'<center>'+datos.columnas[i]["fecha"]+'</center>',
									'<center><a href="javascript:;" data-id="'+datos.columnas[i]["id"]+'" title="Editar" class="btn btn-primary" data-toggle="modal" data-target="#editar-columna"><i class="fa fa-pencil"></i></a><a href="javascript:;" data-id="'+datos.columnas[i]["id"]+'" title="Borrar" class="btn btn-primary" data-toggle="modal" data-target="#borrar-columna"><i class="fa fa-times"></i></a></center>'
								]).draw();
							}


						}else{
							$('#alerta-editar').html('<div class="alert alert-warning animated bounceIn" role="alert"><i class="fa fa-times">'+datos.mensaje+'</i></div>');
						}
					}
				});
			}
		});


	});

	$('#imagen').fileinput({
		'showUpload':false,
		'showRemove':false,
		'showPreview':true,
		'mainClass':"",
		'browseLabel':"Seleccionar imagen"
	});

	$('#editar-imagen').fileinput({
		'showUpload':false,
		'showRemove':false,
		'showPreview':true,
		'mainClass':"",
		initialPreview: [
	        "<img id='update_imagen_columna' src='' class='file-preview-image'>",
	    ],
		'browseLabel':"Seleccionar imagen"
	});

	$(document).on('change','#imagen',function(e){
		file = e.target.files;
	});

	$(document).on('change','#editar-imagen',function(e){
		file_edita = e.target.files;
	});
</script>