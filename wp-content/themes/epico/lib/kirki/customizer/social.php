<?php
/*
 * Cria a secao `Botoes de compartilhamento`, com os respectivos campos.
 */

function epico_social_customizer( $wp_customize ){

	$fields = array();

	// Cria a secao "Botoes de compartilhamento"
	$wp_customize->add_section( 'social', array(
		'title'    => esc_attr__( 'Social sharing buttons', 'epico' ),
		'priority' => 30
	) );

}
add_action( 'customize_register', 'epico_social_customizer' );

// CAMPOS

function epico_social_customizer_settings( $fields ){

	// Habilitar em paginas
	$fields[] = array(
		'type'     => 'checkbox',
		'settings' => 'epico_socialpages',
		'label'    => esc_attr__( 'Enable in pages', 'epico' ),
		'help'     => esc_attr__( 'Control the display of the social buttons in pages. You can also specify below the pages from which you would like to remove the buttons from.', 'epico' ),
		'section'  => 'social',
		'default'  => 0,
		'priority' => 10,
	);

	// Excluir botoes de paginas especificas
	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'epico_socialpages_exclude',
		'description' => esc_attr__( 'Select specific pages you want to remove the sharing buttons from.', 'epico' ),
		'section'     => 'social',
		'default'     => NULL,
		'priority'    => 20,
		'multiple'    => 999,
		'choices'     => Kirki_Helper::get_posts( array( 'post_type' => 'page', 'orderby' => 'modified', 'posts_per_page' => -1 ) ),
	);

	// Habilitar em posts
	$fields[] = array(
		'type'     => 'checkbox',
		'settings' => 'epico_socialposts',
		'label'    => esc_attr__( 'Enable in posts', 'epico' ),
		'help'     => esc_attr__( 'Control the display of the social buttons in posts. You can also specify below the posts from which you would like to remove the buttons from.', 'epico' ),
		'section'  => 'social',
		'default'  => 1,
		'priority' => 30,
	);

	// Excluir botoes de posts especificos
	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'epico_socialposts_exclude',
		'description' => esc_attr__( 'Select specific post you want to remove the sharing buttons from.', 'epico' ),
		'section'     => 'social',
		'default'     => NULL,
		'priority'    => 40,
		'multiple'    => 999,
		'choices'     => Kirki_Helper::get_posts( array( 'post_type' => 'post', 'orderby' => 'modified', 'posts_per_page' => -1 ) ),
	);

	// Fixar barra
	$fields[] = array(
		'type'     => 'checkbox',
		'settings' => 'epico_socialstickybox',
		'label'    => esc_attr__( 'Sticky share box', 'epico' ),
		'help'     => esc_attr__( 'By default the box remains fixed when the page scrolls. You can control this behavior here.', 'epico' ),
		'section'  => 'social',
		'default'  => 1,
		'priority' => 50,
	);

	// Botao de fechar
	$fields[] = array(
		'type'     => 'checkbox',
		'settings' => 'epico_socialclose',
		'label'    => esc_attr__( 'Close button', 'epico' ),
		'help'     => esc_attr__( 'A close button to dismiss the social button bar. For this feature to work, you must have installed the theme\'s funcionality plugin.' , 'epico' ),
		'section'  => 'social',
		'default'  => 1,
		'priority' => 60,
	);

	// Numero total de compartilhamentos
	$fields[] = array(
		'type'     => 'checkbox',
		'settings' => 'epico_socialcounter',
		'label'    => esc_attr__( 'Total number of shares', 'epico' ),
		'help'     => esc_attr__( 'The total number of shares for all social networks shown.', 'epico' ),
		'section'  => 'social',
		'default'  => 1,
		'priority' => 70,
	);

	// Compartilhamentos por rede social
	$fields[] = array(
		'type'     => 'checkbox',
		'settings' => 'epico_socialpartialcount',
		'label'    => esc_attr__( 'Shares per social network', 'epico' ),
		'help'     => esc_attr__( 'Individual number or shares for each social network.', 'epico' ),
		'section'  => 'social',
		'default'  => 0,
		'priority' => 80,
	);

	// Cadastro no Opensharecount (Twitter)
	$fields[] = array(
		'type'     => 'custom',
		'settings' => 'epico_share_count_warning',
		'section'  => 'social',
		'default'  => esc_attr__( 'Important: to get your Twitter\'s share count, register your site in https://opensharecount.com/', 'epico' ),
		'priority' => 90,
		'sanitize_callback' => 'wp_kses_post',
	);

	// Estilos dos botoes
	$fields[] = array(
		'type'     => 'radio-image',
		'settings' => 'epico_socialstyles',
		'label'    => esc_attr__( 'Button styles', 'epico' ),
		'section'  => 'social',
		'priority' => 100,
		'default'  => '0',
		'choices'  => array(
			'0' => get_template_directory_uri() . '/img/icons/social-colorful.png',
			'1' => get_template_directory_uri() . '/img/icons/social-minimal.png',
		),
	);

	// ID da App do Facebook
	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'epico_fb_app_id',
		'label'       => esc_attr__( 'Facebook App ID', 'epico' ),
		'description' => esc_attr__( 'How do I get this? See http://ubr.link/botoes', 'epico' ),
		'help'        => esc_attr__( 'Please enter your Facebook App ID to authorize the buttons to collect the number of shares. This step is necessary to authenticate the requests made by your sharing buttons to the Facebook API, and will allow the number of shares to appear properly beside your buttons.', 'epico' ),
		'section'     => 'social',
		'default'     => NULL,
		'priority'    => 105,
	);

	// Secret ID da App do Facebook
	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'epico_fb_app_secret',
		'label'       => esc_attr__( 'Facebook App Secret', 'epico' ),
		'description' => esc_attr__( 'How do I get this? See http://ubr.link/botoes', 'epico' ),
		'help'        => esc_attr__( 'Please enter your Facebook App Secret to authorize the buttons to collect the number of shares. This step is necessary to authenticate the requests made by your sharing buttons to the Facebook API, and will allow the number of shares to appear properly beside your buttons.', 'epico' ),
		'section'     => 'social',
		'default'     => NULL,
		'priority'    => 107,
	);

	// Botao do Facebook
	$fields[] = array(
		'type'     => 'checkbox',
		'settings' => 'epico_socialfacebook',
		'label'    => esc_attr__( 'Facebook button', 'epico' ),
		'help'     => esc_attr__( 'Hide Facebook button.', 'epico' ),
		'section'  => 'social',
		'default'  => 1,
		'priority' => 110,
	);

	// Botao do Twitter
	$fields[] = array(
		'type'     => 'checkbox',
		'settings' => 'epico_socialtwitter',
		'label'    => esc_attr__( 'Twitter button', 'epico' ),
		'help'     => esc_attr__( 'Hide Twitter button.', 'epico' ),
		'section'  => 'social',
		'default'  => 1,
		'priority' => 120,
	);

	// Botao do Google
	$fields[] = array(
		'type'     => 'checkbox',
		'settings' => 'epico_socialgoogle',
		'label'    => esc_attr__( 'Google+ button', 'epico' ),
		'help'     => esc_attr__( 'Hide Google Plus button.', 'epico' ),
		'section'  => 'social',
		'default'  => 1,
		'priority' => 130,
	);

	// Botao do Pinterest
	$fields[] = array(
		'type'     => 'checkbox',
		'settings' => 'epico_socialpinterest',
		'label'    => esc_attr__( 'Pinterest button', 'epico' ),
		'help'     => esc_attr__( 'Hide Pinterest button.', 'epico' ),
		'section'  => 'social',
		'default'  => 1,
		'priority' => 140,
	);

	// Botao do Linkedin
	$fields[] = array(
		'type'     => 'checkbox',
		'settings' => 'epico_sociallinkedin',
		'label'    => esc_attr__( 'LinkedIn button', 'epico' ),
		'help'     => esc_attr__( 'Hide LinkedIn button.', 'epico' ),
		'section'  => 'social',
		'default'  => 1,
		'priority' => 150,
	);

	// Botao do Whatsapp
	$fields[] = array(
		'type'     => 'checkbox',
		'settings' => 'epico_socialwhatsapp',
		'label'    => esc_attr__( 'WhatsApp button (mobile)', 'epico' ),
		'help'     => esc_attr__( 'Hide WhatsApp button. Notice: this button is available only in mobile devices (Android or iOS)', 'epico' ),
		'section'  => 'social',
		'default'  => 1,
		'priority' => 160,
	);

	return $fields;
}
add_filter( 'kirki/controls', 'epico_social_customizer_settings' );
