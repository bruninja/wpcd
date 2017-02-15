<?php
/**
 *	The template for dispalying the team in front page.
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<?php
$general_title = get_theme_mod( 'kira_lite_team_general_title', esc_html__( 'Who we are...', 'kira-lite' ) );
$general_button_text = get_theme_mod( 'kira_lite_team_general_button_text', esc_html__( 'View open jobs', 'kira-lite' ) );
$team_general_button_url = get_theme_mod( 'kira_lite_team_general_button_url', esc_url( '#' ) );
?>
<?php if( $general_title || $general_button_text || $team_general_button_url ): ?>
	<section id="index-head-jobs" class="index-head jobs">
		<div class="container-fluid">
			<div class="row white">
				<div class="col-xs-6">
					<?php if( $general_title ): ?>
						<div class="section-head dark-gray-background">
							<h3 class="medium"><?php echo esc_html( $general_title ); ?></h3>
						</div><!--/.section-head.dark-gray-background-->
					<?php endif; ?>
				</div><!--/.col-xs-6-->
				<div class="col-xs-6">
					<?php if( $general_button_text && $team_general_button_url ): ?>
						<div class="section-head white-background">
							<a class="button-two" href="<?php echo esc_url( $team_general_button_url ); ?>" title="<?php echo esc_attr( $general_button_text ); ?>"><?php echo esc_html( $general_button_text ); ?></a>
						</div><!--/.section-head.white-background-->
						<div class="out-right white">
						</div><!--/.out-right.white-->
					<?php endif; ?>
				</div><!--/.col-xs-6-->
			</div><!--/.row.white-->
		</div><!--/.container-->
	</section><!--/#index-head-jobs.index-head.jobs-->
<?php endif; ?>
<section class="index-team">
	<div class="container-fluid">
		<div class="row">
			<?php
			if( is_active_sidebar( 'front-page-team-sidebar' ) ):
				dynamic_sidebar( 'front-page-team-sidebar' );
			else:
				$the_widget_args = array(
					'before_widget'	=> '<div class="col-md-4 col-xs-6">',
					'after_widget'	=> '</div><!--/.col-md-4 col-xs-6-->',
					'before_title'	=> '',
					'after_title'	=> ''
				);

				the_widget( 'Kira_Lite_Widget_Member', 'image=/layout/images/index/person-image1.jpg&name='. esc_html__( 'Ethan Hudson', 'kira-lite' ) .'&position='. esc_html__( 'Developer', 'kira-lite' ) .'&twitter_url='. esc_url( '#' ) .'&facebook_url='. esc_url( '#' ) .'&github_url='. esc_url( '#' ) .'&email=' . esc_html__( 'contact@machothemes.com', 'kira-lite' ), $the_widget_args );
				the_widget( 'Kira_Lite_Widget_Member', 'image=/layout/images/index/person-image2.jpg&name='. esc_html__( 'Dora Cruz', 'kira-lite' ) .'&position='. esc_html__( 'Designer', 'kira-lite' ) .'&twitter_url='. esc_url( '#' ) .'&facebook_url='. esc_url( '#' ) .'&github_url='. esc_url( '#' ) .'&email=' . esc_html__( 'contact@machothemes.com', 'kira-lite' ), $the_widget_args );
				the_widget( 'Kira_Lite_Widget_Member', 'image=/layout/images/index/person-image3.jpg&name='. esc_html__( 'Kurt James', 'kira-lite' ) .'&position='. esc_html__( 'Designer', 'kira-lite' ) .'&twitter_url='. esc_url( '#' ) .'&facebook_url='. esc_url( '#' ) .'&github_url='. esc_url( '#' ) .'&email=' . esc_html__( 'contact@machothemes.com', 'kira-lite' ), $the_widget_args );
			endif;
			?>
		</div><!--/.row-->
	</div><!--/.container-->
</section><!--/.index-team-->