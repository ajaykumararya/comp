<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends MX_Controller
{
    public $public_data = [];
    protected $isValidUrl = false;
    protected $chunkFile = '';
    function __construct()
    {
        parent::__construct();

        if ($post = $this->input->post()) {
            if (isset($post['status']) && $post['status'] == 'temp_login') {
                // pre($this->session);
                $newData = [
                    'admin_id' => $post['temp_center_id'],
                    'admin_type' => 'center',
                    'main_id' => $this->session->userdata('admin_id'),
                    'temp_login' => true
                ];
                $this->session->set_userdata($newData);
                redirect('admin');
                exit;
            }
        }
        $this->load->library('common/database_manager', '', 'build_db');
        $this->load->library('common/ki_theme');
        $this->load->config('form/forms');
        if (CHECK_PERMISSION('REGISTRATION_CERTIFICATE')) {
            append_items('forms', [
                'registration_form' => 'Registration Verification Form',
                'registration_certificate_form' => 'Registration Certificate Form'
            ]);
        }
        if (CHECK_PERMISSION('ISO_CERTIFICATE')) {
            append_items('forms', [
                'iso_certificate_verificate_form' => 'ISO Certificate Verification Form'
            ]);
        }
        if (CHECK_PERMISSION('STUDENT_EXAMINATION_FORM')) {
            append_items('forms', [
                'examination_form' => 'Examination Form',
            ]);
        }
        $this->checkUpdate();
        // if (!defined('DIWALI')) {
        //     define('DIWALI', true);
        //     $this->ki_theme->breadcrumb_action_html('<p class="con" id="Diwalitext">Happy Diwali</p>');
        // }
        // exit(THEME_ID);
        if (file_exists(THEME_PATH . 'config.php') and !defined('theme_config')) {
            // ob_start();
            define('theme_config', true);
            require THEME_PATH . 'config.php';
            if (isset($config) && sizeof($config)) {
                foreach ($config as $item => $value)
                    $this->ki_theme->set_config_item($item, $value);
                unset($config);
            } else
                throw new Exception('Your Theme Config File Is Empty.');
        }
        $adminCard = $this->center_model->isAdminOrCenter() ? '' : 'border-2 border-primary';
        $this->public_data = [
            'base_url' => base_url(),
            'wallet_message' => '',
            'current_url' => $this->my_current_url(),
            'publish_button' => $this->ki_theme->publish_button(),
            'search_button' => $this->ki_theme->save_button('Search', 'calendar-search', 4),
            'view_button' => $this->ki_theme->save_button('View', 'eye', 4),
            'save_button' => $this->ki_theme->set_class('save-btn')->save_button('Save', 'save-2'),
            'update_button' => $this->ki_theme->set_class('save-btn')->save_button('Save Changes', 'save-2'),
            'send_button' => $this->ki_theme->set_class('sen-btn')->save_button('Send', 'send'),
            'card_class' => 'card shadow-sm ' . $adminCard . ' mb-5 ' . ($this->input->post() ? '' : 'd-none'),
            'inr' => ' <span class="">₹</span> ',
            'current_date' => $this->ki_theme->date(),
            'theme_url' => theme_url(),
            'document_path' => base_url() . defined('DOCUMENT_PATH') ? DOCUMENT_PATH : 'assets',
            'admission_button' => $this->ki_theme->save_button('Admission Now', ' fa fa-plus'),
            'assets' => base_url('assets/file/')
        ];
        $this->ki_theme->set_config_item('newicon', img(base_url('themes/newicon' . (THEME == 'theme-05' ? 1 : '') . '.gif')));
        $this->set_data('basic_header_link', $this->parse('site/common-header', [], true));
        // pre($this->public_data,true);
        if ($this->center_model->isAdminOrCenter() || $this->center_model->isCoordinator() || $this->center_model->isRole()) {
            $getCentre = $this->center_model->get_center($this->center_model->loginId(), $this->center_model->login_type());
            $centreRow = $getCentre->row();
            $this->public_data['center_data'] = $getCentre->row_array();
            $this->set_data('profile_image', (file_exists('upload/' . $centreRow->image) ? base_url('upload/' . $centreRow->image) : base_url('assets/media/avatars/300-3.jpg')));
            $type = ucwords(str_replace('_', '-', $this->center_model->login_type()));
            $this->set_data([
                'owner_name' => $centreRow->name,
                'owner_email' => $centreRow->email,
                'owner_phone' => $centreRow->contact_number,
                'owner_address' => $centreRow->center_full_address,
                'owner_id' => $centreRow->id,
                'owner_type' => $type,
                'type' => $type,
                'wallet' => @$centreRow->wallet
            ]);
            // pre($centreRow,true);
            $this->ki_theme->set_wallet(@$centreRow->wallet);
        }
        $get = $this->db->select('active_page')->where('type', 'admin')->get('centers');
        if ($get->num_rows()) {
            defined('DefaultPage') or define('DefaultPage', $get->row("active_page"));
        }
        defined('PROJECT_RAND_NUM') or define('PROJECT_RAND_NUM', mt_rand(0, 999) . strtoupper(PATH) . mt_rand(0, 999));
        // if(PATH == 'iedct')
        //     exit;
        $this->set_data('rollno_text', CHECK_PERMISSION('ROLLNO_AS_ENROLLMENT') ? 'Enrollment No' : 'Roll No');
    }
    public function percentage_check($value)
    {
        if (is_numeric($value) && $value >= 0 && $value <= 100) {
            return TRUE;
        }
        $this->form_validation->set_message('percentage_check', 'The {field} field must be between 0 and 100.');
        return FALSE;
    }
    function checkField($table, $field)
    {
        $checkField = $this->build_db->field_exists($table, $field);
        return $checkField;

    }
    function checkUpdate()
    {
        // $checkField = $this->checkField('students','fee_emi');
        // if(!$checkField){
        //     $this->build_db->add_field('students',[
        //         'fee_emi' => [
        //             'type' => 'varchar(100)',
        //             'default' => null
        //         ],
        //         'fee_emi_type' => [
        //             'type' => 'varchar(100)',
        //             'default' => 'month'
        //         ]
        //     ]);
        // }
        if(CHECK_PERMISSION('FRANCHISE_ID_CARD')){
            $checkField = $this->build_db->field_exists('centers', 'id_card_issue_date');
            if (!$checkField) {
                $this->build_db->add_field('centers', [
                    'id_card_issue_date' => [
                        'type' => 'varchar(100)',
                        'default' => null
                    ]
                ]);
            }
        }
        if (PATH == 'sct_ebook') {
            $checkField = $this->build_db->field_exists('marksheets', 'marksheet_type');
            if (!$checkField) {
                $this->build_db->add_field('marksheets', [
                    'marksheet_type' => [
                        'type' => 'varchar(100)',
                        'default' => null
                    ]
                ]);
            }
            $fields = ['hindi_name', 'hindi_father_name', 'hindi_course_name', 'hindi_center_name'];
            foreach ($fields as $field) {
                $checkField = $this->build_db->field_exists('student_certificates', $field);
                if (!$checkField) {
                    $this->build_db->add_field('student_certificates', [
                        $field => [
                            'type' => 'LONGTEXT',
                            'default' => null
                        ]
                    ]);
                }
            }
        }
        if (CHECK_PERMISSION('CUSTOM_STUDENT_FEE')) {
            $checkField = $this->build_db->field_exists('students', 'custom_fee');
            if (!$checkField) {
                $this->build_db->add_field('students', [
                    'custom_fee' => [
                        'type' => 'varchar(100)',
                        'default' => null
                    ]
                ]);
            }
        }
        $checkField = $this->build_db->field_exists('study_material', 'file_type');
        if (!$checkField) {
            $this->build_db->add_field('study_material', [
                'file_type' => [
                    'type' => 'varchar(100)',
                    'default' => 'file'
                ]
            ]);
        }
        //sign
        $checkField = $this->build_db->field_exists('students_registeration_data', 'sign');
        if (!$checkField) {
            $this->build_db->add_field('students_registeration_data', [
                'sign' => [
                    'type' => 'varchar(100)',
                    'default' => null
                ]
            ]);
        }
        if (PATH == 'sct_ebook') {
            $checkField = $this->build_db->field_exists('students_registeration_data', 'expiry_date');
            if (!$checkField) {
                $this->build_db->add_field('students_registeration_data', [
                    'expiry_date' => [
                        'type' => 'varchar(100)',
                        'default' => null
                    ]
                ]);
            }
            $checkField = $this->build_db->field_exists('students_registeration_data', 'cert_no');
            if (!$checkField) {
                $this->build_db->add_field('students_registeration_data', [
                    'cert_no' => [
                        'type' => 'varchar(100)',
                        'default' => null
                    ]
                ]);
            }
        }
        $fields = ['marital_status', 'category', 'medium', 'adhar_card_no', 'session_id', 'examination_body'];
        foreach ($fields as $field) {
            $checkField = $this->build_db->field_exists('students', $field);
            if (!$checkField) {
                $this->build_db->add_field('students', [
                    $field => [
                        'type' => 'varchar(100)',
                        'default' => null
                    ]
                ]);
            }
        }
        $checkField = $this->build_db->field_exists('session', 'status');
        if (!$checkField) {
            $this->build_db->add_field('session', [
                'status' => [
                    'type' => 'int',
                    'default' => 1
                ]
            ]);
        }
        $checkField = $this->build_db->field_exists('centers', 'show_in_front');
        if (!$checkField) {
            $this->build_db->add_field('centers', [
                'show_in_front' => [
                    'type' => 'int',
                    'default' => 0
                ]
            ]);
        }
        $checkField = $this->build_db->field_exists('centers', 'role_id');
        if (!$checkField) {
            $this->build_db->add_field('centers', [
                'role_id' => [
                    'type' => 'int',
                    'default' => 0
                ]
            ]);
        }
        $checkField = $this->build_db->field_exists('student_fee_transactions', 'status');
        if (!$checkField) {
            $this->build_db->add_field('student_fee_transactions', [
                'late_fee' => [
                    'type' => 'VARCHAR(100)',
                    'default' => 0
                ],
                'status' => [
                    'type' => 'int',
                    'default' => 0
                ]
            ]);
            // $this->db->set('month_year', 'DATE_FORMAT(STR_TO_DATE(payment_date, "%Y-%m-%d"), "%Y-%m")', FALSE);
            $this->db->set('status', '1', FALSE);
            // $this->db->where('payment_date IS NOT NULL', NULL, FALSE);
            $this->db->update('student_fee_transactions');
        }
        if (THEME == 'wp-01') {
            // exit('YES');
            $checkField = $this->build_db->field_exists('content_courses', 'category_id');
            if (!$checkField) {
                $this->build_db->add_field('content_courses', [
                    'category_id' => [
                        'type' => 'int',
                        'default' => 0
                    ]
                ]);
            }
            $checkField = $this->build_db->field_exists('content_courses', 'price');
            if (!$checkField) {
                $this->build_db->add_field('content_courses', [
                    'price' => [
                        'type' => 'VARCHAR(100)',
                        'default' => 0
                    ]
                ]);
            }
            $checkField = $this->build_db->field_exists('content_courses', 'eligibilty');
            if (!$checkField) {
                $this->build_db->add_field('content_courses', [
                    'eligibilty' => [
                        'type' => 'VARCHAR(100)',
                        'default' => 0
                    ]
                ]);
            }
        }
        if (CHECK_PERMISSION('CENTRE_STUDENT_CERTIFICATE_PERMISSION')) {
            $checkField = $this->build_db->field_exists('centers', 'certificate_create_from');
            if (!$checkField) {
                $this->build_db->add_field('centers', [
                    'certificate_create_from' => [
                        'type' => 'VARCHAR(100)',
                        'default' => null
                    ],
                    'certificate_create_to' => [
                        'type' => 'VARCHAR(100)',
                        'default' => null
                    ]
                ]);
            }
        }
    }

    function encode($id = 0)
    {
        return $this->ki_theme->encrypt($id);
    }
    function access_method()
    {
        $this->isValidUrl = true;
        return $this;
    }
    function decode($id = 0)
    {
        return $this->ki_theme->decrypt($id);
    }
    function file_up($file)
    {
        if (isset($_FILES[$file]['name']) && !empty($_FILES[$file]['name'])) {
            $filename = $_FILES[$file]['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $x = getRadomNumber(10) . '.' . $ext;
            // $saveName = UPLOAD.$x;
            $config['upload_path'] = UPLOAD;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
            $config['max_size'] = ($this->ki_theme->default_vars('max_upload_size') / 1024); // max_size in kb
            $config['file_name'] = $x;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload($file)) {
                //    $uploadData = $this->upload->data();
                return $this->upload->data('file_name');
            } else
                $this->response('error', $this->upload->display_errors());
        }
        return '';
    }
    function chunkUpload($folder_name = false)
    {
        $uploadDir = './upload/';
        if ($folder_name)
            $uploadDir .= "$folder_name/";
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Get chunk info
        $fileName = $this->input->post('fileName');
        $totalChunks = $this->input->post('totalChunks');
        $currentChunk = $this->input->post('currentChunk');


        if (!empty($_FILES['chunk']['tmp_name'])) {
            // Append chunk to the target file
            $filePath = $uploadDir . $fileName;
            $out = fopen($filePath, $currentChunk == 1 ? 'wb' : 'ab'); // Write for first chunk, append for others
            $in = fopen($_FILES['chunk']['tmp_name'], 'rb');

            if ($out && $in) {
                while ($buff = fread($in, 4096)) {
                    fwrite($out, $buff);
                }
            }

            fclose($out);
            fclose($in);

            if ($currentChunk == $totalChunks) {
                $this->chunkFile = $fileName;
                $_POST['_file_name'] = $fileName;
                unset($_POST['fileName'], $_POST['totalChunks'], $_POST['currentChunk']);
                return true;
            } else {
                // Return success and continue with next chunk
                $this->response(['uploading' => true, 'message' => "File $currentChunk of $totalChunks uploaded."]);
            }
        } else {
            $this->response('error', 'No file uploaded.');
        }
        return false;
    }
    function chunkFile()
    {
        return $this->chunkFile;
    }
    function template($file)
    {
        return $this->parser->parse("template/$file", $this->public_data, true);
    }
    public function gen_roll_no($center_id = 0)
    {
        // sleep(1);
        if ($center_id) {
            $getPreFix = $this->db->select('rollno_prefix')->where('id', $center_id)->get('centers');
            $start = 1;
            if ($getPreFix->num_rows()) {
                $preFixRoll = $getPreFix->row("rollno_prefix");
                if ($preFixRoll) {
                    $lastRollNO = $this->db->select('roll_no')->where('center_id', $center_id)->order_by('id', 'DESC')->limit(1)->get('students');
                    if ($lastRollNO->num_rows()) {
                        $lastNumber = $lastRollNO->row('roll_no');
                        $filterRoll = substr($lastNumber, strlen($preFixRoll));
                        if ($filterRoll)
                            $start = (intval($filterRoll) + 1);
                    }
                    return $this->check_roll_exists_or_not($preFixRoll, $preFixRoll . $start);
                }
            }
        }
        return false;
    }
    //this is a recursion function for check existing...
    function check_roll_exists_or_not($preFixRoll, $rollNo)
    {
        $check = $this->db->select('roll_no')->where('roll_no', $rollNo)->get('students');
        if ($check->num_rows()) {
            $lastNumber = $check->row('roll_no');
            $filterRoll = substr($lastNumber, strlen($preFixRoll));
            if ($filterRoll)
                $start = ($filterRoll + 1);
            return $this->check_roll_exists_or_not($preFixRoll, $preFixRoll . $start);
        }
        return $rollNo;
    }
    private function my_current_url()
    {
        if (strtolower($this->router->fetch_class()) == 'login' and ($this->router->fetch_method() == 'index')) {
            return base_url('admin');
        }
        return current_url();
    }
    function set_data($data = '', $value = '')
    {
        if (is_array($data)) {
            foreach ($data as $k => $v)
                $this->set_data($k, $v);
        } else
            $this->public_data[$data] = $value;
        return $this;
    }
    function get_data($index = '')
    {
        if (isset($this->public_data[$index]))
            return $this->public_data[$index];
        return;
    }
    function parse($file, $data = [], $return = false)
    {
        $this->set_data($data);
        // if (!file_exists(DOCUMENT_PATH . '/' . $file) && !strpos($file, '/') && $this->router->fetch_class() == 'document') {
        //     return false;
        // } else
        return $this->parser->parse($file, $this->public_data, $return);
    }
    function student_view($view, $data = [])
    {
        if ($this->student_model->isStudent()) {
            $this->set_data($this->student_model->get_student_via_id($this->student_model->studentId())->row_array());
            $data['menu_item'] = $this->ki_theme->get_student_menu();
            $this->set_data($data);
            $this->set_data('breadcrumb', $this->ki_theme->get_breadcrumb());
            $this->__common_view('panel/' . $view, $data);
            $this->parse('student/panel/main', $this->public_data);
        } else
            $this->parse('student/panel/login');
    }

    function __common_view($view, $data = [])
    {
        if (($this->ki_theme->isValidUrl() or $this->isValidUrl) or (isset($data['isValid']) and $data['isValid'])) {
            $module = $this->load->get_module();
            $file = strtolower($this->router->fetch_method());
            $jsFile = "assets/custom/{$module}/{$file}.js";
            $this->set_data('wallet_message', $this->ki_theme->wallet_message());
            if (!isset($this->public_data['js_file']))
                $this->public_data['js_file'] = '';
            if (file_exists(FCPATH . $jsFile)) {
                $this->public_data['js_file'] = '<script src="' . base_url($jsFile) . '"></script>';
            }
            $output = (isset($this->public_data['page_output']) ? $this->public_data['page_output'] : '') . "\n\n";
            try {
                $this->public_data['page_output'] = $output . ($this->parse($view, $this->public_data, true));
            } catch (Exception $r) {
                pre($r->getMessage(), true);
            }
        } else {
            $this->ki_theme->setPageState(403);
            $this->public_data['page_output'] = $this->template('permission-denied');
        }
    }
    function view($view, $data = [], $return = false)
    {
        $this->load->library(['session']);
        if ($this->session->has_userdata('admin_login') == true) {
            $data['menu_item'] = $this->ki_theme->get_menu();
            $this->set_data($data);
            $this->__common_view($view, $data);
            // pre($this->public_data,true);
            return $this->parse('admin/main', $this->public_data, $return);
        } else {
            $this->parser->parse('login/admin_login', $this->public_data);
        }
    }
    function do_email($to, $subject, $message)
    {
        $config = $this->load->config('email', true);
        $show_response = $config['show_response'];
        $from = $config['project_email'];
        $name = $config['project_name'];
        unset($config['show_response'], $config['project_email'], $config['project_name']);
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from($from, $name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            return true;
        } else {
            if ($show_response)
                echo 'Error sending email: ' . $this->email->print_debugger();
        }
        return false;
    }
    function init_setting()
    {
        $get = $this->db->get('settings');
        if ($get->num_rows()) {
            foreach ($get->result() as $row) {
                $value = isJson($row->value) ? json_decode($row->value) : $row->value;
                $this->set_data($row->type, $value);
                $this->ki_theme->set_config_item($row->type, $value);
            }
        }
        return $this;
    }
}
class Site_Controller extends MY_Controller
{
    public $isOK = false;
    public $pageData = ['label' => '', 'id' => 0];
    function __construct($config = [])
    {
        parent::__construct();
        $this->set_data($config);
        $favicon = ES('favicon', false);
        if (!$favicon) {
            $favicon = ES('logo');
        }
        $this->set_data('favicon_file', $favicon);
        $this->set_data('link_css', $this->parse('_common/head', [], true));
        $this->set_data('YEAR', date('Y'));
        $this->set_data('copyright', ' All right reserved designed by
        ' . $this->company_name());
        $items = $this->SiteModel->print_menu_items([], true);
        $this->set_data('menus', $items['menus']);
        $this->set_data('breadcrumb', $items['breadcrumb']);
        $index = uri_string() == '' ? base_url() : base_url(uri_string());
        $this->isOK = (array_key_exists($index, $items['all_pages_link']));
        // echo $index;
        // pre($items,true);
        if ($this->isOK) {
            $this->pageData = $items['all_pages_link'][$index];
            defined('CURRENT_PAGE_ID') or define('CURRENT_PAGE_ID', $this->pageData['id']);
            // pre($this->pageData,true);
            $this->set_data('page_name', $this->pageData['label']);
        }
        $this->init_setting();
        $this->set_data('head', $this->parse('head', [
            'isPrimary' => (DefaultPage == $this->pageData['id'])
        ], true));
    }
    function company_name()
    {
        $html = '<img src="' . base_url('assets') . '/second.gif" style="height:23px">
        <span><a style="color:#ffffff;" href="https://hyperprowebtech.com/" target="_blank"
                rel="noopener noreferrer"> Hyper Pro
                Webtech .</a></span>';
        if (PATH == 'zcc')
            return '<img src="' . base_url('assets') . '/second.gif" style="height:23px">' . ES('title');
        return $html;
    }
    function render($view = '', $data = [], $return = false)
    {
        if (is_array($data))
            $this->set_data($data);
        if (isset($this->public_data['title'])) {
            $this->ki_theme->set_title($this->public_data['title'], true);
            // $this->set_data('head', $this->parse('head', [], true));
        }
        // pre($this->public_data,true);
        $this->public_data['output'] = is_string($data) ? $view : ($this->parse($view, $this->public_data, true));
        $this->public_data['html'] = $this->parse('main', $this->public_data, true);
        return $this->parse('render', $this->public_data, $return);
    }
}
?>