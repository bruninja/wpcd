<?php

	// requires
	require get_template_directory() . '/inc/customizer/custom-controls/pro-controls-selector.php';

    // Set Panel ID
    $panel_id = 'kira_lite_panel_preloader';

    // Set prefix
    $prefix = 'kira_lite';

// @todo: add preloader text font-family control

    /***********************************************/
    /************** GENERAL OPTIONS  ***************/
    /***********************************************/


    $wp_customize->add_panel( $panel_id,
        array(
            'priority' => 28,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Preloader Options', 'kira-lite' ),
            'description' => esc_html__('This panel allows you to control the way the site pre-loader looks', 'kira-lite'),
        )
    );

    /* Layout */
    $wp_customize->add_section( $prefix.'_preloader_general_section' ,
        array(
            'title'       => esc_html__( 'General', 'kira-lite' ),
            'description' => esc_html__( 'Change pre-loader text color, background-color as well as the text message that\'s being displayed.', 'kira-lite'),
            'panel' 	  => $panel_id
        )
    );

    /* Enable Site Preloader*/
    $wp_customize->add_setting(
        $prefix . '_enable_site_preloader',
        array(
            'sanitize_callback' => $prefix . '_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix . '_enable_site_preloader',
        array(
            'type'              => 'checkbox',
            'label'             => esc_html__( 'Enable site preloader', 'kira-lite' ),
            'section'           => $prefix . '_preloader_general_section',
        )
    );

    /* Preloader Text */
    $wp_customize->add_setting($prefix.'_preloader_text',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('Loading', 'kira-lite'),
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix.'_preloader_text',
        array(
            'label'         => esc_html__('Preloader text', 'kira-lite'),
            'description'   => esc_html__('Current text: Loading.', 'kira-lite'),
            'section'       => $prefix.'_preloader_general_section',
        )
    );

    /* Preloader BG Color */
    $wp_customize->add_setting($prefix.'_preloader_bg_color',
        array(
            'sanitize_callback' => 'sanitize_hex_color',
            'default'           => '#FFF',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
    $prefix.'_preloader_bg_color',
            array(

                'label' 		=> esc_html__('Preloader background color', 'kira-lite'),
                'description'   => esc_html__('Current color: #FFF (white) ', 'kira-lite'),
                'section' 		=> $prefix.'_preloader_general_section',
            )
        )
    );

    /* Preloader Text Color */
    $wp_customize->add_setting($prefix.'_preloader_text_color',
        array(
            'sanitize_callback' => 'sanitize_hex_color',
            'default'           => '#000',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
        $prefix.'_preloader_text_color',
            array(
                'label' 		=> esc_html__('Preloader text color', 'kira-lite'),
                'description'   => esc_html__('Current color: #000 (black) ', 'kira-lite'),
                'section' 		=> $prefix.'_preloader_general_section',
            )
        )
    );