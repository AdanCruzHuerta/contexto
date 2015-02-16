<link rel="stylesheet" href="css/fileinput.min.css">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-users fa-fw"></i> Usuarios</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li  class="active"><span><i class="fa fa-users fa-fw"></i> Perfil de Usuario</span></li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		
		<button onclick="editar()" type="submit" class="btn btn-primary pull-right fa fa-pencil" style="margin-bottom:10px;"></button>

	</div>
</div>

<div class="well">
	<legend>Perfil de Usuario</legend>

<div class="row">

		<!-- BARRA LATERAL PARA QUE SELECCIONE EL TIPO DE USUARIO -->
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<div class="panel panel-default">

			<div class="panel-heading">
		    	<h3 class="panel-title">
		    		<center>Foto de Usuario</center>
		    	</h3>
		  	</div>

		  	<div class="panel-body">

		  		<img src="<?php echo $administrador->foto_usuario; ?>" style="width:100%; height:150px;">
		  	
		  	</div>	  
		</div>
		
	</div>


	<!-- FORMULARIO -->
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<div id="alerta"></div>
		<form id="form-addusuario">
		<div class="form-group col-xs-12 col-sm-12 col-md-9 col-lg-6" >
		    <label for="nombre">Nombre</label>
		    <input disabled name="nombre" type="text" class="form-control" id="nombre" placeholder="Introduce el nombre" value="<?php echo $administrador->nombre; ?>">
	  	</div>
		<div class="form-group col-xs-12 col-sm-12 col-md-9 col-lg-6">
		    <label for="apellidos">Apellidos</label>
		    <input disabled name="apellidos" type="text" class="form-control" id="apellidos" placeholder="Introduce los apellidos" value="<?php echo $administrador->apellidos; ?>">
	  	</div>
	  	<div class="form-group col-xs-12 col-sm-12 col-md-9 col-lg-6">
		    <label for="tel">Teléfono</label>
		    <input disabled name="tel" type="text" class="form-control" id="tel" placeholder="Introduce el teléfono" value="<?php echo $administrador->telefono;?>">
	  	</div>
	  	<div class="form-group col-xs-12 col-sm-12 col-md-9 col-lg-6">
		    <label for="email">Email</label>
		    <input disabled name="email" type="email" class="form-control" id="email" placeholder="Introduce el email" value="<?php echo $administrador->email; ?>">
	  	</div>
	  	<input type="hidden" name="id" id="rol" value="<?php echo $administrador->id; ?>" >
	  	<input id="boton" disabled type="submit" class="btn btn-primary pull-right btn-nota" value="Guardar Cambios">
		</form>
	</div>
</div>
</div>
<script type="text/javascript" src="js/fileinput.min.js"></script>
<script type="text/javascript" src="js/summernote.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>

<script>

		function editar()
		{
    		$("input").removeAttr( "disabled" );
		}
	
	// FUNCION PARA VALIDAR LOS FORMULARIOS Y ENVIARLOS 
			
			var visita = $('#form-addusuario').validate({
			errorElement: "span",
			errorClass:"help-block",
			rules:{
				nombre:{required:true},
				apellidos:{required:true},
				tel:{required:true,minlength:7,digits:true},
				email:{required:true,email:true},
				
			},
			messages: {
			},
			highlight: function(element, error){
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element){
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			submitHandler: function(){
				var formulario = $('#form-addusuario').serialize();
				$.ajax({
					type: "POST",
					url:"<?php echo site_url('usuario/cambiaperfil'); ?>",
					data:formulario,
					success: function(result){
						var datos = jQuery.parseJSON(result);
						if (datos.resp){
							$('#alerta').html('<div class="alert alert-success animated bounceIn" role="alert">'+datos.mensaje+'</div>');
							$('#form-addusuario')[0].reset();
								location.reload();
								return false;
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
		
</script>
