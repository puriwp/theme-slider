<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'interval' => array(
		'type'	 => 'slider',
		'label'  => __( 'Slide Interval (seconds)', 'fw' ),
		'desc'	 => __( 'The amount of time to delay between item. Set 0 to disable autoplay.', 'fw' ),
		'value'	 => 3,
		'properties'=> array( 'min' => 0, 'max' => 10, 'step' => 1 )
	),
	'controls' => array(
		'type'			=> 'switch',
		'value'			=> true,
		'label'			=> __( 'Next/Prev Controls', 'fw' )
	),
	'indicators' => array(
		'type'			=> 'switch',
		'value'			=> true,
		'label'			=> __( 'Dots Indicators', 'fw' )
	),
	'loop'	=> array(
		'type'			=> 'switch',
		'value'			=> false,
		'label'			=> __( 'Inifnity Loop', 'fw' )
	),
	'pause' => array(
		'type'		=> 'switch',
		'label'		=> __( 'Pause on Hover', 'fw' )
	)
);
