<link rel="stylesheet" href="css/fileinput.min.css">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-users fa-fw"></i> Usuarios</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li  class="active"><span><i class="fa fa-users fa-fw"></i> <a href="<?php echo site_url('usuario'); ?>">Usuarios</a> / Registrar Usuario</span></li>
		</ol>
	</div>
</div>

<div class="well">
	<legend>Registrar nuevo Usuario</legend>

<div class="row">
	<!-- FORMULARIO -->
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<div id="alerta"></div>
		<form id="form-addusuario">
		<div class="form-group col-xs-12 col-sm-12 col-md-9 col-lg-6" >
		    <label for="nombre">Nombre</label>
		    <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Introduce el nombre">
	  	</div>
		<div class="form-group col-xs-12 col-sm-12 col-md-9 col-lg-6">
		    <label for="apellidos">Apellidos</label>
		    <input name="apellidos" type="text" class="form-control" id="apellidos" placeholder="Introduce los apellidos">
	  	</div>
	  	<div class="form-group col-xs-12 col-sm-12 col-md-9 col-lg-6">
		    <label for="tel">Teléfono</label>
		    <input name="tel" type="text" class="form-control" id="tel" placeholder="Introduce el teléfono">
	  	</div>
	  	<div class="form-group col-xs-12 col-sm-12 col-md-9 col-lg-6">
		    <label for="email">Email</label>
		    <input name="email" type="email" class="form-control" id="email" placeholder="Introduce el email">
	  	</div>
	  	<div class="form-group col-xs-12 col-sm-12 col-md-9 col-lg-12">
				<label for="imagen"><spam class="glyphicon glyphicon-asterisk requerido"></spam>Seleccionar Archivo:</label>
				<input type="file" class="file" name="userfile" id="imagen">
	  	</div>
	</div>

	<!-- BARRA LATERAL PARA QUE SELECCIONE EL TIPO DE USUARIO -->
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<div class="panel panel-default">

			<div class="panel-heading">
		    	<h3 class="panel-title">
		    		<center>Tipo de Usuario</center>
		    	</h3>
		  	</div>

		  	<div class="panel-body">
	  			<div>
				  	<label>
				   		<input type="radio" name="rol" value="2" checked/>
				    	Editor
				  	</label>
				</div>
				<div>
				  	<label>
				   		<input type="radio" name="rol" value="3" />
				    	Reportero
				  	</label>
				</div>
		  	</div>	  
		</div>
		<input type="hidden" name="rol2" id="rol" value="2" >
		<input type="submit" class="btn btn-primary pull-right btn-nota" value="Guardar Usuario">
		</form>
	</div>
</div>
</div>
<script type="text/javascript" src="js/fileinput.min.js"></script>
<script type="text/javascript" src="js/summernote.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>

<script>
	
	var file = [];
	var acceptedTypes = {
			'image/png': true,
			'image/jpeg': true
	};

	//OBTENER EL VALOR DE UN  RADIO 
	$('input:radio').on('ifChecked', function(event){
		  	var hola = $(this).val();
		  	$("#rol").val(hola);
		});

	//FUNCIÓN PARA DARLE ESTILO AL INPUT 
	$('#imagen').fileinput({
		'showUpload':false,
		'showRemove':false,
		'showPreview':true,
		'mainClass':"",
		'browseLabel':"Seleccionar archivo"
	});

	//FUNCION PARA DARLE ESTILO AL TEXTAREA
	$('#summernote').summernote({
		height: 300
	});

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
	});
	// FUNCION PARA VALIDAR LOS FORMULARIOS Y ENVIARLOS 
			
			var visita = $('#form-addusuario').validate({
			errorElement: "span",
			errorClass:"help-block",
			rules:{
				nombre:{required:true},
				apellidos:{required:true},
				tel:{required:true,minlength:7,digits:true},
				email:{required:true,email:true},
				rol2:{required:true},

			
			},
			messages: {
				userfile:{required:' '},
			},
			highlight: function(element, error){
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element){
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			submitHandler: function(){
				var formulario = $('#form-addusuario').serialize();
				var imagen = new FormData();
				$.each(file, function(key, value){
					imagen.append(key, value);
				});
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('administrador/notas/crear');?>?"+formulario,
					cache: false,
					processData: false,
					contentType: false,
					data: imagen,
					success: function(result){
						var datos = jQuery.parseJSON(result);
						if (datos.resp){
							$('#alerta').html('<div class="alert alert-success animated bounceIn" role="alert">'+datos.mensaje+'</div>');
							$('#form-addusuario')[0].reset();
						}else{
							$('#alerta').html('<div class="alert alert-warning animated bounceIn" role="alert"></div>');
						}
						setTimeout(function(){
							$('.alert').removeClass('bounceIn').addClass('bounceOut').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(e){
								$('#alerta').html('');
							});
						},3000);
					}
				});
			}
		});
		
		$(document).on('change','#imagen',function(e){
			if(acceptedTypes[e.target.files[0].type] === true){
				file = e.target.files;
				var reader  = new FileReader();
				if (file) {
					reader.readAsDataURL(file[0]);
				} 
			}
		});
	
</script>
