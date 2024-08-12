<?php
$menu = array(
    'label' => 'Static Pages',
    'type' => 'static_page_area',
    'icon' => array('file', 3),
    'submenu' => array(
        array(
            'label' => 'List All Courses',
            'type' => 'list-all-courses',
            'icon' => array('file',4),
            'url' => 'cms/static-page/list-all-courses'
        ),
        array(
            'label' => 'Contact Us',
            'type' => 'contact_us',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/contact_us',
        ),
        array(
            'label' => 'Our Counter',
            'type' => 'our_counter',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/our_counter',
        ),
        // array(
        //     'label' => 'Latest Updates',
        //     'type' => 'latest_updates',
        //     'icon' => array('file', 4),
        //     'url' => 'cms/static-page/latest_updates',
        // ),
        array(
            'label' => 'Notice Board',
            'type' => 'notice-board',
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
            'type' => 'about_college',
            'url' => 'cms/static-page/about_college',
            'icon' => array('file', 4)
        ),
        //Featured Events
        array(
            'label' => 'Featured Events',
            'type' => 'featured_events',
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