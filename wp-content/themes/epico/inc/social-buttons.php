<?php

/**
 * Opcoes do customizador para a area de botoes sociais
 *
 * @package		Epico
 * @subpackage	Social buttons
 * @version    1.0.0
 * @since      1.0.0
 *
 */

$social_sticky          = get_theme_mod( 'epico_socialstickybox', 1 );

$social_partial_counter = get_theme_mod( 'epico_socialpartialcount', 0 );

$social_close           = get_theme_mod( 'epico_socialclose', 1 );

$social_styles          = get_theme_mod( 'epico_socialstyles', 0 );

$social_facebook        = get_theme_mod( 'epico_socialfacebook', 1 );

$social_twitter         = get_theme_mod( 'epico_socialtwitter', 1 );

$social_google          = get_theme_mod( 'epico_socialgoogle', 1 );

$social_linkedin        = get_theme_mod( 'epico_sociallinkedin', 1 );

$social_pinterest       = get_theme_mod( 'epico_socialpinterest', 1 );

$social_whatsapp        = get_theme_mod( 'epico_socialwhatsapp', 1 );

$content                = get_the_content(''); ?>

<div <?php if ( $social_sticky == 1 ) { ?> id="social-bar-sticky" <?php } ?> class="social-bar">

	<ul class="social-likes social-likes_notext <?php if ( $social_styles == 0 ) { ?>social-likes-colorful<?php } ?>" <?php if ( $social_partial_counter == 0 ) { ?>data-counters="no"<?php } ?>>

		<?php if ( $social_facebook == 1 ) { ?>

			<li class="facebook" title="<?php _e( 'Share on Facebook', 'epico' ); ?>"></li>

		<?php } ?>

		<?php if ( $social_twitter == 1 ) { ?>

			<li class="twitter" title="<?php _e( 'Share on Twitter', 'epico' ); ?>"></li>

		<?php } ?>

		<?php if ( $social_google == 1 ) { ?>

			<li class="plusone" title="<?php _e( 'Share on Google+', 'epico' ); ?>"></li>

		<?php } ?>

		<?php if ( $social_pinterest == 1 ) { ?>

		<?php
			$thumb_id        = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src( $thumb_id, 'thumbnail-size', true );
			$thumb_url       = $thumb_url_array[0];
		?>

			<li class="pinterest" data-media="<?php echo esc_url( $thumb_url ); ?>" title="<?php _e( 'Share on Pinterest', 'epico' ); ?>"></li>

		<?php } ?>

		<?php if ( $social_linkedin == 1 ) { ?>

			<li class="linkedin" title="<?php _e( 'Share on LinkedIn', 'epico' ); ?>"></li>

		<?php } ?>

		<?php $detect = new Epico_Mobile_Detect; // mobile-detect/mobile-detect.php

		 if ( $social_whatsapp == 1 && $detect->isMobile() && ! $detect->isTablet()) { ?>

			<li class="social-likes__widget social-likes__widget_whatsapp" title="<?php _e( 'Share via WhatsApp', 'epico' ); ?>">

				<a href="whatsapp://send?text=<?php echo urlencode( get_the_title() ) . '%20-%20' .  urlencode( esc_url( get_permalink() ) ) . '%3Futm_source%3DWhatsApp%26utm_medium%3Dartigo%26utm_campaign%3Dwhatsapp"'; ?>">
					<span class="social-likes__button social-likes__button_whatsapp">
						<span class="social-likes__icon social-likes__icon_whatsapp"></span>
					</span>
				</a>
			</li>

		<?php } ?>

	</ul>

	<?php if ( $social_close == 1 ) { ?>

		<span id="social-close" aria-hidden="true"><i class="fa fa-times-circle fadein"></i></span>

	<?php } ?>

</div>
