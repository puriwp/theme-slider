<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'showif' => array(
		'type'	=> 'switch',
		'value'	=> false,
		'label'	=> __( 'Show Text', 'fw' ),
		'desc'	=> __( 'Show title and description inside slider.', 'fw' )
	),
	'link' => array(
		'type'	=> 'text',
		'label'	=> __( 'Link URL', 'fw' )
	)
);