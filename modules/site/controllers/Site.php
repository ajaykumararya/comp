<?php
use chillerlan\QRCode\Data\Number;
use Picqer\Barcode\BarcodeGeneratorPNG; // PNG के लिए
use Picqer\Barcode\BarcodeGeneratorSVG; // SVG के लिए

defined('BASEPATH') or exit('No direct script access allowed');
class Site extends Site_Controller
{
    public function index()
    {
        if ($this->isOK) {
            $this->render(
                'schema',
                $this->container()
            );
        } else
            $this->error_404();
    }
    function email()
    {
        $this->set_data([
            'name' => 'Ajay Kumar Arya',
            'mobile' => '456789'
        ]);
        echo $this->do_email('sitejeannie@gmail.com', 'New Demo Checklist', $this->template('email/demo-query'));
    }
    function course_details()
    {
        try {
            $token = $this->uri->segment(2, 0);
            if (!$token)
                throw new Exception('Token not found..');
            $get = $this->token->decode($token);
            if (!isset($get['prod_id']))
                throw new Exception('Product id not found..');
            $product = $this->SiteModel->get_contents('popular_course', ['id' => $get['prod_id']]);
            if (!$product->num_rows())
                throw new Exception('');
            $content = $this->parse('pages/course-details', $product->row_array(), true);
            $this->page_view($content, ['page_name' => 'yes']);
        } catch (Exception $r) {
            $this->error_404();
        }

        // echo 'UES';
    }
    function container()
    {
        $data = $this->pageData;
        $return = ['page_name' => $data['label'], 'content' => '', 'isPrimary' => (DefaultPage == $data['id'])];
        $pageSchema = $this->SiteModel->get_page_schema($data['id']);
        if ($pageSchema->num_rows()) {
            $html = '';
            if ($this->input->get('ebook') == 'cart' && CHECK_PERMISSION('EBOOK')) {
                $return['page_name'] = "Shopping Cart";
                $html = $this->parse('ebook/cart', [], true);
            }
            foreach ($pageSchema->result() as $page) {
                switch ($page->event) {
                    case 'content':
                        $get = $this->SiteModel->page_content($page->page_id);
                        if ($get->num_rows()) {
                            if (file_exists(THEME_PATH . 'content.php'))
                                $html .= $this->parse('content', ['content' => $get->row('content')] + $return, true);
                            else
                                $html .= $get->row('content');
                        }
                        break;
                    case 'faculty_category':
                        if (file_exists(THEME_PATH . 'pages/' . $page->event . EXT))
                            $html .= $this->parse('pages/' . $page->event, [
                                'type' => $page->event_id
                            ], true);
                        break;
                    case 'page':
                        // $html .= json_encode($page);
                        if (file_exists(THEME_PATH . 'pages/' . $page->event_id . EXT))
                            $html .= $this->parse('pages/' . $page->event_id, [
                                'type' => $page->event_id
                            ], true);
                        else if ($this->ki_theme->view_exists('cms', 'pages/' . $page->event_id)) {
                            $html .= $this->parse('cms/pages/' . $page->event_id, [], true);
                        } else {
                            if ($page->event_id == 'notice-board' && !$return['isPrimary']) { // this for theme3
                                $this->set_data('notice_board', true);
                            }
                        }
                        break;
                    case 'image_gallery':
                        if (file_exists(THEME_PATH . 'pages/' . $page->event . EXT)) {
                            $this->set_data('gallery', $this->db->get('gallery_images')->result_array());
                            $html .= $this->parse('pages/' . $page->event, [], true);
                        }
                        break;
                    case 'form':
                        if (file_exists(DOCUMENT_PATH . '/forms/' . $page->event_id . EXT)) {
                            $html .= $this->parse('forms/' . $page->event_id, [], true);
                        } else if (!(CHECK_PERMISSION('CO_ORDINATE_SYSTEM') && $page->event_id == 'student_admission'))
                            $html .= $this->parse('form/' . $page->event_id, [], true);
                        break;
                    case 'ebook':
                        if (CHECK_PERMISSION('EBOOK')) {
                            if ($this->input->get('ebook') != 'cart') {
                                if (file_exists(THEME_PATH . 'ebook/project-system' . EXT)) {
                                    $pageHtml = $this->parse('ebook/project-system', (array) $page, true);
                                    $html .= $this->parse('content', ['content' => $pageHtml], true);
                                }
                            }
                        }
                        break;
                }
            }
            // exit;
            $return['content'] = $html . "\n" . $this->parser->parse('default_content', $this->public_data, true);
        }
        return array_merge($this->public_data, $return);
    }
    function error_404($pageName = '404', $title = 'Page Not Found', $data = [])
    {
        $error_file = 'error_404';
        $this->set_data('title', $title);
        $this->set_data('page_name', $pageName);
        $file = (file_exists(THEME_PATH . $error_file . EXT)) ? '' : 'default_'; //error_404';
        $this->render("{$file}{$error_file}", $data);
    }
    // function error_404_page(){

    // }
    function page_view($content, $data = [])
    {
        $this->set_data($data);
        $this->render($content, 'content');
        // pre($this->public_data,true);
    }
    function content($file, $data = [])
    {
        $this->render("{$file}", $data);
    }
    function registration_certificate()
    {
        $token = $this->uri->segment(2);
        $id = ($this->decode($token));
        $getRegistration = $this->db->where(['id' => $id, 'status' => 1])->get('students_registeration_data');
        if ($getRegistration->num_rows()) {
            $data = $getRegistration->row_array();
            $registration_no = $data['registration_no'];

            $this->set_data('registration_no', $registration_no);

            // pre($data,true)  ;
            $this->set_data('page_name', $data['name'] . ' Details');
            $this->set_data([
                'exam_or_course' => $data['exam_or_course'],
                'name' => $data['name'],
                'father_name' => $data['father_name'],
                'mother_name' => $data['mother_name'],
                'dob' => $data['dob'],
                'student_address' => $data['address'],
                'institute_name' => $data['institute_name'],
                'training_period' => $data['training_period'],
                'examination_body' => $data['examination_body'],
                'photo' => $data['photo']
            ]);
            // $this->set_data($data);
            // $this->set_data('student_address', $data['address']);
            $this->set_data('registration_date', date('d-m-Y', strtotime($data['date'])));


            $this->set_data('isPrimary', false);

            $this->render('schema', [
                'content' => $this->template('student-registration-form')
            ]);
        } else
            $this->error_404();
        // echo $id;
        // $this->db->select('examination_body');
        // $get = $this->student_model->get_switch('all', [
        //     'id' => $id
        // ]);
        // if ($get->num_rows()) {
        //     // pre($row);
        //     $data = $get->row_array();
        //     $registration_no = '';
        //     $getRegistration = $this->db->where("enrollment_no", $data['roll_no'])->get('students_registeration_data');
        //     if ($getRegistration->num_rows()) {
        //         $rowd = $getRegistration->row();
        //         $registration_no = $rowd->registration_no;
        //     }
        //     $this->set_data('registration_no', $registration_no);

        //     // pre($data,true)  ;
        //     $this->set_data('page_name', $data['student_name'] . ' Details');
        //     $this->set_data($data);
        //     $this->set_data('isPrimary', false);

        //     $this->render('schema', [
        //         'content' => $this->template('student-registration-form')
        //     ]);
        // } else
        //     $this->error_404();
    }
    function student_varify()
    {
        $token = $this->uri->segment(2);
        try {
            $this->token->decode($token);
            // pre($this->token->data());
            $id = $this->token->data('id');
            $get = $this->student_model->student_certificates(['id' => $id]);
            if ($get->num_rows()) {
                $data = $get->row_array();
                // pre($data, true);
                $this->set_data($data);
                $this->set_data('contact_number', maskMobileNumber($data['contact_number']));

                $this->set_data('admission_status', $data['admission_status'] ? label($this->ki_theme->keen_icon('verify text-white') . ' Verified Student') : label('Un-verified Student', 'danger'));
                $this->set_data('student_profile', $data['image'] ? base_url('upload/' . $data['image']) : base_url('assets/media/student.png'));

                $this->set_data('isPrimary', false);
                // $this->load->module('document');
                $html = '<div class="container pt-3" style="' . (THEME == 'theme-06' ? 'margin-top:160px' : 'margin-top:20px;margin-bottom:20px') . '">' . $this->template('student-profile-card') . '</div>';
                // $this->render($html, 'content');
                $this->render(
                    'schema',
                    ['content' => $html]
                );
                // $this->response('html', $this->template('student-profile-card'));
            } else {
                throw new Exception('');
            }
        } catch (Exception $e) {
            $this->error_404();
        }
    }
    function typing_certificate()
    {
        // for verificiation..
        $token = $this->uri->segment(2);
        try {
            $this->token->decode($token);
            $id = $this->token->data('id');
            $get = $this->student_model->typing_certificate($id);
            if (!$get->num_rows())
                throw new Exception('Not Found.');
            $data = $get->row_array();
            $this->set_data('page_name', $data['student_name'] . ' Typing Certificate');
            $this->set_data('typing_certificate_id', $data['typing_certificate_id']);
            $this->set_data($data);
            $this->set_data('isPrimary', false);
            // $this->load->module('document');
            $html = '<div class="container pt-3" style="' . (THEME == 'theme-06' ? 'margin-top:160px' : '') . '">' . $this->template('student/verify-typing-certificate') . '</div>';
            // $this->render($html, 'content');
            $this->render(
                'schema',
                ['content' => $html]
            );
        } catch (Exception $e) {
            $this->error_404();
        }
    }
    function marksheet_print()
    {
        $token = $this->uri->segment(2);
        try {
            $this->token->decode($token);
            // pre($this->token->data());
            $id = $this->token->data('id');
            $get = $this->student_model->marksheet(['id' => $id]);
            if (!$get->num_rows())
                throw new Exception('Not Found.');
            $data = $get->row_array();
            $this->set_data('page_name', $data['student_name'] . ' Marksheet');
            $this->set_data('marksheet_id', $data['result_id']);
            $this->set_data($data);
            $this->set_data('isPrimary', false);
            // $this->load->module('document');
            $html = '<div class="container pt-3" style="' . (THEME == 'theme-06' ? 'margin-top:160px' : '') . '">' . $this->template('marksheet-view') . '</div>';
            // $this->render($html, 'content');
            $this->render(
                'schema',
                ['content' => $html]
            );
        } catch (Exception $e) {
            $this->error_404();
        }
    }
    function student_details()
    {
        $token = $this->uri->segment(2);
        try {
            $this->token->decode($token);
            // echo $this->token->data('student_id');
            $this->db->select('category');
            $get = $this->student_model->get_switch('all', ['id' => $this->token->data('student_id'), 'without_admission_status' => true]);
            if (!$get->num_rows())
                throw new Exception('Not Found.');
            $data = $get->row_array();
            // pre($data,true)  ;
            $this->set_data('page_name', $data['student_name'] . ' Details');
            $this->set_data('student_data',$data);
            $this->set_data('student_address', $data['address']);
            $this->set_data('isPrimary', false);
            if (PATH != 'upstate') {
                
                if (file_exists(DOCUMENT_PATH .'/student-details' . EXT))
                    $content = $this->parse('student-details');
                else
                    $content = $this->template('student-details');
                $this->render('schema', [
                    'content' => $content
                ]);
            } else {
                $this->load->module('document');
                // echo $this->token->data('student_id');
                echo $this->document->id($this->token->data('student_id'))->registration_form();
            }
        } catch (Exception $e) {
            $this->error_404();
        }
    }
    function list_demo()
    {
        $get = $this->db->order_by('id', 'DESC')->get('demo_query');
        if ($get->num_rows()) {
            ?>
            <style>
                td,
                th {
                    padding: 8px;
                    font-size: 20px
                }
            </style>
            <table border="2">
                <tr>
                    <th>Time</th>
                    <th>Name</th>
                    <th>Mobile</th>
                </tr>
                <?php
                foreach ($get->result() as $row) {
                    echo '<tr>
                <td>' . date('d-m-Y h:i A', strtotime($row->timestamp)) . '</td>
                <td>' . $row->name . '</td>
                <td><a href="tel:' . $row->mobile . '">' . $row->mobile . '</a></td>
        </tr>';
                }

                ?>
            </table>
            <?php
        } else {
            echo 'Users not found...';
        }
    }
    function update()
    {
        $checkField = $this->checkField('students', 'fee_emi');
        if (!$checkField) {
            $this->build_db->add_field('students', [
                'fee_emi' => [
                    'type' => 'varchar(100)',
                    'default' => null
                ],
                'fee_emi_type' => [
                    'type' => 'varchar(100)',
                    'default' => 'month'
                ]
            ]);
        }
        echo $checkField ? 'Done' : 'NO';
    }
    function bar()
    {

        if ($this->uri->segment(3, 0)) {
            $code = $this->uri->segment(3, 0);
            $generator = new BarcodeGeneratorPNG();
            $barcode = $generator->getBarcode($code, $generator::TYPE_CODE_128);

            // Output as image
            header('Content-Type: image/png');
            echo $barcode;
        } else
            throw new Exception('Invalid Data');

    }
    function test()
    {
        echo base_url('typing-certificate/' . $this->token->encode([
            'id' => 1
        ]));

        // $url = base_url('marksheet_print/' . $this->token->encode(['id' => 2]));
        // echo $this->ki_theme->generate_qr(2, 'front_marksheet', $url);
        // redirect(base_url('en-verification/' . $this->token->encode([
        //     'id' => 20
        // ])));

        // $code = '1233';
        // $generator = new BarcodeGeneratorPNG();
        // $barcode = $generator->getBarcode($code, $generator::TYPE_CODE_128);

        // // Output as image
        // header('Content-Type: image/png');
        // echo $barcode;
        // $data = [
        //     'id' => 1,
        //     'hindi_name' => '',
        //     'hindi_father_name' => '',
        //     'hindi_mother_name' => ''
        // ];
        // echo $this->token->encode($data);
        // echo implode('', array_filter($data, fn($v, $k) => strpos($k, 'hindi') === false, ARRAY_FILTER_USE_BOTH));
        // $data = array_diff_key($data, array_flip(preg_grep('/^hindi/', array_keys($data))));

        // print_r($data);
    }
}
