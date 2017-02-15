<?php
/**
 *	The template for displaying all single posts.
 *
 *	@link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<?php get_header(); ?>
<main class="blog-post">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8">
				<?php
				if( have_posts() ): while( have_posts() ): the_post();
					get_template_part( 'template-parts/content', 'single' );
				endwhile; endif;
				?>
			</div><!--/.col-sm-8-->
			<?php get_sidebar(); ?>
		</div><!--/.row-->
	</div><!--/.container-->
</main><!--/.blog-post-->
<?php get_footer(); ?>