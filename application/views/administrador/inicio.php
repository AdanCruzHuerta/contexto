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

			<div class="form-group">
			    <label for="nombre">Nombre</label>
			    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce el nombre de la nota">
		  	</div>

			<textarea id="contenido" name="contenido"></textarea>
			<span id="contenido_textarea" class="error">Este campo es obligatorio</span>

			<div class="form-group liga-nota">
			    <label for="">Url</label>
			    <input type="text" class="form-control" id="url_video" name="url_video" placeholder="Introduce la url del video">
		  	</div>

			<div class="imagen-nota">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group ">
					        <ol class="breadcrumb breadcrumb-arrow">
								<li class="active"><span><i class="fa fa-picture-o"></i> Seleccionar Imagen</span></li>
							</ol>
							<input type="file" class="file" name="imgNota" id="imagen">
					    </div>
					</div>
				</div>
			</div>

			<div class="galeria-nota">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group ">
							<ol class="breadcrumb breadcrumb-arrow">
								<li class="active"><span><i class="fa fa-picture-o"></i> Seleccionar Imagenes</span></li>
							</ol>
							<input type="file" class="file" name="galeria" id="galeria">
					    </div>
					</div>
				</div>
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
								<?php foreach($editores as $editor) { $apellido = explode(" ", $editor->apellidos)?>
								<label>
									<input type="radio" name="autor" value="user-<?php echo $editor->id?>">
									<?php echo $editor->nombre." ".$apellido[0]?>
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

			  	<div class="panel-heading">
			    	<h3 class="panel-title">
			    		<center>Secciones</center>
			    	</h3>
			  	</div>

			  	<center><span id="secciones_check" class="error">Selecciona una opción</span></center>
			  	<div class="panel-body">
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
</div>

<script type="text/javascript" src="js/fileinput.min.js"></script>
<script type="text/javascript" src="js/summernote.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script>

	var file = [];
	var acceptedTypes = {
			'image/jpg':true,
			'image/png': true,
			'image/jpeg': true
	};
	var imagen;

	$(function(){

		$('textarea').summernote({
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
		  		$('.liga-nota').hide();
		  		$('.galeria-nota').hide();
		  		$('.imagen-nota').hide();
		  	}else if($(this).val() == 3){
		  		$('.liga-nota').fadeIn();
		  		$('.galeria-nota').hide();
		  		$('.imagen-nota').hide();
		  		return false;
		  	}else if($(this).val() == 4){
	  			$('.galeria-nota').fadeIn();
		  		$('.liga-nota').hide();
		  		$('.imagen-nota').hide();
	  			return false;
		  	}else{
		  		$('.liga-nota').hide();
		  		$('.galeria-nota').hide();
		  		$('.imagen-nota').fadeIn();
		  		return false;
		  	}
		});

        var nuevaNota = $('#form-addNota').validate({
        	errorElement: "span",
        	errroClass: "help-block",
        	rules: {
        		nombre:{required:true},
        		imgNota:{required:true},
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

				var cheks = $('input[type="checkbox"]:checked').length - 1 ;

				if( cheks == 0){
					$("#secciones_check").show();
					return false;
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
						
						if(datos.resp){
							$('#alerta').html('<div class="alert alert-success animated bounceIn" role="alert"><i class="fa fa-check"></i> '+datos.mensaje+'</div>');
						}else{
							$('#alerta').html('<div class="alert alert-warning animated bounceIn" role="alert"><i class="fa fa-times">'+datos.mensaje+'</i></div>');
						}
					}
				});
			}
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

	$(document).on('change','#imagen',function(e){
		file = e.target.files;
	});

</script>
