<?php
$menu = array(
    'label' => 'Static Pages',
    'type' => 'static_page_area',
    'icon' => array('file', 3),
    'submenu' => array(
        array(
            'label' => 'List All Course(S) ',
            'type' => 'list-all-courses',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/list-all-courses',
        ),
        array(
            'label' => 'Revolution Slider',
            'type' => 'revosultion_slider',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/revosultion_slider',
        ),
        array(
            'label' => 'Header',
            'type' => 'header',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/header',
        ),

        array(
            'label' => 'About Us',
            'type' => 'about_us',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/about_us',
        ),
        array(
            'label' => 'Our Content Courses',
            'type' => 'our_courses',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/our_courses',
        ),
    )
);