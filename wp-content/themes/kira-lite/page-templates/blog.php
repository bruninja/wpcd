<?php
/**
 *	Template name: Blog
 *
 *	@link https://codex.wordpress.org/Template_Hierarchy
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
				$wp_query_args = array (
					'post_type'					=> array( 'post' ),
					'cache_results'				=> true,
					'update_post_meta_cache'	=> true,
					'update_post_term_cache'	=> true
				);

				$wp_query = new WP_Query( $wp_query_args );

				if( $wp_query->have_posts() ):
					while( $wp_query->have_posts() ):
						$wp_query->the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;
				else:
					get_template_part( 'template-parts/content', 'none' );
				endif;

				wp_reset_postdata();
				?>
				<?php do_action( 'mtl_after_content_above_footer' ); ?>
			</div><!--/.col-sm-8-->
			<?php get_sidebar(); ?>
		</div><!--/.row-->
	</div><!--/.container-->
</main><!--/.blog-list-->
<?php get_footer(); ?>