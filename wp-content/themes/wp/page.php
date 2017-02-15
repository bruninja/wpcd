<?php get_header(); ?>
			<div id="conteudo">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="titulo-pagina">
					<div class="container">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
				<div class="container page-content">
					<div class="row">
						<div class="col-md-12">
							<p class="texto"><?php the_content(); ?></p>
						</div>
					</div>
				</div>

				<?php endwhile; else: ?>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2>Nada Encontrado</h2>
                <p>Erro 404</p>
                <p>Lamentamos mas não foram encontrados artigos.</p>
							</div>
						</div>
					</div>
      <?php endif; ?>

			</div>


<?php get_footer(); ?>
