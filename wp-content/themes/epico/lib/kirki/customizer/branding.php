<?php
/*
 * Cria a secao `Sua marca`, com os respectivos campos.
 */

function epico_branding_customizer( $wp_customize ){

	$fields = array();

	$wp_customize->add_section( 'branding', array(
		'title'    => esc_attr__( 'Branding', 'epico' ),
		'priority' => 10
	) );

}
add_action( 'customize_register', 'epico_branding_customizer' );

// CAMPOS

function epico_branding_customizer_settings( $fields ){
	// Nome do blog
	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'epico_site_name',
		'label'       => esc_attr__( 'Site title', 'epico' ),
		'description' => esc_attr__( 'How you would like to call your blog?', 'epico' ),
		'help'        => esc_attr__( 'Choose the site title for the header of your site.', 'epico' ),
		'section'     => 'branding',
		'default'     => get_bloginfo( 'name', 'epico' ),
		'priority'    => 1,
	);

	// Imagem do logo
	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'epico_logo_upload',
		'label'       => esc_attr__( 'Logo', 'epico' ),
		'description' => esc_attr__( 'Add a logo image instead of a title.', 'epico' ),
		//'help'        => esc_attr__( 'Tip: to keep your site performance optimized, upload an image file with 400 pixels width (maximum).', 'epico' ),
		'section'     => 'branding',
		'sanitize_callback' => 'wp_kses_post',
		'default'     => '',
		'priority'    => 2,
	);

	// Largura do logo
	$fields[] = array(
		'type'        => 'slider',
		'settings'    => 'epico_logo_width',
		'label'       => esc_attr__( 'Logo image width', 'epico' ),
		'section'     => 'branding',
		'description' => esc_attr__( 'After the upload, you can fine tune the image width to perfect it in your layout.', 'epico' ),
		'default'     => 280,
		'priority'    => 3,
		'choices'     => array(
			'min'     => 120,
			'max'     => 400,
			'step'    => 2,
		),
	);

	return $fields;
}
add_filter( 'kirki/controls', 'epico_branding_customizer_settings' );