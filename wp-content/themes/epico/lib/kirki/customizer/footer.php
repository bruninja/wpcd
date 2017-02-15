<?php
/*
 * Cria a secao `Informacoes do Rodape`, com os respectivos campos.
 */

function epico_footer_customizer( $wp_customize ){

	$fields = array();

	// Create the "footer" section
	$wp_customize->add_section( 'footer', array(
		'title'    => esc_attr__( 'Footer information', 'epico' ),
		'priority' => 40
	) );

}
add_action( 'customize_register', 'epico_footer_customizer' );

// CAMPOS

function epico_footer_customizer_settings( $fields ){

	// Texto do rodape
	$fields[] = array(
		'type'     => 'textarea',
		'settings' => 'epico_footer_txt',
		'label'    => esc_attr__( 'Add additional information', 'epico' ),
		'help'     => esc_attr__( 'Add optional credits or other subsidiary information in the site footer. If you need a link in that area, you can use the footer menu, accesible through the WordPress default menu system.', 'epico' ),
		'section'  => 'footer',
		'default'  => esc_attr__( 'All rights reserved', 'epico' ),
		'priority' => 1,
	);

	// Data de inicio do site
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'epico_date',
		'label'    => esc_attr__( 'Site starting date', 'epico' ),
		'help'     => esc_attr__( 'Enter the starting year of your site, if different from the current year (enter a four digit number . Ex: 2012).', 'epico' ),
		'section'  => 'footer',
		'default'  => NULL,
		'priority' => 2,
	);

	// Logotipo do rodape
	$fields[] = array(
		'type'     => 'image',
		'settings' => 'epico_logo_image_footer',
		'label'    => esc_attr__( 'Upload the footer logo image', 'epico' ),
		//'help'     => esc_attr__( '(Optional) A transparent PNG version with a white logo is preferable to maintain contrast against the dark background of the footer.', 'epico' ),
		'section'  => 'footer',
		'default'  => '',
		'priority' => 3,
	);

	return $fields;
}
add_filter( 'kirki/controls', 'epico_footer_customizer_settings' );

