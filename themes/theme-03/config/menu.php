<?php
$menu = array(
    'label' => 'Static Pages',
    'type' => 'static_page_area',
    'icon' => array('file', 3),
    'submenu' => array(
        array(
            'label' => 'Contact Us',
            'type' => 'contact_us',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/contact_us',
        ),
        array(
            'label' => 'Notice Board',
            'type' => 'notice_board',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/notice-board',
        ),
        array(
            'label' => 'Our Certificates',
            'type' => 'our_certificate',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/our_certificate',
        ),
        array(
            'label' => 'About College with Principal Box',
            'type' => 'about_us_with_principal_box',
            'url' => 'cms/static-page/about_college',
            'icon' => array('file', 4)
        ),
        //Featured Events
        array(
            'label' => 'Featured Events',
            'type' => 'featured_evenrs',
            'url' => 'cms/static-page/featured_events',
            'icon' => array('file', 4)
        ),
        array(
            'label' => 'Our facility',
            'type' => 'our_facility',
            'url' => 'cms/static-page/our_facility',
            'icon' => array('file',4)
        )
    )
);