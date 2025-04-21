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
            'label'=> 'Academic Guide',
            'type'=> 'academic-guide',
            'icon'=> array('file', 4),
            'url'=> 'cms/static-page/academic-guide',
        ),
        array(
            'label' => 'Header',
            'type' => 'header',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/header',
        ),
        array(
            'label' => 'Footer',
            'type' => 'footer',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/footer',
        ),
        array(
            'label' => 'About Us',
            'type' => 'about_us',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/about_us',
        ),
        array(
            'label' => 'Our Teacher(s)',
            'type' => 'our-teachers',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/our-teachers',
        ),
        array(
            'label' => 'Event(s)',
            'type' => 'events',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/events',
        ),
        //testimonial
        array(
            'label' => 'Testimonial(s)',
            'type' => 'testimonial',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/testimonial',
        ),
        array(
            'label' => 'News',
            'type' => 'news',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/news',
        ),
    )
);