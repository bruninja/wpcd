<?php
/**
 *	The template for displaying the services in front page.
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<?php
$services_general_title = get_theme_mod( 'kira_lite_services_general_title', esc_html__( 'What we can to do', 'kira-lite' ) );
$services_general_button_text = get_theme_mod( 'kira_lite_services_general_button_text', esc_html__( 'View all services', 'kira-lite' ) );
$services_general_button_url = get_theme_mod( 'kira_lite_services_general_button_url', esc_url( '#' ) );
?>
<?php if( $services_general_title || $services_general_button_text || $services_general_button_url ): ?>
	<section id="index-head-services" class="index-head services">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6">
					<?php if( $services_general_title ): ?>
							<div class="section-head dark-gray-background">
							<h3 class="medium"><?php echo esc_html( $services_general_title ); ?></h3>
						</div><!--/.section-head.dark-gray-background-->
					<?php endif; ?>
				</div><!--/.col-xs-6-->
				<div class="col-xs-6">
					<?php if( $services_general_button_text && $services_general_button_url ): ?>
						<div class="section-head white-background">
							<a class="button-two" href="<?php echo esc_url( $services_general_button_url ); ?>" title="<?php echo esc_attr( $services_general_button_text ); ?>"><?php echo esc_html( $services_general_button_text ); ?></a>
						</div><!--/.section-head.white-background-->
					<?php endif; ?>
				</div><!--/.col-xs-6-->
			</div><!--/.row-->
		</div><!--/.container-->
	</section><!--/#index-head-services.index-head.services-->
<?php endif; ?>
<section class="index-services">
	<div class="container-fluid">
		<div class="row">
			<?php
			if( is_active_sidebar( 'front-page-services-sidebar' ) ):
				dynamic_sidebar( 'front-page-services-sidebar' );
			else:
				$the_widget_args = array(
					'before_widget'	=> '<div class="col-md-4 col-sm-6">',
					'after_widget'	=> '</div><!--/.col-md-4 col-sm-6-->',
					'before_title'	=> '',
					'after_title'	=> ''
				);

				the_widget( 'Kira_Lite_Widget_Service', 'url='. esc_url( '#' ) .'&image=/layout/images/index/feature-logo-design-icon.png&title='. esc_html__( 'Logo design', 'kira-lite' ) .'&entry=' . esc_html__( 'Your brand identity is the visual representation that will influence all of your brand communication.', 'kira-lite' ), $the_widget_args );
				the_widget( 'Kira_Lite_Widget_Service', 'url='. esc_url( '#' ) .'&image=/layout/images/index/feature-web-design-icon.png&title='. esc_html__( 'Web design', 'kira-lite' ) .'&entry=' . esc_html__( 'Working with our clients to create, communicate, and fine tune brand identities.', 'kira-lite' ), $the_widget_args );
				the_widget( 'Kira_Lite_Widget_Service', 'url='. esc_url( '#' ) .'&image=/layout/images/index/feature-print-icon.png&title='. esc_html__( 'Print', 'kira-lite' ) .'&entry=' . esc_html__( 'We help our clients discover why they do what they do, then we build campaigns to deliver that message.', 'kira-lite' ), $the_widget_args );
				the_widget( 'Kira_Lite_Widget_Service', 'url='. esc_url( '#' ) .'&image=/layout/images/index/feature-web-apps-icon.png&title='. esc_html__( 'Web Apps', 'kira-lite' ) .'&entry=' . esc_html__( 'From web platforms that connect multitudes of users to native desktop apps that help an individuals solve problems.', 'kira-lite' ), $the_widget_args );
				the_widget( 'Kira_Lite_Widget_Service', 'url='. esc_url( '#' ) .'&image=/layout/images/index/feature-mobile-apps-icon.png&title='. esc_html__( 'Mobile Apps', 'kira-lite' ) .'&entry=' . esc_html__( 'Native iOS and Android apps make phones and tablets integral assets of work and play.', 'kira-lite' ), $the_widget_args );
				the_widget( 'Kira_Lite_Widget_Service', 'url='. esc_url( '#' ) .'&image=/layout/images/index/feature-desktop-apps-icon.png&title='. esc_html__( 'Desktop Apps', 'kira-lite' ) .'&entry=' . esc_html__( 'Similar to a mobile app in that neither require Internet access and a browser to run.', 'kira-lite' ), $the_widget_args );
			endif;
			?>
		</div><!--/.row-->
	</div><!--/.container-->
</section><!--/.index-services-->