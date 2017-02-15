<?php
/**
 *
 * fieldconfig for uf-epico/Configuration
 *
 * @package Uf_Epico
 * @author Uberfácil contato@uberfacil.com
 * @license GPL-2.0+
 * @link //uberfacil.com
 * @copyright 2014-2016 Uberfácil
 */


$group = array(
	'label'    => esc_attr__( 'Configuration', 'uf-epico' ),
	'id'       => '51120110',
	'master'   => 'sticky',
	'fields'   => array(
		'sticky' => array(
			'label'   => esc_attr__( 'Sticky box', 'uf-epico' ),
			'caption' => esc_attr__( 'Do you want to fix the box at the top of the site?', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||Yes,*2||No', 'uf-epico' ),
			'inline'  => true,
		),
		'close'  => array(
			'label'   => esc_attr__( 'Close button', 'uf-epico' ),
			'caption' => esc_attr__( 'Do you want a close button in the corner? The notice will reapear after page load. If you want do dismiss it permanently, activate the option bellow.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||Yes,2||No', 'uf-epico' ),
			'inline'  => true,
		),
		'cookie' => array(
			'label'   => esc_attr__( 'Dismiss after close', 'uf-epico' ),
			'caption' => esc_attr__( 'This will add an action to the close button that will dismiss the box even after the page reload. After seven days, the box can appear again for the visitor.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||Yes,*2||No', 'uf-epico' ),
			'inline'  => true,
		),
	),
	'styles'   => array(
		'toggles.css',
	),
	'scripts'  => array(
		'toggles.min.js',
	),
	'multiple' => false,
);

