<?php
/**
 *
 * fieldconfig for uf-epico/Texts
 *
 * @package Uf_Epico
 * @author Uberfácil contato@uberfacil.com
 * @license GPL-2.0+
 * @link //uberfacil.com
 * @copyright 2014-2016 Uberfácil
 */


$group = array(
	'label'    => esc_attr__( 'Texts', 'uf-epico' ),
	'id'       => '0141515210',
	'master'   => 'text',
	'fields'   => array(
		'text'        => array(
			'label'   => esc_attr__( 'Notice text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a brief text for the notice (10 words is a good limit)', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'We have an important announcement for you!', 'uf-epico' ),
		),
		'button_text' => array(
			'label'   => esc_attr__( 'Button text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add some text for the button located right after the main text. Remove the text to ommit the button from the layout.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'Click here', 'uf-epico' ),
		),
		'button_url'  => array(
			'label'   => esc_attr__( 'Button link', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a link for the button, including the http://', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => 'http://',
		),
		'target'      => array(
			'label'   => esc_attr__( 'Link target', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose an action for the button when is clicked.', 'uf-epico' ),
			'type'    => 'radio',
			'default' => esc_attr__( '*0||Open in new window,1||Open in the same window', 'uf-epico' ),
		),
	),
	'multiple' => false,
);

