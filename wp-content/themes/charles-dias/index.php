<?php get_header(); ?>

<!-- Header -->
<header id="head">
  <!-- carousel -->
  <div id="myCarousel" class="carousel slide">
    <!-- Dot Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Items -->
    <div class="carousel-inner">
      <div class="active item">  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner_2.jpg" class="img-responsive"  style="width: 100%;"></div>
      <div class="item">  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner_3.jpg" class="img-responsive"  style="width: 100%;"></div>
      <div class="item">  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner_4.jpg" class="img-responsive"  style="width: 100%;"></div>
    </div>
    <!-- Navigation -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="fa fa-angle-left"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="fa fa-angle-right"></span>
    </a>
  </div>
  <!-- ./carousel -->
</header>
<!-- /Header -->



<!-- Intro -->
<div class="container text-center">
  <br> <br>
  <!-- <center>
  <img class="img-responsive" src="<?php echo home_url('/'); ?>wp-content/themes/charles-dias/assets/images/logo.png" alt="" />
</center> -->
  <h1 class="thin"><?php bloginfo('name'); ?></h1>
  <p class="text-muted">
    <?php bloginfo('description'); ?>
  </p>
</div>
<!-- /Intro-->

<!-- Highlights - jumbotron -->
<div class="jumbotron top-space">
  <div class="container">

    <h2 class="text-center thin">Áreas de Atuação</h2>

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

<!-- container -->
<div class="container">

  <h2 class="text-center top-space">Publicações</h2>
  <br>

  <div class="row">
    <div class="col-sm-6">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <!-- First Blog Post -->
      <h3>
        <a href="<?php the_permalink() ?>">
          <?php the_title(); ?>
        </a>
      </h3>
      <p><i class="fa fa-clock-o"></i> Postado por <?php the_author() ?> em <?php the_time('d') ?> de <?php the_time('F') ?>, <?php the_time('Y') ?> às <?php the_time('G:i') ?></p>
      <hr>
        <p><?php the_excerpt(); ?></p>
      <a  href="<?php the_permalink() ?>">Leia Mais <i class="fa fa-angle-right"></i></a>
    </div>
  <?php endwhile?>
  <?php else: ?>
  <?php endif; ?>
  <ul class="pager">
    <li class="previous">
      <?php next_posts_link('← Postagens Antigas') ?>
    </li>
    <li class="next">
      <?php previous_posts_link('Postagens Novas →') ?>
    </li>
  </ul>
  </div> <!-- /row -->

  <hr>




</div>	<!-- /container -->


<!-- Social links. @TODO: replace by link/instructions in template -->
<section id="social">
  <div class="container">
    <div class="wrapper clearfix">
      <!-- AddThis Button BEGIN -->
      <div class="addthis_toolbox addthis_default_style">
      <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
      <a class="addthis_button_tweet"></a>
      <a class="addthis_button_linkedin_counter"></a>
      <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
      </div>
      <!-- AddThis Button END -->
    </div>
  </div>
</section>
<!-- /social links -->

<?php get_footer(); ?>
