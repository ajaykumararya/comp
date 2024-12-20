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
            'label' => 'Our Syllabus',
            'type' => 'our_syllabus',
            'icon' => array('file', 4),
            'url' => 'cms/static-page/our_syllabus',
        ),
    )
);