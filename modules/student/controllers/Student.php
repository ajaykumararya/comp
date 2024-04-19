<?php
class Student extends MY_Controller
{
    function index()
    {
        // $this->parse('panel/index');
        // $this->student_view('profile');
        redirect('student/profile');

    }
    function my_exam(){
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
    function collect_fees()
    {
        $this->view('collect-fees');
    }
    function search_fees_payment()
    {
        $this->view('search-fees-payment');
    }
    function generate_certificate()
    {
        $this->view('generate-ceriticate');
    }
    function get_certificate()
    {
        $this->view('get-certificate');
    }
    function create_marksheet()
    {
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
            'setting' => ['title' => 'Account Setting', 'icon' => array('setting-2', 2), 'url' => 'setting'],
            'fee-record' => ['title' => 'Account Fees Record', 'icon' => array('two-credit-cart', 3), 'url' => 'fee-record'],
            'change-password' => ['title' => 'Account Change Password', 'icon' => array('key', 2), 'url' => 'change-password'],
            'documents' => [
                'title' => 'Document(s)',
                'icon' => array('tablet-book',5),
                'url' =>  'documents'
            ]
        ];
        
        if (is_numeric($stdId) and $stdId) {
            if(!$this->student_model->isStudent())   {
                $tabs['other'] = [
                    'title' => 'Other Setting',
                    'icon' => array('pencil',3),
                    'url'  => 'other'
                ];
            }
            $get = $this->student_model->get_student_via_id($stdId);
            if ($get->num_rows()) {
                $this->ki_theme->set_breadcrumb($tabs[$tab]);
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

    function manage_study_material(){
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
    function coupons(){
        $this->view(__FUNCTION__);
    }
}
?>