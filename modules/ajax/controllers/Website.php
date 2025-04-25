<?php
// 9996763445
class Website extends Ajax_Controller
{
    function init_emi_payment()
    {
        try {
            $token = $this->post('token');
            $this->token->decode($token);
            $payable_amount = $this->token->data('payable_amount');
            $this->load->module('razorpay');
            $order_id = $this->razorpay->create_order([
                'receipt' => PATH . mt_rand(00000, 8999999),
                'amount' => $payable_amount * 100,
                'currency' => 'INR',
                'notes' => [
                    'token' => $token,
                    'merchant_order_id' => time()
                ]
            ]);
            $studentDetails = $this->db->select('name,contact_number,email')->where('id', $this->token->data('student_id'))->get('students');
            $name = $mobile = $email = '';
            if ($studentDetails->num_rows()) {
                $studentDetails = $studentDetails->row();
                $name = $studentDetails->name;
                $mobile = $studentDetails->contact_number;
                $email = $studentDetails->email;
            }
            $data = [
                'key' => RAZORPAY_KEY_ID,
                'amount' => $payable_amount * 100,
                'name' => ES('title'),
                'description' => 'Computer Institute',
                'image' => logo(),
                'prefill' => [
                    'name' => $name,
                    'email' => $email,
                    'contact' => $mobile
                ],
                'notes' => [
                    'merchant_order_id' => time(),
                ],
                'order_id' => $order_id
            ];
            $this->response('status', true);
            $this->response('option', $data);

        } catch (Exception $e) {
            $this->response('html', $e->getMessage());
        }
    }
    function update_emi_payment()
    {
        $post = $this->post();

        $razorpay_payment_id = $post['razorpay_payment_id'];
        $razorpay_order_id = $post['razorpay_order_id'];
        $razorpay_signature = $post['razorpay_signature'];
        $merchant_order_id = $post['merchant_order_id'];
        $token = $post['token'];
        $this->load->module('razorpay');

        try {


            $status = $this->razorpay->fetchOrderStatus($razorpay_order_id);
            if ($status) {
                $this->token->decode($this->post('token'));
                $data = [
                    'type' => $this->token->data('duration'),
                    'duration' => $this->token->data('duration'),
                    'type_key' => $this->token->data('type_key'),
                    'amount' => $this->token->data('amount'),
                    'discount' => 0,
                    'payable_amount' => $this->token->data('payable_amount'),
                    'description' => 'payment via online Razorpay',
                    'payment_type' => 'razorpay',
                    'late_fee' => $this->token->data('late_fee'),
                    'payment_id' => $razorpay_payment_id,
                    'payment_date' => date('d-m-Y'),
                    'student_id' => $this->token->data('student_id'),
                    'course_id' => $this->token->decode('course_id'),
                    'roll_no' => $this->token->decode('roll_no'),
                    'center_id' => $this->token->decode('center_id')
                ];
                $this->db->insert('student_fee_transactions', $data);
                $this->response('status', true);
            } else
                throw new Exception('Invalid Transcation.');


        } catch (Exception $e) {
            $this->response('status', false);
            $this->response('error', $e->getMessage());
        }
    }
    function update_student_profile_image()
    {
        $this->_update_profile('students');
    }
    public function fetch_attendance()
    {
        $roll_no = $this->post('roll_no'); // Assuming student is logged in
        $this->db->select('sa.date, sa.attendance_type_id as status,at.type as title')
            ->from('student_attendances sa')
            ->join('attendence_type as at', 'sa.attendance_type_id = at.id')
            ->where('sa.roll_no', $roll_no);
        $query = $this->db->get();
        $attendance = $query->result_array();

        $data = array();
        foreach ($attendance as $row) {
            $data[] = array(
                'title' => ucfirst($row['title']),
                'type' => $row['status'],
                'start' => $row['date'],
                'color' => $this->get_status_color($row['status']) // Optional color for status
            );
        }

        $this->response('data', $data);
    }

    // Optional function to assign different colors for attendance status
    private function get_status_color($status)
    {
        switch ($status) {
            case '1':
                return '#28a745'; // Green
            case '4':
                return '#dc3545'; // Red
            case '3':
                return '#ffc107'; // Yellow
            default:
                return '#007bff'; // Default Blue
        }
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
    function study_material_link()
    {
        if ($this->student_model->isStudent() or $this->input->post('status') == 'ISADMIN') {
            $data = $this->post();
            $this->response('status', true);
            $this->response('token', $this->token->withExpire('+30 minutes')->encode($data));
        } else
            $this->response('error', 'Unautherised Student.');
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
                    $this->set_data($data);
                    $this->set_data('duration_type', (humnize($data['duration'], $data['duration_type'])));
                    $this->response('html', $this->template('marksheet-view'));
                    $this->response('data', $data);
                } else {
                    $html = '<div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h4>List Of Results</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Result</th>
                                <th>View</th>
                            </tr>
                        ';
                    foreach ($get->result() as $row) {
                        $token = $this->token->withExpire()->encode([
                            'id' => $row->marksheet_id
                        ]);
                        $url = base_url('marksheet-verification/' . $token);
                        $html .= '<tr>
                                    <td><a href="' . $url . '" target="_blank">' . humnize_duration_with_ordinal($row->marksheet_duration, $row->duration_type) . ' Result</a></td>
                                    <td>
                                        <a href="' . $url . '" target="_blank" class="btn btn-primary btn-xs btn-sm">View Result</a>
                                    </td>
                        </tr>';
                    }
                    $html .= '</table>
                    </div>';
                    $this->response('html', $html);
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
            $examination = [];
            if (isset($data['examination'])) {
                $examination = $data['examination'];
                unset($data['examination']);
            }
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
            if (CHECK_PERMISSION('STUDENT_ADHAR_BACK'))
                $data['adhar_back'] = $this->file_up('adhar_back');
            $data['image'] = $this->file_up('image');
            $data['upload_docs'] = json_encode($upload_docs_data);

            $data['marital_status'] = $this->post('marital_status');
            $data['medium'] = $this->post('medium');
            $data['category'] = $this->post('category');
            $chk = $this->db->insert('students', $data);
            $this->response('status', $chk);
            $this->response('message', json_encode($examination));
            $student_id = $this->db->insert_id();
            if (CHECK_PERMISSION('STUDENT_EXAMINATION_FORM') && table_exists('student_examiniation_passed')) {
                foreach ($examination['passed'] as $index => $passed) {
                    if (
                        !empty($passed) || !empty($examination['name_of_stream'][$index]) ||
                        !empty($examination['board_or_university'][$index]) ||
                        !empty($examination['year_of_passing'][$index]) ||
                        !empty($examination['marks_obtained'][$index]) ||
                        !empty($examination['percentage_marks'][$index])
                    ) {
                        $newData = [
                            'student_id' => $student_id,
                            'passed' => $passed,
                            'name_of_stream' => $examination['name_of_stream'][$index],
                            'board_or_university' => $examination['board_or_university'][$index],
                            'year_of_passing' => $examination['year_of_passing'][$index],
                            'marks_obtained' => $examination['marks_obtained'][$index],
                            'percentage_marks' => $examination['percentage_marks'][$index],
                        ];
                        $this->db->insert('student_examiniation_passed', $newData);
                    }
                }
            }
            $this->response('url', base_url('student-details/') . $this->token->encode([
                'student_id' => $student_id
            ]));
            $this->session->set_userdata([
                'student_login' => true,
                'student_id' => $student_id
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
    // function admit_card()
    // {
    //     if ($this->validation('roll_no')) {
    //         // $this->response($this->post());
    //         $get = $this->student_model->admit_card($this->post());
    //         if ($get->num_rows()) {
    //             $this->response('status', true);
    //             $this->response('url', base_url('admit-card/' . $this->encode($get->row('admit_card_id'))));
    //         } else
    //             $this->response('error', 'Admit Card not found..');
    //     }
    // }
    function admit_card()
    {
        if ($this->validation('roll_no')) {
            // $this->response($this->post());
            $get = $this->student_model->admit_card($this->post());
            if ($get->num_rows()) {
                $this->response('status', true);
                // $this->response('url', base_url('admit-card/' . $this->encode($get->row('admit_card_id'))));
                $html = '<div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h4>List Of Admit Card(s)</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Admit Card</th>
                                <th>View</th>
                            </tr>
                        ';
                foreach ($get->result() as $row) {
                    $token = $this->encode($row->admit_card_id);
                    $url = base_url('admit-card/' . $token);
                    $html .= '<tr>
                                    <td><a href="' . $url . '" target="_blank">' . humnize_duration_with_ordinal($row->admit_card_duration, $row->duration_type) . ' Admit Card</a></td>
                                    <td>
                                        <a href="' . $url . '" target="_blank" class="btn btn-primary btn-xs btn-sm">View Result</a>
                                    </td>
                        </tr>';
                }
                $html .= '</table>
                    </div>';
                $this->response('html', $html);
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
            $data = [
                'roll_no' => $this->post('roll_no'),
                // 'batch_id' => $this->post('batch_id'),
                'admission_date' => $this->post('admission_date')
            ];
            if (!empty($_POST['course_id']))
                $data['course_id'] = $this->post('course_id');
            if (isset($_POST['batch_id']))
                $data['batch_id'] = $this->post('batch_id');
            if (isset($_POST['session_id']))
                $data['session_id'] = $this->post('session_id');
            $this->db->where('id', $this->post('student_id'))
                ->update('students', $data);
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
        // $this->response('query', $this->db->last_query());
        $this->response('status', true);
    }
    function update_student_docs()
    {
        $data = [];
        if ($this->post('name') == 'adhar_card') {
            $data['adhar_front'] = $this->file_up('file');
        } else if ($this->post('name') == 'adhar_back') {
            $data['adhar_back'] = $this->file_up('file');
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
    function delete_notification()
    {
        $this->response(
            'status',
            $this->db->where($this->post())->delete('manual_notifications')
        );
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
    function factuly_update()
    {
        $this->db->where('id', $this->post('id'))
            ->update('content', [
                'field2' => $this->post('title'),
                'field4' => $this->post('link')
            ]);
        $this->response('status', true);
    }

    function student_registration_certificate()
    {
        if (PATH == 'upstate') {
            $this->form_validation->set_rules([
                array(
                    'field' => 'mother_name',
                    'label' => 'Mother Name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'exam_roll_no',
                    'label' => 'Roll No.',
                    'rules' => 'required|is_unique[students_registeration_data.exam_roll_no]',
                    'errors' => array(
                        'is_unique' => 'This Student Exam Roll No already exists..'
                    )
                ),
                array(
                    'field' => 'enrollment_no',
                    'label' => 'Enrollment No.',
                    'rules' => 'required|is_unique[students_registeration_data.enrollment_no]',
                    'errors' => array(
                        'is_unique' => 'This Student Enrollment No already exists..'
                    )
                ),

            ]);
        }
        if ($this->validation('registration_certificate')) {

            $registration_no = '10' . date('Y') . mt_rand(111, 999);
            if (PATH == 'sct_ebook')
                $registration_no = mt_rand(111111, 999999);
            $data = [
                'name' => $this->post('name'),
                'father_name' => $this->post('father_name'),
                'mother_name' => $this->post('mother_name'),
                'exam_roll_no' => $this->post('exam_roll_no'),
                'enrollment_no' => $this->post('enrollment_no'),
                'exam_or_course' => $this->post('exam_or_course'),
                'institute_name' => $this->post('institute_name'),
                'exam_centre_name' => $this->post('exam_centre'),
                'email' => $this->post('email'),
                'mobile' => $this->post('mobile'),
                'year' => $this->post('year_of_passing'),
                'date' => date('Y'),
                'pass_or_fail' => $this->post('pass_or_fail'),
                'registration_no' => $registration_no,
                'dob' => $this->post('dob'),
                'address' => $this->post("address"),
                'training_period' => $this->post('training_period')
            ];
            $data['photo'] = $this->file_up('file_photo');
            $data['aadhar_card'] = $this->file_up('file_aadhar');
            $data['diploma'] = $this->file_up('file_diploma');
            $data['sign'] = $this->file_up('file_sign');
            $data['10th_marksheet'] = $this->file_up('file_10th');
            $data['12th_marksheet'] = $this->file_up('file_12th');
            $data['1st_year_marksheet'] = $this->file_up('file_1st_year');
            $data['2nd_year_marksheet'] = $this->file_up('file_2nd_year');
            $data['college_no_due_slip'] = $this->file_up('file_no_due_slip');
            $this->db->insert("students_registeration_data", $data);
            $this->response('status', true);
            $this->response('registration_no', $data['registration_no']);
        }
    }
    function student_registration_form_verification()
    {
        $result = $this->db->where('registration_no', $this->post('registration_no'))->get('students_registeration_data');
        if ($result->num_rows()) {
            $row = $result->row();
            if ($row->status == 1) {
                $this->response([
                    'status' => true,
                    'url' => base_url('registration-form/' . $this->encode($row->id))
                ]);
                // } else {
                //     $this->response('message', 'Your documents and data has been verified but certificate is not create, please contact your administrator.');
                // }
            } else
                $this->response('message', 'Your documents and data are pending for verification..');
        } else
            $this->response('message', 'This Registration No does not exists...');
    }


    /*



    */
    function student_examination_form_submit()
    {
        $this->form_validation->set_rules('duration', 'Course Duration', 'required');
        $this->form_validation->set_rules('session_id', 'Session', 'required');
        if ($this->validation()) {
            try {
                $token = $this->post('token');
                $data = $this->token->decode($token);
                $data['status'] = 0;
                $data['enrollment_no'] = date('Y') . '0' . mt_rand(1111, 9999);
                $data['added_by'] = 'web';
                $data['session_id'] = $this->post("session_id");
                $data['duration'] = $this->post('duration');
                $this->response('status', $this->db->insert('admit_cards', $data));
                $this->response('html', 'Admit card request submitted successfully...');
            } catch (Exception $e) {
                $this->response('html', $e->getMessage());
            }
        }
    }
    function update_examination_data()
    {
        $this->response('status', true);
        // $this->response('data',$this->post());
        $this->db->where('id', $this->post('id'))
            ->update('admit_cards', [
                'enrollment_no' => $this->post('enrollment_no'),
                'session_id' => $this->post('session_id'),
                'status' => 1
            ]);
    }
    function verify_examination_data()
    {
        $get = $this->db->where('id', $this->post('admit_card_id'))->where('status', 0)->get('admit_cards');
        if ($get->num_rows()) {
            $row = $get->row();
            $this->response('status', true);
            $session = '';
            $ses = $this->SiteModel->get_session();
            if ($ses->num_rows()) {
                foreach ($ses->result() as $srow) {
                    // if{
                    $session .= '<option value="' . $srow->id . '" ' . ($srow->id == $row->session_id ? 'selected' : '') . '>' . $srow->title . '</option>';
                }
            }
            $this->response('html', form_hidden('id', $row->id) . '
            <div class="form-group mb-3">
                <lable>' . $this->get_data('rollno_text') . '</lable>
                <input required type="text" value="' . $row->enrollment_no . '" name="enrollment_no" class="form-control" placeholder="Enter ' . $this->get_data('rollno_text') . '">
            </div>
            <div class="form-group">
                <lable>Session</lable>
                <select class="form-select" name="session_id" required data-control="select2" data-placeholder="Select Session">
                    <option></option>
                    ' . $session . '
                </select>
            </div>
        
        ');
        }
    }
    function student_examination_form_verification()
    {
        $this->form_validation->set_rules('roll_no', $this->get_data('rollno_text'), 'required');
        $this->form_validation->set_rules('dob', 'DOB', 'required');
        if ($this->validation()) {
            try {
                // throw new Exception($this->post('roll_no'));
                $roll_no = $this->post('roll_no');
                $dob = $this->post("dob");
                $status = 1;
                $get = $this->student_model->get_student([
                    'roll_no' => $roll_no,
                    'dob' => date('d-m-Y', strtotime($dob)),
                    'status' => $status
                ]);
                if (!$get->num_rows())
                    throw new Exception('Details not match..');
                $row = $get->row();
                $checkisPassout = $this->student_model->get_switch('passout', [
                    'id' => $row->student_id
                ]);
                if ($checkisPassout->num_rows()) {
                    throw new Exception('You have completed the course.');
                }
                $this->response('status', true);
                $dType = $row->duration_type;//$this->post('duration_type');
                $d = $row->duration;//$this->post('duration');
                $course_id = $row->course_id;
                $student_id = $row->student_id;
                $duration = $dType == 'month' ? 1 : $d;
                $where = ['duration_type' => $dType, 'course_id' => $course_id, 'student_id' => $student_id];
                $options = [];
                $examDone = false;
                $label = '';
                $admitCardID = 0;
                for ($i = 1; $i <= $duration; $i++) {

                    $status = 0;
                    $where['duration'] = ($dType == 'month') ? $d : $i;
                    $this->db->select('ac.status');
                    $chk = $this->student_model->check_admit_card($where);
                    $sub_label = $row->course_name . ' <b>Admit Card </b>';
                    if ($chk->num_rows()) {
                        $sub_label .= ' Created on  <b>' . ($chk->row('session')) . '</b>';
                    } elseif ($examDone) {
                        $sub_label .= "<label class='badge badge-danger'>$label Exam's is not create.</label>" . $chk->row('id');
                        ;
                    } else {
                        $sub_label .= "<label class='badge badge-info'> Ready to create.</label>";
                    }
                    $label = $dType == 'month' ? $d . ' ' . ucfirst($dType) : humnize_duration_with_ordinal($i, $dType);

                    if ($chk->num_rows()) {
                        $status = $chk->row('status');
                        // $sub_label = $status;
                        if ($chk->row('status') == 0)
                            $sub_label = "\n<label class='badge badge-info'>Your admit card is under review..</label>";
                        else {
                            $admitCardExam = $this->student_model->get_marksheet_using_admit_card($chk->row('admit_card_id'));
                            $status = $admitCardExam->num_rows();
                            if (!$admitCardExam->num_rows()) {
                                $sub_label .= "\n<label class='badge badge-info'>$label Exam's is not create.</label>";
                            }
                        }
                    }
                    $options[] = [
                        'id' => $dType == 'month' ? $d : $i,
                        'label' => $label,
                        'sub_label' => $sub_label, //$this->post('course_name') . ' <b>Admit Card </b>' . ($chk->num_rows() ? ' Created on  <b>' . ($chk->row('session')) . '</b>' : ''),
                        'isCreated' => $examDone ? true : $chk->num_rows()
                    ];
                    if (!$chk->num_rows() || $examDone || $status == 0) {
                        break;
                    }
                    /*else {
                        $admitCardExam = $this->student_model->get_marksheet_using_admit_card($chk->row('admit_card_id'));

                        $examDone = $admitCardExam->num_rows() == 1;
                    }
                        */
                }
                $this->response('options', $options);
                $this->set_data('options', $options);


                $data = $get->row_array();
                $this->set_data($data);
                $this->set_data('contact_number', maskMobileNumber($data['contact_number']));

                $this->set_data('admission_status', $data['admission_status'] ? label($this->ki_theme->keen_icon('verify text-white') . ' Verified Student') : label('Un-verified Student', 'danger'));
                $this->set_data('student_profile', $data['image'] ? base_url('upload/' . $data['image']) : base_url('assets/media/student.png'));
                $this->response('html', $this->template('student-examination-form'));
            } catch (Exception $e) {
                $this->response('error', alert($e->getMessage(), 'danger'));
            }
        }
    }
    function center_board_verification()
    {
        // $this->response($this->post());
        $this->form_validation->set_rules('center_id', 'Center ID', 'required');
        if ($this->validation()) {
            $center_id = $this->post('center_id');
            $get = $this->center_model->get_verify_center([
                'center_number' => $center_id
            ]);
            if ($get->num_rows()) {
                $row = $get->row();
                $this->response('html', '');
                $allLinks = $this->ki_theme->project_config('open_links');
                if (isset($allLinks['center_certificate'])) {
                    $this->response('link', base_url($allLinks['center_certificate'] . '/' . $this->encode($row->id)));
                    $this->response('status', true);
                }
            } else
                $this->response('html', 'Not centre Found.');
        }
    }
    function certification_board_verification()
    {
        $this->form_validation->set_rules('roll_no', 'Roll No.', 'required');
        if ($this->validation()) {

        }
    }
    function student_board_verification()
    {
        $this->form_validation->set_rules('roll_no', 'Roll No.', 'required');
        if ($this->validation()) {
            $roll_no = $this->post('roll_no');
            $status = 1;
            $get = $this->student_model->student_verification([
                'roll_no' => $roll_no,
                'status' => $status
            ]);
            if ($get->num_rows()) {
                // $this->response("get_student",$get->num_rows());
                $this->response('status', true);
                $data = $get->row_array();
                $this->set_data($data);
                $this->set_data('contact_number', maskMobileNumber($data['contact_number']));

                $this->set_data('admission_status', $data['admission_status'] ? label($this->ki_theme->keen_icon('verify text-white', 2, THEME == 'board' ? 0 : 1) . ' Verified Student') : label('Un-verified Student', 'danger'));
                $this->set_data('student_profile', $data['image'] ? base_url('upload/' . $data['image']) : base_url('assets/media/student.png'));
                $this->response('html', $this->template('student-profile-card'));
            } else {
                $this->response('error', 'Student Not Found.');
            }
        }
    }
    function add_iso()
    {
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('company_address', 'Company Address', 'required');
        $this->form_validation->set_rules('service', 'Service Name', 'required');
        $this->form_validation->set_rules('certificate_no', 'Certificate No', 'required|is_unique[iso_certificate.certificate_no]', [
            'is_unique' => 'This Certificate no is already exists..'
        ]);
        $this->form_validation->set_rules('org_certificate_date', 'Original Certificate Date', 'required');
        $this->form_validation->set_rules('issue_date', 'Issue Date', 'required');
        $this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required');
        if ($this->validation()) {
            $this->db->insert('iso_certificate', [
                'company_name' => $this->post('company_name'),
                'address' => $this->post('company_address'),
                'service' => $this->post('service'),
                'certificate_no' => $this->post('certificate_no'),
                'org_cert_date' => $this->post('org_certificate_date'),
                'issue_date' => $this->post('issue_date'),
                'expiry_date' => $this->post('expiry_date')
            ]);
            $this->response('status', true);
        }

    }
}
?>