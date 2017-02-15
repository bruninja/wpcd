<?php
/*
 * Cria a secao `Avancado`, com os respectivos campos.
 */

function epico_advanced_customizer( $wp_customize ) {

	$fields = array();

	// Adiciona a seção `Avancado`
	$wp_customize->add_section( 'advanced', array(
		'title'    => esc_attr__( 'Advanced', 'epico' ),
		'priority' => 50
	) );

}
add_action( 'customize_register', 'epico_advanced_customizer' );

// CAMPOS

function epico_advanced_customizer_settings( $fields ) {

	// Codigo CSS personalizado
	$fields[] = array(
		'type'        => 'code',
		'settings'    => 'epico_custom_css',
		'label'       => esc_attr__( 'Custom CSS', 'epico' ),
		'description' => esc_attr__( 'Add custom CSS styles if needed.', 'epico' ),
		'help'        => esc_attr__( 'These styles will be included in the Head tag in your HTML.', 'epico' ),
		'section'     => 'advanced',
		'default'     => '',
		'priority'    => 10,
		'choices'     => array(
			'language' => 'css',
			'label'    => esc_attr__( 'Open CSS editor', 'epico' ),
			'theme'    => 'monokai',
		),
	);

	// Codigo Javascript personalizado
	$fields[] = array(
		'type'        => 'code',
		'settings'    => 'epico_custom_js',
		'label'       => esc_attr__( 'Custom Javascript', 'epico' ),
		'description' => esc_attr__( 'Add custom Javascript if needed.', 'epico' ),
		'help'        => esc_attr__( 'The Javascript snippet will be included before the end of the Body tag in your HTML.', 'epico' ),
		'section'     => 'advanced',
		'default'     => '',
		'priority'    => 20,
		'choices'     => array(
			'language' => 'js',
			'label'    => esc_attr__( 'Open JS editor', 'epico' ),
			'theme'    => 'monokai',
		),
	);

	// Ignora estilos do Epico em paginas
	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'epico_page_ids',
		'label'       => esc_attr__( 'Ignore styles in pages', 'epico' ),
		'description' => esc_attr__( 'If you want to remove theme styles from certain pages to avoid conflicts with page builder plugins, select below the pages that should be ignored by the Epico theme.', 'epico' ),
		'help'        => esc_attr__( 'If you use some kind of page builder plugin to create pages, please identify this pages here. This will remove all Epico styles in these pages. This setting works only for pages, not posts.', 'epico' ),
		'section'     => 'advanced',
		'default'     => null,
		'priority'    => 30,
		'multiple'    => 999,
		'choices'     => Kirki_Helper::get_posts( array(
			'post_type'      => 'page',
			'orderby'        => 'modified',
			'posts_per_page' => - 1
		) ),
	);

	// Campo Google Tag Manager
	$fields[] = array(
		'type'              => 'text',
		'settings'          => 'epico_gtm',
		'label'             => esc_attr__( 'Google Tag Manager', 'epico' ),
		'description'       => esc_attr__( 'If you want to track user behaviour in your website using the free Google Tag Manager, paste your GTM ID in the field below, in the following format: GTM-AB123CD.', 'epico' ),
		'help'              => esc_attr__( 'The Google Tag Manager is a free tool from Google that allows digital marketing professionals manage their campaigns with more independence from developers, offering powerful tools to track user behaviour in your website.', 'epico' ),
		'section'           => 'advanced',
		'sanitize_callback' => 'wp_kses_post',
		'default'           => '',
		'priority'          => 40,
	);

	// Controle do numero de comentarios
	$fields[] = array(
		'type'        => 'slider',
		'settings'    => 'epico_comment_threshold',
		'label'       => esc_attr__( 'Threshold for number of comments', 'epico' ),
		'description' => esc_attr__( 'Choose a threshold from which the number of comments will appear in your content.', 'epico' ),
		'help'        => esc_attr__( 'Here you can choose to display the number of comments in your posts only after a certain threshold is reached. Note: this does not work with the Facebook Comments plugin.', 'epico' ),
		'section'     => 'advanced',
		'default'     => 0,
		'priority'    => 50,
		'choices'     => array(
			'min'  => '0',
			'max'  => '30',
			'step' => '1',
		),
	);

	return $fields;
}

add_filter( 'kirki/controls', 'epico_advanced_customizer_settings' );
