<?php
/**
 *	The template for displaying search results pages.
 *
 *	@link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<?php get_header(); ?>
<main class="blog-list">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8">
				<?php
				if( have_posts() ):
					while( have_posts() ):
						the_post();
						get_template_part( 'template-parts/content', 'search' );
					endwhile;
				else:
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
				<?php do_action( 'mtl_after_content_above_footer' ); ?>
			</div><!--/.col-sm-8-->
			<?php get_sidebar(); ?>
		</div><!--/.row-->
	</div><!--/.container-->
</main><!--/.blog-list-->
<?php get_footer(); ?>