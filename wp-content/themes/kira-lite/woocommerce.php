<?php
/**
 *	The template for displaying the WooCommerce
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
				<?php get_template_part( 'template-parts/content', 'woocommerce' ); ?>
			</div><!--/.col-sm-8-->
			<div class="col-sm-4">
				<aside class="sidebar">
					<?php
					if( is_active_sidebar( 'woocommerce-sidebar' ) ):
						dynamic_sidebar( 'woocommerce-sidebar' );
					else:
						$the_widget_title = array(
							'before_widget'	=> '<div class="widget">',
							'after_widget'	=> '</div>',
							'before_title'	=> '<div class="widget-title"><h3 class="medium">',
							'after_title'	=> '</h3></div>'
						);

						the_widget( 'WC_Widget_Cart', 'title=' . __( 'WooCommerce Title', 'kira-lite' ), $the_widget_title );
						the_widget( 'WC_Widget_Product_Categories', 'title=' . __( 'Product Categories', 'kira-lite' ), $the_widget_title );
					endif;
					?>
				</aside><!--/.sidebar-->
			</div><!--/.col-sm-4-->
		</div><!--/.row-->
	</div><!--/.container-->
</main><!--/.blog-post-->
<?php get_footer(); ?>