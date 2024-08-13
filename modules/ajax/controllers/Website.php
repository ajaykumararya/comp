<?php
// 9996763445
class Website extends Ajax_Controller
{
    function update_student_profile_image()
    {
        $this->_update_profile('students');
    }
    private function _update_profile($table)
    {
        $this->response($_FILES);
        if ($file = $this->file_up('file')) {
            $this->response('status', true);
            $this->response('file', base_url('upload/' . $file));
            $this->db->update($table, [
                'image' => $file
            ], [
                'id' => $this->post('id')
            ]);
        }
    }
    function update_center_profile_image()
    {
        $this->_update_profile('centers');
    }
    function update_center_profile()
    {
        // $this->response('data',$this->session->userdata());
        $this->db->update('centers', [
            'name' => $this->post('name'),
            'center_full_address' => $this->post('address'),
            'contact_number' => $this->post('phone'),
            'email' => $this->post('email'),
        ], [
            'id' => $this->session->userdata('admin_id')
        ]);
        $this->response('status', true);
    }
    function student_verification()
    {
        if ($this->validation('website_student_verification')) {
            $this->response($this->post());
            $roll_no = $this->post('roll_no');
            $dob = $this->post("dob");
            $status = 1;
            $get = $this->student_model->student_verification([
                'roll_no' => $roll_no,
                'dob' => date('d-m-Y', strtotime($dob)),
                'status' => $status
            ]);
            if ($get->num_rows()) {
                // $this->response("get_student",$get->num_rows());
                $this->response('status', true);
                $data = $get->row_array();
                $this->set_data($data);
                $this->set_data('contact_number', maskMobileNumber($data['contact_number']));

                $this->set_data('admission_status', $data['admission_status'] ? label($this->ki_theme->keen_icon('verify text-white') . ' Verified Student') : label('Un-verified Student', 'danger'));
                $this->set_data('student_profile', $data['image'] ? base_url('upload/' . $data['image']) : base_url('assets/media/student.png'));
                $this->response('html', $this->template('student-profile-card'));
            } else {
                $this->response('error', '<div class="alert alert-danger">Student Not Found.</div>');
            }
        }
    }
    function seach_study_center_list()
    {
        $where = [
            'status' => 1,
            'state_id' => $this->post('state_id'),
            'city_id' => $this->post('city_id')
        ];
        $get = $this->center_model->get_verified($where);
        if ($get->num_rows()) {
            $this->response('status', true);
            $this->set_data('list', $get->result_array());
            $this->response('html', $this->template('study-center-list'));
        }
    }
    function center_verification()
    {
        $get = $this->center_model->get_verified($this->post());
        if ($get->num_rows()) {
            $row = $get->row();
            if ($row->status) {
                $data = $get->row_array();

                $this->response('status', 'yes');
                $this->response('center_number', $row->center_number);

                $this->set_data('center_status', $data['status'] ? label($this->ki_theme->keen_icon('verify text-white') . ' Verified Center') : label('Un-verified Center', 'danger'));
                $this->set_data('owner_profile', $data['image'] ? base_url('upload/' . $data['image']) : base_url('assets/media/student.png'));
                // unset($data['status']);
                $this->set_data($data);
                $this->set_data('contact_number', maskMobileNumber($data['contact_number']));
                $this->set_data('email', maskEmail($data['email']));

                $this->response('html', $this->template('center-details'));
            } else
                $this->response('status', 'no');
        }
    }
    function student_result_verification()
    {
        if ($this->validation('website_student_verification')) {
            $this->response($this->post());
            $roll_no = $this->post('roll_no');
            $dob = $this->post("dob");
            $status = 1;
            $get = $this->student_model->student_result_verification([
                'roll_no' => $roll_no,
                'dob' => date('d-m-Y', strtotime($dob)),
                'status' => $status
            ]);
            if ($get->num_rows()) {
                // $this->response("get_student",$get->num_rows());
                $this->response('status', true);
                $this->response('ttl_record', $get->num_rows());
                if ($get->num_rows() == 1) {
                    $data = $get->row_array();
                    $this->response('data', $data);
                } else {
                    $this->response('data', $get->result_array());
                }
            } else {
                $this->response('error', '<div class="alert alert-danger">Marksheet Not Found.</div>');
            }
        }
    }
    function genrate_a_new_rollno()
    {
        $rollNo = $this->gen_roll_no($this->post('center_id'));
        if ($rollNo) {
            $this->response("status", true);
            $this->response('roll_no', $rollNo);
        }
        return $rollNo;
    }
    function get_center_courses()
    {
        $get = $this->center_model->get_assign_courses($this->post('center_id'));
        if ($get->num_rows()) {
            $this->response('courses', $get->result_array());
        }
    }
    function genrate_rollno_for_admission()
    {
        $this->genrate_a_new_rollno();
        $this->get_center_courses();
    }
    function student_admission()
    {
        if ($this->validation('student_admission')) {
            // $this->response('status', true);
            $roll_no = $this->genrate_a_new_rollno();
            $this->response('roll_no', $roll_no);
            // $this->response($this->post());
            $data = $this->post();
            $data['status'] = 0;
            $data['roll_no'] = $roll_no;
            $data['added_by'] = isset($data['added_by']) ? $data['added_by'] : 'web';
            $data['admission_type'] = isset($data['admission_type']) ? $data['admission_type'] : 'offline';
            // $data['type'] = 'center';
            unset($data['upload_docs']);
            $upload_docs_data = [];
            $upload_docs = $this->post('upload_docs');
            if (isset($upload_docs['title'])) {
                foreach ($upload_docs['title'] as $index => $file_index_name) {
                    if (!empty($_FILES['upload_docs']['name']['file'][$index])) {
                        $file = $_FILES['upload_docs']; //['file'][$index];
                        if ($file['error']['file'][$index] == UPLOAD_ERR_OK) {
                            $encryptedFileName = substr(hash('sha256', uniqid(mt_rand(), true)), 0, 10) . '_' . basename($file['name']['file'][$index]);
                            // Build the full destination path, including the encrypted file name
                            $destination = UPLOAD . $encryptedFileName;
                            move_uploaded_file($file['tmp_name']['file'][$index], $destination);
                            $upload_docs_data[$file_index_name] = $encryptedFileName;
                        }
                    }
                }
            }
            $data['adhar_front'] = $this->file_up('adhar_card');
            // $data['adhar_back'] = $this->file_up('adhar_back');
            $data['image'] = $this->file_up('image');
            $data['upload_docs'] = json_encode($upload_docs_data);
            $chk = $this->db->insert('students', $data);
            $this->response('status', $chk);
            $this->session->set_userdata([
                'student_login' => true,
                'student_id' => $this->db->insert_id()
            ]);
        }
    }
    function get_city($type = 'array')
    {
        $state_id = $this->input->post('state_id');
        $cities = $this->db->order_by('DISTRICT_NAME', 'ASC')->get_where('district', ['STATE_ID' => $state_id]);
        $returnCity = [];
        $options = '<option></option>';
        if ($cities->num_rows()) {
            $this->response('status', true);
            foreach ($cities->result() as $row) {
                $returnCity[$row->DISTRICT_ID] = $row->DISTRICT_NAME;
                $options .= '<option value="' . $row->DISTRICT_ID . '">' . $row->DISTRICT_NAME . '</option>';
            }
        }
        $this->response('html', $type == 'array' ? $returnCity : $options);
    }
    function test()
    {
        $this->response('ok', true);
    }

    function contact_us_action()
    {
        $this->response(
            'status',
            $this->db->insert('contact_us_action', $this->input->post())
        );

    }
    function enquiry_update_status()
    {
        $this->response(
            'status',
            $this->db->where('id', $this->post('id'))->update('contact_us_action', ['admin_message' => $this->post('value')])
        );
    }
    function add_center()
    {
        if ($this->validation('add_center')) {
            $data = $this->post();
            $data['status'] = 0;
            $data['added_by'] = 'admin';
            $data['type'] = 'center';
            $email = $data['email_id'];
            unset($data['email_id']);
            $data['email'] = $email;
            $data['password'] = sha1($data['password']);
            ///upload docs
            $data['adhar'] = $this->file_up('adhar');
            // $data['adhar_back'] = $this->file_up('adhar_back');
            $data['image'] = $this->file_up('image');
            $data['agreement'] = $this->file_up('agreement');
            $data['address_proof'] = $this->file_up('address_proof');
            $data['signature'] = $this->file_up('signature');
            if (CHECK_PERMISSION('CENTRE_LOGO'))
                $data['logo'] = $this->file_up('logo');
            $data['isPending'] = 1;
            $this->db->insert('centers', $data);
            $this->response('status', true);
        }
    }

    function update_stuednt_basic_details()
    {
        $id = $this->post('student_id');
        $data = $this->post();
        unset($data['student_id']);
        $this->db->update('students', $data, ['id' => $id]);
        $this->response('status', true);
        $this->response('student_data', $this->post());
    }
    function student_login_form()
    {
        // sleep(5);
        $rollno = $this->post('roll_no');
        $password = $this->post('password');
        if ($this->validation('student_login_form')) {

            $this->response($this->post());
            $get = $this->student_model->get_student_via_roll_no($rollno);
            if ($get->num_rows()) {
                $row = $get->row();
                if ($row->student_profile_status) {
                    if (!($stdPassword = $row->password)) {
                        $name = $row->student_name;
                        $dobYear = date('Y', strtotime($row->dob));
                        $stdPassword = strtoupper(substr($name, 0, 2) . $dobYear);
                        $stdPassword = sha1($stdPassword);
                    }
                    if ($stdPassword == sha1($password)) {
                        $this->session->set_userdata([
                            'student_login' => true,
                            'student_id' => $row->student_id
                        ]);
                        $this->response('student_name', $row->student_name);
                        $this->response('status', true);
                    } else
                        $this->response('error', alert('Wrong Password.', 'danger'));
                } else {
                    $this->response('error', alert('Your Account is In-active. Please Contact Your Admin', 'danger'));
                }
            } else {
                $this->response('error', alert('Wrong Roll Number or Password.', 'danger'));
            }
        }
    }

    function update_stuednt_password()
    {
        if ($this->validation('change_password')) {
            $this->db->update('students', ['password' => sha1($this->post('password'))], [
                'id' => $this->post('student_id')
            ]);
            $this->session->unset_userdata('student_login');
            $this->response('status', true);
        }
    }
    function admit_card()
    {
        if ($this->validation('roll_no')) {
            // $this->response($this->post());
            $get = $this->student_model->admit_card($this->post());
            if ($get->num_rows()) {
                $this->response('status', true);
                $this->response('url', base_url('admit-card/' . $this->encode($get->row('admit_card_id'))));
            } else
                $this->response('error', 'Admit Card not found..');
        }
    }
    function certificate()
    {
        if ($this->validation('roll_no')) {
            // $this->response($this->post());
            $get = $this->student_model->student_certificates($this->post());
            if ($get->num_rows()) {
                $this->response('status', true);
                $this->response('url', base_url('certificate/' . $this->encode($get->row('certiticate_id'))));
            } else
                $this->response('error', 'Certificate not found..');
        }
    }
    function update_student_batch_and_roll_no()
    {
        $get = $this->db
            ->where('id!=', $this->post('student_id'))
            ->where('roll_no', $this->post("roll_no"))
            ->get('students');
        if ($get->num_rows()) {
            $this->response('error', 'This Roll Number already exists.');
        } else {
            $this->db->where('id', $this->post('student_id'))
                ->update('students', [
                    'roll_no' => $this->post('roll_no'),
                    'batch_id' => $this->post('batch_id'),
                    'course_id' => $this->post('course_id'),
                    'admission_date' => $this->post('admission_date')
                ]);
            $this->response("status", true);
        }
    }
    function edit_fee_record()
    {
        $get = $this->db->where('id', $this->post('fee_id'))->get('student_fee_transactions');
        $data = $get->row_array();
        $data['type'] = ucwords(str_replace('_', ' ', $data['type']));
        $this->set_data($data);
        $this->response('html', $this->template('edit-fee-record'));
    }
    function delete_fee_record()
    {
        $this->response('status', $this->db->where('id', $this->post('fee_id'))->delete('student_fee_transactions'));
    }
    function update_fee_record()
    {
        $data = [
            'amount' => $this->post('amount'),
            'payable_amount' => $this->post('payable_amount'),
            'discount' => $this->post('discount'),
            'payment_type' => $this->post('payment_type'),
            'payment_date' => $this->post('payment_date'),
            'description' => $this->post('description')
        ];
        $this->db->where('id', $this->post('id'))->update('student_fee_transactions', $data);
        $this->response('status', true);
    }
    function print_fee_record()
    {
        $this->init_setting();
        $record = $this->student_model->get_fee_transcations($this->post());
        $this->set_data($record->row_array());
        $this->set_data('record', $record->result_array());
        $this->response('html', $this->template('print-fee-record'));
    }

    function list_paper()
    {
        $data = $this->exam_model->student_exam($this->post());
        $row = $data->row();
        $this->set_data($data->row_array());
        $this->set_data('questions', $this->exam_model->get_shuffled_questions($row->exam_id, $row->max_questions));
        $this->response([
            'title' => $row->exam_title,
            'content' => $this->template('list-papers-questions')
        ]);
    }
    function submit_exam()
    {
        $mydata = $this->post('submitList') ? $this->post('submitList') : [];
        $data = [
            'attempt_time' => time(),
            'percentage' => $this->post('percentage'),
            'data' => json_encode($mydata),
            'ttl_right_answers' => $this->post('ttl_right_answers')
        ];

        // $this->response($data);
        $this->db->where('id', $this->post('student_exam_id'))
            ->update('exam_students', $data);
        $this->response('status', 'OK');

    }

    function update_center_docs()
    {
        $this->db->where('id', $this->post('center_id'))
            ->update('centers', [
                $this->post('name') => $this->file_up('file')
            ]);
        $this->response('query', $this->db->last_query());
        $this->response('status', true);
    }
    function update_student_docs()
    {
        $data = [];
        if ($this->post('name') == 'adhar_card') {
            $data['adhar_front'] = $this->file_up('file');
        } else {
            $get = $this->db->select('upload_docs')->where('id', $this->post('student_id'))->get('students');
            $uploads_docs = $get->row('upload_docs');
            $uploads_docs = $uploads_docs == NULL ? [] : json_decode($uploads_docs, true);
            $uploads_docs[$this->post('name')] = $this->file_up('file');
            $data['upload_docs'] = json_encode($uploads_docs);
        }
        // $this->response('data',$data);
        $this->db->where('id', $this->post('student_id'))->update('students', $data);
        $this->response('status', true);
    }
    function list_syllabus()
    {
        $this->response('data', $this->db->order_by('id', 'DESC')->get('syllabus')->result_array());
    }
    function verify_student_phone_for_reset_password()
    {
        $get = $this->student_model->get_student([
            'contact_number' => $this->post('phoneNumber')
        ]);
        if ($get->num_rows()) {
            $row = $get->row();
            $templates = $this->load->config('api/sms', true);
            // pre($templates);
            if (isset($templates['forgot_password'])) {
                $message = $templates['forgot_password']['content'];
                $otp = random_int(100000, 999999);
                $this->session->set_userdata('forgot_password_otp', $otp);
                $message = str_replace('{#var#}', $otp, $message);
                // echo $message;
                $this->load->module('api/whatsapp');
                $res = $this->whatsapp->send('91' . $row->contact_number, $message);
                $this->response(json_decode($res, true));
                // $this->response(['status' => 'success','otp' => $otp]);
            }
        }
    }
    function generate_new_password_link()
    {
        if ($this->session->has_userdata('forgot_password_otp')) {
            if ($this->post('otp') == $this->session->userdata('forgot_password_otp')) {
                $get = $this->student_model->get_student([
                    'contact_number' => $this->post('phoneNumber')
                ]);
                if ($get->num_rows()) {
                    $row = $get->row();
                    // $this->session->set_userdata('student_id',$row->id);
                    $this->session->unset_userdata('forgot_password_otp');
                    $this->load->library('common/token');
                    $this->response([
                        'status' => 'success',
                        'url' => base_url('student/create-new-password/' . $this->token->encode([
                            'student_id' => $row->student_id
                        ]))
                    ]);
                }
            }
        }
        // $this->response($this->session->userdata());
    }

    function verify_student_phone()
    {
        $get = $this->student_model->get_student([
            'contact_number' => $this->post('phoneNumber')
        ]);
        if ($get->num_rows()) {
            $row = $get->row();
            $templates = $this->load->config('api/sms', true);
            // pre($templates);
            if (isset($templates['login_with_otp'])) {
                $message = $templates['login_with_otp']['content'];
                $otp = random_int(100000, 999999);
                $this->session->set_userdata('login_otp', $otp);
                $message = str_replace('{#var#}', $otp, $message);
                // echo $message;
                $this->load->module('api/whatsapp');
                $res = $this->whatsapp->send('91' . $row->contact_number, $message);
                $this->response(json_decode($res, true));
                // $this->response(['status' => 'success']);
            }
        }
    }
    function verify_login_otp()
    {
        if ($this->session->has_userdata('login_otp')) {
            if ($this->post('otp') == $this->session->userdata('login_otp')) {
                $get = $this->student_model->get_student([
                    'contact_number' => $this->post('phoneNumber')
                ]);
                if ($get->num_rows()) {
                    $row = $get->row();
                    // $this->session->set_userdata('student_id',$row->id);
                    $this->session->unset_userdata('login_otp');
                    $this->session->set_userdata([
                        'student_login' => true,
                        'student_id' => $row->student_id
                    ]);
                    $this->response(['status' => 'success']);
                }
            }
        }
        // $this->response($this->session->userdata());
    }
    function send_notification()
    {
        $isCenter = $this->center_model->isCenter();
        $data = [
            'title' => $this->post('title'),
            'send_time' => time(),
            'notify_type' => $this->post('notify_type'),
            'content' => $_POST['message'],
            'receiver_id' => $this->post('receiver_id'),
            'receiver_user' => $this->post('type'),
            'sender_id' => $isCenter ? $this->center_model->loginId() : 0,
            'send_by' => $isCenter ? 'center' : 'admin'
        ];
        $this->response('status', $this->db->insert('manual_notifications', $data));
    }
    function view_notification()
    {
        $html = '';
        $get = $this->db->get_where('manual_notifications', ['id' => $this->post('id')]);
        if ($get->num_rows()) {
            $row = $get->row();
            if (($this->student_model->isStudent() && $row->receiver_user == 'student') or ($this->center_model->isCenter() && $row->receiver_user == 'center'))
                $this->db->set('seen', 'seen + 1', false)->where('id', $row->id)->update('manual_notifications');

            $html .= '<div class="card card-flush">
                        <div class="card-header">
                            <h3 class="card-title">' . $row->title . '</h3>
                        </div>
                        <div class="card-body">
                            ' . $row->content . '
                        </div>    
                        <div class="card-footer">
                            <div class="d-fl    ex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5">
                                <div class="d-flex align-items-center me-3">
                                    
                                </div>
                                <div class="d-flex align-items-center text-primary">
                                    <i class="ki-duotone ki-time text-primary fs-3">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i> &nbsp;' . date('d-m-Y h:i A', $row->send_time) . '
                                </div>
                            </div>
                        </div>
            </div>';
            $this->response('status', true);
        } else
            $html .= alert('Something went wrong, can\'t view this message.', 'danger');
        $this->response('html', $html);
    }
}
?>