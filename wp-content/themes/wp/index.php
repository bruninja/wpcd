<?php get_header(); ?>
			<div id="conteudo">

				<div id="banner">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<img src="<?php echo get_template_directory_uri(); ?>/res/img/banner.jpg" alt="" class="img-responsive"/>
							</li>
							<li>
								<img src="<?php echo get_template_directory_uri(); ?>/res/img/banner_3.jpg" alt="" class="img-responsive"/>
							</li>
							<li>
								<img src="<?php echo get_template_directory_uri(); ?>/res/img/banner_2.jpg" alt="" class="img-responsive"/>
							</li>
							<li>
								<img src="<?php echo get_template_directory_uri(); ?>/res/img/banner_4.jpg" alt="" class="img-responsive"/>
							</li>
						</ul>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">

							<div class="row">
								<div class="col-md-6">
									<h2 class="titulo"><?php bloginfo('name'); ?></h2>
									<p class="texto">
										<?php bloginfo( 'description' ); ?>
									</p>
									<!-- <a href="Escritorio" class="btn btn-default margem-top">LEIA MAIS</a> -->
								</div>

								<div class="col-md-6">
									<h2 class="titulo">Últimas Publicações</h2>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    									<div class="publicacoes">
    										<i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;<a href="<?php the_permalink() ?>" class="link" target="_blank" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    										<div class="detalhe-noticia">
    											<p class="texto">
    												<i class="fa fa-calendar-o"></i>&nbsp;<?php the_time('d/M/Y') ?>    &nbsp;&nbsp;
    											</p>
    										</div>
                      <?php endwhile?>

                      <?php else: ?>

                      <?php endif; ?>
    									</div>
								  </div>
							  </div>
              </div>
					  </div>
						<hr />
						<!-- Highlights - jumbotron -->
						<div class="text-center">
						  <div class="container">
						    <h2>Áreas de Atuação</h2>

								<br />
						    <div class="row">
						      <div class="col-md-3 col-sm-6 highlight">
						        <div class="h-caption">
						          <span class="fa fa-info-circle fa-5x" aria-hidden="true"></span>
						          <h4>Informação e Consultoria</h4>
						        </div>
						      </div>
						      <div class="col-md-3 col-sm-6 highlight">
						        <div class="h-caption">
						          <span class="fa fa-line-chart fa-5x" aria-hidden="true"></span>
						          <h4>Direito Empresarial e Comercial</h4>
						        </div>
						      </div>
						      <div class="col-md-3 col-sm-6 highlight">
						        <div class="h-caption">
						          <span class="fa fa-money fa-5x" aria-hidden="true"></span>
						          <h4>Direito Tributário</h4>
						        </div>
						      </div>
						      <div class="col-md-3 col-sm-6 highlight">
						        <div class="h-caption">
						          <span class="fa fa-briefcase fa-5x" aria-hidden="true"></span>
						          <h4>Direito Administrativo</h4>
						        </div>
						      </div>
						    </div> <!-- /row  -->

						    <div class="row">
						      <div class="col-md-3 col-sm-6 highlight">
						        <div class="h-caption">
						          <span class="fa fa-balance-scale fa-5x" aria-hidden="true"></span>
						          <h4>Direito Civil</h4>
						        </div>
						      </div>
						      <div class="col-md-3 col-sm-6 highlight">
						        <div class="h-caption">
						          <span class="fa fa-industry fa-5x" aria-hidden="true"></span>
						          <h4>Direito Trabalhista</h4>
						        </div>
						      </div>
						      <div class="col-md-3 col-sm-6 highlight">
						        <div class="h-caption">
						          <span class="fa fa-shopping-basket fa-5x" aria-hidden="true"></span>
						          <h4>Relações de Consumo</h4>
						        </div>
						      </div>
						      <div class="col-md-3 col-sm-6 highlight">
						        <div class="h-caption">
						          <span class="fa fa-gavel fa-5x" aria-hidden="true"></span>
						          <h4>Direito Criminal</h4>
						        </div>
						      </div>
						    </div>

						  </div>
						</div>
						<!-- /Highlights -->
				  </div>
			</div>

      <?php get_footer(); ?>
