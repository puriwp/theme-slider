<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'sliders' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'model' => array(
				'type'		=> 'select',
				'value'		=> 'single',
				'label'		=> __( 'Slider Model', 'fw' ),
				'choices' => array(
					'single'	=> __( 'Default Mode (single item slider)', 'fw' ),
					'multi'		=> __( 'Carousel Mode (multiple item slider)', 'fw' )
				)
			)
		),
		'choices'			 => array(
			'multi'			 => array(
				'shown'	 	 => array(
					'type'	 => 'slider',
					'label'  => __( 'Show Items', 'fw' ),
					'desc'	 => __( 'Set the maximum amount of items displayed at a time', 'fw' ),
					'value'	 => 5,
					'properties'=> array( 'min' => 2, 'max' => 20, 'step' => 1 )
				),
				'margin' 	 => array(
					'type'	 => 'slider',
					'label'  => __( 'Item Margin', 'fw' ),
					'desc'	 => __( 'Extra space between item', 'fw' ),
					'value'	 => 10
				),
				'autowidth'	=> array(
					'type'			=> 'switch',
					'value'			=> false,
					'label'			=> __( 'Auto Width', 'fw' )
				)
			),
			'single'		=> array(
				'autoheight'	=> array(
					'type'			=> 'switch',
					'value'			=> true,
					'label'			=> __( 'Auto Height', 'fw' )
				)
			)
		)
	),
	'navigation' => array(
		'type'			=> 'switch',
		'value'			=> true,
		'label'			=> __( 'Navigation', 'fw' )
	),
	'loop'	=> array(
		'type'			=> 'switch',
		'value'			=> false,
		'label'			=> __( 'Inifnity Loop', 'fw' )
	),
	'autoplay' => array(
		'type'		=> 'switch',
		'label'		=> __( 'Auto Play', 'fw' )
	)
);