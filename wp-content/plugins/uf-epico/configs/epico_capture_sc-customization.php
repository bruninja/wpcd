<?php
/**
 *
 * fieldconfig for uf-epico/Customization
 *
 * @package Uf_Epico
 * @author Uberfácil contato@uberfacil.com
 * @license GPL-2.0+
 * @link //uberfacil.com
 * @copyright 2014-2016 Uberfácil
 */


$group = array(
	'label'    => esc_attr__( 'Customization', 'uf-epico' ),
	'id'       => '01130151',
	'master'   => 'disable_animation',
	'fields'   => array(
		'compact'  => array(
			'label'   => esc_attr__( 'Compact version', 'uf-epico' ),
			'caption' => esc_attr__( 'This will reduce the box size considerably. To compact more, let the text fields empty in the "Texts" tab above.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'new_window'  => array(
			'label'   => esc_attr__( 'Open in new window', 'uf-epico' ),
			'caption' => esc_attr__( 'Would you like to open a new window after the visitor clicks the submit button?', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||New window,2||Same window', 'uf-epico' ),
			'inline'  => true,
		),
		'disable_animation' => array(
			'label'   => esc_attr__( 'Animations', 'uf-epico' ),
			'caption' => esc_attr__( 'You can disable all animations if necessary.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||Animations On,2||Animations Off', 'uf-epico' ),
			'inline'  => true,
		),
		'bkg_img'     => array(
			'label'   => esc_attr__( 'Widget background image', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a background image for the widget (optional).', 'uf-epico' ),
			'type'    => 'image',
			'default' => '',
		),
		'overlay'     => array(
			'label'   => esc_attr__( 'Overlay effect', 'uf-epico' ),
			'caption' => esc_attr__( 'You can add a color overlay effect to the background image. Enable it here.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'overlay_color' => array(
			'label'   => esc_attr__( 'Overlay color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for the overlay effect.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#333333',
		),
	),
	'styles'   => array(
		'toggles.css',

	),
	'scripts'  => array(
		'toggles.min.js',
		'image-modal.js',
		'colorpicker.js',
	),
	'multiple' => false,
);

