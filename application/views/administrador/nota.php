<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2><i class="fa fa-book fa-fw"></i> Notas</h2>
		<ol class="breadcrumb breadcrumb-arrow">
			<li><span><i class="fa fa-pencil-square-o"></i><a href="<?php echo site_url('administrador/notas')?>"> Notas</a></span></li>
			<li class="active"><span>Detalle de nota</span></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					<div id="alerta"></div>
					<form id="form-editarNota">
						<div class="form-group col-xs-12 col-sm-12 col-md-10 col-lg-8" >
						    <label for="nombre">Nombre de nota</label>
						    <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $nota->nombre;?>">
					  	</div>
					  	<div class="form-group col-xs-12 col-sm-12 col-md-10 col-lg-4" >
						    <label for="fecha">Fecha de publicación</label>
						    <input name="fecha" type="text" class="form-control" id="fecha" value="<?php echo $nota->fecha;?>">
					  	</div>
					  	<div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-6">
					  		<label for="">Autor</label>
					  		<input name="nombre" type="text" class="form-control" id="autor" value="">
					  	</div>
					  	<div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-6">
					  		<label for="">Publicó</label>
					  		<input name="publico" type="text" class="form-control" id="publico" value="">
					  	</div>
					  	<div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-6">
					  		<label for="">Estatus</label>
					  		<input name="nombre" type="text" class="form-control" id="autor" value="">
					  	</div>
					  	<div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-6">
					  		<label for="">Categoría</label>
					  		<input name="nombre" type="text" class="form-control" id="autor" value="">
					  	</div>
					</form>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<img src="<?php echo $nota->imagen_nota;?>" width="105%" height="100%">
				</div>
			</div>
		</div>
	</div>
</div>