<?php get_header(); ?>

<!-- container -->
<div class="container single">

  <div class="row">

    <!-- Article main content -->
    <div class="col-sm-12 maincontent">
      <header class="page-header">
        <h1 class="page-title"><?php the_title(); ?></h1>
      </header>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="artigo">
                    <!-- <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> -->
                    <p>Postado por <?php the_author() ?> em <?php the_time('d/M/Y') ?> - <?php edit_post_link('(Editar)'); ?></p>
                    <p><?php the_content(); ?></p>
                </div>


            <?php endwhile; else: ?>
                <div class="artigo">
                    <h2>Nada Encontrado</h2>
                    <p>Erro 404</p>
                    <p>Lamentamos mas não foram encontrados artigos.</p>
                </div>
            <?php endif; ?>

    </div>
    <!-- /Article -->


  </div>
</div>	<!-- /container -->

<?php get_footer(); ?>
