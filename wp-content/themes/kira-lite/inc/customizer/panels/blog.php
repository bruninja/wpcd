<?php

    // includes
    require get_template_directory() . '/inc/customizer/custom-controls/slider-selector.php';
	require get_template_directory() . '/inc/customizer/custom-controls/pro-controls-selector.php';

    // Set Panel ID
    $panel_id = 'kira_lite_panel_blog';

    // Set prefix
    $prefix = 'kira_lite';

    /***********************************************/
    /************** BLOG OPTIONS  ***************/
    /***********************************************/


    $wp_customize->add_panel( $panel_id,
        array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Single Post Options', 'kira-lite' ),
            'description' => esc_html__( 'Control various blog options from here. Most of the options from this panel refer to the blog single page view. If you\'re not familiar with that term, please perform a Google search.', 'kira-lite' ),
        )
    );

    /***********************************************/
    /************** Global Blog Settings  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_blog_global_section' ,
        array(
            'title'       => esc_html__( 'Global', 'kira-lite' ),
            'description' => esc_html__( 'This section allows you to control how certain elements are displayed on the blog single page.', 'kira-lite' ),
            'panel' 	  => $panel_id
        )
    );

    // Default Image
    $wp_customize->add_setting(
        $prefix . '_blog_global_section_default_image',
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => get_template_directory_uri() . '/layout/images/index/carousel-image1.jpg',
            'transport'         => 'refresh'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, $prefix . '_blog_global_section_default_image',
            array(
                'label'         => __( 'Default Image', 'kira-lite' ),
                'description'   => __( 'This image will be show if the featured image has not been added in post or page.', 'kira-lite' ),
                'section'       => $prefix . '_blog_global_section',
                'settings'      => $prefix . '_blog_global_section_default_image'
            )
        )
    );

    /* Posted on on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_posted_on_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_post_posted_on_blog_posts',
        array(
            'type'	         => 'checkbox',
            'label'         => esc_html__('Posted on meta on single blog post', 'kira-lite'),
            'description'   => esc_html__('This will disable the posted on zone as well as the author name', 'kira-lite'),
            'section'       => $prefix.'_blog_global_section',
        )
    );

    /* Post Category on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_category_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_post_category_blog_posts',
        array(
            'type'          => 'checkbox',
            'label'         => esc_html__('Category meta on single blog post', 'kira-lite'),
            'description'   => esc_html__('This will disable the posted in zone.', 'kira-lite'),
            'section'       => $prefix.'_blog_global_section',
        )
    );



    /* Post Tags on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_tags_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_post_tags_blog_posts',
        array(
            'type'          => 'checkbox',
            'label'         => esc_html__('Tags meta on single blog post', 'kira-lite'),
            'description'   => esc_html__('This will disable the tagged with zone.', 'kira-lite'),
            'section'       => $prefix.'_blog_global_section',
        )
    );

    /* Post Comments on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_comments_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix.'_enable_post_comments_blog_posts',
        array(
            'type'          => 'checkbox',
            'label'         => esc_html__('Coments meta on single blog post', 'kira-lite'),
            'description'   => esc_html__('This will disable the comments header zone.', 'kira-lite'),
            'section'       => $prefix.'_blog_global_section',
        )
    );


    /* Breadcrumbs on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_breadcrumbs',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix.'_enable_post_breadcrumbs',
        array(
            'type'          => 'checkbox',
            'label'         => esc_html__('Breadcrumbs on single blog posts', 'kira-lite'),
            'description'   => esc_html__('This will disable the breadcrumbs', 'kira-lite'),
            'section'       => $prefix.'_blog_global_section',
        )
    );

    /* Author Info Box on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_author_box_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_author_box_blog_posts',
        array(
            'type'          => 'checkbox',
            'label'         => esc_html__('Author info box on single blog post', 'kira-lite'),
            'description'   => esc_html__('Displayed right at the end of the post', 'kira-lite'),
            'section'       => $prefix.'_blog_global_section',
        )
    );

    /***********************************************/
    /************** Breadcrumb Settings  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_blog_breadcrumb_section' ,
        array(
            'title'       => esc_html__( 'Breadcrumbs', 'kira-lite' ),
            'description' => esc_html__( 'Various breadcrumb related settings, like: breadcrumb prefix, breadcrumb item separator & breadcrumb menu post category visibility setting.', 'kira-lite'),
            'panel' 	  => $panel_id
        )
    );


    /* BreadCrumb Menu:  Prefix */
    $wp_customize->add_setting($prefix.'_blog_breadcrumb_menu_prefix',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => __( 'You are here', 'kira-lite' ),
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix.'_blog_breadcrumb_menu_prefix',
        array(
            'label'         => esc_html__('Text before the breadcrumbs menu', 'kira-lite'),
            'description'   => esc_html__('Recommended: You are here','kira-lite'),
            'section'       => $prefix.'_blog_breadcrumb_section',
        )
    );

    /* BreadCrumb Menu:  separator */
    $wp_customize->add_setting($prefix.'_blog_breadcrumb_menu_separator',
        array(
            'sanitize_callback' => $prefix.'_sanitize_radio_buttons',
            'default'           => 'rarr',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix.'_blog_breadcrumb_menu_separator',
        array(
            'type'          => 'select',
            'choices'       => array(
                'rarr'      => esc_html('&rarr;'),
                'middot'    => esc_html('&middot;'),
                'diez'      => esc_html('&#35;'),
                'ampersand' => esc_html('&#38;'),
            ),
            'label'         => esc_html__('Separator to be used between breadcrumb items', 'kira-lite'),
            'description'   => esc_html__('HTML accepted here', 'kira-lite'),
            'section'       => $prefix.'_blog_breadcrumb_section',
        )
    );

    /* BreadCrumb Menu:  post category */
    $wp_customize->add_setting(
        $prefix . '_blog_breadcrumb_menu_post_category',
        array(
            'sanitize_callback' => $prefix . '_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix . '_blog_breadcrumb_menu_post_category',
        array(
            'type'              => 'checkbox',
            'label'             => esc_html__( 'Show post category?', 'kira-lite' ),
            'description'       => esc_html__( 'Show the post category in the breadcrumb?', 'kira-lite' ),
            'section'           => $prefix . '_blog_breadcrumb_section',
        )
    );