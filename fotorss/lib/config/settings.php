<?php

return [
    'enabled' => [
        'title'        => _wp('Plugin enabled'),
        'value'        => '1',
        'control_type' => waHtmlControl::CHECKBOX,
    ],
    'posts_number' => [
        'title'=>_wp('Last RSS entries amount'),
        'value' => '10',
        'control_type' => waHtmlControl::INPUT,
    ],
    'thumb' => [
        'title' => _wp('Thumb size'),
        'description' => _wp('Select the desired thumb size.'),
        'control_type' => waHtmlControl::RADIOGROUP,
        'options' => [
            [
                'value' => 'default',
                'title' => _wp('Default 200px'),
            ],
            [
                'value' => 'mobile',
                'title' => _wp('Mobile 512px'),
            ],
            [
                'value' => 'vk',
                'title' => _wp('Vk 590px'),
            ],
            [
                'value' => 'middle',
                'title' => _wp('Middle 750px'),
            ],
            [
                'value' => 'big',
                'title' => _wp('Big 970px'),
            ],
        ],
        'value' => 'default',
    ],
    'author_tag' => [
        'title'=>_wp('Add author to RSS'),
        'control_type' => 'checkbox',
    ],
];
