<style type="text/css">
	.modal-body .file-preview-frame,
	.modal-body .file-preview-frame > img{width: 150px !important;height: 150px !important;}
	.file-preview-frame{width: 98% !important;}
</style>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-book fa-fw"></i> Notas</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li  class="active"><span><i class="fa fa-pencil-square-o"></i> Nueva Nota</span></li>
		</ol>
	</div>
</div>
<div class="row">
	<form id="form-addNota" method="post">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

			<div id="alerta">
			</div>
			<div class="nombre-nota">
				<div class="form-group">
			    	<label for="nombre">Nombre</label>
			    	<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe el nombre de la nota">
		  		</div>	
			</div>

		  	<div class="columna-nota">
		  		<label for="columna">Nombre</label>
		  		<select class="form-control columna" name="columna" id="columna">
		  			<option value="">Selecciona una columna</option>
		  			<?php foreach($columnas as $columna) { ?>
		  			<option value="<?php echo $columna->id."-".$columna->nombre;?>"><?php echo $columna->nombre;?></option>
		  			<?php } ?>
		  		</select>
		  	</div><br>

			<textarea id="contenido" name="contenido"></textarea><br>
			<span id="contenido_textarea" class="error">Este campo es obligatorio</span>

			<div class="galerias-notas">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<a id="crear-galeria" class="btn btn-primary pull-right mitooltip" title="Nueva" data-placement="bottom" ><i class="fa fa-picture-o"></i></a>
					</div>
				</div>
				<label for="columna">Galería</label>
				<select  class="form-control" name="galerias_id" id="galerias_id">
					<option value="">Selecciona una galería</option>
					<?php foreach($galerias as $galeria){ ?>
					<option value="<?php echo $galeria->id ?>"><?php echo $galeria->nombre; ?></option>
					<?php } ?>
				</select>
			</div><br>

			<div class="imagen-nota">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group ">
					       <label>Imagen</label>
							<input type="file" class="file" name="imgNota" id="imagen">
					    </div>
					</div>
				</div>
			</div>

			<div class="form-group liga-nota">
			    <label for="">Frame</label>
			    <textarea class="form-control" id="url_video" name="url_video" placeholder="Introduce el frame del video"></textarea>
		  	</div>

		  	<input type="submit" class="btn btn-primary pull-right btn-nota" value="Crear nota">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<center>Autor</center>
					</h3>
				</div>
				<div class="panel-body">

					<div>
					  	<label>
					   		<input type="radio" name="autor" value="redaccion" checked>
					    	Redacción
					  	</label>
					</div>

					<h4 class="panel-title secciones secciones">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseAutorUno" aria-expanded="false" aria-controls="collapseOne">
							<i class="fa fa-chevron-right"></i></i> Editores
						</a>
					</h4>
					<?php if(count($editores) == 0){} else{?>
						<div id="collapseAutorUno" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?php foreach($editores as $editor) { $nombre = explode(" ", $editor->nombre); $apellido = explode(" ", $editor->apellidos)?>
								<label>
									<input type="radio" name="autor" value="user-<?php echo $editor->id?>">
									<?php echo $nombre[0]." ".$apellido[0]?>
								</label>
								<?php }?>
							</div>
						</div>
					<?php } ?>

					<h4 class="panel-title secciones secciones">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseAutorDos" aria-expanded="false" aria-controls="collapseOne">
							<i class="fa fa-chevron-right"></i></i> Reporteros
						</a>
					</h4>

					<?php if (count($reporteros) == 0){} else{?>
						<div id="collapseAutorDos" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?php foreach($reporteros as $reportero){ $apellido = explode(" ", $reportero->apellidos)?>
								<label>
									<input type="radio" name="autor" value="user-<?php echo $reportero->id?>">
									<?php echo $reportero->nombre." ".$apellido[0];?>
								</label>
								<?php }?>
							</div>
						</div>
					<?php }?>
				</div>

				<div class="panel-heading">
			    	<h3 class="panel-title">
			    		<center>Tipo de nota</center>
			    	</h3>
			  	</div>

			  	<div class="panel-body">
			  		<div>
					  	<label>
					   		<input type="radio" name="tipo_nota" value="1" checked />
					    	<i class="fa fa-book"></i> Común
					  	</label>
					</div>
		  			<div>
					  	<label>
					   		<input type="radio" name="tipo_nota" value="2" />
					    	<i class="fa fa-file-text-o"></i> Columna
					  	</label>
					</div>
					<div>
					  	<label>
					   		<input type="radio" name="tipo_nota" value="3" />
					    <i class="fa fa-film"></i> Video
					  	</label>
					</div>
					<div>
					  	<label>
					   		<input type="radio" name="tipo_nota" value="4" />
					    	<i class="fa fa-picture-o"></i> Galería
					  	</label>
					</div>
			  	</div>

			  	<div class="panel-heading opciones_secciones">
			    	<h3 class="panel-title">
			    		<center>Secciones</center>
			    	</h3>
			  	</div>
			  	<div class="opciones_secciones">
			  		<center><span id="secciones_check" class="error">Selecciona una opción</span></center>
			  	</div>
			  
			  	<div class="panel-body opciones_secciones">
	  				<div>
					  	<label>
					   		<input type="checkbox" name="secciones_id[]" value="1">
					    	Primera plana
					  	</label>
					</div>

			  		<h4 class="panel-title secciones secciones">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseUno" aria-expanded="false" aria-controls="collapseOne">
							<i class="fa fa-chevron-right"></i></i> Estado
						</a>
					</h4>

					<div id="collapseUno" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="20">
							    	Elecciones 2015
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="2">
							    	Gobierno
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="3">
							    	Seguridad
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="4">
							    	Educación
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="5">
							    	Salud
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="6">
							    	Economia
							  	</label>
							</div>
						</div>
					</div>

					<h4 class="panel-title secciones">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseDos" aria-expanded="false" aria-controls="collapseOne">
							<i class="fa fa-chevron-right"></i></i> Municipio
						</a>
					</h4>

					<div id="collapseDos" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="7">
							    	Colima
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="8">
							    	Manzanillo
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="9">
							    	Villa de Álvarez
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="10">
							    	Tecoman
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="11">
							    	Armeria
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="12">
							    	Zona norte
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id[]" value="13">
							    	Entidades
							  	</label>
							</div>
						</div>
					</div>

					<h4 class="panel-title secciones">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTres" aria-expanded="false" aria-controls="collapseOne">
							<i class="fa fa-chevron-right"></i></i> Sociedad
						</a>
					</h4>

					<div id="collapseTres" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id" value="14">
							    	Cultura
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id" value="15">
							    	Sociales
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id" value="16">
							    	Medio ambiente
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id" value="17">
							    	Urbes
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id" value="18">
							    	Migrantes
							  	</label>
							</div>
							<div>
							  	<label>
							   		<input type="checkbox" name="secciones_id" value="19">
							    	Agro
							  	</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!-- Modal nueva galeria-->
	<div class="modal fade bs-example-modal-lg" id="nueva-galeria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-lg">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button id="close-add" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title" id="myModalLabel">Nueva Galería</h4>
	      		</div>
	      		<form id="form-addgaleria">
		      		<div class="modal-body">
		      			<div id="alerta_galeria"></div>
		      			<label>Nombre:</label>
		      			<input type="text" name="nombre_galeria" id="nombre_galeria" class="form-control" placeholder="Escribe el nombre de la galería"/><br>
						
						<label for="autor">Autor:</label>
						<input type="text" name="autor_galeria" id="autor_galeria" class="form-control" placeholder="Esribe el nombre del autor"/><br>

		      			<label>Imagenes:</label>
		      			<input type="file" class="file" name="imgGaleria" id="imagen-galeria" multiple="true" data-show-upload="false" data-show-caption="true">
		      		</div>
		      		<div id="add-buttons" class="modal-footer">
		        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		        		<button type="submit" class="btn btn-primary">Guardar</button>
		      		</div>
	      		</form>
	    	</div>
	  	</div>
	</div>
</div>

<script type="text/javascript" src="js/fileinput.min.js"></script>
<script type="text/javascript" src="js/summernote.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script>

	var file = [];
	var files = [];
	var acceptedTypes = {'image/jpg':true, 'image/png': true, 'image/jpeg': true};
	var imagen;
	var galeria;
	var columna = true;
	var imagenesGaleria = [];

	$(function(){

		$('#contenido').summernote({
			height: 200,
			toolbar: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']],
			]
		});

		$('input').iCheck({
	    	checkboxClass: 'icheckbox_square-green',
	    	radioClass: 'iradio_square-green',
	    	increaseArea: '30%' // optional
	  	});

	  	$('input:radio').on('ifChecked', function(event){
		  	if($(this).val() == 2){
		  		$('.nombre-nota').hide();
		  		$('.columna-nota').fadeIn();
		  		$('.liga-nota').hide();
		  		$('.imagen-nota').hide();
		  		$('.galerias-notas').hide();
		  		$('.opciones_secciones').hide();
		  		columna = true;
		  	}else if($(this).val() == 3){
		  		$('.nombre-nota').fadeIn();
		  		$('.columna-nota').hide();
		  		$('.liga-nota').fadeIn();
		  		$('.imagen-nota').fadeIn();
		  		$('.galerias-notas').hide();
		  		$('.opciones_secciones').fadeIn();
		  		columna = false;
		  		return false;
		  	}else if($(this).val() == 4){
		  		$('.nombre-nota').fadeIn();
		  		$('.columna-nota').hide();
		  		$('.liga-nota').hide();
		  		$('.imagen-nota').hide();
		  		$('.galerias-notas').fadeIn();
		  		$('.opciones_secciones').fadeIn();
		  		columna = false;
	  			return false;
		  	}else if($(this).val() == 1){
		  		$('.nombre-nota').fadeIn();
		  		$('.columna-nota').hide();
		  		$('.liga-nota').hide();
		  		$('.imagen-nota').fadeIn();
		  		$('.galerias-notas').hide();
		  		$('.opciones_secciones').fadeIn();
		  		columna = false;
		  		return false;
		  	}
		});

        var nuevaNota = $('#form-addNota').validate({
        	errorElement: "span",
        	errroClass: "help-block",
        	rules: {
        		nombre:{required:true},
        		imgNota:{required:true},
        		columna:{required:true},
        		url_video:{required:true},
        		galerias_id:{required:true}
        	},
        	highlight: function(element, error) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			submitHandler: function() {

				var HTML = $('#contenido').code();

				if( HTML == "" || HTML == "<p><br></p>" ){
					$('#contenido_textarea').show();
					return false;
				}

				if(columna == false){
					var cheks = $('input[type="checkbox"]:checked').length - 1 ;

					if( cheks == 0){
						$("#secciones_check").show();
						return false;
					}
				}

				var formulario = $("#form-addNota").serialize();
				imagen = new FormData();
				$.each(file, function(key, value)
				{
					imagen.append(key, value);
				});

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('administrador/notas/crear'); ?>?"+ formulario,
					cache: false,
					processData: false,
					contentType: false,
					data: imagen,
					success: function(result){
						var datos = $.parseJSON(result);
						//limpiar campos de formulario
						$('#nombre').val('');
						$('#imagen').fileinput('reset');
						$('#contenido').code('');
						$('#columna').prop('selectedIndex',0);
						$('#url_video').val('');
						$('#galerias_id').prop('selectedIndex',0);
						
						if(datos.resp){
							$('#alerta').css("display", "block");
							$('#alerta').html('<div class="alert alert-success animated bounceIn" role="alert"><i class="fa fa-check"></i> '+datos.mensaje+'</div>');
							$('#alerta').fadeOut(4000);
							return false;
						}else{
							$('#alerta').html('<div class="alert alert-warning animated bounceIn" role="alert"><i class="fa fa-times">'+datos.mensaje+'</i></div>');
						}
					}
				});
			}
        });

		var galeriaNueva = $('#form-addgaleria').validate({
			errorElement: "span",
        	errroClass: "help-block",
        	rules: {
        		nombre_galeria:{required:true},
        		autor_galeria:{required:true},
        		imgGaleria:{required:true}
        	},
        	highlight: function(element, error) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			submitHandler: function() {

				var formulario = $("#form-addgaleria").serialize();
				var nombre_option = $("#nombre_galeria").val();
				
				galeria = new FormData();
				$.each(imagenesGaleria, function(key, value)
				{
					galeria.append(key, value);
				});

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('administrador/notas/galeria');?>?"+ formulario,
					cache: false,
					processData: false,
					contentType: false,
					data: galeria,
					success: function(result){
						var datos = $.parseJSON(result);
						if(datos.resp){
							$('#imagen-galeria').fileinput('reset');
							$('#nombre_galeria').val("");
							$('#autor_galeria').val("");
							$('#galerias_id').append('<option value='+datos.data_option_id+'>'+nombre_option+'</option>');
							$('#alerta_galeria').html('<div class="alert alert-success animated bounceIn" role="alert"><i class="fa fa-check"></i> '+datos.mensaje+'</div>');
						}else{
							$('#alerta_galeria').html('<div class="alert alert-danger animated bounceIn" role="alert"><i class="fa fa-times"></i><p>Ha ocurrido un error</p></div>');
						}
					}
				});
			}
		});

		$('.mitooltip').tooltip();

		$('#crear-galeria').click(function(){
			$('#nueva-galeria').modal({
				backdrop: 'static',
			  	keyboard: false,
			});
		});
	});

	//FUNCIÓN PARA DARLE ESTILO AL INPUT
	$('#imagen').fileinput({
		'showUpload':false,
		'showRemove':false,
		'showPreview':true,
		'mainClass':"",
		'browseLabel':"Seleccionar imagen"
	});

	$('#imagen-galeria').fileinput({
		'showUpload':false,
		'showRemove':false,
		'showPreview':true,
		'mainClass':"",
		'browseLabel':"Seleccionar imagenes"
	});

	$(document).on('change','#imagen',function(e){
		file = e.target.files;
	});

	$(document).on('change','#imagen-galeria', function(e){
		imagenesGaleria = e.target.files;
	});
</script>
