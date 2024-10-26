<?php
use chillerlan\QRCode\Data\Number;

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
        echo $this->do_email('ajaykumararya963983@gmail.com', 'New Demo Checklist', $this->template('email/demo-query'));
    }

    function container()
    {
        $data = $this->pageData;
        $return = ['page_name' => $data['label'], 'content' => '', 'isPrimary' => (DefaultPage == $data['id'])];
        $pageSchema = $this->SiteModel->get_page_schema($data['id']);
        if ($pageSchema->num_rows()) {
            $html = '';
            foreach ($pageSchema->result() as $page) {
                switch ($page->event) {
                    case 'content':
                        $get = $this->SiteModel->page_content($page->page_id);
                        if ($get->num_rows()) {
                            if (file_exists(THEME_PATH . 'content.php'))
                                $html .= $this->parse('content', ['content' => $get->row('content')], true);
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
                        if (!(CHECK_PERMISSION('CO_ORDINATE_SYSTEM') && $page->event_id == 'student_admission'))
                            $html .= $this->parse('form/' . $page->event_id, [], true);
                        break;
                }
            }
            // exit;
            $return['content'] = $html . "\n" . $this->parser->parse('default_content', $this->public_data, true);
        }
        return array_merge($this->public_data, $return);
    }
    function error_404()
    {
        $error_file = 'error_404';
        $this->set_data('title', 'Page Not Found');
        $this->set_data('page_name', '404');
        $file = (file_exists(THEME_PATH . $error_file . EXT)) ? '' : 'default_'; //error_404';
        $this->render("{$file}{$error_file}");
    }
    function page_view($content, $data = [])
    {
        $this->set_data($data);
        $this->render($content, 'content');
        // pre($this->public_data,true);
    }
    function marksheet_print()
    {
        $token = $this->uri->segment(2);
        try {
            $this->token->decode($token);
            $id = $this->token->data('id');
            $get = $this->student_model->marksheet(['id' => $id]);
            if (!$get->num_rows())
                throw new Exception('Not Found.');
            $data = $get->row_array();
            $this->set_data('page_name', $data['student_name'] . ' Marksheet');
            $this->set_data('marksheet_id', $data['result_id']);
            $this->set_data($data);
            $this->set_data('isPrimary', false);
            $this->load->module('document');
            $html = '<div class="container pt-3">' . $this->template('marksheet-view') . '</div>';
            // $this->render($html, 'content');
            $this->render(
                'schema',
                ['content' => $html]
            );
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
    function update(){
        $checkField = $this->checkField('students','fee_emi');
        if(!$checkField){
            $this->build_db->add_field('students',[
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
    function test()
    {

        // echo ($this->ki_theme->isDiwali()) ? 'YES' : 'NO';
        // pre($this->ki_theme->get_festival());
        pre(search_file(FCPATH.UPLOAD,'23322'));
        // $year = 2023;
        // $i = 1;
        // $N = 125;
        // do{
        //     print $N * $i.'<br>';
        //     $i++;
        // }
        // while($i <= 10);
        // // for($i = 1; $i <= 10; $i++){
        // //     echo $N * $i.'<br>';
        // // }
        // // while($i <= 10){ // 1 <= 10 // 2 <=10 // 11 <= 10
        // //     echo $N * $i.'<br>';
        // //     $i++;
        // // }
        // exit;
        // // echo chr(97); // ASCCII CODE
        // echo '<table border="1" style="width:10%">
        //     <tr>
        //         <th>ASCCI VALUE</th>
        //         <th>VALUE</th>
        //         </tr>
        // ';
        // for($i = 1; $i <= 126; $i++){
        //     echo '<tr>
        //             <td>'.$i.'</td>    
        //             <td>'.chr($i).'</td>    
        //     </tr>';
        // }
        // echo '</table>';
        // return 12;
        // for($a = 1; $a <= 26;$a++)
        //     echo '<h1 style="margin:0">'.chr($a).'</h1>';


        // $this->load->driver('cache', array('adapter' => 'file'));
        //   $cached_data = ['name' => 'ajay','name1' => 'fff'];
        // $this->cache->save('cache_key', $cached_data, 60);
        // $cached_data = $this->cache->get('cache_key');
        // foreach($this->cache->get_metadata('cache_key') as $key => $value){
        //     echo "$key = ".date('d-m-Y h:i A',$value).'<br>';
        // }
        // if ($cached_data === FALSE) {
        //     // Cache miss: Compute and cache the data
        //     $cached_data = ['name' => 'ajay'];
        //     $this->cache->save('cache_key', $cached_data, 60);
        // }
        // $this->cache->delete('cache_key');
        // pre( $cached_data);
        // $token['id'] = 1; //From here
        // $token['username'] = 'ajay';
        // $date = new DateTime();
        // $token['iat'] = $date->getTimestamp();
        // $token['exp'] = $date->getTimestamp() + 60 * 30;
        // $this->load->library('common/token');
        // echo $this->token->encode($token);


        // $templates = $this->load->config('api/sms',true);
        // // pre($templates);
        // if(isset($templates['login_with_otp'])){
        //     $message = $templates['login_with_otp']['content'];
        //     $message = str_replace('{#var#}',random_int(100000, 999999),$message);
        //     // echo $message;
        //     $this->load->module('api/whatsapp');
        //     $res = $this->whatsapp->send('918533898539',$message);
        //     pre($res);
        // }
        // $get = $this->student_model->get_student([
        //     'contact_number' => '8533898539'
        // ]);
        // if($get->num_rows()){
        //     pre($get->row());
        // }

        //    echo $this->gen_roll_no(5);
        // echo $this->center_model->wallet_history()->num_rows();
        // $test = $this->ki_theme->center_fix_fees();
        // pre($test);
/*
        $data = [];
        $list = $this->center_model->wallet_history();
        if ($list->num_rows()) {
            foreach ($list->result() as $row) {
                $tempData = [
                    'date' => $row->date,
                    'amount' => $row->amount,
                    'type' => $row->type,
                    'description' => $row->description,
                    'status' => $row->wallet_status,
                    'url' => 0
                ];
                if ($row->type_id) {
                    switch ($row->type) {
                        case 'admission':
                            $student = $this->student_model->get_all_student([
                                'id' => $row->type_id
                            ]);
                            $tempData['student_name'] = @$student[0]->student_name . ' ' . label('Admission');
                            $tempData['url'] = base_url('student/profile/'.$row->type_id);
                            break;
                        case 'marksheet':
                            $marksheet = $this->student_model->marksheet(['id' => $row->type_id]);
                            $student = '';
                            if ($marksheet->num_rows()) {
                                $drow = $marksheet->row();
                                $tempData['url'] = base_url('marksheet/'.$this->encode($row->type_id));

                                $student = $drow->student_name . ' ' . label(humnize_duration_with_ordinal($drow->marksheet_duration, $drow->duration_type) . ' Marksheet');
                            }
                            $tempData['student_name'] = $student;
                            break;
                        case 'certificate':
                            $student_certificates = $this->student_model->student_certificates([
                                'id' => $row->type_id
                            ]);
                            $tempData['url'] = base_url('certificate/'.$this->encode(($row->type_id)));
                            $tempData['student_name'] = $student_certificates->row('student_name') . ' ' . label('Certificate');
                            break;
                    }
                } else
                    $tempData['student_name'] = label(ucfirst(str_replace('_', ' ', $row->type)));

                $data[] = $tempData;
            }
        }
        pre($data);
        */
    }
}
