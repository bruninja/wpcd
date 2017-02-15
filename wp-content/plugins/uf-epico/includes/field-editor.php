<?php
function epico_sanitize_html( $input ) {

	$allowed = array(
		'form'  => array(
			'action' => array(),
		),
		'input' => array(
			'name' => array(),
		),
	);

	return wp_kses( $input, $allowed );
} ?>
