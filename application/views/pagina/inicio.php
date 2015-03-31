<section class="container">
	<article>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<ul class="list-group col-sm-4">
						<?php $bandera = 0; foreach($notasSlider as $nota){ ?>
						<li data-target="#myCarousel" data-slide-to="<?php echo $bandera; ?>" class="list-group-item noticia-item <?php if($bandera == 0){echo 'active';} ?>">
							<?php echo $nota->nombre; ?>
						</li>
						<?php $bandera++; } ?>
					</ul>
<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<?php $bandera = 0; foreach($notasSlider as $nota){ ?>
						<div class="item <?php if($bandera == 0){echo 'active';} ?>">
							<div style="background-image:url(<?php echo base_url().$nota->imagen_nota; ?>);">
								<div class="carousel-caption">
									<h3><a href="<?php echo $nota->id; ?>"><?php echo $nota->nombre; ?></a></h3>
								</div>
							</div>
						</div><!-- End Item -->
						<?php $bandera++; } ?>
					</div><!-- End Carousel Inner -->

					<!-- Controls -->
					<div class="carousel-controls">
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							<span class="fa fa-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
							<span class="fa fa-chevron-right"></span>
						</a>
					</div>
				</div><!-- End Carousel -->
			</div>
			<!-- <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<div id="TT_RCmkEkk1Erpa4QcK7AuDzjzjjtaKLpl2LtEtksyIK1D"></div>
			</div> -->
		</div>
	</article>
<!-- <pre>
	<?php //print_r($ultimasNotas); ?>
</pre> -->
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<article>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ul class="nav nav-tabs" role="tablist" id="tabs-1">
							<li class="active"><a href="#gobierno" data-toggle="tab">Gobierno</a></li>
							<li><a href="#seguridad" data-toggle="tab">Seguridad</a></li>
							<li><a href="#educacion" data-toggle="tab">Educación</a></li>
							<li><a href="#salud" data-toggle="tab">Salud</a></li>
							<li><a href="#economia" data-toggle="tab">Economia</a></li>
						</ul>
						<div class="tab-content" id="content-1">
							<div class="tab-pane in fade active" id="gobierno">
								<div class="media">
									<?php $gobierno = $ultimasNotas['gobierno'];?>
									<div class="pull-left" style="width:150px;">
										<img src="<?php echo $gobierno->imagen_nota; ?>" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading"><?php echo $gobierno->nombre; ?></h4>
										<div><?php echo $gobierno->contenido; ?></div>
										<a href="" class="pull-right">Ver mas</a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="seguridad">
								<div class="media">
									<?php $seguridad = $ultimasNotas['seguridad']; ?>
									<div class="pull-left" style="width:150px;">
										<img src="<?php echo $seguridad->imagen_nota; ?>" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading"><?php echo $seguridad->nombre; ?></h4>
										<div><?php echo $seguridad->contenido; ?></div>
										<a href="" class="pull-right">Ver mas</a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="educacion">
								<div class="media">
									<?php $educacion = $ultimasNotas['educacion']; ?>
									<div class="pull-left" style="width:150px;">
										<img src="<?php echo $educacion->imagen_nota; ?>" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading"><?php echo $educacion->nombre; ?></h4>
										<div><?php echo $educacion->contenido; ?></div>
										<a href="" class="pull-right">Ver mas</a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="salud">
								<div class="media">
									<?php $salud = $ultimasNotas['salud']; ?>
									<div class="pull-left" style="width:150px;">
										<img src="<?php echo $salud->imagen_nota; ?>" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading"><?php echo $salud->nombre; ?></h4>
										<div><?php echo $salud->contenido; ?></div>
										<a href="" class="pull-right">Ver mas</a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="economia">
								<div class="media">
									<?php $economia = $ultimasNotas['economia']; ?>
									<div class="pull-left" style="width:150px;">
										<img src="<?php echo $economia->imagen_nota; ?>" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading"><?php echo $economia->nombre; ?></h4>
										<div><?php echo $economia->contenido; ?></div>
										<a href="" class="pull-right">Ver mas</a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ul class="nav nav-tabs" role="tablist" id="tabs-1">
							<li class="active"><a href="#estado" data-toggle="tab">Colima</a></li>
							<li><a href="#municipio" data-toggle="tab">Manzanillo</a></li>
							<li><a href="#sociedad" data-toggle="tab">Villa de Álvarez</a></li>
							<li><a href="#educacion" data-toggle="tab">Tecoman</a></li>
							<li><a href="#educacion" data-toggle="tab">Armeria</a></li>
							<li><a href="#educacion" data-toggle="tab">Zona Norte</a></li>
							<li><a href="#educacion" data-toggle="tab">Entidades</a></li>
						</ul>
						<div class="tab-content" id="content-1">
							<div class="tab-pane in fade active" id="estado">
								<div class="media">
									<div class="pull-left">
										<img src="http://placehold.it/150x150/dddddd/333333" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Titulo</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus dolorum, deserunt doloribus quidem ipsa voluptatum non optio quod neque earum dignissimos iusto magni atque incidunt magnam a, iure est provident?</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="municipio">
								<div class="media">
									<div class="pull-left">
										<img src="http://placehold.it/150x150/dddddd/333333" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Titulo</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus dolorum, deserunt doloribus quidem ipsa voluptatum non optio quod neque earum dignissimos iusto magni atque incidunt magnam a, iure est provident?</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="sociedad">
								<div class="media">
									<div class="pull-left">
										<img src="http://placehold.it/150x150/dddddd/333333" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Titulo</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus dolorum, deserunt doloribus quidem ipsa voluptatum non optio quod neque earum dignissimos iusto magni atque incidunt magnam a, iure est provident?</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="educacion">
								<div class="media">
									<div class="pull-left">
										<img src="http://placehold.it/150x150/dddddd/333333" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Titulo</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus dolorum, deserunt doloribus quidem ipsa voluptatum non optio quod neque earum dignissimos iusto magni atque incidunt magnam a, iure est provident?</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ul class="nav nav-tabs" role="tablist" id="tabs-1">
							<li class="active"><a href="#estado" data-toggle="tab">Cultura</a></li>
							<li><a href="#municipio" data-toggle="tab">Sociales</a></li>
							<li><a href="#sociedad" data-toggle="tab">Medio Ambiente</a></li>
							<li><a href="#educacion" data-toggle="tab">Urbes</a></li>
							<li><a href="#educacion" data-toggle="tab">Movimientos Sociales</a></li>
							<li><a href="#educacion" data-toggle="tab">Agro</a></li>
						</ul>
						<div class="tab-content" id="content-1">
							<div class="tab-pane in fade active" id="estado">
								<div class="media">
									<div class="pull-left">
										<img src="http://placehold.it/150x150/dddddd/333333" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Titulo</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus dolorum, deserunt doloribus quidem ipsa voluptatum non optio quod neque earum dignissimos iusto magni atque incidunt magnam a, iure est provident?</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="municipio">
								<div class="media">
									<div class="pull-left">
										<img src="http://placehold.it/150x150/dddddd/333333" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Titulo</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus dolorum, deserunt doloribus quidem ipsa voluptatum non optio quod neque earum dignissimos iusto magni atque incidunt magnam a, iure est provident?</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="sociedad">
								<div class="media">
									<div class="pull-left">
										<img src="http://placehold.it/150x150/dddddd/333333" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Titulo</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus dolorum, deserunt doloribus quidem ipsa voluptatum non optio quod neque earum dignissimos iusto magni atque incidunt magnam a, iure est provident?</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="educacion">
								<div class="media">
									<div class="pull-left">
										<img src="http://placehold.it/150x150/dddddd/333333" class="img-responsive">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Titulo</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus dolorum, deserunt doloribus quidem ipsa voluptatum non optio quod neque earum dignissimos iusto magni atque incidunt magnam a, iure est provident?</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article>
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<div class="panel-contexto bg-gris-c">
							<legend><a href="#">VIDEO CONTEXTO</a></legend>
							<!-- <iframe width="420" height="315" src="//www.youtube.com/embed/rDVkrK1vn34" frameborder="0" allowfullscreen></iframe> -->
							<video id="vid1" src="" class="video-js vjs-default-skin" controls preload="auto" width="100%" height="360" data-setup='{ "techOrder": ["youtube"], "src": "https://www.youtube.com/watch?v=n8Nuf7UG9eg&list=UUN13D6N-KTzydd8QfS-erBw" }'></video>
							<!-- <video id="example_video_1" class="video-js vjs-default-skin" controls preload="auto" data-setup='{ "techOrder": ["youtube"], "src": "http://www.youtube.com/watch?v=rDVkrK1vn34" }' width="100%" height="300">

							</video> -->
							<h4 class="media-heading">Titulo</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus dolorum, deserunt doloribus quidem ipsa voluptatum.</p>
						</div>
					</div>
					<div class="hidden-xs col-sm-3 col-md-3 col-lg-3">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12">
								<div class="panel-contexto bg-gris-c miniatura-video">
									<img src="http://placehold.it/150x150/dddddd/333333" class="img-responsive">
									<h4 class="media-heading">Titulo</h4>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12">
								<div class="panel-contexto bg-gris-c miniatura-video">
									<img src="http://placehold.it/150x150/dddddd/333333" class="img-responsive">
									<h4 class="media-heading">Titulo</h4>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12">
								<div class="panel-contexto bg-gris-c miniatura-video">
									<img src="http://placehold.it/150x150/dddddd/333333" class="img-responsive">
									<h4 class="media-heading">Titulo</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="panel-contexto bg-gris-o">
							<legend><a href="#">IMAGEN CONTEXTO</a></legend>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class='img-caption'>
										<a href="#">
											<img src='media/img/imagen1.jpg' class="img-responsive">
											<div class='caption'>
												The pack, the basic...
											</div>
										</a>
									</div>
								</div>
								<div class="hidden-xs col-sm-6 col-md-6 col-lg-6">
									<div class='img-caption'>
										<a href="#">
											<img src='media/img/imagen1.jpg' class="img-responsive">
											<div class='caption'>
												The pack, the basic...
											</div>
										</a>
									</div>
								</div>
								<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
									<div class='img-caption'>
										<a href="#">
											<img src='media/img/imagen1.jpg' class="img-responsive">
											<div class='caption'>
												The pack, the basic...
											</div>
										</a>
									</div>
								</div>
								<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
									<div class='img-caption'>
										<a href="#">
											<img src='media/img/imagen1.jpg' class="img-responsive">
											<div class='caption'>
												The pack, the basic...
											</div>
										</a>
									</div>
								</div>
								<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
									<div class='img-caption'>
										<a href="#">
											<img src='media/img/imagen1.jpg' class="img-responsive">
											<div class='caption'>
												The pack, the basic...
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="panel-contexto bg-gris-c">
							<legend><a href="#">OPINIÓN</a></legend>
							<div class="carousel-reviews">
								<div id="carousel-reviews" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner">
										<div class="item active">
											<div class="row">
												<div class="col-md-4 col-sm-6">
													<div class="person-text rel">
														<img src="media/img/usuarios/perfil_default.png" class="img-circle">
														<span>Nombre</span>
													</div>
													<div class="block-text rel zmin">
														<a title="" href="#">Titulo</a>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt consectetur atque minima necessitatibus sint possimus quod tempora, eum eius architecto perferendis. Deleniti repellat fugiat, reprehenderit, non obcaecati tempore dolore porro?</p>
													</div>
												</div>
												<div class="hidden-xs col-md-4 col-sm-6">
													<div class="person-text rel">
														<img src="media/img/usuarios/perfil_default.png" class="img-circle">
														<span>Nombre</span>
													</div>
													<div class="block-text rel zmin">
														<a title="" href="#">Titulo</a>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad neque architecto minus eligendi saepe! Dolorem id hic voluptate cum, impedit non, consequuntur nemo distinctio accusamus unde perferendis error aliquam praesentium.</p>
													</div>
												</div>
												<div class="hidden-xs col-md-4 col-sm-6">
													<div class="person-text rel">
														<img src="media/img/usuarios/perfil_default.png" class="img-circle">
														<span>Nombre</span>
													</div>
													<div class="block-text rel zmin">
														<a title="" href="#">Titulo</a>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae sequi corporis praesentium sapiente veritatis animi repellendus eveniet! Quae magnam expedita accusamus quia neque minus veritatis, cumque, soluta dolorum amet. Eos?</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
										<span class="fa fa-chevron-left"></span>
									</a>
									<a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
										<span class="fa fa-chevron-right"></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<article>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
								<img src="media/img/logo_nav.png" class="img-responsive" style="-webkit-filter: invert(1); margin-top: 10px; margin-bottom:10px;">
							</div>
							<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
								<img src="media/img/logo_nav.png" class="img-responsive" style="-webkit-filter: invert(1); margin-top: 10px; margin-bottom:10px;">
							</div>
							<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
								<img src="media/img/logo_nav.png" class="img-responsive" style="-webkit-filter: invert(1); margin-top: 10px; margin-bottom:10px;">
							</div>
							<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
								<img src="media/img/logo_nav.png" class="img-responsive" style="-webkit-filter: invert(1); margin-top: 10px; margin-bottom:10px;">
							</div>
							<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
								<img src="media/img/logo_nav.png" class="img-responsive" style="-webkit-filter: invert(1); margin-top: 10px; margin-bottom:10px;">
							</div>
							<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
								<img src="media/img/logo_nav.png" class="img-responsive" style="-webkit-filter: invert(1); margin-top: 10px; margin-bottom:10px;">
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="panel-contexto bg-gris-o">
							<legend><a href="#">FOTO DEL DIA</a></legend>
							<img src="http://placehold.it/600x600/dddddd/333333" class="img-responsive">
							<h4 class="media-heading">Titulo</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus dolorum, deserunt doloribus quidem ipsa voluptatum.</p>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
								<img src="media/img/logo_nav.png" class="img-responsive" style="-webkit-filter: invert(1); margin-top: 10px; margin-bottom:10px;">
							</div>
							<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
								<img src="media/img/logo_nav.png" class="img-responsive" style="-webkit-filter: invert(1); margin-top: 10px; margin-bottom:10px;">
							</div>
							<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
								<img src="media/img/logo_nav.png" class="img-responsive" style="-webkit-filter: invert(1); margin-top: 10px; margin-bottom:10px;">
							</div>
							<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
								<img src="media/img/logo_nav.png" class="img-responsive" style="-webkit-filter: invert(1); margin-top: 10px; margin-bottom:10px;">
							</div>
							<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
								<img src="media/img/logo_nav.png" class="img-responsive" style="-webkit-filter: invert(1); margin-top: 10px; margin-bottom:10px;">
							</div>
							<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
								<img src="media/img/logo_nav.png" class="img-responsive" style="-webkit-filter: invert(1); margin-top: 10px; margin-bottom:10px;">
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="panel-contexto bg-gris-c">
							<legend><a href="#">ARTICULOS MAS VISTOS</a></legend>
							<div class="panel-group" id="accordion">
								<div class="panel-contexto bg-gris-o">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									Collapsible Group Item #1
									</a>
									<div id="collapseOne" class="panel-collapse collapse">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
									</div>
								</div>
								<div class="panel-contexto bg-gris-o">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
									Collapsible Group Item #2
									</a>
									<div id="collapseTwo" class="panel-collapse collapse">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
									</div>
								</div>
								<div class="panel-contexto bg-gris-o">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
									Collapsible Group Item #3
									</a>
									<div id="collapseThree" class="panel-collapse collapse">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>