<?php if ( 1 == $atts['override'] ) {

	echo '[class*=epc-s] .widget_social-id #es-' . esc_attr( $custom_id ) . ' li>a{background:' . esc_attr( $atts['icon_bkg_color'] ) . ' !important}[class*=epc-s] .widget_social-id #es-' . esc_attr( $custom_id ) . ' li > a:before{color:' . esc_attr( $atts['icon_color'] ) . ' !important}#es-' . esc_attr( $custom_id ) . '{background:' . esc_attr( $atts['bkg_color'] ) . ' !important}.widget_social-id h3.' . esc_attr( $custom_id ) . '-title{color:' . esc_attr( $atts['text_color'] ) . ' !important}';
} ?>
