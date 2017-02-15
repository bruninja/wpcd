<?php

    // Include Custom Controls
    require get_template_directory() . '/inc/customizer/custom-controls/radio-img-selector.php';
    require get_template_directory() . '/inc/customizer/custom-controls/pro-controls-selector.php';

    // Set Panel ID
    $panel_id = 'kira_lite_panel_general';

    // Set prefix
    $prefix = 'kira_lite';

    // Change panel for Site Title & Tagline Section
    $site_title1        = $wp_customize->get_section( 'title_tagline' );
    $site_title1->panel = $panel_id;

    // Remove sections from customizer front-view
    $wp_customize->remove_section('colors');

    // Change panel for Background Image
    $site_title2        = $wp_customize->get_section( 'background_image' );
    $site_title2->panel = $panel_id;

    // Change panel for Static Front Page
    $site_title3        = $wp_customize->get_section( 'static_front_page' );
    $site_title3->panel = $panel_id;


    // Change priority for Site Title
    $site_title4           = $wp_customize->get_control( 'blogname' );
    $site_title4->priority = 15;

    // Change priority for Site Tagline
    $site_title5           = $wp_customize->get_control( 'blogdescription' );
    $site_title5->priority = 17;


    /***********************************************/
    /************** GENERAL OPTIONS  ***************/
    /***********************************************/


    $wp_customize->add_panel( $panel_id,
        array(
            'priority' => 29,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'General Options', 'kira-lite' ),
            'description' => esc_html__('You can change the site layout in this area as well as your contact details (the ones displayed in the header & footer) ', 'kira-lite'),
        )
    );

    /***********************************************/
    /************** General Site Settings  ***************/
    /***********************************************/

    /* Logo */
    $wp_customize->add_section( $prefix.'_general_section' ,
        array(
            'title'       => esc_html__( 'Logo', 'kira-lite' ),
            'priority'    => 2,
            'panel' 	  => $panel_id
        )
    );


    /* Company text logo */
    $wp_customize->add_setting($prefix.'_text_logo',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('Kira Lite', 'kira-lite'),
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix.'_text_logo',
        array(
            'label' 		=> esc_html__('Enter company name', 'kira-lite'),
            'description'   => esc_html__('This field is best used when you don\'t have a professional image logo', 'kira-lite'),
            'section' 		=> $prefix.'_general_section',
            'priority' 		=> 2
        )
    );

    /* Company image logo */
    $wp_customize->add_setting(
        $prefix . '_img_logo',
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => get_template_directory_uri() . '/layout/images/header-logo.png',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, $prefix . '_img_logo',
            array(
                'label'     => __( 'Image Site Logo', 'kira-lite' ),
                'section'   => $prefix.'_general_section',
                'settings'  => $prefix . '_img_logo',
                'priority'  => 2
            )
        )
    );


    /***********************************************/
    /************** Contact Details  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_general_contact_section' ,
        array(
            'title'       => esc_html__( 'Contact Details', 'kira-lite' ),
            'description' => esc_html__( 'These are the contact details displayed in the header & footer of the website.', 'kira-lite' ),
            'priority'    => 3,
            'panel' => $panel_id
        )
    );

	/* Facebook URL */
	$wp_customize->add_setting( 'kira_lite_contact_bar_facebook_url',
		array(
			'sanitize_callback'  => 'esc_url',
			'default'            => esc_url('#'),
            'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( 'kira_lite_contact_bar_facebook_url',
		array(
			'label'          => esc_html__( 'Facebook URL', 'kira-lite' ),
			'description'    => esc_html__('Will be displayed in the contact bar ( Header )', 'kira-lite'),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => 'kira_lite_contact_bar_facebook_url',
			'priority'       => 10
		)
	);

	/* Twitter URL */
	$wp_customize->add_setting( $prefix.'_contact_bar_twitter_url',
		array(
			'sanitize_callback'  => 'esc_url',
			'default'            => esc_html('#'),
            'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_contact_bar_twitter_url',
		array(
			'label'          => esc_html__( 'Twitter URL', 'kira-lite' ),
			'description'    => esc_html__('Will be displayed in the contact bar ( Header )', 'kira-lite'),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => $prefix.'_contact_bar_twitter_url',
			'priority'       => 10
		)
	);

	/* YouTube URL */
	$wp_customize->add_setting( $prefix.'_contact_bar_youtube_url',
		array(
			'sanitize_callback'  => 'esc_url',
			'default'            => esc_html('#'),
            'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_contact_bar_youtube_url',
		array(
			'label'          => esc_html__( 'YouTube URL', 'kira-lite' ),
			'description'    => esc_html__('Will be displayed in the contact bar ( Header )', 'kira-lite'),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => $prefix.'_contact_bar_youtube_url',
			'priority'       => 10
		)
	);

	/* Pinterest URL */
	$wp_customize->add_setting( $prefix.'_contact_bar_pinterest_url',
		array(
			'sanitize_callback'  => 'esc_url',
			'default'            => esc_html('#'),
            'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_contact_bar_pinterest_url',
		array(
			'label'          => esc_html__( 'Pinterest URL', 'kira-lite' ),
			'description'    => esc_html__('Will be displayed in the contact bar ( Header )', 'kira-lite'),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => $prefix.'_contact_bar_pinterest_url',
			'priority'       => 10
		)
	);

	/* LinkedIN URL */
	$wp_customize->add_setting( $prefix.'_contact_bar_linkedin_url',
		array(
			'sanitize_callback'  => 'esc_url',
			'default'            => esc_html('#'),
            'transport'          => 'postMessage'
		)
	);

	$wp_customize->add_control( $prefix.'_contact_bar_linkedin_url',
		array(
			'label'          => esc_html__( 'LinkedIN URL', 'kira-lite' ),
			'description'    => esc_html__('Will be displayed in the contact bar ( Header )', 'kira-lite'),
			'section'        => $prefix.'_general_contact_section',
			'settings'       => $prefix.'_contact_bar_linkedin_url',
			'priority'       => 10
		)
	);

    // Instagram
    $wp_customize->add_setting( $prefix.'_contact_bar_instagram_url',
        array(
            'sanitize_callback'  => 'esc_url',
            'default'            => esc_url( '#' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( $prefix.'_contact_bar_instagram_url',
        array(
            'label'          => esc_html__( 'Instagram URL', 'kira-lite' ),
            'description'    => esc_html__('Will be displayed in the contact bar ( Header )', 'kira-lite'),
            'section'        => $prefix.'_general_contact_section',
            'settings'       => $prefix.'_contact_bar_instagram_url',
            'priority'       => 11
        )
    );


	/* email */
    $wp_customize->add_setting( $prefix.'_email',
        array(
            'sanitize_callback'  => 'sanitize_email',
            'default'            => esc_html__( 'contact@site.com', 'kira-lite' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( $prefix.'_email',
        array(
            'label'         => esc_html__( 'Email addr.', 'kira-lite' ),
            'description'   => esc_html__('Will be displayed in the header & footer', 'kira-lite'),
            'section'       => $prefix.'_general_contact_section',
            'settings'      => $prefix.'_email',
            'priority'      => 12
        )
    );


    /* phone number */
    $wp_customize->add_setting( $prefix.'_phone',
        array(
            'sanitize_callback'  => $prefix.'_sanitize_number',
            'default'            => esc_html__( '(555) 555-5555', 'kira-lite' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control( $prefix.'_phone',
        array(
            'label'         => esc_html__( 'Phone number', 'kira-lite' ),
            'description'   => esc_html__('Will be displayed in the header & footer', 'kira-lite'),
            'section'       => $prefix.'_general_contact_section',
            'settings'      => $prefix.'_phone',
            'priority'      => 13
        )
    );

    // Address 1
    $wp_customize->add_setting(
        $prefix . '_address1',
        array(
            'sanitize_callback'  => 'sanitize_text_field',
            'default'            => esc_html__( 'Sherman Dr Street', 'kira-lite' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix . '_address1',
        array(
            'label'     => esc_html__( 'Address 1', 'kira-lite' ),
            'section'   => $prefix . '_general_contact_section',
            'priority'  => 14
        )
    );

    // Address 2
    $wp_customize->add_setting(
        $prefix . '_address2',
        array(
            'sanitize_callback'  => 'sanitize_text_field',
            'default'            => esc_html__( '1081 JJ New York USA', 'kira-lite' ),
            'transport'          => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix . '_address2',
        array(
            'label'     => esc_html__( 'Address 2', 'kira-lite' ),
            'section'   => $prefix . '_general_contact_section',
            'priority'  => 15
        )
    );

    /***********************************************/
    /************** Footer Details  ***************/
    /***********************************************/
    $wp_customize->add_section( $prefix.'_general_footer_section' ,
        array(
            'title'       => esc_html__( 'Footer Details', 'kira-lite' ),
            'description' => esc_html__( 'Change the footer copyright message from here. Note: no HTML allowed.', 'kira-lite'),
            'priority'    => 4,
            'panel' => $panel_id
        )
    );

    /* Enable Social Icons */
    $wp_customize->add_setting( $prefix.'_footer_enable_social_icons',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix.'_footer_enable_social_icons',
        array(
            'type'          => 'checkbox',
            'label'         => esc_html__('Enable Social Icons?', 'kira-lite'),
            'description'   => esc_html__('This option will disable the social icons from footer.', 'kira-lite'),
            'section'       => $prefix.'_general_footer_section',
        )
    );

    /* Footer Copyright */
    $wp_customize->add_setting(
        $prefix . '_footer_copyright',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => '<a href="https://www.machothemes.com/themes/kira-lite/">' . esc_html( 'Kira Lite', 'kira-lite') . '</a>' . esc_html(' - all rights reserved.', 'kira-lite') . esc_html(' Built by: ','kira-lite') . '<a href="https://www.machothemes.com/" title="Professional Responsive WordPress Themes" rel="dofollow">' . esc_html('Macho Themes', 'kira-lite') . '</a>',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix . '_footer_copyright',
        array(
            'type'      => 'textarea',
            'label'     => esc_html__( 'Footer Copyright', 'kira-lite' ),
            'section'   => $prefix . '_general_footer_section',
            'priority'  => 11
        )
    );

    /* Footer Image Logo */
    $wp_customize->add_setting(
        $prefix . '_img_footer_logo',
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => get_template_directory_uri() . '/layout/images/footer-logo.png',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, $prefix . '_img_footer_logo',
            array(
                'label'     => __( 'Image Site Logo', 'kira-lite' ),
                'section'   => $prefix.'_general_footer_section',
                'settings'  => $prefix . '_img_footer_logo',
                'priority'  => 12
            )
        )
    );