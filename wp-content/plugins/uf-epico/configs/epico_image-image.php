<?php
/**
 *
 * fieldconfig for uf-epico/Image
 *
 * @package Uf_Epico
 * @author Uberfácil contato@uberfacil.com
 * @license GPL-2.0+
 * @link //uberfacil.com
 * @copyright 2014-2016 Uberfácil
 */


$group = array(
	'label'    => esc_attr__( 'Image', 'uf-epico' ),
	'id'       => '1523167',
	'master'   => 'img_src',
	'fields'   => array(
		'img_src'   => array(
			'label'   => esc_attr__( 'Image upload', 'uf-epico' ),
			'caption' => esc_attr__( 'Upload an image file.', 'uf-epico' ),
			'type'    => 'image',
			'default' => '',
		),
		'img_url'   => array(
			'label'   => esc_attr__( 'Image link', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert the destination URL.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => 'http://',
		),
		'img_alt'   => array(
			'label'   => esc_attr__( 'Image alt text', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert the image Alt text.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'img_title' => array(
			'label'   => esc_attr__( 'Widget title', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert a title above the image.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'target'    => array(
			'label'   => esc_attr__( 'Link target', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose one of the actions for image\'s link when is clicked.', 'uf-epico' ),
			'type'    => 'radio',
			'default' => esc_attr__( '*0||Open in new window,1||Open in the same window', 'uf-epico' ),
		),
	),
	'scripts'  => array(
		'image-modal.js',
	),
	'multiple' => false,
);

