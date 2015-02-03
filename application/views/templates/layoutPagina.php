<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo base_url(); ?>">
		<meta charset="UTF-8">
		<title>Contexto Colima</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/contexto.css">
		<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
		<link rel="icon" href="media/img/favicon/favicon.ico">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/dropdown.min.js"></script>
		<link href="http://vjs.zencdn.net/4.7/video-js.css" rel="stylesheet">
		<script src="http://vjs.zencdn.net/4.7/video.js"></script>
		<script src="js/youtube.js"></script>
		<style type="text/css">
			.vjs-default-skin .vjs-play-progress,
			.vjs-default-skin .vjs-volume-level { background-color: #27642a }
			.vjs-default-skin .vjs-control-bar { font-size: 113% }
		</style>
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<img src="media/img/logo.png" class="logo-contexto">
				</div>
			</div>
		</header>
		<nav class="navbar navbar-inverse">
			<div class="container cero-padding">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-nav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="navbar-collapse nav-collapse collapse cero-padding" id="menu-nav">
					<ul class="nav nav-justified">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Estado</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="">Gobierno</a></li>
								<li><a href="">Seguridad</a></li>
								<li><a href="">Educación</a></li>
								<li><a href="">Salud</a></li>
								<li><a href="">Economia</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Municipio</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="">Colima</a></li>
								<li><a href="">Manzanillo</a></li>
								<li><a href="">Villa de Alvarez</a></li>
								<li><a href="">Tecoman</a></li>
								<li><a href="">Armeria</a></li>
								<li><a href="">Zona norte</a></li>
								<li><a href="">Entidades</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sociedad</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="">Cultura</a></li>
								<li><a href="">Sociales</a></li>
								<li><a href="">Medio ambiente</a></li>
								<li><a href="">Urbes</a></li>
								<li><a href="">Movimientos sociales</a></li>
								<li><a href="">Agro</a></li>
							</ul>
						</li>
						<li><a href="#">Galeria</a></li>
						<li><a href="#">Video</a></li>
						<li><a href="#">Opinión</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<?php $this->load->view($contenido); ?>
		<footer>
			<span></span>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo unde eos, odit et facilis, in reiciendis debitis, eveniet maiores consequatur laboriosam. Facilis voluptatum a natus et, eligendi eius commodi obcaecati?</p>
					</div>
				</div>
			</div>
		</footer>
	</body>
	<!--<script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_RCmkEkk1Erpa4QcK7AuDzjzjjtaKLpl2LtEtksyIK1D"></script>-->
	<script type="text/javascript" src="js/lightbox.min.js"></script>
	<script type="text/javascript" src="js/tabdrop.js"></script>
	<script>
		$(document).ready(function(){
			$(function(){
				if ($(window).width() <= 780){	
					$('div#menu-nav > ul.nav').removeClass('nav-justified').addClass('navbar-nav');
				}else{
					$('div#menu-nav > ul.nav').removeClass('navbar-nav').addClass('nav-justified');
				}
			});
			$(function() {
				var eTop = $('.navbar').offset().top; //get the offset top of the element
				console.log(eTop - $(window).scrollTop()); //position of the ele w.r.t window

				$(window).scroll(function() { //when window is scrolled
					console.log(eTop  - $(window).scrollTop());
				});
			});
			$(window).resize(function(){
				if ($(window).width() <= 780){	
					$('div#menu-nav > ul.nav').removeClass('nav-justified').addClass('navbar-nav');
				}else{
					$('div#menu-nav > ul.nav').removeClass('navbar-nav').addClass('nav-justified');
				}
			});

			//$('.dropdown-toggle').dropdownHover().dropdown();
			$('.nav-tabs').tabdrop();

			//var myPlayer = videojs('vid1');
			var clickEvent = false;
			$('#myCarousel').carousel({
				interval:   4000	
			}).on('click', '.list-group li', function() {
				clickEvent = true;
				$('.list-group li').removeClass('active');
				$(this).addClass('active');		
			}).on('slid.bs.carousel', function(e) {
				if(!clickEvent) {
					var count = $('.list-group').children().length -1;
					var current = $('.list-group li.active');
					current.removeClass('active').next().addClass('active');
					var id = parseInt(current.data('slide-to'));
					if(count == id) {
						$('.list-group li').first().addClass('active');	
					}
				}
				clickEvent = false;
			});
		});
	</script>
</html>