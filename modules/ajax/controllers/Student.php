<?php
class Student extends Ajax_Controller
{
    function edit_form()
    {
        $this->response('form', 'Welcome');
        $this->response('url', 'Welcome');
        $this->response('status', true);
    }
    function change_admission_status()
    {
        // $this->response($this->post());
        try {
            $student_id = $this->post('student_id');
            $status = $this->post('type');
            if ($status == '1' && $this->center_model->isCenter()) {
                $typeMsg = '';
                if (CHECK_PERMISSION('WALLET_SYSTEM_COURSE_WISE')) {
                    $get = $this->db
                        ->select('center_id,course_id')
                        ->where('id', $student_id)
                        ->where('center_id', $this->center_model->loginId())
                        ->get('students');
                    if (!$get->num_rows())
                        throw new Exception('Invalid Selected Student..');

                    $row = $get->row();
                    $deduction_amount = $this->center_model->get_assign_courses(
                        $row->center_id,
                        ['course_id' => $row->course_id]
                    );
                    $deduction_amount = $deduction_amount->row('course_fee') ?? 0;
                    $typeMsg = 'course-wise';
                } else if (CHECK_PERMISSION('WALLET_SYSTEM')) {
                    $deduction_amount = $this->ki_theme->get_wallet_amount('student_admission_fees');
                    $typeMsg = 'fix-admission-fees';
                }

                $close_balance = $this->ki_theme->wallet_balance();
                $close_balance = $close_balance - $deduction_amount;
                if ($close_balance < 0)
                    throw new Exception('Wallet Balance is Low..');

                $data = [
                    'center_id' => $row->center_id,
                    'amount' => $deduction_amount,
                    'o_balance' => ($close_balance + $deduction_amount),
                    'c_balance' => $close_balance,
                    'type' => 'admission',
                    'description' => 'Student Addmission '.$typeMsg,
                    'type_id' => $student_id,
                    'added_by' => 'center',
                    'order_id' => strtolower(generateCouponCode(12)),
                    'status' => 1,
                    'wallet_status' => 'debit'
                ];
                $this->response('dd', $data);
                $this->db->insert('wallet_transcations', $data);
                // $this->response('res', $this->db->insert_id());
                $this->center_model->update_wallet($data['center_id'], $close_balance);
            }
            $this->student_model->update_admission_status($student_id, $status);
            $this->response('status', true);
        } catch (Exception $e) {
            $this->response('error', $e->getMessage());
        }
    }
    function search_by_roll_no()
    {
        $this->load->library('parser');
        // $this->response('roll_no',$this->post('roll_no'));
        $get = $this->student_model->get_student_via_roll_no($this->post('roll_no'));
        if ($get->num_rows()) {
            $this->response('status', true);
            $data = $get->row_array();
            $this->set_data($data);
            $this->set_data('admission_status', $data['admission_status'] ? label($this->ki_theme->keen_icon('verify text-white') . ' Verified Student') : label('Un-verified Student', 'danger'));
            $this->set_data('student_profile', $data['image'] ? base_url('upload/' . $data['image']) : base_url('assets/media/student.png'));
            $this->response('html', $this->template('student-profile-card'));
        } else
            $this->response('html', 'Student Not Found.');
    }
    function get_via_id()
    {
        $this->load->library('parser');
        $get = $this->student_model->get_student_via_id($this->post('student_id'));
        if ($get->num_rows()) {
            $this->response('status', true);
            $data = $get->row_array();
            $this->set_data($data);
            $this->set_data('admission_status', $data['admission_status'] ? label($this->ki_theme->keen_icon('verify text-white') . ' Verified Student') : label('Un-verified Student', 'danger'));
            $this->set_data('student_profile', $data['image'] ? base_url('upload/' . $data['image']) : base_url('assets/media/student.png'));
            $this->response('html', $this->template('student-profile-card'));
        } else
            $this->response('html', 'Student Not Found.');
    }
    function fetch_student_via_center()
    {
        $row = $this->student_model->fetch_student_center_wise($this->post("center_id"));
        $this->response('status', ($row->num_rows() > 0));
        $this->response('data', $row->result());
    }
    function fetch_student_via_batch()
    {
        // sleep(3);
        $row = $this->student_model->get_student_via_batch($this->post("batch_id"));
        $this->response('status', ($row->num_rows() > 0));
        $this->response('data', $row->result());
    }
    function add()
    {
        $owner_id = $this->get_data('owner_id');
        if ($walletSystem = (CHECK_PERMISSION('WALLET_SYSTEM_COURSE_WISE') && $this->center_model->isCenter())) {
            $deduction_amount = $this->center_model->get_assign_courses(
                $this->post('center_id'),
                ['course_id' => $this->post('course_id')]
            );
            if (PATH == 'sewaedu')
                $deduction_amount = $deduction_amount->row('com_course_fee');
            else
                $deduction_amount = $deduction_amount->row('course_fee');
            $close_balance = $this->ki_theme->wallet_balance();
            $close_balance = $close_balance - $deduction_amount;
            if ($close_balance < 0 or $close_balance < 0) {
                $this->response('html', 'Wallet Balance is Low..');
                exit;
            }
        } elseif ($walletSystem = ((CHECK_PERMISSION('WALLET_SYSTEM') && $this->center_model->isCenter()))) {
            $deduction_amount = $this->ki_theme->get_wallet_amount('student_admission_fees');
            $close_balance = $this->ki_theme->wallet_balance();
            if ($close_balance < 0) {
                $this->response('html', 'Your Wallet Balance is Low..');
                exit;
            }
        }
        $cordinateArray = [];
        if (CHECK_PERMISSION('CO_ORDINATE_SYSTEM') && $this->center_model->isCenter()) {
            $get = $this->center_model->get_assign_courses($owner_id, ['course_id' => $this->post('course_id')], 'center');
            if ($get->num_rows()) {
                $getROw = $get->row();
                $cordinateArray = [
                    'user_id' => $getROw->added_by_id,
                    'commission' => $getROw->commission,
                    'course_id' => $this->post('course_id'),
                    'center_id' => $owner_id,
                    'course_fee' => $getROw->course_fee,
                    'percentage' => $getROw->percentage
                ];
                $courseFees = $getROw->course_fee;
                $close_balance = $this->ki_theme->wallet_balance();
                $close_balance = $close_balance - $courseFees;
                if ($close_balance < 0) {
                    $this->response('html', 'Wallet Balance is Low..' . $courseFees);
                    exit;
                }
            } else {
                $this->response('html', 'Course not Found.');
                exit;
            }
        }

        $data = $this->post();
        $examination = [];
        if (isset($data['examination'])) {
            $examination = $data['examination'];
            unset($data['examination']);
        }
        if (isset($data['referral_id'])) {
            $referral_id = $data['referral_id'];
            unset($data['referral_id']);
        }

        $data['status'] = 0;
        $data['added_by'] = isset($data['added_by']) ? $data['added_by'] : 'admin';
        $data['admission_type'] = isset($data['admission_type']) ? $data['admission_type'] : 'offline';
        // $data['type'] = 'center';
        $email = $data['email_id'];
        unset($data['email_id'], $data['upload_docs']);
        $data['email'] = $email;
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
        if (isset($_POST['session_id']))
            $data['session_id'] = $_POST['session_id'];
        $data['adhar_front'] = $this->file_up('adhar_card');
        if (CHECK_PERMISSION('STUDENT_ADHAR_BACK'))
            $data['adhar_back'] = $this->file_up('adhar_back');
        // $data['adhar_back'] = $this->file_up('adhar_back');
        $data['image'] = $this->file_up('image');
        $data['upload_docs'] = json_encode($upload_docs_data);
        $data['status'] = true;
        $data['marital_status'] = $this->post('marital_status');
        $data['medium'] = $this->post('medium');
        $data['category'] = $this->post('category');
        $data['admission_status'] = true;
        if ($this->form_validation->run()) {
            $this->db->insert('students', $data);
            $student_id = $this->db->insert_id();
            if (CHECK_PERMISSION('STUDENT_EXAMINATION_FORM') && table_exists('student_examiniation_passed') && isset($examination['passed'])) {
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
            if ($walletSystem) {
                $data = [
                    'center_id' => $this->center_model->loginId(),
                    'amount' => $deduction_amount,
                    'o_balance' => ($close_balance + $deduction_amount),
                    'c_balance' => $close_balance,
                    'type' => 'admission',
                    'description' => 'Student Addmission',
                    'type_id' => $student_id,
                    'added_by' => 'center',
                    'order_id' => strtolower(generateCouponCode(12)),
                    'status' => 1,
                    'wallet_status' => 'debit'
                ];
                $this->db->insert('wallet_transcations', $data);
                $this->response('res', $this->db->insert_id());
                $this->center_model->update_wallet($data['center_id'], $close_balance);
            }
            if (CHECK_PERMISSION('CO_ORDINATE_SYSTEM') && $this->center_model->isCenter()) {
                $cordinateArray['type_id'] = $student_id;
                $this->db->insert('commissions', $cordinateArray);
            }
            if (CHECK_PERMISSION('REFERRAL_ADMISSION') && $this->center_model->isAdmin() && isset($_POST['referral_id'])) {
                $this->db->insert('referral_coupons', [
                    'student_id' => $student_id,
                    'coupon_code' => generateCouponCode(),
                    'coupon_by' => $referral_id,
                    'amount' => 500
                ]);
            }
            $this->response(
                'status',
                true
            );
        } else
            $this->response('html', $this->errors());

    }
    function genrate_a_new_rollno()
    {
        $rollNo = $this->gen_roll_no($this->post('center_id'));
        if ($rollNo) {
            $this->response("status", true);
            $this->response('roll_no', $rollNo);
        }
    }
    function get_center_courses()
    {
        $get = $this->center_model->get_assign_courses($this->post('center_id'));
        if ($get->num_rows()) {
            $this->response('courses', $get->result_array());
        }
    }
    function genrate_a_new_rollno_with_center_courses()
    {
        $this->genrate_a_new_rollno();
        if (CHECK_PERMISSION('ADMISSION_WITH_COURSE_CATEGORY')) {

            $this->response('courses', 0);
            $getCats = $this->center_model->center_course_categories($this->post('center_id'));
            $this->response('categories', $getCats->result_array());

        } else
            $this->get_center_courses();
    }
    function get_category_courses()
    {
        $center_id = $this->post('center_id');
        $category_id = $this->post('category_id');
        $data = $this->center_model->get_assign_courses($center_id, [
            'category_id' => $category_id
        ]);
        $this->response('courses', $data->result_array());
        $this->response('category_id', $category_id);
    }
    function online_list()
    {
        // $list = $this->db->where('admission_type','online')->get('students');
        // $list = $this->db->select('s.roll_no,s.contact_number,s.name,s.email,c.course_name,s.id as student_id,c.duration,c.duration_type')
        //         ->from('students as s')
        //         ->join("course as c","s.course_id = c.id AND s.admission_type = 'online'")
        //         ->get();
        $this->response('data', $this->student_model->get_online_student());
    }
    function passout()
    {
        $this->response('data', $this->student_model->get_passout_student());
    }
    function list()
    {
        $list = $this->student_model->get_all_student($this->post());
        $this->response('data', $list);
    }
    function search_student_for_attendance()
    {
        // $this->response($this->post());
        $list = $this->student_model->get_switch('batch', $this->post());
        $attendanceTypes = $this->db->get_where('attendence_type', ['is_active' => 'yes']);
        if ($list->num_rows()) {
            $html = form_hidden('batch_id', $this->post("batch_id")) .
                form_hidden('date', $this->post('attendance_date'));
            $i = 1;
            // $this->response('html', 'wait..');
            foreach ($list->result() as $std) {
                $select = $this->db->limit(1)->get_where('student_attendances', ['date' => $this->post('attendance_date'), 'roll_no' => $std->roll_no]);
                $html .= form_hidden('roll_no[]', $std->roll_no);
                $html .= '<tr>
                            <td>' . $i++ . '.</td>
                            <td>' . $std->roll_no . '</td>
                            <td>' . $std->student_name . '</td>
                            <td>';
                $remark = '';
                foreach ($attendanceTypes->result() as $type) {
                    if ($select->num_rows()) {
                        $row = $select->row();
                        $remark = $row->remark;
                        if ($type->id == $row->attendance_type_id)
                            $this->ki_theme->checked(true);
                    } else {
                        if ($type->id == 1)
                            $this->ki_theme->checked(true);
                    }
                    $html .= $this->ki_theme->html("$type->type &nbsp;&nbsp;")->radio('attendance_type_id[' . $std->roll_no . ']', $type->id, 'd-inline-block allTypes type-'.$type->id);
                }
                $html .= '</td>    
                       <td>
                            <input type="text" name="remark[]" value="' . $remark . '" class="form-control" placeholder="Remark">
                       </td>
                          </tr>';
            }
            $this->response('status', true);
            $this->set_data('attendance_types', $attendanceTypes->result_array());
            $this->set_data('tbody', $html);
            $this->response('html', $this->parser->parse('student/submit-attendance', $this->public_data, true));
        } else {
            $this->response('html', 'Students are Not Found of this course..');
        }
    }
    function report_student_for_attendance()
    {
        // $this->response($this->post());
        $filterDate = explode(' - ', $this->post('attendance_date'));
        $startDate = $assigndate = $startForAtt = strtotime($filterDate[0]);
        $endDate = strtotime($filterDate[1]);
        $this->response('attendance_date', $filterDate);
        $listStudents = $this->student_model->get_switch('batch', ['batch_id' => $this->post('batch_id')]);
        $html = '';
        if ($listStudents->num_rows()) {
            $this->response('status', true);
            $allTypes = $this->db->get('attendence_type');
            $html .= '<div class="card card-image card-header p-0"><div class="mb-3 p-3">';
            $allAttTypes = [];
            foreach ($allTypes->result() as $rw) {
                $allAttTypes[$rw->id] = $rw->key_value;
                $html .= label($rw->key_value . "&nbsp;:&nbsp;" . $rw->type, 'light p-4 me-4 fs-3');
            }
            // $html = trim($html,',');
            $html .= '
                    </div>
                    <div class="table-container">
                    <table class="table table-bordered table-hover">
                        <thead><tr>
                        <th class="bg-light">Student Name</th>';
            while ($startDate <= $endDate) {
                $html .= '<th style="width:100px">' . date('Y-m-d', $startDate) . '</th>';
                $startDate += 86400;
            }
            $html .= '</tr></thead><tbody>';
            foreach ($listStudents->result() as $row) {
                $startForAtt = $assigndate;
                $html .= '<tr>
                            <th class="bg-light">' . $row->student_name . '</th>';
                while ($startForAtt <= $endDate) {
                    $date = date('d-m-Y', $startForAtt);
                    $getAtt = $this->db->select('attendance_type_id')->where(['date' => $date, 'roll_no' => $row->roll_no, 'batch_id' => $this->post('batch_id')])->get('student_attendances');
                    $attID = 5;
                    if ($getAtt->num_rows()) {
                        $attID = $getAtt->row('attendance_type_id');
                    }
                    $html .= '<td>' . $allAttTypes[$attID] . '</td>';
                    $startForAtt += 86400;
                }
                $html .= '</tr>';
            }
            $html .= '</tbody></table></div></div>';
            $this->response('html', $html);
        } else {
            $this->response('html', 'Students are not found.');
        }
    }
    function save_attendance()
    {
        $batch_id = $this->post('batch_id');
        $date = $this->post('date');
        $roll_nos = $this->post('roll_no');
        $attendanceTypeIDs = $this->post('attendance_type_id');
        $remarks = $this->post('remark');
        foreach ($roll_nos as $index => $roll_no) {
            $attendanceTypeId = $attendanceTypeIDs[$roll_no];
            $remark = $remarks[$index];
            $where = $data = [
                'roll_no' => $roll_no,
                'batch_id' => $batch_id,
                'date' => $date,
            ];
            $data['attendance_type_id'] = $attendanceTypeId;
            $data['remark'] = $remark;
            $get = $this->db->where($where)->get('student_attendances');
            if ($get->num_rows()) {
                $this->db->update('student_attendances', $data, ['id' => $get->row('id')]);
            } else
                $this->db->insert('student_attendances', $data);
            $this->response('html', 'Student Attendance Update Successfully..');
        }
    }
    function create_admint_card()
    {
        $data = [
            'session_id' => $this->post("session_id"),
            'student_id' => $this->post("student_id"),
            'center_id' => $this->post("center_id"),
            'duration_type' => $this->post("course_duration_type"),
            'course_id' => $this->post("course_id"),
            'exam_date' => $this->post('exam_date'),
            'enrollment_no' => $this->post('enrollment_no')
        ];
        $chk = $this->student_model->admit_card($data);
        if ($chk->num_rows()) {
            $this->response('html', alert('Please Check your selected <b>Session</b>. Session already used.', 'warning'));
        } else {
            $data['duration'] = $this->post("duration");
            $data['added_by'] = $this->student_model->login_type();
            $this->db->insert('admit_cards', $data);
            $this->response('status', true);
        }
    }
    function list_admint_cards()
    {
        $get = $this->student_model->admit_card();
        $this->response('data', $get->result_array());
    }
    function genrate_admit_card()
    {
        $dType = $this->post('duration_type');
        $d = $this->post('duration');
        $duration = $dType == 'month' ? 1 : $d;
        $where = ['duration_type' => $dType, 'course_id' => $this->post("course_id"), 'student_id' => $this->post("student_id")];
        $options = [];
        $examDone = false;
        $label = '';
        for ($i = 1; $i <= $duration; $i++) {
            $status = 0;
            $where['duration'] = ($dType == 'month') ? $d : $i;
            $chk = $this->student_model->check_admit_card($where);
            $sub_label = $this->post('course_name') . ' <b>Admit Card </b>';
            if ($chk->num_rows()) {
                $sub_label .= ' Created on  <b>' . ($chk->row('session')) . '</b>';
            } elseif ($examDone) {
                $sub_label .= "<label class='badge badge-danger'>$label Exam's is not create.</label>";
            } else {
                $sub_label .= "<label class='badge badge-info'>Ready to create.</label>";
            }
            $label = $dType == 'month' ? $d . ' ' . ucfirst($dType) : humnize_duration_with_ordinal($i, $dType);
            if ($chk->num_rows()) {
                if (CHECK_PERMISSION('STUDENT_EXAMINATION_FORM')) {
                    $status = $chk->row('status');
                    // $sub_label = $status;
                    if ($status == 0)
                        $sub_label = "\n<label class='badge badge-info'>Your admit card is under review..</label>";

                } else
                    $status = 1;
                if ($status) {
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
            } else {
                $admitCardExam = $this->student_model->get_marksheet_using_admit_card($chk->row('id'));
                $examDone = $admitCardExam->num_rows() == 1;
            }
        }
        $this->response('options', $options);
        $this->response('status', true);
    }
    function marksheet_validation()
    {
        $dType = $this->post('duration_type');
        $d = $this->post('duration');
        $duration = $dType == 'month' ? 1 : $d;
        $where = ['duration' => '', 'duration_type' => $dType, 'course_id' => $this->post("course_id"), 'student_id' => $this->post("student_id")];
        $options = [];
        $admit_card_id = 0;
        for ($i = 1; $i <= $duration; $i++) {
            unset($where['admit_card_id'], $where['duration']);
            $where['duration'] = ($dType == 'month') ? $d : $i;
            $chk = $this->student_model->admit_card($where);
            $disable = true;
            $examNotCreate = false;
            $sublable = $this->post('course_name');
            if ($chk->num_rows()) {
                $admit_card_id = $chk->row('admit_card_id');
                $marksheet = $this->student_model->get_marksheet_using_admit_card($admit_card_id);
                if ($marksheet->num_rows()) {
                    $sublable .= ' <b>Marsksheet</b> Created on ' . $this->ki_theme->date($marksheet->row("date"));
                } else {
                    $examNotCreate = true;
                    $disable = false;
                }
            } else {
                $examNotCreate = true;
                $sublable .= ' <b>Admit card not Generated</b>';
            }
            $options[] = [
                'id' => $where['duration'],
                'label' => $dType == 'month' ? $d . ' ' . ucfirst($dType) : humnize_duration_with_ordinal($i, $dType),
                'sub_label' => $sublable,
                'isCreated' => $disable
            ];
            if ($examNotCreate) {
                break;
            }
        }
        $this->response('admit_card_id', $admit_card_id);
        $this->response('options', $options);
        $this->response('status', true);
    }
    function create_marksheet()
    {
        // $this->response($this->post());
        if ($walletSystem = (CHECK_PERMISSION('WALLET_SYSTEM') && $this->center_model->isCenter())) {
            if (CHECK_PERMISSION(strtoupper('centre_fun_marksheet_certificate_fee'))) {
                $loginId = $this->center_model->loginId();
                $get = $this->center_model->get_assign_courses($loginId, [
                    'course_id' => $this->post('course_id')
                ]);
                $deduction_amount = 0;
                if ($get->num_rows())
                    $deduction_amount = $get->row('marksheet');
                $deduction_amount = (empty($deduction_amount) || $deduction_amount == null) ? 0 : $deduction_amount;
                $close_balance = $this->ki_theme->wallet_balance();
                $close_balance = $close_balance - $deduction_amount;
                if ($close_balance < 0) {
                    $this->response('html', 'Your Wallet Balance is Low..');
                    exit;
                }

            } else {
                $deduction_amount = $this->ki_theme->get_wallet_amount('student_marksheet_fees');
                $close_balance = $this->ki_theme->wallet_balance();
                if ($close_balance < 0) {
                    $this->response('html', 'Your Wallet Balance is Low..');
                    exit;
                }
            }
        }

        $post = $this->post();
        if (isset($post['marks'])) {
            $data = [
                'admit_card_id' => $post['admit_card_id'],
                'center_id' => $post['center_id'],
                'student_id' => $post['student_id'],
                'duration_type' => $post['course_duration_type'],
                'duration' => $post['duration'],
                'course_id' => $post['course_id'],
                'date' => $post['date']
            ];
            if (PATH == 'sct_ebook')
                $data['marksheet_type'] = $post['marksheet_type'];
            $this->db->insert('marksheets', $data);
            $marksheet_id = $this->db->insert_id();
            $subjects = [];
            $k = 0;
            foreach ($post['marks'] as $subject_id => $numbers) {
                $ttl = 0;
                $theory_marks = (isset($numbers['theory_marks'])) ?
                    $numbers['theory_marks'] : 0;
                $practical = (isset($numbers['practical'])) ?
                    $numbers['practical'] : 0;
                $num = [
                    'theory_marks' => $theory_marks,
                    'practical' => $practical
                ];
                $num['marksheet_id'] = $marksheet_id;
                $num['subject_id'] = $subject_id;
                $num['ttl'] = $theory_marks + $practical;
                $subjects[] = $num;
                $k++;
            }
            if ($k) {
                $this->db->insert_batch('marks_table', $subjects);
            }

            if ($walletSystem) {
                $data = [
                    'center_id' => $this->center_model->loginId(),
                    'amount' => $deduction_amount,
                    'o_balance' => ($close_balance + $deduction_amount),
                    'c_balance' => $close_balance,
                    'type' => 'marksheet',
                    'description' => 'Student Marksheet',
                    'type_id' => $marksheet_id,
                    'added_by' => 'center',
                    'order_id' => strtolower(generateCouponCode(12)),
                    'status' => 1,
                    'wallet_status' => 'debit'
                ];
                $this->db->insert('wallet_transcations', $data);
                $this->center_model->update_wallet($data['center_id'], $close_balance);
            }

            $this->response('subjects', $subjects);
            $this->response('status', true);
        }
    }
    function update_marksheet_issue_date()
    {
        $this->db->where('id', $this->post('id'))->update('marksheets', [
            'date' => $this->post('date')
        ]);
        $this->response('status', true);
        $this->response('html', 'Update issue date of marksheet successfully..');
    }
    function marksheet_edit_form()
    {
        // $this->db->where('id', $this->post('id'))->update('marksheets', [
        //     'date' => $this->post('date')
        // ]);
        // $this->response('data',$this->post());
        $this->response('url', 'student/update-marksheet');
        $this->response('status', true);
        $this->response('form', CHECK_PERMISSION('MARKSHEET_MAX_FIX_100') ? $this->template('student/edit-system-marksheet') : $this->template('student/edit-marksheet'));
    }
    function certificate_edit_form()
    {
        $this->response('url', 'student/update-certificate');
        $this->response('status', true);
        $this->response('form', $this->template('student/edit-certificate'));
    }
    function update_certificate()
    {
        $this->db->where('id', $this->post('id'))->update('student_certificates', [
            'issue_date' => $this->post('date')
        ]);
        $this->response('status', true);
    }
    function update_marksheet()
    {
        $marksheet_id = $this->post('id');
        $this->db->update('marksheets', [
            'date' => $this->post('date')
        ], [
            'id' => $marksheet_id
        ]);
        $subjects = [];
        $k = 0;
        foreach ($this->post('marks') as $mark_id => $numbers) {
            $ttl = 0;
            $theory_marks = (isset($numbers['theory_marks'])) ?
                $numbers['theory_marks'] : 0;
            $practical = (isset($numbers['practical'])) ?
                $numbers['practical'] : 0;
            $num = [
                'theory_marks' => $theory_marks,
                'practical' => $practical
            ];
            $num['ttl'] = $theory_marks + $practical;
            $num['id'] = $mark_id;
            $subjects[] = $num;
            $k++;
        }
        if ($k) {
            $this->db->update_batch('marks_table', $subjects, 'id');
        }
        $this->response('status', true);
    }
    function print_mark_table()
    {
        $where = $this->post();
        $where['isDeleted'] = 0;
        $subjects = $this->student_model->course_subject($where);
        $this->response('status', true);
        $this->set_data('subjects', $subjects->result_array());
        $this->response('marks_table', CHECK_PERMISSION('MARKSHEET_MAX_FIX_100') ? $this->template('student/marks-table') : $this->template('marks-table'));
    }
    function list_admit_cards()
    {
        $data = [];
        $get = $this->student_model->admit_card();
        if ($get->num_rows()) {
            foreach ($get->result_array() as $ad) {
                $ad['admit_card_id'] = $this->encode($ad['admit_card_id']);
                array_push($data, $ad);
            }
        }
        $this->response(
            'data',
            $data
        );
    }
    function fetch_examination_body()
    {
        $get = $this->db->select('examination_body')->where('id', $this->post('student_id'))->get('students');
        if ($get->num_rows()) {
            $this->response('examination_body', $get->row()->examination_body);
            $this->response('status', true);
        }
    }
    function update_examination_body()
    {
        $this->db->where('id', $this->post('student_id'))->update(
            'students',
            [
                'examination_body' => $this->post('examination_body')
            ]
        );
        $this->response('status', true);
    }
    function list_registration_certificates()
    {
        $data = [];
        $get = $this->student_model->get_switch('all', [
            'examination_body !=' => null
        ]);
        if ($get->num_rows()) {
            foreach ($get->result_array() as $ad) {
                $ad['registration_id'] = ($ad['student_id']);
                array_push($data, $ad);
            }
        }
        $this->response(
            'data',
            $data
        );
    }
    function filter_for_select()
    {
        $this->response($this->post());
        $query = $this->post('q') ? $this->post('q') : '';
        $results[] = array(
            'id' => '',
            'student_name' => 'No matching records found',
            'disabled' => true
        );
        $get = $this->student_model->search_student_for_select2(['search' => $query]);
        if ($get->num_rows())
            $results = $get->result_array();
        $this->response('results', $results);
    }
    function filter_passout_for_select()
    {
        $this->response($this->post());
        $query = $this->post('q') ? $this->post('q') : '';
        $results[] = array(
            'id' => '',
            'student_name' => 'No matching records found',
            'disabled' => true
        );
        $get = $this->student_model->get_switch('passout', ['search' => $query]);
        if ($get->num_rows())
            $results = $get->result_array();
        $this->response('results', $results);
    }
    function genrate_certificate()
    {
        // $this->response($this->post());
        $where = $this->post();
        if (isset($where['exam_conduct_date'])) {
            $exam_conduct_date = $where['exam_conduct_date'];
            unset($where['exam_conduct_date']);
        }
        $course_name = $this->post('course_name');
        unset($where['course_name']);
        $certificateWhere = $where;
        $duration = $where['duration'];
        $duration_type = $where['duration_type'];
        unset($where['duration'], $where['duration_type']);
        $this->response('where', $where);
        $checkCertificate = $this->student_model->student_certificates($where);
        if (!$checkCertificate->num_rows()) {
            if (isset($where['exam_conduct_date'])) {
                $where['exam_conduct_date'] = $exam_conduct_date;
            }
            $get = $this->student_model->marksheet($where + [
                'duration' => $duration,
                'duration_type' => $duration_type
            ]);
            if (CHECK_PERMISSION('GENERATE_CERTIFICATE_WITHOUT_MARKSHEET')) {
                $this->response('html', '<div class="alert alert-success">' . (
                    $get->num_rows() ? 'The course <b>' . $course_name . '</b> has been completed, you can generate the certificate.' : 'You can Generate Certificate But Marksheet Not Generated of This Student.') .
                    '</div>');
                $this->response('status', true);
            } else {
                if ($get->num_rows()) {
                    $this->response('status', true);
                    $this->response('html', '<div class="alert alert-success">The course <b>' . $course_name . '</b> has been completed, you can generate the certificate.</div>');
                } else
                    $this->response('html', '<div class="alert alert-danger">The course <b>' . $course_name . '</b> is not completed yet</div>');
            }
        } else
            $this->response('html', '<div class="alert alert-danger">The course <b>' . $course_name . '</b> Certificate Already Generated.</div>');
    }
    function create_certificate()
    {
        $data = $this->post();
        if (CHECK_PERMISSION('CENTRE_STUDENT_CERTIFICATE_PERMISSION') && $this->center_model->isCenter()) {
            $details = $this->center_model->get_center($this->get_data('owner_id'));
            if ($details->num_rows()) {
                $rowDetails = $details->row();
                $issueDate = date('Y-m-d', strtotime($data['issue_date']));

                if ($rowDetails->certificate_create_from == null or $rowDetails->certificate_create_from == null) {
                    $this->response('html', alert('You don`\t have permission to create certificate', 'danger'));
                    exit;
                }
                if ($rowDetails->certificate_create_from > $issueDate or $rowDetails->certificate_create_to < $issueDate) {
                    $this->response('html', alert('You don`\t have permission to create certificate', 'danger'));
                    exit;
                }
            }
        }
        if ($walletSystem = (CHECK_PERMISSION('WALLET_SYSTEM') && $this->center_model->isCenter())) {
            if (CHECK_PERMISSION(strtoupper('centre_fun_marksheet_certificate_fee'))) {
                $loginId = $this->center_model->loginId();
                $get = $this->center_model->get_assign_courses($loginId, [
                    'course_id' => $this->post('course_id')
                ]);
                $deduction_amount = 0;
                if ($get->num_rows())
                    $deduction_amount = $get->row('certificate');
                $deduction_amount = (empty($deduction_amount) || $deduction_amount == null) ? 0 : $deduction_amount;
                $close_balance = $this->ki_theme->wallet_balance();
                $close_balance = $close_balance - $deduction_amount;
                if ($close_balance < 0) {
                    $this->response('html', 'Your Wallet Balance is Low, To generate this certificate you need ' . $deduction_amount . ' rupees.., Please recharge your wallet.');
                    exit;
                }

            } else {
                $deduction_amount = $this->ki_theme->get_wallet_amount('student_certificate_fees');
                $close_balance = $this->ki_theme->wallet_balance();
                if ($close_balance < 0) {
                    $this->response('html', 'Your Wallet Balance is Low, To generate this certificate you need ' . $deduction_amount . ' rupees.., Please recharge your wallet.');
                    exit;
                }
            }
        }
        $where = array_diff_key($data, array_flip(preg_grep('/^hindi/', array_keys($data))));
        $checkCertificate = $this->student_model->student_certificates($where);
        $this->response('html', 'Something went wrong.');
        if (!$checkCertificate->num_rows()) {

            $this->db->insert('student_certificates', $data);
            $certificate_id = $this->db->insert_id();
            if ($walletSystem) {
                $data = [
                    'center_id' => $this->center_model->loginId(),
                    'amount' => $deduction_amount,
                    'o_balance' => ($close_balance + $deduction_amount),
                    'c_balance' => $close_balance,
                    'type' => 'certificate',
                    'description' => 'Student Certificate',
                    'type_id' => $certificate_id,
                    'added_by' => 'center',
                    'order_id' => strtolower(generateCouponCode(12)),
                    'status' => 1,
                    'wallet_status' => 'debit'
                ];
                $this->db->insert('wallet_transcations', $data);
                $this->center_model->update_wallet($data['center_id'], $close_balance);
            }
            $this->response('status', true);
        }
    }
    function list_certificate()
    {
        $this->response('data', $this->student_model->student_certificates()->result_array());
    }
    function delete_certificate($id)
    {
        // $this->response($this->post());
        $this->response('status', $this->db->where('id', $id)->delete('student_certificates'));
    }
    function delete_admit_card($id)
    {
        $check = $this->db->where('admit_card_id', $id)->get('marksheets');
        if ($check->num_rows()) {
            $this->response('html', 'This Admit Card used in Marksheet, please delete marksheet first.');
        } else {
            $this->response(
                'status',
                $this->db->where('id', $id)->delete('admit_cards')
            );
        }
    }
    function delete_marksheet($id)
    {
        $this->db->where('id', $id)->delete('marksheets');
        $this->db->where('marksheet_id', $id)->delete('marks_table');
        $this->response(
            'status',
            true
        );
    }
    function list_marksheets()
    {
        $this->response('data', $this->student_model->marksheet()->result_array());
    }
    function upload_study_material()
    {
        // $this->ki_theme->set_default_vars('max_upload_size', 10485760); // 10MB
        // if ($file = $this->file_up('file')) {
        //     $this->response('status', true);
        //     $data = $this->post();
        //     $data['file'] = $file;
        //     $data['upload_by'] = $this->student_model->login_type();
        //     $this->db->insert('study_material', $data);
        // }
        // if ($file = $this->chunkUpload('study-mat')) {
        //     $this->response('status', true);
        //     $data = $this->post();
        //     $data['file'] = $this->post('_file_name');
        //     unset($data['_file_name']);
        //     $data['upload_by'] = $this->student_model->login_type();
        //     $this->db->insert('study_material', $data);
        // }
        if ($post = $this->input->post()) {
            $data = [
                'file_type' => $post['file_type'],
                'course_id' => $post['course_id'],
                'title' => $post['title'],
                'description' => $post['description'],
                'material_id' => time()
            ];
            if ($post['file_type'] == 'file') {
                $this->chunkUpload('study-mat');
                $data['file'] = $this->post('_file_name');
                if (isset($data['_file_name']))
                    unset($data['_file_name']);
            } else {
                $data['file'] = $this->post('youtube_link');
                unset($data['youtube_link']);
            }
            $data['upload_by'] = $this->student_model->login_type();
            if (isset($data['file']) and !empty($data['file']))
                $this->response('status', $this->db->insert('study_material', $data));
        }
    }
    function delete_study_material($material_id)
    {
        //delete-study-material
        $get = $this->student_model->get_study_material($material_id);
        if ($get->num_rows()) {
            $file = 'upload/study-mat/' . $get->row('material_file');
            if (file_exists($file)) {
                @unlink($file);
            }
            $this->db->where('material_id', $material_id)->delete('study_material');
            $this->response('status', true);
        }
    }

    function list_study_material()
    {
        $this->response('data', $this->student_model->study_materials()->result_array());
    }
    function list_assign_students()
    {
        $students = $this->student_model->get_switch('assign_study_student_list', [
            'course_id' => $this->post("course_id"),
            'center_id' => $this->post('center_id')
        ]);
        $this->set_data('study_id', $this->post('id'));
        $this->set_data('sql', $this->db->last_query());
        $this->set_data('students', $students->result_array());
        $this->response('status', ($students->num_rows() > 0));
        $this->response('html', $this->template('list-study-assign-students'));
    }
    function study_assign_to_student()
    {
        $data = [
            'material_id' => $this->post('material_id'),
            'student_id' => $this->post('student_id')
        ];
        if (!$this->post('check_status')) {
            $this->db->where($data)->delete('student_study_material');
        } else {
            $data['assign_time'] = time();
            $this->db->insert('student_study_material', $data);
        }
        $this->response('status', true);
    }
    function coupons()
    {
        $this->response('data', $this->student_model->coupons()->result_array());
    }

    function coupon_update()
    {
        $this->response(
            'status',
            $this->db->where('id', $this->post('id'))->update('referral_coupons', [
                'isUsed' => $this->post('isUsed')
            ])
        );
        $this->response('last_query', $this->db->last_query());
    }
    function coupon_update_form()
    {
        $this->response('status', true);
        $this->response('url', 'student/coupon-update');
        $this->set_data($this->student_model->get_coupon_by_id($this->post('id'))->row_array());
        $this->response('form', $this->template('update-coupon-status'));
    }
    function get_id_card_url()
    {
        $this->response([
            'status' => true,
            'url' => base_url('id-card/' . $this->ki_theme->encrypt($this->post('student_id')))
        ]);
    }
    function add_palcement_student()
    {
        if ($this->validation('placement_status')) {
            $this->response('status', $this->student_model->add_palcement_student([
                'student_id' => $_POST['student_id'],
                'designation' => $_POST['designation'],
                'company_name' => $_POST['company_name']
            ]));
        }
    }
    function list_placement_students()
    {
        $this->response('data', $this->student_model->list_placement_student()->result_array());
    }
    function delete_placement_student($id)
    {
        $this->response('status', $this->student_model->delete_placement_student($id));
    }
    function registration_verification()
    {
        $this->response('data', $this->db->get('students_registeration_data')->result_array());
    }
    function update_registration_verification_status()
    {
        $this->response('status', $this->db->where('id', $this->post('id'))->update('students_registeration_data', [
            'status' => (int) $this->post('status')
        ]));
        $this->response('data', $this->post());
        // $this->response('currentStatus',$this->post('status') == 1 ? 'Verified' : 'Unverified');
    }
    function update_registration_data()
    {
        $this->response('status', $this->db->where('id', $this->post('id'))->update('students_registeration_data', [
            'examination_body' => $this->post("examination")
        ]));
    }
    function delete_registration_upstate($id)
    {
        $get = $this->db->get_where('students_registeration_data', [
            'id' => $id
        ]);
        if ($get->num_rows()) {
            $row = $get->row_array();
            extract($row);
            // $marksheet = $get
            $files = ['10th_marksheet', '12th_marksheet', '1st_year_marksheet', '2nd_year_marksheet', 'diploma', 'college_no_due_slip', 'aadhar_card', 'photo'];
            foreach ($files as $file) {
                if (file_exists('upload/' . $row[$file])) {
                    @unlink('upload/' . $row[$file]);
                }
            }
            $this->db->where('id', $row['id'])->delete('students_registeration_data');
            $this->response('status', true);
        }
    }
    function custom_student_fees()
    {
        $getStudent = $this->student_model->get_student_via_id($this->post('student_id'));
        if ($getStudent->num_rows()) {
            $row = $getStudent->row_array();
            $this->response('status', true);
            if (is_null($row['custom_fee'])) {
                $this->response('status', 'setfee');
            } else {
                $ttlSubmited = $this->db->select('SUM(amount) as ttlAmount')->where('type_key', 'course_fees')->where('student_id', $this->post("student_id"))->get('student_fee_transactions')->row('ttlAmount') ?? 0;
                $this->set_data('submitted_fee', $ttlSubmited);
                $remainingFee = $row['custom_fee'] - $ttlSubmited;
                $this->set_data('remaining_fee', $remainingFee);
                $this->response('feeInfo', '
                            <div class="d-flex flex-stack mt-10">

                                <label class="text-color-gray-500 fw-semibold fs-6 me-2">Total Fee</label>                   
                                
                                <label class="btn btn-icon btn-sm h-auto text-primary justify-content-end fs-2">
                                    ' . $this->get_data('inr') . '  ' . $row['custom_fee'] . ' 
                                </label>                
                                
                            </div>
                            <div class="d-flex flex-stack">

                                <label class="text-color-gray-500 fw-semibold fs-6 me-2">Total Submitted Fee</label>                   
                                
                                <label class="btn btn-icon btn-sm h-auto text-success justify-content-end fs-2">
                                    ' . $this->get_data('inr') . '  ' . $ttlSubmited . '
                                </label>                
                                
                            </div>
                            <div class="d-flex flex-stack">

                                <label class="text-color-gray-500 fw-semibold fs-6 me-2">Remaining Fee</label>                   
                                
                                <label class="btn btn-icon btn-sm h-auto text-danger justify-content-end fs-2">
                                    ' . $this->get_data('inr') . ' ' . $remainingFee . ' 
                                </label>                
                                
                            </div>

                
                ' . form_hidden([
                        'student_id' => $row['student_id'],
                        'course_id' => $row['course_id'],
                        'roll_no' => $row['roll_no'],
                        'center_id' => $row['institute_id'],
                        'duration' => $row['duration']
                    ]));
                if ($remainingFee)
                    $this->response('html', $this->template('student/custom-fee-get'));
                else
                    $this->response('html', alert('No Due Fee Found.', 'success'));
            }
        }
    }
    function set_student_custom_fee()
    {
        $this->db->where('id', $this->post("student_id"))->update('students', [
            'custom_fee' => $this->post('fee_amount')
        ]);
        $this->response('status', true);
    }
    function submit_student_custom_fee()
    {
        $payment_id = time();
        $amount = $this->post('payable_amount');
        $dicsount = $this->post('discount');
        $lateFee = 0;
        $data = [
            'type' => 0,
            'duration' => 0,
            'type_key' => 'course_fees',
            'amount' => $amount,
            'discount' => $dicsount,
            'payable_amount' => ($amount - $dicsount) + $lateFee,
            'description' => $_POST['note'],
            'payment_type' => $_POST['payment_type'],
            'late_fee' => 0,
            'payment_id' => $payment_id,
            'payment_date' => $_POST['payment_date'],
            'student_id' => $_POST['student_id'],
            'course_id' => $_POST['course_id'],
            'roll_no' => $_POST['roll_no'],
            'center_id' => $_POST['center_id'],
            'added_by' => $this->student_model->login_type()
        ];
        $this->response('status', $this->db->insert('student_fee_transactions', $data));
    }
    function delete_typing_certificate()
    {
        if ($id = $this->post('id')) {
            $this->db->where('id', $id)->delete('student_typing_certicate');
            $this->response('status', true);
        }
    }
    function add_typing_certificate()
    {
        try {
            if (!table_exists('student_typing_certicate'))
                throw new Exception('Serivce Not Available..');

            $this->form_validation->set_rules('student_id', 'Student', 'required|is_unique[student_typing_certicate.student_id]', [
                'is_unique' => 'Certification Already Creatred for this student.'
            ]);
            //certification_no
            // $this->form_validation->set_rules('certification_no', 'Certificate No', 'required|is_unique[student_typing_certicate.certification_no]', [
            //     'is_unique' => 'Certification no is already exists.'
            // ]);
            $this->form_validation->set_rules('procured', 'Procured', 'required');
            $this->form_validation->set_rules('issue_date', 'Issue Date', 'required');
            $this->form_validation->set_rules('grade', 'Grade', 'required');
            $this->form_validation->set_rules('session', 'Session', 'required');
            if ($this->validation()) {
                $data = [
                    'student_id' => $this->post('student_id'),
                    'issue_date' => $this->post('issue_date'),
                    'procured' => $this->post('procured'),
                    'grade' => $this->post('grade'),
                    'session' => $this->post('session'),
                    // 'certification_no' => $this->post('certification_no')
                ];
                $this->db->insert('student_typing_certicate', $data);
                $this->response('status', true);
            }

        } catch (Exception $e) {
            $this->response('html', $e->getMessage());
        }
    }
}
