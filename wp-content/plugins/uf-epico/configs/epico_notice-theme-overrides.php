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
	'label' => __('Theme overrides','uf-epico'),
	'id' => '47101527',
	'master' => 'override',
	'fields' => array(
		'widget_id'	=>	array(
			'label'		=> esc_attr__( 'Unique identifier','uf-epico'),
			'caption'	=> esc_attr__( 'Enter an unique identifier for the widget. Use only regular alphabet letters and don\'t use special symbols.','uf-epico'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'',
		),
		'override'	=>	array(
			'label'		=> esc_attr__( 'Override theme colors','uf-epico'),
			'caption'	=> esc_attr__( 'Enable this to allow the default theme colors to be overriden. Then you can define custom values using the options below.','uf-epico'),
			'type'		=>	'onoff',
			'default'	=> esc_attr__(  '*0||Off,1||On','uf-epico'),
			'inline'	=> 	true,
		),
		'bkg_color'	=>	array(
			'label'		=> esc_attr__( 'Background color','uf-epico'),
			'caption'	=> esc_attr__( 'Select a background color for the notice.','uf-epico'),
			'type'		=>	'colorpicker',
			'default'	=> 	'#00C7C0',
		),
		'text_color'	=>	array(
			'label'		=> esc_attr__( 'Main text color','uf-epico'),
			'caption'	=> esc_attr__( 'Select a color for the notice main text.','uf-epico'),
			'type'		=>	'colorpicker',
			'default'	=> 	'#FFFFFF',
		),
		'button_color'	=>	array(
			'label'		=> esc_attr__( 'Button\'s background color','uf-epico'),
			'caption'	=> esc_attr__( 'Select a background color for the button.','uf-epico'),
			'type'		=>	'colorpicker',
			'default'	=> 	'#5F7781',
		),
		'button_bkg_color_hover'	=>	array(
			'label'		=> esc_attr__( 'Button\'s background color (hover state)','uf-epico'),
			'caption'	=> esc_attr__( 'Select a background color for the button\'s hover state.','uf-epico'),
			'type'		=>	'colorpicker',
			'default'	=> 	'#4C5F67',
		),
		'button_text_color'	=>	array(
			'label'		=> esc_attr__( 'Button\'s text color','uf-epico'),
			'caption'	=> esc_attr__( 'Select a color for the button\'s text.','uf-epico'),
			'type'		=>	'colorpicker',
			'default'	=> 	'#FFFFFF',
		),
	),
	'styles'	=> array(
		'toggles.css',

	),
	'scripts'	=> array(
		'toggles.min.js',
		'colorpicker.js',
	),
	'multiple'	=> false,
);
