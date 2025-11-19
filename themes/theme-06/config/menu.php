<?php
$menu = array(
    'label' => 'Static Pages',
    'type' => 'static_page_area',
    'icon' => array('file', 3),
    'submenu' => array(        
         array(
            'label' => 'Blog System',
            'type' => 'blog_system',
            'icon' => ['file', 4],
            'submenu' => [
                [
                    'label' => 'Properties',
                    'type' => 'blog-properties',
                    'icon' => ['file', 4],
                    'url' => 'cms/static-page/blog-properties',
                    'setINpage' => false
                ],
                [
                    'label' => 'Manage Blog',
                    'type' => 'manage-blog',
                    'icon' => ['file', 4],
                    'url' => 'cms/static-page/manage-blog'
                ]
            ]
        ),
        array(
            'label' => 'List All Course(S) ',
            'type' => 'list-all-courses',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/list-all-courses',
        ),
        array(
            'label' => 'About Us',
            'type' => 'about_us',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/about_us',
        ),
        array(
            'label' => 'Intro',
            'type' => 'intro',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/intro',
        ),
        array(
            'label' => 'Explore Certificate',
            'type' => 'explore-certificate',
            'icon' => array('file',4),
            'url' => 'cms/static-page/explore-certificate',
        ),
        array(
            'label' => 'Our Program(s)',
            'type' => 'our-program',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/our-program',
        ),
        array(
            'label' => 'Our Header',
            'type' => 'header',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/header',
        ),
        array(
            'label' => 'Our Syllabus',
            'type' => 'our_syllabus',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/our_syllabus',
        ),
        array(
            'label' => 'Our Client(s)',
            'type' => 'our-client',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/our-client',
        ),
        array(
            'label' => 'Our Content Courses',
            'type' => 'our_courses',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/our_courses',
        ),
        array(
            'label' => 'Notice Board',
            'type' => 'notice-board',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/notice-board',
        ),
    )
)
    ?>