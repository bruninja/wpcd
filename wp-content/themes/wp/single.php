<?php get_header(); ?>
			<div id="conteudo">

				<div class="container">
					<div class="row">
						<div class="col-md-12">

              <h2 class="titulo">Últimas Publicações</h2>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                  <div class="publicacoes">
                    <i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;<a href="<?php the_permalink() ?>" class="link" target="_blank" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    <div class="detalhe-noticia">
                      <p class="texto">
                        <i class="fa fa-calendar-o"></i>&nbsp;<?php the_time('d/M/Y') ?>    &nbsp;&nbsp;
                      </p>
                      <p class="texto">

                      </p>
                      <p class="texto">
                        <?php comments_popup_link('Sem Comentários', '1 Comentário', '% Comentários', 'comments-link', ''); ?> <?php edit_post_link('(Editar)'); ?>
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

      <?php get_footer(); ?>
