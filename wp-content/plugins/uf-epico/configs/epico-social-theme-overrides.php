<?php
/**
 *
 * fieldconfig for uf-epico/Theme overrides
 *
 * @package Uf_Epico
 * @author Uberfácil contato@uberfacil.com
 * @license GPL-2.0+
 * @link //uberfacil.com
 * @copyright 2014-2016 Uberfácil
 */


$group = array(
	'label'    => esc_attr__( 'Theme overrides', 'uf-epico' ),
	'id'       => '1410100146',
	'master'   => 'override',
	'fields'=> array(
		'target'   => array(
			'label'   => esc_attr__( 'Link target', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose one of the actions for social network button when clicked.', 'uf-epico' ),
			'type'    => 'radio',
			'default' => esc_attr__( '*0||Open in new window,1||Open in the same window', 'uf-epico' ),
		),
		'widget_id'   => array(
			'label'   => esc_attr__( 'Unique identifier', 'uf-epico' ),
			'caption' => esc_attr__( 'Enter an unique identifier for the widget. Use only regular alphabet letters and don\'t use special symbols.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => '',
		),
		'override'    => array(
			'label'   => esc_attr__( 'Override theme colors', 'uf-epico' ),
			'caption' => esc_attr__( 'Enable this to allow the default theme colors to be overriden. Then you can define custom values using the options below.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'text_color'  => array(
			'label'   => esc_attr__( 'Text color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a color for the text.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#333333',
		),
		'icon_color'  => array(
			'label'   => esc_attr__( 'Icon color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select the icon\'s color.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'icon_bkg_color' => array(
			'label'   => esc_attr__( 'Icon background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select the icon\'s background color.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#00B2C2',
		),
		'bkg_color'   => array(
			'label'   => esc_attr__( 'Widget background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select the widget\'s background color.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
	),
	'styles'   => array(
		'toggles.css',

	),
	'scripts'  => array(
		'toggles.min.js',
		'colorpicker.js',
	),
	'multiple' => false,
);

