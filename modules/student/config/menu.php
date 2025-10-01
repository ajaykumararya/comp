<?php
$config['dashboard'] = array(
    'menu' => array(
        array(
            'label' => 'Profile',
            'type' => 'dashboard',
            'url' => 'student/profile'
        ),
        array(
            'label' => 'ID Card',
            'type' => 'id_card',
            'url' => 'student/id-card',
            'icon' => array('user-square', 3),
            'condition' => CHECK_PERMISSION('STUDENT_ID_CARD')
        ),
        array(
            'label' => 'Attendance',
            'type' => 'your_attendance',
            'url' => 'student/your_attendance',
            'icon' => array('user',3),
            'condition' => CHECK_PERMISSION('ATTENDANCE')
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
        array(
            'label' => 'Study Material',
            'type' => 'study_material',
            'url' => 'student/study-material',
            'icon' => array('book', 5)
        ),
        array(
            'label' => 'Other Document(s)',
            'type' => 'other_document',
            'url' => 'student/other-document',
            'icon' => array('file', 5),
            'condition' => CHECK_PERMISSION('NON_OBJECTION_CERTIFICATE') OR CHECK_PERMISSION('MIGRATION_CERTIFICATE') OR CHECK_PERMISSION('PROVISIONAL_CERTIFICATE')
        )
    )
);

$config['exam_area'] = array(
    'title' => "Exams",
    'condition' => CHECK_PERMISSION('EXAM'),
    'menu' => array(
        array(
            'label' => 'Exam Area',
            'icon' => array('notepad', 5),
            'type' => 'my-exam',
            'url' => 'student/my-exam'
        )
    )
);

$config['extra'] = array(
    'condition' => PATH == 'zcc',
    'menu' => [        
        array(
            'label' => 'Delete Account',
            'icon' => array('trash text-danger', 5),
            'type' => 'delete-account',
            'url' => 'student/delete-account',
            // 
        )
    ]
);