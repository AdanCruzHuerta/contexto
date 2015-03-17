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
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- <script type="text/javascript" src="js/fileinput.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script> -->
<script src="js/dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
	$(function(){
		$('.table').dataTable();
		$('.mitooltip').tooltip();
	});
</script>