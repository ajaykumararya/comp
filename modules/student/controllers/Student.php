<?php
class Student extends MY_Controller
{
    function index()
    {
        redirect('student/profile');

    }
    function examination_data()
    {
        $this->view('examination-data');
    }
    function my_exam()
    {
        $this->student_view('my-exam');
    }
    function dashboard()
    {
        redirect('student/profile');
        // $this->student_view('profile');
    }
    function marksheets()
    {
        $this->student_view('marksheets');
    }
    function admit_card()
    {
        $this->student_view('admit-card');
    }
    function certificate()
    {
        $this->student_view('certificate');
    }
    function sign_out()
    {
        $this->session->unset_userdata('student_login');
        $this->session->unset_userdata('student_id');
        redirect('student');
    }


    function pending_list()
    {
        $this->view('all', ['title' => 'Pending']);
    }
    function approve_list()
    {
        $this->view('all', ['title' => 'Approved']);
    }
    function cancel_list()
    {
        $this->view('all', ['title' => 'Cancel']);
    }
    function search()
    {
        $this->view('search');
    }
    function admission()
    {
        $this->ki_theme->get_wallet_amount('student_admission_fees');
        if (file_exists(DOCUMENT_PATH . '/forms/admin_student_admission' . EXT))
            $this->view('forms/admin_student_admission');
        else
            $this->view('admission');
    }
    function online_admission()
    {
        $this->view('online-admission');
    }
    function all()
    {
        $this->view('all');
    }
    function attendance()
    {
        $this->view('attendance');
    }
    function attendance_report()
    {
        $this->view('attendance');
    }
    function generate_admit_card()
    {
        $this->view('generate-admit-card');
    }
    function get_admit_card()
    {
        $this->view('get-admit-card');
    }
    function list_admit_card()
    {
        $this->view('list-admit-card');
    }
    function collect_fees() // old of collect_student_fees
    {
        $this->access_method();
        $this->view('collect-fees');
    }
    function collect_student_fees() // updated from collect_fees
    {
        $this->view('collect-student-fees');
    }
    function custom_student_fees()
    {
        $this->view('custom-student-fees');

    }
    function search_fees_payment()
    {
        // $this->ki_theme->breadcrumb_action_html('filter_fee_record', true);
        $this->view('search-fees-payment');
    }
    function generate_certificate()
    {
        $this->ki_theme->get_wallet_amount('student_certificate_fees');

        $this->view('generate-ceriticate');
    }
    function get_certificate()
    {
        $this->view('get-certificate');
    }
    function create_marksheet()
    {
        $this->ki_theme->get_wallet_amount('student_marksheet_fees');

        $this->view('create-marksheet');
    }
    function list_marksheet()
    {
        $this->view('list-marksheet');
    }
    function get_marksheet()
    {
        $this->view('get-marksheet');
    }
    function profile($stdId = 0, $tab = 'overview')
    {
        $tabs = [
            'overview' => ['title' => 'Account Overview', 'icon' => array('people', 2), 'url' => ''],
            'setting' => ['title' => 'Update', 'icon' => array('pencil', 3), 'url' => 'setting'],
            'fee-record' => ['title' => 'Account Fees Record', 'icon' => array('two-credit-cart', 3), 'url' => 'fee-record']
        ];


        if ($this->center_model->isAdminOrCenter()) {
            $tabs['documents'] = [
                'title' => 'Document(s)',
                'icon' => array('tablet-book', 5),
                'url' => 'documents'
            ];
        } else {
            $tabs['fee-emis'] = [
                'title' => 'Fee EMIs Record',
                'icon' => ['two-credit-cart', 3],
                'url' => 'fee-emis'
            ];
        }

        $tabs['change-password'] = ['title' => 'Account Change Password', 'icon' => array('key', 2), 'url' => 'change-password'];

        if (table_exists('manual_notifications')) {
            $tabs['notification'] = [
                'title' => 'Notification(s)',
                'icon' => array('notification', 3),
                'url' => 'notification'
            ];
        }
        if (is_numeric($stdId) and $stdId) {
            if (!$this->student_model->isStudent()) {
                $tabs['other'] = [
                    'title' => 'Setting',
                    'icon' => array('setting-2', 2),
                    'url' => 'other'
                ];
            }
            $get = $this->student_model->get_student_via_id($stdId);
            if ($get->num_rows()) {
                if (isset($tabs[$tab]))
                    $this->ki_theme->set_breadcrumb($tabs[$tab]);
                // pre($get->row_array(),true);
                $this->set_data($get->row_array());
                $this->set_data('student_details', $get->row_array());
                // pre($this->public_data,true);
                $this->view('profile', ['isValid' => true, 'tabs' => $tabs, 'tab' => $tab, 'current_link' => base_url('student/profile/' . $stdId), 'student_id' => $stdId]);

            }
        } else {
            if ($this->student_model->isStudent()) {
                $tab = $this->uri->segment(3, 'overview');
                $stdId = $this->student_model->studentId();
                $get = $this->student_model->get_student_via_id($stdId);
                unset($tabs['setting']);
                if ($get->num_rows()) {
                    $this->ki_theme->set_breadcrumb($tabs[$tab]);
                    $this->set_data($get->row_array());
                    $this->set_data('student_details', $get->row_array());
                    $this->set_data('isStudent', true);
                    // exit($tab);
                    // $this->student_view($tab,['isValid' => true,'isStudent' => true]);
                    $this->student_view('../profile', ['isValid' => true, 'tabs' => $tabs, 'tab' => $tab, 'current_link' => base_url('student/profile'), 'student_id' => $stdId]);
                }
            } else
                $this->student_view('index');
        }
    }
    function your_attendance()
    {
        $this->student_view('your_attendance');
    }
    function id_card()
    {
        if ($this->student_model->isStudent()) {
            redirect('id-card/' . $this->ki_theme->encrypt($this->student_model->studentId()));
        } else
            show_404();
    }

    function manage_study_material()
    {
        $this->view(__FUNCTION__);
    }
    // test area
    function loginId()
    {
        return 2;
    }
    function test()
    {
        //    $this->load->view('firebase');
        // $this->ki_theme->set_default_vars('max_upload_size',10485760);
        // echo $this->ki_theme->default_vars('max_upload_size') / 1024;
        // echo $this->student_model->study_materials()->num_rows();
        // $where = ['course_id' => 11, 'isDeleted' => 0];
        // $subjects = $this->student_model->course_subject($where);
        // echo $subjects->num_rows();
        $record = $this->exam_model->get_shuffled_questions(1, 10);
        pre($record);
    }
    // this is only for referral code
    function coupons()
    {
        $this->view(__FUNCTION__);
    }
    function passout_student_list()
    {
        $this->view('passout-student-list');
    }
    function get_id_card()
    {
        $this->view('get-id-card');
    }
    function list_by_center()
    {
        $this->view('list-by-center');
    }
    function list_by_session()
    {
        $this->view('list-by-session');
    }
    function course_study_material()
    {
        if ($view = $this->uri->segment(3, 0)) {
            // echo $view;
            try {
                $this->token->decode($view);
                // pre($this->token->data(),true);
                $this->student_view('course-study-material', [
                    'isValid' => true,
                    'course_id' => $this->token->data('course_id'),
                    'student_id' => $this->token->data('student_id'),
                    'file_type' => $this->token->data('file_type'),
                ]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    function study_material()
    {
        if ($view = $this->uri->segment(3, 0)) {
            try {
                // throw new Exception('HELLO');
                $this->token->decode($view);
                $id = ($this->token->data('id'));
                $student_id = ($this->token->data('student_id'));
                if ($student_id == $this->session->userdata('student_id')) {
                    $get = $this->db->where(['material_id' => $id])->get('study_material');

                    if (!$get->num_rows())
                        throw new Exception('Material Not Found..');
                    // echo $this->token->expiredOn();
                    $row = $get->row();
                    if ($row->file_type == 'file') {
                        $file = $row->file;
                        $this->load->view('panel/study', ['url' => base_url('assets/student-study/' . $row->material_id)]);
                    } else if ($row->file_type == 'youtube') {
                        if ($videoId = getYouTubeId($row->file)) {
                            // echo $videoId;
                            $this->load->view('panel/youtube-study', ['id' => $videoId, 'title' => $row->title]);

                        } else
                            throw new Exception('Invalid File..');
                    } else
                        throw new Exception('Something went wrong.');
                } else
                    throw new Exception('This link not available..');

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else
            $this->student_view('study-material', ['isValid' => true]);
    }
    /*
    function study_material()
    {
        if ($view = $this->uri->segment(3, 0)) {
            try {
                // throw new Exception('HELLO');
                $this->token->decode($view);
                $id = ($this->token->data('id'));
                if ($this->token->data('status') == 'ISADMIN')
                    $get = $this->student_model->get_study_material($id);
                else
                    $get = $this->student_model->get_student_study(['material_id' => $id]);

                if (!$get->num_rows())
                    throw new Exception('Not Found..');
                // echo $this->token->expiredOn();
                $row = $get->row();
                $file = urlencode($row->material_file);
                $this->load->view('panel/study', ['url' => base_url('assets/student-study/' . $file)]);

            } catch (Exception $e) {
                // urlencode()
            }
        } else
            $this->student_view('study-material');
    }
            */
    function placements()
    {
        if (table_exists('placement_students')) {
            $this->view('placements', ['isValid' => true]);
        }
    }
    function typing_certificate()
    {
        if (CHECK_PERMISSION(strtoupper(__FUNCTION__))) {
            $this->view('certificate/typing');
        }
    }
    function registration_certificate()
    {
        // echo 'YES';
        $this->view('registration-certificate');
    }
    function registration_verification()
    {
        $this->view('registration-verification');
    }
    function registration_verifications()
    {
        $this->view('registration-verification');
    }
    function add_registration_student()
    {
        $this->view('add-registration-student');
    }
    function registration_edit()
    {
        if ($post = $this->input->post()) {
            $id = base64_decode($this->uri->segment(3, 0));
            if (PATH == 'sct_ebook') {
                $chk = $this->db->where('cert_no', $this->input->post('cert_no'))->get('students_registeration_data');
                if ($chk->num_rows()) {
                    if ($chk->row('id') != $id) {
                        $this->session->set_flashdata('error', ' Certificate no ' . $chk->row('cert_no') . ' is already used in ' . $chk->row('registration_no') . ' Registation no.');
                        redirect(current_url());
                        exit;
                    }
                }
            }
            $data = [
                'name' => $this->input->post('name'),
                'father_name' => $this->input->post('father_name'),
                'mother_name' => $this->input->post('mother_name'),
                'exam_roll_no' => $this->input->post('exam_roll_no'),
                'enrollment_no' => $this->input->post('enrollment_no'),
                'exam_or_course' => $this->input->post('exam_or_course'),
                'institute_name' => $this->input->post('institute_name'),
                'exam_centre_name' => $this->input->post('exam_centre'),
                'year' => $this->input->post('year_of_passing'),
                'pass_or_fail' => $this->input->post('pass_or_fail'),
                'dob' => $this->input->post('dob'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'address' => $this->input->post("address"),
                'training_period' => $this->input->post('training_period'),
                'examination_body' => $this->input->post('examination_body'),
                'registration_no' => $this->input->post('registration_no'),
                'date' => $this->input->post('date')
            ];
            if (PATH == 'sct_ebook') {
                $data['expiry_date'] = $this->input->post('expiry_date');
                $data['cert_no'] = $this->input->post('cert_no');
            }
            $this->db->where('id', $id)->update('students_registeration_data', $data);
            $this->session->set_flashdata('success', 'Data Updated Successfully..');
            redirect(current_url());
        } else {
            $this->view('registration-edit', [
                'isValid' => $this->uri->segment(3, 0),
            ]);
        }
    }
    function other_document()
    {
        $this->student_view('other_documents');
    }
    function delete_account()
    {
        $this->student_view(__FUNCTION__);
    }
}
?>