<?php
$config['dashboard'] = array(
    'menu' => array(
        array('label' => 'Dashboard', 'type' => 'dashboard', 'url' => 'admin')
    )
);
$config['center_area'] = array(
    'title' => 'Center Area',
    'menu' => array(
        array(
            'label' => 'Center Information',
            'type' => 'center_information',
            'icon' => array('profile-user', 3),
            'submenu' => array(
                array(
                    'label' => 'Add Center',
                    'type' => 'add_center',
                    'icon' => array('add-item', 4),
                    'url' => 'center/add',
                ),
                array(
                    'label' => 'Assign Courses Category',
                    'type' => 'assign_courses_with_center',
                    'icon' => array('arrow-circle-right', 2),
                    'url' => 'co-ordinate/assign-course',
                ),
                array(
                    'label' => 'List Center',
                    'type' => 'list_center',
                    'icon' => array('tablet-text-down', 4),
                    'url' => 'center/list',
                ),
            )
        ),
        array(
            'label' => 'Center Certificate',
            'type' => 'center_certificate',
            'icon' => array('notepad', 5),
            'url' => 'center/generate-certificate',
            /*
            'submenu' => array(
                array(
                    'label' => 'Center Certificate',
                    'type' => 'generate_center_certiificate',
                    'icon' => array('add-notepad', 4),
                    'url' => 'center/generate-certificate',
                ),
                array(
                    'label' => 'Get Certificate',
                    'type' => 'get_center_certificate',
                    'icon' => array('tablet-text-up', 3),
                    'url' => 'center/get-certificate',
                )
            )\
            */
        ),
    )
);