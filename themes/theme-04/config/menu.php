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
            'label' => 'Header',
            'type' => 'header_setting',
            'icon' => array('file',4),
            'url' => 'cms/static-page/header'
        ),      
        array(
            'label' => 'Our Counter',
            'type' => 'our_counter',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/our_counter',
        ),
        array(
            'label' => 'Our Courses',
            'type' => 'our_courses',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/our_courses',
        ),  
        array(
            'label' => 'About us',
            'type' => 'about_us',
            'icon' => array('file',4),
            'url' => 'cms/static-page/about_us'
        ),        
        array(
            'label' => 'Enquiry Page',
            'type' => 'enquiry_page',
            'icon' => array('file',4),
            'url' => 'cms/static-page/enquiry_page'
        ),
        array(
            'label' => 'Testimonial',
            'type' => 'testimonial',
            'icon' => array('file',4),
            'url' => 'cms/static-page/testimonial'
        )
    )
);
