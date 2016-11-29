<?php

add_image_size ( 'google-map-card', 700, 480, true);

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_55bf33c7e7d28',
	'title' => 'Map',
	'fields' => array (
		array (
			'key' => 'field_55bf33d1cbd81',
			'label' => 'Markers',
			'name' => 'markers',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => '',
			'layout' => 'block',
			'button_label' => 'Marker hinzufügen',
			'sub_fields' => array (
				array (
					'key' => 'field_55c05a25ad934',
					'label' => 'Marker Position',
					'name' => 'lat-lng',
					'type' => 'google_map',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'center_lat' => '47.335231',
					'center_lng' => '8.530266',
					'zoom' => 10,
					'height' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/contact-google-map.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;