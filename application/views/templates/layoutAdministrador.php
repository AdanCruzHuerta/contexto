<!DOCTYPE html>
<html lang="es">
	<head>
		<base href="<?php echo base_url(); ?>">
		<title>Contexto Colima</title>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
   		<meta name="description" content="Pagina de administrador de Contexto Colima">
    	<meta name="author" content="SharkSoft - Contexto Colima">
		<link rel="icon" href="media/img/favicon/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/summernote.css">
		<link rel="stylesheet" type="text/css" href="css/green.css">
		<link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/admin.css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/icheck.js"></script>
		<script type="text/javascript" src="js/admin.js"></script>
	</head>
	<body> 
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="<?php echo site_url("administrador/panel");?>">Contexto Colima</a>
	            </div>
	            <ul class="nav navbar-top-links navbar-right">
	                <li class="dropdown">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
	                    </a>
	                    <ul class="dropdown-menu dropdown-messages">
	                        <li>
	                            <a href="#">
	                                <div class="text-nav">
	                                    <strong>John Smith</strong>
	                                    <span class="pull-right text-muted">
	                                        <em>Yesterday</em>
	                                    </span>
	                                </div>
	                                <div class="text-nav">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
	                            </a>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <a href="#">
	                                <div class="text-nav">
	                                    <strong>John Smith</strong>
	                                    <span class="pull-right text-muted">
	                                        <em>Yesterday</em>
	                                    </span>
	                                </div>
	                                <div class="text-nav">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
	                            </a>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <a href="#">
	                                <div class="text-nav">
	                                    <strong>John Smith</strong>
	                                    <span class="pull-right text-muted">
	                                        <em>Yesterday</em>
	                                    </span>
	                                </div>
	                                <div class="text-nav">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
	                            </a>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <a class="text-center" href="#">
	                                <strong class="text-nav">Read All Messages</strong>
	                                <i class="fa fa-angle-right"></i>
	                            </a>
	                        </li>
	                    </ul>
	                </li>
	                <li class="dropdown">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
	                    </a>
	                    <ul class="dropdown-menu dropdown-tasks">
	                        <li>
	                            <a href="#">
	                                <div class="text-nav">
	                                    <p>
	                                        <strong>Task 1</strong>
	                                        <span class="pull-right text-muted">40% Complete</span>
	                                    </p>
	                                    <div class="progress progress-striped active">
	                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
	                                            <span class="sr-only">40% Complete (success)</span>
	                                        </div>
	                                    </div>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <a href="#">
	                                <div class="text-nav">
	                                    <p>
	                                        <strong>Task 2</strong>
	                                        <span class="pull-right text-muted">20% Complete</span>
	                                    </p>
	                                    <div class="progress progress-striped active">
	                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
	                                            <span class="sr-only">20% Complete</span>
	                                        </div>
	                                    </div>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <a href="#">
	                                <div class="text-nav">
	                                    <p>
	                                        <strong>Task 3</strong>
	                                        <span class="pull-right text-muted">60% Complete</span>
	                                    </p>
	                                    <div class="progress progress-striped active">
	                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
	                                            <span class="sr-only">60% Complete (warning)</span>
	                                        </div>
	                                    </div>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <a href="#">
	                                <div class="text-nav">
	                                    <p>
	                                        <strong>Task 4</strong>
	                                        <span class="pull-right text-muted">80% Complete</span>
	                                    </p>
	                                    <div class="progress progress-striped active">
	                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
	                                            <span class="sr-only">80% Complete (danger)</span>
	                                        </div>
	                                    </div>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <a class="text-center" href="#">
	                                <strong class="text-nav">See All Tasks</strong>
	                                <i class="fa fa-angle-right"></i>
	                            </a>
	                        </li>
	                    </ul>
	                </li>
	                <li class="dropdown">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
	                    </a>
	                    <ul class="dropdown-menu dropdown-alerts">
	                        <li>
	                            <a href="#">
	                                <div class="text-nav">
	                                    <i class="fa fa-comment fa-fw"></i> New Comment
	                                    <span class="pull-right text-muted small">4 minutes ago</span>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <a href="#">
	                                <div class="text-nav">
	                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
	                                    <span class="pull-right text-muted small">12 minutes ago</span>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <a href="#">
	                                <div class="text-nav">
	                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
	                                    <span class="pull-right text-muted small">4 minutes ago</span>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <a href="#">
	                                <div class="text-nav">
	                                    <i class="fa fa-tasks fa-fw"></i> New Task
	                                    <span class="pull-right text-muted small">4 minutes ago</span>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <a href="#">
	                                <div class="text-nav">
	                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
	                                    <span class="pull-right text-muted small">4 minutes ago</span>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <a class="text-center" href="#">
	                                <strong class="text-nav">See All Alerts</strong>
	                                <i class="fa fa-angle-right"></i>
	                            </a>
	                        </li>
	                    </ul>
	                </li>
	                <li class="dropdown">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
	                    </a>
	                    <ul class="dropdown-menu dropdown-user">
	                        <li>
	                        	<a href="<?php echo site_url('usuario/perfilusua');?>">
	                        		<div class="text-nav">
	                        			<i class="fa fa-user fa-fw"></i> <span>Perfil de Usuario</span>
	                        		</div>
	                        	</a>
	                        </li>
	                        <li>
	                        	<a href="<?php echo site_url("login/logout");?>">
									<div class="text-nav">
										<i class="fa fa-sign-out fa-fw"></i> <span>Salir</span>		
									</div>
	                        	</a>
	                        </li>
	                    </ul>
	                </li>
	            </ul>
	            <div class="navbar-default sidebar" role="navigation">
	                <div class="sidebar-nav navbar-collapse">
	                    <ul class="nav" id="side-menu">
	                        <li class="nav-perfil">
	                            <div class="img-perfil">
	                                <a href="#">
	                                    <img src="<?php echo $administrador->foto_usuario; ?>" class="img-circle img-responsive">
	                                </a>
	                            </div>
	                            <div class="info-perfil">
	                                <h4><?php echo $administrador->nombre." ".$administrador->apellidos;?></h4>
	                                <small><?php  echo $administrador->rol; ?></small>
	                            </div>
	                        </li>
	                        <li>
	                            <a href="" class="<?php if($contenido == 'administrador/nota' 		|| 
	                            						   $contenido == 'administrador/panel' 		||
	                            						   $contenido == 'administrador/newcolumna' ||
	                            						   $contenido == 'administrador/columnas' 	||
	                            						   $contenido == 'administrador/notas' 		||
	                            						   $contenido == 'administrador/altercolumna') echo 'active';?>" ><i class="fa fa-book fa-fw"></i> Notas <span class="fa arrow"></span></a>
	                        	<ul class="nav nav-second-level">
	                        		<li href="#">
	                            		<a href="<?php echo site_url('administrador/panel');?>">Crear notas</a>
	                            	</li>
	                            	<li href="#">
	                            		<a href="<?php echo site_url('administrador/notas');?>">Consultar</a>
	                            	</li>
	                            	<li href="#">
	                            		<a href="<?php echo site_url('administrador/columnas');?>">Columnas</a>
	                            	</li>
	                            </ul>
	                        </li>
	                        <li>
	                            <a href="<?php echo site_url("admon/pagina");?>" class="" ><i class="fa fa-desktop fa-fw"></i> Página <span class="fa arrow"></span></a>
	                            <ul class="nav nav-second-level">
	                            	<li href="#">
	                            		<a href="javascript:;">Configuración</a>
	                            	</li>
	                            	<li href="#">
	                            		<a href="<?php echo base_url();?>" target="_blank">Ver página</a>
	                            	</li>
	                            </ul>
	                        </li>
	                        <li>
	                            <a href="<?php echo site_url('administrador/tareas')?>" class="<?php if($contenido == 'administrador/tareas') echo 'active';?>"><i class="fa fa-thumb-tack"></i> Tareas</a>
	                        </li>
	                        <li>
	                            <a href="<?php echo site_url('administrador/usuarios')?>" class=" <?php if($contenido == 'administrador/usuarios' || $contenido == 'administrador/newusuario' || $contenido == 'administrador/alterusuario' ) echo 'active';?>"><i class="fa fa-users fa-fw"></i> Usuarios</a>
	                        </li>
	                        <li>
	                            <a href="<?php echo site_url('administrador/estadisticas')?>" class="<?php if($contenido == 'administrador/estadisticas') echo 'active';?>"><i class="fa fa-line-chart fa-fw"></i> Estadisticas</a>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </nav>
			<div id="page-wrapper">
				<?php $this->load->view($contenido);?>
			</div>
		</div>
		<script type="text/javascript">
			
			$(document).ready(function() {
						
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('usuario/obtienenotiadmin'); ?>",
						success: function(msg){
						var datos = jQuery.parseJSON(msg);
						if(datos.numero==0){
							$('#noti').remove();
						}
						else{
								$('#allnoti').append('<span id="noti"></span>')
							    $('#noti').html(datos.numero);
							    
							    cnueva=0;
							    cmodificacion=0;
							    celiminacion=0;
							    ctodas=0;

							    e=0;
							    n=0;
							    m=0;
							    t=0;
							    
							    anueva = Array();
							    amodificacion = Array();
							    aeliminacion= Array();
							    atodas=Array();


							    for (var i = 0; i < datos.notificaciones.length; i++) {
							    	if(datos.notificaciones[i].tipo==1)
							    	{
							    		cnueva++;
							    		$('#nueva').html(cnueva);
							    		anueva[n] = datos.notificaciones[i].id;
							    		n++;

							    	}else if(datos.notificaciones[i].tipo==2){
							    		
							    		cmodificacion++;
							    		$('#modificacion').html(cmodificacion);
							    		amodificacion[m] = datos.notificaciones[i].id;
							    		m++;
							    
							    	}else if(datos.notificaciones[i].tipo==3){
							    		
							    		celiminacion++;
							    		$('#eliminacion').html(celiminacion);
							    		aeliminacion[e] = datos.notificaciones[i].id;
							    		e++;
							    		
							    	}
							    	    ctodas++;
							    		$('#toda').html(ctodas);
							    		atodas[t] = datos.notificaciones[i].id;
							    		t++;
							    };

							    nada=0;
							    if(anueva.length==0)
							    {
							    	$('#arraynueva').val(nada);
							    }else{
							    	$('#arraynueva').val(anueva);
							    }
							    if(amodificacion.length==0)
							    {
							    	$('#arraymodificacion').val(nada);
							    }else{
							    	$('#arraymodificacion').val(amodificacion);
							    }
							    if(aeliminacion.length==0)
							    {
							    	$('#arrayeliminacion').val(nada);
							    }else{
							    	$('#arrayeliminacion').val(aeliminacion);
							    }
							    if(atodas.length==0)
							    {
							    	$('#arraytodas').val(nada);
							    }else{
							    	$('#arraytodas').val(atodas);
							    }
							 }
						  }
						});
				

					//setInterval('notificaciones()',10000);
				
			$('#allusuario').dataTable({
							'language':{
							'url': 'media/data_es.txt'
							}
						});
			});


			$( "#nuevas").click(function(){
 				id=$('#arraynueva').val();
 				$('#idnotifica').val(id);
 				$('#tipo').val(1);
 				document.vernotificaciones.submit();
			});

			$( "#modificaciones").click(function(){
 				id=$('#arraymodificacion').val();
 				$('#idnotifica').val(id);
 				$('#tipo').val(2);
 				document.vernotificaciones.submit();
			});

			$( "#eliminaciones" ).click(function(){
 				id=$('#arrayeliminacion').val();
 				$('#idnotifica').val(id);
 				$('#tipo').val(3);
 				document.vernotificaciones.submit();
			});

			$( "#todas" ).click(function(){
 				id=$('#arraytodas').val();
 				$('#idnotifica').val(id);
 				$('#tipo').val(4);
 				document.vernotificaciones.submit();
			});

			function notificaciones() {
				$.ajax({
						type: "POST",
						url: "<?php echo site_url('usuario/obtienenotiadmin'); ?>",
						success: function(msg){
						var datos= jQuery.parseJSON(msg);
						if(datos.numero==0){
							$('#noti').remove();

						}
						else{

							   	$('#allnoti').append('<span id="noti"></span>')
							    $('#noti').html(datos.numero);
							    cnueva=0;
							    cmodificacion=0;
							    celiminacion=0;
							    for (var i = 0; i < datos.notificaciones.length; i++) {
							    	if(datos.notificaciones[i].tipo==1)
							    	{
							    		cnueva++;
							    		$('#nueva').html(cnueva);
							    	}else if(datos.notificaciones[i].tipo==2){
							    		cmodificacion++;
							    		$('#modificacion').html(cmodificacion);
							    	}else if(datos.notificaciones[i].tipo==3){
							    		celiminacion++;
							    		$('#eliminacion').html(celiminacion);
							    	}
							    };
							    
							 }
						  }
						});
			}
		</script>
	</body>
</html>