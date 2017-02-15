<?php
/**
 *	Template name: Sidebar Left
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
			<?php get_sidebar(); ?>
			<div class="col-sm-8">
				<?php
				if( have_posts() ): while( have_posts() ): the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; endif;
				?>
			</div><!--/.col-sm-8-->
		</div><!--/.row-->
	</div><!--/.container-->
</main><!--/.blog-post-->
<?php get_footer(); ?>