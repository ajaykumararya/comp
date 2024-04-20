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
        $stuent_id = $this->post('student_id');
        $status = $this->post('type');
        $this->student_model->update_admission_status($stuent_id, $status);
        $this->response('status', true);
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
        $data = $this->post();
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
        $data['adhar_front'] = $this->file_up('adhar_front');
        $data['adhar_back'] = $this->file_up('adhar_back');
        $data['image'] = $this->file_up('image');
        $data['upload_docs'] = json_encode($upload_docs_data);
        $data['status'] = true;
        $data['admission_status'] = true;
        if ($this->form_validation->run()) {
            $this->db->insert('students', $data);
            $student_id = $this->db->insert_id();
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
        $this->get_center_courses();
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
                    $html .= $this->ki_theme->html("$type->type &nbsp;&nbsp;")->radio('attendance_type_id[' . $std->roll_no . ']', $type->id, 'd-inline-block');
                }
                $html .= '</td>    
                       <td>
                            <input type="text" name="remark[]" value="' . $remark . '" class="form-control" placeholder="Remark">
                       </td>
                          </tr>';
            }
            $this->response('status', true);
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
                    $date = date('Y-m-d', $startForAtt);
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
            $options[] = [
                'id' => $dType == 'month' ? $d : $i,
                'label' => $label,
                'sub_label' => $sub_label, //$this->post('course_name') . ' <b>Admit Card </b>' . ($chk->num_rows() ? ' Created on  <b>' . ($chk->row('session')) . '</b>' : ''),
                'isCreated' => $examDone ? true : $chk->num_rows()
            ];
            if (!$chk->num_rows() || $examDone) {
                break;
            } else {
                $admitCardExam = $this->student_model->get_marksheet_using_admit_card($chk->row('id'));
                $examDone = $admitCardExam->num_rows() == 0;
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
            $this->response('subjects', $subjects);
            $this->response('status', true);
        }
    }
    function print_mark_table()
    {
        $where = $this->post();
        $where['isDeleted'] = 0;
        $subjects = $this->student_model->course_subject($where);
        $this->response('status', true);
        $this->set_data('subjects', $subjects->result_array());
        $this->response('marks_table', $this->template('marks-table'));
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
        unset($where['duration'], $where['duration_type']);
        $checkCertificate = $this->student_model->student_certificates($where);
        if (!$checkCertificate->num_rows()) {
            if (isset($where['exam_conduct_date'])) {
                $where['exam_conduct_date'] = $exam_conduct_date;
            }
            $get = $this->student_model->marksheet($where);
            if (CHECK_PERMISSION('GENERATE_CERTIFICATE_WITHOUT_MARKSHEET')) {
                $this->response('html', '<div class="alert alert-success">' . (
                    $get->num_rows() ? 'The course <b>' . $course_name . '</b> has been completed, you can generate the certificate.' : 'You can Generate Certificate But Marksheet Not Generated of This Student.') .
                    '</div>');
                $this->response('status', true);
            } else {
                $this->response('html', '<div class="alert alert-danger">The course <b>' . $course_name . '</b> is not completed yet</div>');
                if ($get->num_rows()) {
                    $this->response('status', true);
                    $this->response('html', '<div class="alert alert-success">The course <b>' . $course_name . '</b> has been completed, you can generate the certificate.</div>');
                }
            }
        } else
            $this->response('html', '<div class="alert alert-danger">The course <b>' . $course_name . '</b> Certificate Already Generated.</div>');
    }
    function create_certificate()
    {
        // $this->response($this->post());
        $data = $this->post();
        $checkCertificate = $this->student_model->student_certificates($data);
        $this->response('html', 'Something went wrong.');
        if (!$checkCertificate->num_rows()) {
            $this->db->insert('student_certificates', $data);
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
        $this->response(
            'status',
            $this->db->where('id', $id)->delete('admit_cards')
        );
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
        $this->ki_theme->set_default_vars('max_upload_size', 10485760); // 10MB
        if ($file = $this->file_up('file')) {
            $this->response('status', true);
            $data = $this->post();
            $data['file'] = $file;
            $data['upload_by'] = $this->student_model->login_type();
            $this->db->insert('study_material', $data);
        }
    }
    function list_study_material()
    {
        $this->response('data', $this->student_model->study_materials()->resul_array());
    }

    function coupons(){
        $this->response('data' , $this->student_model->coupons()->result_array());
    }
    function coupon_update(){
        $this->response('status',
        $this->db->where('id',$this->post('id'))->update('referral_coupons',[
            'isUsed' => $this->post('isUsed')
        ]));
        $this->response('last_query',$this->db->last_query());
    }
    function coupon_update_form(){
        $this->response('status',true);
        $this->response('url','student/coupon-update');
        $this->set_data($this->student_model->get_coupon_by_id($this->post('id'))->row_array());
        $this->response('form',$this->template('update-coupon-status'));
    }

}
