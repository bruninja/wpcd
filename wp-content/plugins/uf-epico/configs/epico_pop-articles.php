<?php
/**
 *
 * fieldconfig for uf-epico/Articles
 *
 * @package Uf_Epico
 * @author Uberfácil contato@uberfacil.com
 * @license GPL-2.0+
 * @link //uberfacil.com
 * @copyright 2014-2016 Uberfácil
 */


$group = array(
	'label'    => esc_attr__( 'Articles', 'uf-epico' ),
	'id'       => '12139311',
	'master'   => 'article',
	'fields'   => array(
		'article' => array(
			'label'   => esc_attr__( 'Article selection', 'uf-epico' ),
			'caption' => esc_attr__( 'Select an article to include in the list. You can add more articles clicking "Add another", below', 'uf-epico' ),
			'type'    => 'posttypeselector',
			'default' => '',
		),
	),
	'multiple' => true,
);

