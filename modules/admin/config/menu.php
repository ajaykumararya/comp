<?php
$config['dashboard'] = array(
    'menu' => array(
        array('label' => 'Dashboard', 'type' => 'dashboard', 'url' => 'admin')
    )
);
$config['event_area'] = array(
    'title' => 'EVENT section',
    'condition' => (OnlyForAdmin() && CHECK_PERMISSION('EVENT_AREA')),
    'menu' => array(
        array(
            'label' => 'Event Area',
            'type' => 'event_area',
            'icon' => array('book', 2),
            'submenu' => array(
                array(
                    'label' => 'Setting',
                    'type' => 'setting',
                    'icon' => array('note-2', 4),
                    'url' => 'event/setting',
                ),
            )
        ),
        array(
            'label' => 'Users',
            'icon' => ['profile-user', 4],
            'type' => 'users',
            'url' => 'event/users'
        ),
    )
);
$config['ebook'] = array(
    'title' => 'EBOOK section',
    'condition' => (OnlyForAdmin() && CHECK_PERMISSION('EBOOK')),
    'menu' => array(
        array(
            'label' => 'E-Book Area',
            'type' => 'ebook_area',
            'icon' => array('book', 2),
            'submenu' => array(
                array(
                    'label' => 'Category',
                    'type' => 'category',
                    'icon' => array('note-2', 4),
                    'url' => 'ebook/category',
                ),
                array(
                    'label' => 'Project(s)',
                    'type' => 'project',
                    'icon' => array('note-2', 4),
                    'url' => 'ebook/project',
                )
            )
        ),
        array(
            'label' => 'Users',
            'icon' => ['profile-user', 4],
            'type' => 'users',
            'url' => 'ebook/users'
        ),
    )
);
$config['academic_area'] = array(
    'title' => 'Academics',
    'condition' => OnlyForAdmin(),
    'menu' => array(
        array(
            'label' => 'Course Area',
            'type' => 'course_area',
            'icon' => array('book', 2),
            'submenu' => array(
                array(
                    'label' => 'Category',
                    'type' => 'course_category',
                    'icon' => array('note-2', 4),
                    'url' => 'course/category',
                ),
                array(
                    'label' => 'Manage Course',
                    'type' => 'manage_course',
                    'icon' => array('book', 4),
                    'url' => 'course/manage',
                ),
                array(
                    'label' => 'Manage Subject(s)',
                    'type' => 'manage_subject',
                    'icon' => array('book-open', 4),
                    'url' => CHECK_PERMISSION('MARKSHEET_MAX_FIX_100') ? 'course/manage-system-subjects' : 'course/manage-subjects'
                ),
                array(
                    'label' => 'Arrange Subjects',
                    'type' => 'arrange_subject',
                    'icon' => array('book-open', 4),
                    'url' => 'course/arrange-subjects'
                ),
                /*
                array(
                    'label' => 'Manage Course Fee',
                    'type' => 'manage_course_fee',
                    'icon' => array('bill', 4),
                    'url' => 'course/manage-fees',
                ),
                */
            )
        ),
        array(
            'label' => 'Academics',
            'type' => 'academics',
            'icon' => array('teacher', 2),
            'submenu' => array(
                array(
                    'label' => 'Time table',
                    'condition' => !CHECK_PERMISSION('NOT_TIMETABLE'),
                    'type' => 'batch_area',
                    'icon' => array('book', 4),
                    'url' => 'academic/batch',
                ),
                array(
                    'label' => 'Session',
                    'type' => 'session_area',
                    'icon' => array('book', 4),
                    'url' => 'academic/session',
                ),
                array(
                    'label' => 'Occupation',
                    'type' => 'occupation_area',
                    'icon' => array('office-bag', 4),
                    'url' => 'academic/occupation',
                )
            )
        )
    )
);
$config['exam_slot'] = array(
    'title' => 'Exam Slot',
    'condition' => CHECK_PERMISSION('EXAM_SLOT_SYSTEM') && OnlyForAdmin(),
    'menu' => array(
        array(
            'label' => 'Exam Centre',
            'type' => 'exam_centre',
            'icon' => ['profile-user', 5],
            'url' => 'center/exam-centre'
        ),
        array(
            'label' => 'Exam Schedule',
            'type' => 'exam_schedule',
            'icon' => ['time', 5],
            'url' => 'academic/session-schedule'
        )
    )
);

$config['coupon_menu'] = array(
    'title' => 'Coupons',
    'condition' => CHECK_PERMISSION('REFERRAL_ADMISSION') && OnlyForAdmin(),
    'menu' => array(
        array(
            'label' => 'Student Coupon(S)',
            'type' => 'student_coupons',
            'icon' => array('devices', 5),
            'url' => 'student/coupons'
            // 'submenu' => array(
            //     array(
            //         'label' => ''
            //     )
            // )
        )
    )
);
if (CHECK_PERMISSION('CENTRE_ONLY_ADD_STUDENT') && OnlyForCentre()) {

    $config['menu'] = array(
        'title' => 'Student Area',
        'menu' => array(
            array(
                'label' => 'Student Information',
                'type' => 'student_information',
                'icon' => array('profile-user', 3),
                'submenu' => array(
                    array(
                        'label' => 'Student ID Card',
                        'condition' => CHECK_PERMISSION('STUDENT_ID_CARD'),
                        'type' => 'student_id_card',
                        'icon' => array('user-square', 3),
                        'url' => 'student/get-id-card'
                    ),
                    array(
                        'label' => 'Student Details',
                        'type' => 'student_details',
                        'icon' => array('shield-search', 3),
                        'url' => 'student/search',
                    ),
                    array(
                        'label' => 'Student Admission',
                        'type' => 'student_admission',
                        'icon' => array('plus', 3),
                        'url' => 'student/admission',
                    ),
                    array(
                        'label' => 'Passout Student',
                        'type' => 'passout_students',
                        'icon' => array('bookmark-2', 3),
                        'url' => 'student/passout-student-list',
                    ),
                    //ADMISSION_WITH_SESSION
                    array(
                        'label' => 'List By Session',
                        'type' => 'student_list_by_session',
                        'icon' => array('people', 5),
                        'url' => 'student/list-by-session',
                        'condition' => CHECK_PERMISSION('ADMISSION_WITH_SESSION')
                    ),
                    array(
                        'label' => 'List By Center',
                        'type' => 'student_list_by_center',
                        'icon' => array('people', 5),
                        'url' => 'student/list-by-center',
                        'condition' => OnlyForAdmin()
                    ),
                    array(
                        'label' => 'List Student(s)',
                        'type' => 'all_students',
                        'icon' => array('people', 5),
                        'url' => 'student/all',
                        'submenu' => array(
                            array(
                                'label' => 'Pending List',
                                'type' => 'pending_students',
                                'icon' => array('arrow-circle-left text-warning', 5),
                                'url' => 'student/pending-list',
                            ),
                            array(
                                'label' => 'Approved List',
                                'type' => 'approved_students',
                                'icon' => array('user-tick text-success', 0),
                                'url' => 'student/approve-list',
                            ),
                            array(
                                'label' => 'Cancel List',
                                'type' => 'cancel_students',
                                'icon' => array('cross-circle text-danger', 2),
                                'url' => 'student/cancel-list',
                            )
                        )
                    ),
                )
            ),
            array(
                'label' => 'Fees Collection',
                'type' => 'fees_collection',
                'icon' => array('bill', 6),
                'condition' => (CHECK_PERMISSION('CENTRE_FEES_COLLECTION')) && !CHECK_PERMISSION('CO_ORDINATE_SYSTEM'),
                'submenu' => array(
                    array(
                        'label' => 'Collect Fee',
                        'type' => 'collect_student_fee',
                        'icon' => array('double-check-circle', 4),
                        'url' => 'student/' . (CHECK_PERMISSION('CUSTOM_STUDENT_FEE') ? 'custom-student-fees' : (CHECK_PERMISSION('FEES_COLLECTION_OLD') ? 'collect-fees' : 'collect-student-fees')),
                    ),
                    array(
                        'label' => 'Search Fee Payment',
                        'type' => 'search_fee_payment',
                        'icon' => array('calendar-tick', 6),
                        'url' => 'student/search-fees-payment',
                    )
                )
            ),
            array(
                'label' => 'Attendance',
                'type' => 'attendance',
                'icon' => array('double-check', 2),
                'condition' => (CHECK_PERMISSION('CENTRE_ATTENDATION_FUNCTION') && CHECK_PERMISSION('ATTENDANCE')), //centre_attendation_function
                'submenu' => array(
                    array(
                        'label' => 'Student Attendance',
                        'type' => 'student_attendance',
                        'icon' => array('double-check-circle', 4),
                        'url' => 'student/attendance',
                    ),
                    array(
                        'label' => 'Attendance By Date',
                        'type' => 'attendance_by_date',
                        'icon' => array('calendar-tick', 6),
                        'url' => 'student/attendance-report',
                    )
                )
            ),
            array(
                'label' => 'List Admit Card(s)',
                'type' => 'list_student_admit_cards',
                'icon' => array('tablet-text-up', 3),
                'url' => 'student/list-admit-card',
            ),
            array(
                'label' => 'List Result',
                'type' => 'list_student_marksheet',
                'icon' => array('tablet-text-up', 3),
                'url' => 'student/list-marksheet',
            ),
            array(
                'label' => 'Get Certificate',
                'type' => 'get_student_certificate',
                'icon' => array('tablet-text-up', 3),
                'url' => 'student/get-certificate',
            )
        )
    );

    $config['center_exam_menu'] = array(
        'title' => 'Online Exam Area',
        'condition' => !OnlyForAdmin() && CHECK_PERMISSION("EXAM"),
        'menu' => array(
            array(
                'label' => 'Student Exam(S)',
                'type' => 'student_exams',
                'icon' => array('note-2', 4),
                'url' => 'exam/student-exams'
            )
        )
    );
} else {
    $config['menu'] = array(
        'title' => 'Student Area',
        'menu' => array(
            array(
                'label' => 'Student Information',
                'type' => 'student_information',
                'icon' => array('profile-user', 3),
                'submenu' => array(
                    array(
                        'label' => 'Student ID Card',
                        'condition' => CHECK_PERMISSION('STUDENT_ID_CARD'),
                        'type' => 'student_id_card',
                        'icon' => array('user-square', 3),
                        'url' => 'student/get-id-card'
                    ),
                    array(
                        'label' => 'Student Details',
                        'type' => 'student_details',
                        'icon' => array('shield-search', 3),
                        'url' => 'student/search',
                    ),
                    array(
                        'label' => 'Student Admission',
                        'type' => 'student_admission',
                        'icon' => array('plus', 3),
                        'url' => 'student/admission',
                    ),
                    array(
                        'label' => 'Passout Student',
                        'type' => 'passout_students',
                        'icon' => array('bookmark-2', 3),
                        'url' => 'student/passout-student-list',
                    ),
                    //ADMISSION_WITH_SESSION
                    array(
                        'label' => 'List By Session',
                        'type' => 'student_list_by_session',
                        'icon' => array('people', 5),
                        'url' => 'student/list-by-session',
                        'condition' => CHECK_PERMISSION('ADMISSION_WITH_SESSION')
                    ),
                    array(
                        'label' => 'List By Center',
                        'type' => 'student_list_by_center',
                        'icon' => array('people', 5),
                        'url' => 'student/list-by-center',
                        'condition' => OnlyForAdmin()
                    ),
                    array(
                        'label' => 'List Student(s)',
                        'type' => 'all_students',
                        'icon' => array('people', 5),
                        'url' => 'student/all',
                        'submenu' => array(
                            array(
                                'label' => 'Pending List',
                                'type' => 'pending_students',
                                'icon' => array('arrow-circle-left text-warning', 5),
                                'url' => 'student/pending-list',
                            ),
                            array(
                                'label' => 'Approved List',
                                'type' => 'approved_students',
                                'icon' => array('user-tick text-success', 0),
                                'url' => 'student/approve-list',
                            ),
                            array(
                                'label' => 'Cancel List',
                                'type' => 'cancel_students',
                                'icon' => array('cross-circle text-danger', 2),
                                'url' => 'student/cancel-list',
                            )
                        )
                    ),
                    // array(
                    //     'label' => 'List By Center',
                    //     'type' => 'list_by_center',
                    //     'condition' => OnlyForAdmin(),
                    //     'icon' => array('tablet-text-down', 4),
                    //     'url' => 'student/list-by-center',
                    // )
                )
            ),
            array(
                'label' => 'Fees Collection',
                'type' => 'fees_collection',
                'icon' => array('bill', 6),
                'condition' => ((OnlyForAdmin() && CHECK_PERMISSION('FEES_COLLECTION')) or CHECK_PERMISSION('CENTRE_FEES_COLLECTION')) && !CHECK_PERMISSION('CO_ORDINATE_SYSTEM'),
                'submenu' => array(
                    array(
                        'label' => 'Collect Fee',
                        'type' => 'collect_student_fee',
                        'icon' => array('double-check-circle', 4),
                        'url' => 'student/' . (CHECK_PERMISSION('CUSTOM_STUDENT_FEE') ? 'custom-student-fees' : (CHECK_PERMISSION('FEES_COLLECTION_OLD') ? 'collect-fees' : 'collect-student-fees')),
                    ),
                    array(
                        'label' => 'Search Fee Payment',
                        'type' => 'search_fee_payment',
                        'icon' => array('calendar-tick', 6),
                        'url' => 'student/search-fees-payment',
                    )
                )
            ),
            array(
                'label' => 'Attendance',
                'type' => 'attendance',
                'icon' => array('double-check', 2),
                'condition' => (OnlyForAdmin() && CHECK_PERMISSION('ATTENDANCE')) or (CHECK_PERMISSION('CENTRE_ATTENDATION_FUNCTION') && CHECK_PERMISSION('ATTENDANCE')), //centre_attendation_function
                'submenu' => array(
                    array(
                        'label' => 'Student Attendance',
                        'type' => 'student_attendance',
                        'icon' => array('double-check-circle', 4),
                        'url' => 'student/attendance',
                    ),
                    array(
                        'label' => 'Attendance By Date',
                        'type' => 'attendance_by_date',
                        'icon' => array('calendar-tick', 6),
                        'url' => 'student/attendance-report',
                    )
                )
            ),
            array(
                'label' => 'Admit Card',
                'type' => 'stduent_admit_card',
                'icon' => array('notepad', 5),
                'submenu' => array(
                    array(
                        'label' => 'Generate Admit Card',
                        'type' => 'generate_student_admit_card',
                        'icon' => array('add-notepad', 4),
                        'url' => 'student/generate-admit-card',
                    ),
                    array(
                        'label' => 'Examination Data',
                        'condition' => CHECK_PERMISSION('STUDENT_EXAMINATION_FORM'),
                        'type' => 'examination_data',
                        'icon' => array('tablet-text-up', 3),
                        'url' => 'student/examination-data',
                    ),
                    array(
                        'label' => 'List Admit Card(s)',
                        'type' => 'list_student_admit_cards',
                        'icon' => array('tablet-text-up', 3),
                        'url' => 'student/list-admit-card',
                    )
                )
            ),
            array(
                'label' => 'Result',
                'type' => 'student_marksheet',
                'icon' => array('notepad', 5),
                'submenu' => array(
                    array(
                        'label' => 'Create Result',
                        'type' => 'generate_student_marksheet',
                        'icon' => array('add-notepad', 4),
                        'url' => 'student/create-marksheet',
                    ),
                    // array(
                    //     'label' => 'Get Result',
                    //     'type' => 'get_student_marksheet',
                    //     'icon' => array('tablet-text-up', 3),
                    //     'url' => 'student/get-marksheet',
                    // ),
                    array(
                        'label' => 'List Result',
                        'type' => 'list_student_marksheet',
                        'icon' => array('tablet-text-up', 3),
                        'url' => 'student/list-marksheet',
                    )
                )
            ),
            array(
                'label' => 'Student Certificate',
                'type' => 'stduent_certificate',
                'icon' => array('notepad', 5),
                'submenu' => array(
                    array(
                        'label' => 'Generate Certificate',
                        'type' => 'generate_student_certiificate',
                        'icon' => array('add-notepad', 4),
                        'url' => 'student/generate-certificate',
                    ),
                    array(
                        'label' => 'Get Certificate',
                        'type' => 'get_student_certificate',
                        'icon' => array('tablet-text-up', 3),
                        'url' => 'student/get-certificate',
                    )
                )
            ),
            array(
                'label' => 'ISO Certificate',
                'type' => 'iso_certificate',
                'icon' => ['notepad', 5],
                'url' => 'cms/iso-certificate',
                'condition' => CHECK_PERMISSION('ISO_CERTIFICATE')
            ),
            array(
                'label' => 'Typing Certificate',
                'type' => 'typing_certificate',
                'icon' => array('notepad', 5),
                'url' => 'student/typing-certificate',
                'condition' => CHECK_PERMISSION('TYPING_CERTIFICATE')
            ),
            array(
                'label' => 'Registration Form',
                'type' => 'stduent_certificate',
                'icon' => array('notepad', 5),
                'condition' => CHECK_PERMISSION('REGISTRATION_CERTIFICATE'),
                'submenu' => array(
                    array(
                        'label' => 'Add Student',
                        'type' => 'add_registration_student',
                        'icon' => array('add-notepad', 4),
                        'url' => 'student/add-registration-student',
                    ),
                    array(
                        'label' => 'Regi.. Verification',
                        'type' => 'student_registration_verification',
                        'icon' => array('add-notepad', 4),
                        'url' => 'student/registration-verification' . (PATH == 'sct_ebook' ? 's' : ''),
                    ),
                    // array(
                    //     'label' => 'Regi.. Certificate',
                    //     'type' => 'stduent_registration_certificate',
                    //     'icon' => array('notepad', 5),
                    //     'url' => 'student/registration-certificate'
                    // ),
                )
            ),
            array(
                'label' => 'Study Material',
                'type' => 'study_material',
                'icon' => array('message-text', 3),
                'url' => 'student/manage-study-material'
            )
        )
    );
    $config['other_documents'] = array(
        'title' => 'Other Documents',
        'condition' => (OnlyForAdmin() && (CHECK_PERMISSION('NON_OBJECTION_CERTIFICATE') or CHECK_PERMISSION('MIGRATION_CERTIFICATE') or CHECK_PERMISSION('PROVISIONAL_CERTIFICATE'))),
        'menu' => array(
            array(
                'label' => 'No Objection Certificate',
                'type' => 'non_objection_certificate',
                'condition' => CHECK_PERMISSION('NON_OBJECTION_CERTIFICATE'),
                'icon' => array('notepad', 5),
                'url' => 'other/non-objection-certificate',
            ),
            array(
                'label' => 'Migration Certificate',
                'type' => 'migration_certificate',
                'icon' => array('notepad', 5),
                'url' => 'other/migration-certificate',
                'condition' => CHECK_PERMISSION('MIGRATION_CERTIFICATE')
            ),
            array(
                'label' => 'Provisional Certificate',
                'type' => 'provisional_certificate',
                'icon' => array('notepad', 5),
                'url' => 'other/provisional-certificate',
                'condition' => CHECK_PERMISSION('PROVISIONAL_CERTIFICATE')
            ),
        )
    );
    // $config['other_docs'] = array(
    //     'title' => 'Other Document(s)',
    //     'condition' => PATH == 'sctnew',
    //     'menu' => array(
    //         array(
    //             'label' => 'NOC Certificate(s)',
    //             'type' => 'noc_certificate',
    //             'icon' => array('file', 4),
    //             'url' => 'student/add-other-document',
    //         ),
    //     )
    // );
    $config['center_exam_menu'] = array(
        'title' => 'Online Exam Area',
        'condition' => !OnlyForAdmin() && CHECK_PERMISSION("EXAM"),
        'menu' => array(
            array(
                'label' => 'Exam(S)',
                'type' => 'exams',
                'icon' => array('note-2', 4),
                'submenu' => array(
                    array(
                        'url' => 'exam/request',
                        'label' => 'Request',
                        'icon' => array('plus', 2)
                    ),
                    array(
                        'url' => 'exam/approved-list',
                        'label' => 'List',
                        'icon' => array('tablet-text-up', 2)
                    )
                )
            ),
            array(
                'label' => 'Student Exam(S)',
                'type' => 'student_exams',
                'icon' => array('note-2', 4),
                'url' => 'exam/student-exams'
            )
        )
    );
}

$config['exam_menu'] = array(
    'title' => 'Online Exam Section',
    'condition' => OnlyForAdmin() && CHECK_PERMISSION('EXAM'),
    'menu' => array(
        array(
            'label' => 'Exam(S)',
            'type' => 'exams',
            'icon' => array('note-2', 4),
            'submenu' => array(
                array(
                    'url' => 'exam/add',
                    'label' => 'Create',
                    'type' => 'create_online_exam',
                    'icon' => array('plus', 2)
                ),
                array(
                    'url' => 'exam/list',
                    'label' => 'List',
                    'icon' => array('tablet-text-up', 2),
                    'type' => 'list_online_exam'
                )
            )
        ),
        array(
            'label' => 'Assign Exam',
            'type' => 'assign_exam',
            'icon' => array('plus-circle', 2),
            // 'url' => 'exam/assign',
            'submenu' => array(
                array(
                    'url' => 'exam/assign-to-center',
                    'label' => 'To Center',
                    'icon' => array('cheque', 7),
                    'type' => 'assign_exam_to_center'
                ),
                array(
                    'url' => 'exam/assign-to-student',
                    'label' => 'To Student',
                    'icon' => array('cheque', 7),
                    'type' => 'assign_exam_to_student'
                )
            )
        ),
        array(
            'label' => 'Student Exam(S)',
            'type' => 'student_exams',
            'icon' => array('note-2', 4),
            'url' => 'exam/student-exams'
        )
    )
);

$config['co_ordinator'] = array(
    'title' => 'Co-Ordinate User',
    'condition' => OnlyForAdmin() && CHECK_PERMISSION("CO_ORDINATE_SYSTEM"),
    'menu' => array(
        array(
            'label' => 'Co Ordinator Account',
            'type' => 'co_ordinate_account',
            'icon' => array('profile-user', 3),
            'submenu' => array(
                array(
                    'label' => 'Create Account',
                    'type' => 'create_co_ordinate_user',
                    'icon' => array('plus', 2),
                    'url' => 'co-ordinate/create'
                ),
                array(
                    'label' => 'List Account(s)',
                    'type' => 'list_co_ordinate_user',
                    'icon' => array('message-text', 2),
                    'url' => 'co-ordinate/list'
                ),
                array(
                    'label' => 'Assign Course(s)',
                    'type' => 'assign_course_co_ordinate_user',
                    'icon' => array('book', 2),
                    'url' => 'co-ordinate/assign-course'
                )
            )
        )
    )
);
$config['center_area'] = array(
    'title' => 'Center Area',
    'condition' => OnlyForAdmin(),
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
                    'url' => 'center/assign-courses-category',
                    'condition' => CHECK_PERMISSION('ASSIGN_COURSE_CATEGORY')
                ),
                array(
                    'label' => 'Assign Courses',
                    'type' => 'assign_courses_with_center',
                    'icon' => array('arrow-circle-right', 2),
                    'url' => 'center/assign-courses',
                    'condition' => !CHECK_PERMISSION('CO_ORDINATE_SYSTEM') && !CHECK_PERMISSION('ASSIGN_COURSE_CATEGORY')
                ),
                array(
                    'label' => 'Pending Centers',
                    'type' => 'list_center',
                    'icon' => array('tablet-text-down text-warning', 4),
                    'url' => 'center/pending-list',
                ),
                array(
                    'label' => 'List Center',
                    'type' => 'list_center',
                    'icon' => array('tablet-text-down', 4),
                    'url' => 'center/list',
                ),
                array(
                    'label' => 'Deleted Center List',
                    'type' => 'deleted_center_list',
                    'icon' => array('tablet-text-down text-danger', 4),
                    'url' => 'center/deleted-list'
                )
            )
        ),
        array(
            'label' => 'Center ID Card',
            'type' => 'id_card',
            'icon' => array('notepad', 5),
            'condition' => CHECK_PERMISSION('FRANCHISE_ID_CARD'),
            'url' => 'center/id-card'
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
$config['payment_setting'] = array(
    'title' => 'Payment Area',
    'condition' => OnlyForAdmin(),
    'menu' => array(
        array(
            'label' => 'Payment Setting',
            'type' => 'center_information',
            'icon' => array('financial-schedule', 4),
            'submenu' => array(
                array(
                    'label' => 'Student',
                    'type' => 'student_payment_setting',
                    'icon' => array('bank', 2),
                    'url' => 'payment/student-payment-setting',
                ),
                array(
                    'label' => 'Center',
                    'type' => 'center_payment_setting',
                    'icon' => array('bank', 2),
                    'url' => 'payment/center-payment-setting',
                )
            )
        )
    )
);
$config['cms_setting'] = array(
    'title' => 'CMS',
    'condition' => OnlyForAdmin(),
    'menu' => array(
        array(
            'label' => 'Manage Role User',
            'icon' => array('people', 5),
            'type' => 'manage_role_user',
            'condition' => CHECK_PERMISSION('ROLE_SYSTEM'),
            'submenu' => array(
                array(
                    'label' => 'Role Category',
                    'type' => 'manage_role_category',
                    'icon' => array('chart', 2),
                    'url' => 'admin/manage-role-category',
                ),
                array(
                    'label' => 'Manage User',
                    'type' => 'manage_user',
                    'icon' => array('people', 5),
                    'url' => 'admin/manage-role-account'
                )

            )
        ),
        array(
            'label' => 'Setting',
            'type' => 'cms_setting',
            'icon' => array('setting-2', 4),
            'url' => 'cms/setting'
        ),
        array(
            'label' => 'SEO Setting',
            'type' => 'seo_setting',
            'icon' => array('setting-4', 4),
            'url' => 'cms/seo-setting'
        ),
        array(
            'label' => 'Gallery Image',
            'type' => 'gallery_setting',
            'icon' => array('picture', 4),
            'url' => 'cms/gallery-images'
        ),
        array(
            'label' => 'Slider',
            'type' => 'slider_setting',
            'icon' => array('picture', 4),
            'url' => 'cms/slider',
            'condition' => !CHECK_PERMISSION('REV_SLIDER'),
        ),
        array(
            'label' => 'Page Area',
            'type' => 'page_area',
            'icon' => array('file', 3),
            'submenu' => array(
                array(
                    'label' => 'Add Pages',
                    'type' => 'add_pages',
                    'icon' => array('add-item', 4),
                    'url' => 'cms/add-page',
                ),
                array(
                    'label' => 'List Pages',
                    'type' => 'list_pages',
                    'icon' => array('tablet-text-down', 4),
                    'url' => 'cms/list-pages',
                ),
                array(
                    'label' => 'Menu Section',
                    'type' => 'cms_menu_section',
                    'icon' => array('menu', 4),
                    'url' => 'cms/menu-section'
                ),

            )
        ),
        array(
            'label' => 'Enquiry Data',
            'type' => 'enquiry_data',
            'icon' => array('tablet-text-down', 4),
            'url' => 'cms/enquiry-data'
        ),
        /*
        array(
            'label' => 'Gallery',
            'type' => 'gallery_section',
            'icon' => array('picture', 3),
            'submenu' => array(
                array(
                    'label' => 'Image Gallery',
                    'type' => 'image_gallery',
                    'icon' => array('picture', 4),
                    'url' => 'cms/image-gallery',
                ),
                array(
                    'label' => 'Video Gallery',
                    'type' => 'list_center',
                    'icon' => array('youtube', 4),
                    'url' => 'cms/video-gallery',
                )
            )
        ),
        */
    )
);
$staticMenus = array(
    array(
        'label' => 'Notice Popup',
        'type' => 'notice_popup',
        'icon' => array('abstract-9', 2),
        'url' => 'cms/static-page/notice-popup'
    ),
    array(
        'label' => 'Forms',
        'type' => 'static_forms',
        'icon' => array('file', 4),
        'url' => 'cms/forms'
    )
);
if (file_exists(THEME_PATH . 'config/menu.php')) { {
        require THEME_PATH . 'config/menu.php';
        $staticMenus[] = $menu;
        unset($menu);
    }

}
$config['fix_properties'] = array(
    'title' => 'Theme Properites',
    'condition' => OnlyForAdmin(),
    'menu' => $staticMenus
)
    ?>