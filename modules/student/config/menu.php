<?php
$config['dashboard'] = array(
    'menu' => array(
        array(
            'label' => 'Profile',
            'type' => 'dashboard',
            'url' => 'student/profile'
        ),
        array(
            'label' => 'Admit Card',
            'type' => 'marksheet',
            'url' => 'student/admit-card',
            'icon' => array('user-square', 3)
        ),
        array(
            'label' => 'Marksheet',
            'type' => 'marksheet',
            'url' => 'student/marksheets',
            'icon' => array('notepad', 5)
        ),
        array(
            'label' => 'Certificate',
            'type' => 'certificate',
            'url' => 'student/certificate',
            'icon' => array('notepad', 5)
        ),
        array(
            'label' => 'Fee Rccord',
            'type' => 'fee_record',
            'url' => 'student/profile/fee-record',
            'icon' => array('notepad', 5)
        ),
    )
);

$config['exam_area'] = array(
    'title' => "Exams",
    'condition' => CHECK_PERMISSION('EXAM'),
    'menu' => array(
        array(
            'label' => 'Exam Area',
            'icon' => array('notepad', 5),
            'type' => 'exam_area',
            'url' => 'student/my-exam'
        )
    )
);