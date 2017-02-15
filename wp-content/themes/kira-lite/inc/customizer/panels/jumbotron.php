<?php
// Prefix
$prefix = 'kira_lite';

/**
 *	Header Image
 */
$wp_customize->get_section( 'header_image' )->priority = 29;
$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Jumbotron', 'kira-lite' );

// Title
$wp_customize->add_setting( $prefix . '_header_image_title',
	array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'			=> esc_html__( 'We are Kira', 'kira-lite' ),
		'transport'			=> 'postMessage'
	)
);

$wp_customize->add_control(
	$prefix . '_header_image_title',
	array(
		'label'			=> esc_html__( 'Title', 'kira-lite' ),
		'section'		=> 'header_image',
		'priority'		=> 10
	)
);

// Entry
$wp_customize->add_setting( $prefix . '_header_image_entry',
	array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'			=> esc_html__( 'The perfect, flexible, one-page theme just got upgraded Presenting, WooCommerce Support for WP.', 'kira-lite' ),
		'transport'			=> 'postMessage'
	)
);

$wp_customize->add_control(
	$prefix . '_header_image_entry',
	array(
		'label'			=> esc_html__( 'Entry', 'kira-lite' ),
		'section'		=> 'header_image',
		'priority'		=> 11,
		'type'			=> 'textarea'
	)
);

// Enable box
$wp_customize->add_setting(
	$prefix . '_header_image_enable_right_box',
	array(
		'sanitize_callback'	=> $prefix . '_sanitize_checkbox',
		'default'			=> 1,
		'transport'			=> 'postMessage'
	)
);

$wp_customize->add_control(
	$prefix . '_header_image_enable_right_box',
	array(
		'type'				=> 'checkbox',
		'label'				=> esc_html__( 'Show right box?', 'kira-lite' ),
		'section'			=> 'header_image',
		'priority'			=> 11
	)
);

// Box Entry
$wp_customize->add_setting( $prefix . '_header_image_box_entry',
	array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'			=> esc_html__( 'Building online products and companies for 20 years.', 'kira-lite' ),
		'transport'			=> 'postMessage'
	)
);

$wp_customize->add_control(
	$prefix . '_header_image_box_entry',
	array(
		'label'			=> esc_html__( 'Box Entry', 'kira-lite' ),
		'section'		=> 'header_image',
		'priority'		=> 11,
		'type'			=> 'textarea'
	)
);

// Box Button Text
$wp_customize->add_setting( $prefix . '_header_image_box_button_text',
	array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'			=> esc_html__( 'Read more about us', 'kira-lite' ),
		'transport'			=> 'postMessage'
	)
);

$wp_customize->add_control(
	$prefix . '_header_image_box_button_text',
	array(
		'label'			=> esc_html__( 'Box Button Text', 'kira-lite' ),
		'section'		=> 'header_image',
		'priority'		=> 12
	)
);

// Box Button URL
$wp_customize->add_setting( $prefix . '_header_image_box_button_url',
	array(
		'sanitize_callback'	=> 'esc_url',
		'default'			=> esc_url( '#' )
	)
);

$wp_customize->add_control( $prefix . '_header_image_box_button_url',
	array(
		'label'			=> esc_html__( 'Box Button URL', 'kira-lite' ),
		'section'		=> 'header_image',
		'settings'		=> $prefix . '_header_image_box_button_url',
		'priority'		=> 13
	)
);