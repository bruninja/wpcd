<?php
/**
 *    The template for displaying the footer.
 *
 *    Contains the closing of the #content div and all content after.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    WordPress
 * @subpackage kira-lite
 */
?>
<?php
$img_footer_logo  = get_theme_mod( 'kira_lite_img_footer_logo', get_template_directory_uri() . '/layout/images/footer-logo.png' );
$footer_copyright = get_theme_mod( 'kira_lite_footer_copyright', '<a href="https://www.machothemes.com/themes/kira-lite/">' . esc_html( 'Kira Lite', 'kira-lite' ) . '</a>' . esc_html( ' - all rights reserved.', 'kira-lite' ) . esc_html( ' Built by: ', 'kira-lite' ) . '<a href="https://www.machothemes.com/" title="Responsive WordPress Themes" rel="dofollow">' . esc_html( 'Macho Themes', 'kira-lite' ) . '</a>' );
?>
<footer id="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-4">
						<?php
						if ( is_active_sidebar( 'footer-sidebar-1' ) ):
							dynamic_sidebar( 'footer-sidebar-1' );
						else:
							$the_widget_args = array(
								'before_widget' => '<div id="" class="widget">',
								'after_widget'  => '</div>',
								'before_title'  => '<div class="widget-title"><h3 class="medium">',
								'after_title'   => '</h3></div>',
							);

							the_widget( 'WP_Widget_Meta', '', $the_widget_args );
						endif;
						?>
					</div><!--/.col-sm-4-->
					<div class="col-sm-4">
						<?php
						if ( is_active_sidebar( 'footer-sidebar-2' ) ):
							dynamic_sidebar( 'footer-sidebar-2' );
						else:
							$the_widget_args = array(
								'before_widget' => '<div id="" class="widget">',
								'after_widget'  => '</div>',
								'before_title'  => '<div class="widget-title"><h3 class="medium">',
								'after_title'   => '</h3></div>',
							);

							the_widget( 'WP_Widget_Categories', '', $the_widget_args );
						endif;
						?>
					</div><!--/.col-sm-4-->
					<div class="col-sm-4">
						<?php
						if ( is_active_sidebar( 'footer-sidebar-3' ) ):
							dynamic_sidebar( 'footer-sidebar-3' );
						else:
							$the_widget_args = array(
								'before_widget' => '<div id="" class="widget">',
								'after_widget'  => '</div>',
								'before_title'  => '<div class="widget-title"><h3 class="medium">',
								'after_title'   => '</h3></div>',
							);

							the_widget( 'WP_Widget_Pages', '', $the_widget_args );
						endif;
						?>
					</div><!--/.col-sm-4-->
				</div><!--/.row-->
			</div><!--/.col-sm-8-->
			<div class="col-sm-4">
				<?php if ( $img_footer_logo ): ?>
					<a href="<?php echo esc_url( get_site_url() ); ?>" class="footer-logo" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
						<img src="<?php echo esc_url( $img_footer_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
					</a><!--/.footer-logo-->
				<?php endif; ?>
				<?php do_action( 'mtl_social_footer' ); ?>
				<p class="copyright"><?php echo wp_kses_post( $footer_copyright ); ?></p>
			</div><!--/.col-sm-4-->
		</div><!--/.row-->
	</div><!--/.container-->
</footer><!--/#footer-->
<a href="#" class="mt-top hidden-sm hidden-xs"><i class="fa fa-angle-up"></i></a>
<!--Start JavaScripts-->
<script>setTimeout( function() {
		document.body.className = 'page-loaded'
	}, 0 );</script>
<!--End JavaScripts-->
<?php wp_footer(); ?>
</body>
</html>