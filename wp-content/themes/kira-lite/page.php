<?php
/**
 *	The template for displaying all pages.
 *
 *	This is the template that displays all pages by default.
 *	Please note that this is the WordPress construct of pages
 *	and that other 'pages' on your WordPress site may use a
 *	different template.
 *
 *	@link https://codex.wordpress.org/Template_Hierarchy
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
					get_template_part( 'template-parts/content', 'page' );
				endwhile; endif;
				?>
			</div><!--/.col-sm-8-->
			<?php get_sidebar(); ?>
		</div><!--/.row-->
	</div><!--/.container-->
</main><!--/.blog-post-->
<?php get_footer(); ?>