<?php
/**
 *	The template for displaying the subheader in front page.
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>

<?php if( get_header_image() ): ?>
	<?php
	$header_image_title = get_theme_mod( 'kira_lite_header_image_title', esc_html__( 'We are Kira', 'kira-lite' ) );
	$header_image_entry = get_theme_mod( 'kira_lite_header_image_entry', esc_html__( 'The perfect, flexible, one-page theme just got upgraded Presenting, WooCommerce Support for WP.', 'kira-lite' ) );
	$header_image_enable_right_box = get_theme_mod( 'kira_lite_header_image_enable_right_box', 1 );
	$header_image_box_entry = get_theme_mod( 'kira_lite_header_image_box_entry', esc_html__( 'Building online products and companies for 20 years.', 'kira-lite' ) );
	$header_image_box_button_text = get_theme_mod( 'kira_lite_header_image_box_button_text', esc_html__( 'Read more about us', 'kira-lite' ) );
	$header_image_box_button_url = get_theme_mod( 'kira_lite_header_image_box_button_url', esc_url( '#' ) );
	?>
	<section class="bottom-header">
		<div class="header-carousel1">
			<div class="carousel1-slides">
				<div class="slide" style="background-image: url('<?php echo esc_url( get_header_image() ); ?>');"></div>
			</div><!--/.carousel1-slides-->
		</div><!--/.header-carousel1-->
		<?php if( $header_image_enable_right_box == 1 ): ?>
			<div class="header-carousel2 mobile">
				<div class="carousel2-slides">
					<div class="slide">
						<?php if( $header_image_box_entry ): ?>
							<p><?php echo esc_html( $header_image_box_entry ); ?></p>
						<?php endif; ?>
						<?php if( $header_image_box_button_text && $header_image_box_button_url ): ?>
							<a class="button-one" href="<?php echo esc_url( $header_image_box_button_url ); ?>" title="<?php echo esc_attr( $header_image_box_button_text ); ?>"><?php echo esc_html( $header_image_box_button_text ); ?></a>
						<?php endif; ?>
					</div><!--/.slide-->
				</div><!--/.carousel2-slides-->
				<div class="out-right watermelon">
				</div><!--/.out-right.watermelon-->
			</div><!--/.header-carousel2-->
		<?php endif; ?>
		<div class="container-fluid">
			<div class="row">
				<?php if( $header_image_title || $header_image_entry ): ?>
					<div class="<?php if( $header_image_enable_right_box == 0 ): echo 'col-sm-12'; elseif( $header_image_enable_right_box == 1 ): echo 'col-sm-6'; endif; ?>">
						<?php if( $header_image_title ): ?>
							<h1><?php echo esc_html( $header_image_title ); ?></h1>
						<?php endif; ?>
						<?php if( $header_image_entry ): ?>
							<h2><?php echo esc_html( $header_image_entry ); ?></h2>
						<?php endif; ?>
					</div><!--/.col-sm-6-->
				<?php endif; ?>

				<?php if( $header_image_enable_right_box == 1 ): ?>
					<div class="col-sm-6">
						<div class="header-carousel2">
							<div class="carousel2-slides">
								<div class="slide">
									<?php if( $header_image_box_entry ): ?>
										<p><?php echo esc_html( $header_image_box_entry ); ?></p>
									<?php endif; ?>
									<?php if( $header_image_box_button_text && $header_image_box_button_url ): ?>
										<a class="button-one" href="<?php echo esc_url( $header_image_box_button_url ); ?>" title="<?php echo esc_attr( $header_image_box_button_text ); ?>"><?php echo esc_html( $header_image_box_button_text ); ?></a>
									<?php endif; ?>
								</div><!--/.slide-->
							</div><!--/.carousel2-slides-->
							<div class="out-right watermelon">
							</div><!--/.out-right.watermelon-->
						</div><!--/.header-carousel2-->
					</div><!--/.col-sm-6-->
				<?php endif; ?>
			</div><!--/.row-->
		</div><!--/.container-->
	</section><!--/.bottom-header-->
<?php endif; ?>