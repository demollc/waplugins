<?php

return array(
	'enabled' => array(
        'title'        => _wp('Plugin enabled'),
        'value'        => '1',
        'control_type' => waHtmlControl::CHECKBOX,
		),
	'posts_number' => array(
		'title'=>_wp('Last RSS entries amount'),
        'value' => '10',
        'control_type' => waHtmlControl::INPUT,
        ),
	'thumb' => array(
		'title' => _wp('Thumb size'),
		'description' => _wp('Select the desired thumb size.'),
		'control_type' => waHtmlControl::RADIOGROUP,
		'options' => array(
			array(
				'value' => 'default',
				'title' => _wp('Default 200px'),
			),
			array(
				'value' => 'mobile',
				'title' => _wp('Mobile 512px'),
			),
			array(
				'value' => 'vk',
				'title' => _wp('Vk 590px'),
			),
			array(
				'value' => 'middle',
				'title' => _wp('Middle 750px'),
			),
			array(
				'value' => 'big',
				'title' => _wp('Big 970px'),
			),
		),
	),
	'value' => 'default',
	'author_tag' => array(
		'title'=>_wp('Add author to RSS'),
		'control_type' => 'checkbox',
        ),
);
