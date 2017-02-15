(function ($) {
	"use strict";

	$(function () {
		var $capture = $( '#cw-<?php echo sanitize_html_class( $custom_id ); ?>' );
		var $capture_sidebar = $( '#after-primary' ).find( '#cw-<?php echo sanitize_html_class( $custom_id ); ?>' ).last();

		if ( $( '#cw-<?php echo $custom_id; ?>:visible' ).length ){
			$( window ).on( 'resize',function() {
				if( $( window ).width() > 700 && $( '#cw-<?php echo $custom_id; ?>.fw' ).width() < 550){
					$( '#cw-<?php echo $custom_id; ?>.fw' ).css( 'min-height','500px' ).addClass( 'ol' );
					$( '#cw-<?php echo $custom_id; ?>.fw .capture-overlay' ).show();
				} else {
					$( '#cw-<?php echo $custom_id; ?> .capture-overlay' ).hide();
				}
			}).trigger( 'resize' );
		}

	<?php if ( true == $atts['bkg_img'] ) { ?>

		function convertHexa(hex,opacity){
			var hex = hex.replace('#','');
			var r = parseInt(hex.substring(0,2), 16);
			var g = parseInt(hex.substring(2,4), 16);
			var b = parseInt(hex.substring(4,6), 16);

			var result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
			return result;
		}

		<?php if (1 == $atts['overlay'] ) { ?>

		if ( $capture.length ) {

			$capture.css(
					'background','-webkit-linear-gradient('	+ convertHexa( "<?php echo $atts['overlay_color']; ?>", 80 ) + ',' + convertHexa( "<?php echo $atts['overlay_color']; ?>", 70 ) + '), url(<?php echo $atts['bkg_img']; ?>) 50%'
				).css(
					'background','linear-gradient(' + convertHexa("<?php echo $atts['overlay_color']; ?>", 80) + ',' + convertHexa( "<?php echo $atts['overlay_color']; ?>",70) + '), url(<?php echo $atts['bkg_img']; ?>) 50%'
				).css(
					'background-size','cover'
				);
		}

		<?php } else { ?>

		if ( $capture.length ) {

			$capture.css({'background' : 'transparent url(<?php echo $atts['bkg_img']; ?>) 50%', 'background-size' : 'cover'});
		}

		<?php } ?>

	<?php } ?>

	<?php if (2 == $atts['sidebar']) { ?>

		<?php if (1 == $atts['sticky']) { ?>

		if ( $capture_sidebar.length ) {

			var $footerHeight    = $( '#footer' ).height();
			var $sidebarFooter   = $( '#sidebar-subsidiary' ).height()

			$capture_sidebar.hcSticky({
				top: 78,
				bottomEnd: $footerHeight + $sidebarFooter + 100,
				wrapperClassName: 'sticky',
				responsive: true,
				offResolutions: [-1020],
				stickTo: 'document',
			});

			$( '#zen' ).on( 'click', function (e){
				e.preventDefault();
				$capture_sidebar.hcSticky('stop');
			});
		}
		<?php } ?>

		$( '.capture-close', $capture ).on( 'click', function (e) {
			e.preventDefault();
			$capture.fadeOut( 500 );
		});

		if ( $capture.length ) {

			$( window ).on( 'resize', function () {
				if ( $capture.width() < 260 ) {
					$capture.addClass( 'tiny-sidebar' );
				} else {
					$capture.removeClass( 'tiny-sidebar' );
				}
			}).trigger( 'resize' );
		}

		<?php } ?>
	});
}(jQuery));