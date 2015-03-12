<link rel="stylesheet" href="css/dataTables.bootstrap.css">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-file-text-o"></i> Columnas</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li><i class="fa fa-file-text-o"></i><a href="<?php echo site_url('administrador/columnas')?>"> Columnas</a></li>
			<li class="active"><span>Editar</span></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div id="alerta"></div>
				<form id="form-addcolumna">
					<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" >
					    <label for="nombre">Nombre</label>
					    <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $columna->nombre?>" placeholder="Nombre de columna">
				  	</div>
				  	<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" >
					    <label for="imagen">Imagen</label>
						<input type="file" class="file" name="imgColumna" id="imagen">
					</div>
					<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-right" >
						<input type="submit" class="btn btn-primary btn-block pull-right btn-nota" value="Crear columna">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/fileinput.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script type="text/javascript">
	//FUNCIÓN PARA DARLE ESTILO AL INPUT 
	$('#imagen').fileinput({
		'showUpload':false,
		'showRemove':false,
		'showPreview':true,
		'mainClass':"",
		initialPreview: [
	        "<img src='<?php echo $columna->imagen_columna; ?>' class='file-preview-image' alt='Actual' title='Actual'>",
	    ],
		'browseLabel':"Seleccionar archivo"
	});
</script>