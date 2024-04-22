<?php
$config['dashboard'] = array(
    'menu' => array(
        array('label' => 'Dashboard', 'type' => 'dashboard', 'url' => 'admin')
    )
);
$config['academics'] = array(
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
                    'url' => 'course/manage-subjects'
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

$config['menu'] = array(
    'title' => 'Student Area',
    'menu' => array(
        array(
            'label' => 'Student Information',
            'type' => 'student_information',
            'icon' => array('profile-user', 3),
            'submenu' => array(
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
                // array(
                //     'label' => 'Online Admission',
                //     'type' => 'online_admission',
                //     'icon' => array('bookmark-2', 3),
                //     'url' => 'student/online-admission',
                // ),
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
            'condition' => (OnlyForAdmin() && CHECK_PERMISSION('FEES_COLLECTION')) or CHECK_PERMISSION('CENTRE_FEES_COLLECTION'),
            'submenu' => array(
                array(
                    'label' => 'Collect Fee',
                    'type' => 'collect_fee',
                    'icon' => array('double-check-circle', 4),
                    'url' => 'student/collect-fees',
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
            'condition' => OnlyForAdmin() && CHECK_PERMISSION('ATTENDANCE'),
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
                // array(
                //     'label' => 'Get Admit Card',
                //     'type' => 'get_student_admit_card',
                //     'icon' => array('tablet-text-up', 3),
                //     'url' => 'student/get-admit-card',
                // ),
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
            'label' => 'Study Material',
            'type' => 'study_material',
            'icon' => array('message-text', 3),
            'url' => 'student/manage-study-material'
        )
    )
);

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
                    'icon' => array('plus', 2)
                ),
                array(
                    'url' => 'exam/list',
                    'label' => 'List',
                    'icon' => array('tablet-text-up', 2)
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
                    'icon' => array('cheque', 7)
                ),
                array(
                    'url' => 'exam/assign-to-student',
                    'label' => 'To Student',
                    'icon' => array('cheque', 7)
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
                    'label' => 'Assign Courses',
                    'type' => 'assign_courses_with_center',
                    'icon' => array('arrow-circle-right', 2),
                    'url' => 'center/assign-courses',
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
            'label' => 'Setting',
            'type' => 'cms_setting',
            'icon' => array('setting-2', 4),
            'url' => 'cms/setting'
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
            'url' => 'cms/slider'
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