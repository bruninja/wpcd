<?php
/**
 *	The template for displaying the works in front page.
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<?php
$general_title = get_theme_mod( 'kira_lite_works_general_title', esc_html__( 'What we did...', 'kira-lite' ) );
$general_button_text = get_theme_mod( 'kira_lite_works_general_button_text', esc_html__( 'View all works', 'kira-lite' ) );
$general_button_url = get_theme_mod( 'kira_lite_works_general_button_url', esc_url( '#' ) );
?>
<?php if( $general_title || $general_button_text || $general_button_url ): ?>
	<section id="index-head-works" class="index-head works">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6">
					<?php if( $general_title ): ?>
						<div class="section-head dark-gray-background">
							<h3 class="medium"><?php echo esc_html( $general_title ); ?></h3>
						</div><!--/.section-head.dark-gray-background-->
					<?php endif; ?>
				</div><!--/.col-xs-6-->
				<div class="col-xs-6">
					<?php if( $general_button_text && $general_button_url ): ?>
						<div class="section-head white-background">
							<a class="button-two" href="<?php echo esc_url( $general_button_url ); ?>" title="<?php echo esc_attr( $general_button_text ); ?>"><?php echo esc_html( $general_button_text ); ?></a>
							<div class="out-right white">
							</div><!--/.out-right.white-->
						</div><!--/.section-head.white-background-->
					<?php endif; ?>
				</div><!--/.col-xs-6-->
			</div><!--/.row-->
		</div><!--/.container-->
	</section><!--/#index-head-works.index-head.works-->
<?php endif; ?>
<div class="index-works">
	<div class="container-fluid">
		<div class="row">
			<?php
			if( is_active_sidebar( 'front-page-works-sidebar' ) ):
				dynamic_sidebar( 'front-page-works-sidebar' );
			else:
				$the_widget_args = array(
					'before_widget'	=> '<div class="col-md-4 col-sm-6">',
					'after_widget'	=> '</div><!--/.col-md-4 col-sm-6-->',
					'before_title'	=> '',
					'after_title'	=> ''
				);

				the_widget( 'Kira_Lite_Widget_Work', 'url='. esc_url( '#' ) .'&image=/layout/images/index/work-image1.jpg&title='. esc_html__( 'ErgoJet', 'kira-lite' ) .'&categories=' . esc_html__( 'Logo design, Branding', 'kira-lite' ), $the_widget_args );
				the_widget( 'Kira_Lite_Widget_Work', 'url='. esc_url( '#' ) .'&image=/layout/images/index/work-image2.jpg&title='. esc_html__( 'Trans', 'kira-lite' ) .'&categories=' . esc_html__( 'Mobile apps, Branding', 'kira-lite' ), $the_widget_args );
				the_widget( 'Kira_Lite_Widget_Work', 'url='. esc_url( '#' ) .'&image=/layout/images/index/work-image3.jpg&title='. esc_html__( 'Books', 'kira-lite' ) .'&categories=' . esc_html__( 'Logo design, Branding', 'kira-lite' ), $the_widget_args );
			endif;
			?>
		</div><!--/.row-->
	</div><!--/.container-->
</div><!--/.index-works-->