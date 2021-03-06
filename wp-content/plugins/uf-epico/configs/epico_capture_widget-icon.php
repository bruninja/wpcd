<?php
/**
 *
 * fieldconfig for uf-epico/Icon
 *
 * @package Uf_Epico
 * @author Uberfácil contato@uberfacil.com
 * @license GPL-2.0+
 * @link //uberfacil.com
 * @copyright 2014-2016 Uberfácil
 */


$group = array(
	'label'    => esc_attr__( 'Icon', 'uf-epico' ),
	'id'       => '1011141128',
	'master'   => 'icon',
	'fields'   => array(
		'icon'        => array(
			'label'   => esc_attr__( 'Default icon', 'uf-epico' ),
			'caption' => esc_attr__( 'You can add an icon next to the main title. Visit minha.uberfacil.com/icones to see all available icons. Just choose an icon and click on it to copy it\'s ID to the clipboard. Next, paste it here.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => 'fa fa-refresh',
		),
		'icon_upload' => array(
			'label'   => esc_attr__( 'Upload a custom icon', 'uf-epico' ),
			'caption' => esc_attr__( 'You can alternatively upload a custom image for your icon. We recommend a small image (maximum width: 200px), to preserve page performance.', 'uf-epico' ),
			'type'    => 'image',
			'default' => '',
		),
		'animation'   => array(
			'label'   => esc_attr__( 'Icon animation', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose an animation style for the icon.', 'uf-epico' ),
			'type'    => 'radio',
			'default' => esc_attr__( '1||Fade In Down,2||Fade In Up,3||Fade In,4||Bounce In,5||Shake,6||Swing,7||Roll In,*8||Rotate In', 'uf-epico' ),
		),
	),
	'scripts'  => array(
		'image-modal.js',
	),
	'multiple' => false,
);

