<?php

return array(
    'enabled' => array(
        'title' => _wp('Plugin enabled'),
        'control_type' => waHtmlControl::CHECKBOX,
        'value' => 1,
    ),
    'logo' => array(
        'title' => _wp('Logo icon'),
        'description' => _wp('Select the desired logo icon.'),
        'control_type' => waHtmlControl::RADIOGROUP,
        'options' => array(
            array(
                'value' => '18',
                'title' => '18+',
            ),
            array(
                'value' => '16',
                'title' => '16+',
            ),
            array(
                'value' => '12',
                'title' => '12+',
            ),
        ),
        'value' => '18',
    ),
    'logo_url' => array(
    'title' => _wp('Select logo url:'),
    'control_type' => waHtmlControl::INPUT,
    'description' => _wp('Select logo url to show. If empty default logo will be shown.'),
    ),
    'enter' => array(
        'title' => _wp("Enter:"),
        'description' => _wp("Enter button text."),
        'value' => '',
        'control_type' => waHtmlControl::INPUT,
    ),
    'leave' => array(
        'title' => _wp("Leave:"),
        'description' => _wp("Leave button text."),
        'value' => '',
        'control_type' => waHtmlControl::INPUT,
    ),
    'header' => array(
        'title' => _wp("Header:"),
        'description' => _wp("Enter header text."),
        'value' => '',
        'control_type' => waHtmlControl::INPUT,
    ),
    'css' => array(
        'title' => _wp("Additional styles:"),
        'description' => _wp("Add styles to customize design."),
        'value' => '',
        'control_type' => waHtmlControl::TEXTAREA,
    ),
);
