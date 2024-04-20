<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends MX_Controller
{
    public $public_data = [];
    protected $isValidUrl = false;
    function __construct()
    {
        parent::__construct();

        $this->load->library('common/ki_theme');
        $this->load->config('form/forms');
        // exit(THEME_ID);
        if (file_exists(THEME_PATH . 'config.php') and !defined('theme_config')) {
            // ob_start();
            define('theme_config', true);
            require THEME_PATH . 'config.php';
            if (isset($config) && sizeof($config)) {
                foreach ($config as $item => $value)
                    $this->ki_theme->set_config_item($item, $value);
                unset($config);
            }
            else
                throw Exception('Your Theme Config File Is Empty.');
        }
        
        $this->public_data = [
            'base_url' => base_url(),
            'current_url' => $this->my_current_url(),
            'publish_button' => $this->ki_theme->publish_button(),
            'search_button' => $this->ki_theme->save_button('Search', 'calendar-search', 4),
            'save_button' => $this->ki_theme->set_class('save-btn')->save_button('Save', 'save-2'),
            'update_button' => $this->ki_theme->set_class('save-btn')->save_button('Save Changes', 'save-2'),
            'send_button' => $this->ki_theme->set_class('sen-btn')->save_button('Send', 'send'),
            'card_class' => 'card shadow-sm border-2 border-primary',
            'inr' => ' <span class="">₹</span> ',
            'current_date' => $this->ki_theme->date(),
            'theme_url' => theme_url(),
            'document_path' => base_url() . defined('DOCUMENT_PATH') ? DOCUMENT_PATH : 'assets',
            'admission_button' => $this->ki_theme->save_button('Admission Now', ' fa fa-plus'),
        ];
        $this->ki_theme->set_config_item('newicon',img(base_url('themes/newicon.gif')));
        $this->set_data('basic_header_link', $this->parse('site/common-header', [], true));
        // pre($this->public_data,true);
        if ($this->center_model->isAdminOrCenter()) {
            $getCentre = $this->center_model->get_center($this->center_model->loginId(), $this->center_model->login_type());
            $centreRow = $getCentre->row();
            $this->public_data['center_data'] = $getCentre->row_array();
            $this->set_data('profile_image', (file_exists('upload/' . $centreRow->image) ? base_url('upload/' . $centreRow->image) : base_url('assets/media/avatars/300-3.jpg')));
            $this->set_data([
                'owner_name' => $centreRow->name,
                'owner_email' => $centreRow->email,
                'type' => ucwords($this->center_model->login_type()),
                'wallet' => @$centreRow->wallet
            ]);
            $this->ki_theme->set_wallet(@$centreRow->wallet);
        }
        $get = $this->db->select('active_page')->where('type', 'admin')->get('centers');
        if ($get->num_rows()) {
            defined('DefaultPage') or define('DefaultPage', $get->row("active_page"));
        }
    }
    
    function encode($id = 0)
    {
        return $this->ki_theme->encrypt($id);
    }
    function access_method()
    {
        return $this->isValidUrl = true;
    }
    function decode($id = 0)
    {
        return $this->ki_theme->decrypt($id);
    }
    function file_up($file)
    {
        if (!empty($_FILES[$file]['name'])) {
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
                            $start = ($filterRoll + 1);
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
    function get_data($index = ''){
        if(isset($this->public_data[$index]))
            return $this->public_data[$index];
        return;
    }
    function parse($file, $data = [], $return = false)
    {
        $this->set_data($data);
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
            $this->set_data('wallet_message',$this->ki_theme->wallet_message());
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
    function __construct()
    {
        parent::__construct();
        $this->set_data('link_css', $this->parse('_common/head', [], true));
        $this->set_data('YEAR', date('Y'));
        $this->set_data('copyright', ' All right reserved designed by
        <img src="' . base_url('assets') . '/second.gif" style="height:23px">
        <span><a style="color:#ffffff;" href="https://hyperprowebtech.com/" target="_blank"
                rel="noopener noreferrer"> Hyper Pro
                Webtech .</a></span>');
        $items = $this->SiteModel->print_menu_items([], true);
        $this->set_data('menus', $items['menus']);
        $index = uri_string() == '' ? base_url() : base_url(uri_string());
        $this->isOK = (array_key_exists($index, $items['all_pages_link']));
        // echo $index;
        // pre($items,true);
        if ($this->isOK) {
            $this->pageData = $items['all_pages_link'][$index];
            $this->set_data('page_name', $this->pageData['label']);
        }
        $this->init_setting();
        $this->set_data('head', $this->parse('head', [], true));
    }
    function render($view = '', $data = [], $return = false)
    {
        if (is_array($data))
            $this->set_data($data);
        if(isset($this->public_data['title'])){
            $this->ki_theme->set_title($this->public_data['title'],true);
            $this->set_data('head', $this->parse('head', [], true));
        }
        // pre($this->public_data,true);
        $this->public_data['output'] = is_string($data) ? $view : ($this->parse($view, $this->public_data, true));
        $this->public_data['html'] = $this->parse('main', $this->public_data, true);
        return $this->parse('render', $this->public_data, $return);
    }
}
?>