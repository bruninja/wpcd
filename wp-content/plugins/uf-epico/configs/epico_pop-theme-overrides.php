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
	'id'       => '13141114711',
	'master'   => 'override',
	'fields'   => array(
		'target'      => array(
			'label'   => esc_attr__( 'Link target', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose one of the actions for the link when clicked.', 'uf-epico' ),
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
			'default' => esc_attr__( '0||On,*1||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'bkg_color'   => array(
			'label'   => esc_attr__( 'Background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a background color for the widget.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#00B2C2',
		),
		'text_color'  => array(
			'label'   => esc_attr__( 'Main text color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a color for the widget main text.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'icon_color'  => array(
			'label'   => esc_attr__( 'Title icon color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a color for the icon in the title.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'title_bkg_color' => array(
			'label'   => esc_attr__( 'Titles\'s background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a background color for the title.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#009DAB',
		),
		'title_color' => array(
			'label'   => esc_attr__( 'Title\'s text color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a color for the title\'s text', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'border_bottom_color' => array(
			'label'   => esc_attr__( 'Widget bottom border color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for the widget bottom border.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#009DAB',
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

