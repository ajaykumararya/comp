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
            'label' => 'APPRECIATED BY',
            'type' => 'appreciated_by',
            'icon' => array('file',4),
            'url' => 'cms/static-page/appreciated-by'
        )
    )
);
