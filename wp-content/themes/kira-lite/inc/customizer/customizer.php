<?php

function kira_lite_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_image'  )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_image_data'  )->transport = 'postMessage';

	/**********************************************/
	/*************** INIT ************************/
	/**********************************************/

    /* Preloader Site Panel */
    require_once get_template_directory() . '/inc/customizer/panels/preloader.php';

    /* General Site Panel */
    require_once get_template_directory() . '/inc/customizer/panels/site.php';

    /* Blog Panel */
    require_once get_template_directory() . '/inc/customizer/panels/blog.php';

    /* Jumbotron */
    require_once get_template_directory() . '/inc/customizer/panels/jumbotron.php';

    /* Services */
    require_once get_template_directory() . '/inc/customizer/panels/services.php';

    /* Works */
    require_once get_template_directory() . '/inc/customizer/panels/works.php';

    /* Team */
    require_once get_template_directory() . '/inc/customizer/panels/team.php';

    /* Contact & Blog */
    require_once get_template_directory() . '/inc/customizer/panels/contact-blog.php';

}
add_action( 'customize_register', 'kira_lite_customize_register');

/**
 *  Customizer Live Preview
 */
add_action( 'customize_preview_init', 'kira_lite_customizer_preview_js' );
function kira_lite_customizer_preview_js() {
    wp_enqueue_script( 'kira-lite-customizer-live-preview', get_template_directory_uri() . '/inc/customizer/assets/js/customizer-live-preview.js', array( 'customize-preview' ), '1.0', true );
}

/**
 *  Customizer CSS
 */
add_action('customize_controls_print_styles', 'kira_lite_customizer_css_load');
function kira_lite_customizer_css_load() {
    wp_enqueue_style( 'rl-general-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/css/kira-lite.css' );
    wp_enqueue_style( 'mt-customizer-css', get_template_directory_uri() .'/inc/customizer/assets/css/pro/pro-version.css' );
}

/**
 *  Customizer
 */
add_action( 'customize_controls_enqueue_scripts', 'kira_lite_customizer' );
function kira_lite_customizer() {
    wp_enqueue_script( 'kira-lite-customizer', get_template_directory_uri() . '/inc/customizer/assets/js/customizer.js', array( 'jquery' ), '' /* '20120206' */, true  );
}

function kira_lite_sanitize_number( $input ) {
    return force_balance_tags( $input );
}

function kira_lite_sanitize_file_url( $url ) {
    $output = '';

    $filetype = wp_check_filetype($url);
    if ($filetype["ext"]) {
        $output = esc_url($url);
    }

    return $output;
}

function kira_lite_sanitize_radio_buttons( $input, $setting ) {

    global $wp_customize;

    $control = $wp_customize->get_control( $setting->id );

    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function kira_lite_sanitize_checkbox( $value ) {
    if ($value == 1) {
        return 1;
    } else {
        return 0;
    }
}