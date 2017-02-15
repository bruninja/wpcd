		<div class="<?php echo sanitize_html_class( $custom_id ); ?>"  id="ei-<?php echo sanitize_html_class( $custom_id ); ?>">

			<?php if( ! empty( $atts[ 'img_title' ] ) ){ ?>

				<h4 class="widgettitle"><?php echo balancetags( $atts['img_title'] ); ?></h4>

			<?php } ?>

			<?php if( ! empty( $atts[ 'img_src' ] ) ){ ?>

			<a class="<?php echo sanitize_html_class( $custom_id ); ?>-img-link" id="<?php echo sanitize_html_class( $custom_id ); ?>" <?php echo ( ( 0 == $atts[ 'target' ] ) ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> href="<?php echo esc_url( $atts[ 'img_url' ] ); ?>"><img class="<?php echo sanitize_html_class( $custom_id ); ?>-img" src="<?php echo esc_url( $atts[ 'img_src' ] ); ?>" alt="<?php echo esc_attr( $atts[ 'img_alt' ] ); ?>" itemprop="image" /></a>

			<?php } ?>

		</div>
