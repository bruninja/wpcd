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
	'id'       => '458101112',
	'master'   => 'title',
	'fields'   => array(
		'title'       => array(
			'label'   => esc_attr__( 'Title', 'uf-epico' ),
			'caption' => esc_attr__( 'Main title for the subscription form. Optimized for 6 words maximum.', 'uf-epico' ),
			'type'    => 'textbox',
			'default' => esc_attr__( 'Focus, impact and creativity', 'uf-epico' ),
		),
		'title_tag'   => array(
			'label'   => esc_attr__( 'Title tag', 'uf-epico' ),
			'caption' => esc_attr__( 'Change the header level to best suit your content', 'uf-epico' ),
			'type'    => 'dropdown',
			'default' => esc_attr__( '*0||Header level 4,1||Header level 3,2||Header level 2,3||Header level 1,4||Paragraph', 'uf-epico' ),
		),
		'intro_p'     => array(
			'label'   => esc_attr__( 'Intro text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a brief introductory text.', 'uf-epico' ),
			'type'    => 'textbox',
			'default' => esc_attr__( 'Enter your email address below to get free blog updates!', 'uf-epico' ),
		),
		'notice'      => array(
			'label'   => esc_attr__( 'Anti-spam notice', 'uf-epico' ),
			'caption' => esc_attr__( 'Text for the anti-spam notice that sits close to the subscription form. Optimized for 10 words maximum.', 'uf-epico' ),
			'type'    => 'textbox',
			'default' => esc_attr__( 'Your email is completely SAFE with us!', 'uf-epico' ),
		),
		'placeholder' => array(
			'label'   => esc_attr__( 'Email field text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add here the placeholder text that will show up inside the email field.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'Enter your email', 'uf-epico' ),
		),
		'placeholder_name' => array(
			'label'   => esc_attr__( 'Name field text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add here the placeholder text that will show up inside the name field. Note: you must also activate the name field option in the Email Marketing tab.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'Enter your name', 'uf-epico' ),
		),
		'placeholder_submit' => array(
			'label'   => esc_attr__( 'Button text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a text for the submit button.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'Subscribe!', 'uf-epico' ),
		),
	),
	'multiple' => false,
);

