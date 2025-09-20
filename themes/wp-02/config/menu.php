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
            'label' => 'Icon Box',
            'type' => 'icon-box',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/icon-box',
        ),
        array(
            'label' => 'Category Images',
            'type' => 'category-images',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/category-images',
        ),
        array(
            'label' => 'Popular Courses',
            'type' => 'popular-courses',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/popular-courses',
        ),
        array(
            'label' => 'Upcoming Events & Videos',
            'type' => 'upcoming-events-and-videos',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/upcoming-events-and-videos',
        ),
    )
);