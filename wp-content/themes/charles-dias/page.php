<?php get_header(); ?>

<!-- container -->
<div class="container single">

  <div class="row">

    <!-- Article main content -->
    <div class="col-sm-12 maincontent">
      <header class="page-header">
        <h1 class="page-title"><?php the_title(); ?></h1>
      </header>
      <p><?php the_content(); ?></p>
    </div>
    <!-- /Article -->

  </div>
</div>	<!-- /container -->

<?php get_footer(); ?>
