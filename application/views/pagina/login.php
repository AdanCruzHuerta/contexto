<!DOCTYPE html>
<html lang="es">
<head>
	<base href="<?php echo base_url() ?>">
	<meta charset="UTF-8">
	<title>Contexto Colima</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Pagina de administrador de Contexto Colima">
    <meta name="author" content="SharkSoft - Contexto Colima">
	<link rel="icon" href="media/img/favicon/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h3>ACCESO A ADMINISTRADOR</h3>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<center>
						<img src="media/img/logo.png" class="logo-contexto">
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xs-offset-0 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Iniciar Sesión</h3>
						</div>
						<div class="panel-body">
							<?php if($error): ?>
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1  alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<center>Usuario y Password incorrectos!!</center>
									</div>
								</div>
							<?php endif; ?>

							<form action="<?php echo site_url('login/create')?>" method="post">
								
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Email" name="email" required/>
								</div>

								<div class="form-group">
									<input type="password" class="form-control" placeholder="Password" name="password" required/>
								</div>

								<input type="submit" class="btn btn-primary btn-block"/>

							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<center>
			<p>Derechos reservados ©2015 Contexto Colima. Desarrollado por: <a href="http://sharksoft.com.mx" target="_blank">SharkSoft</a></p>
		</center>
	</footer>
</body>
</html>