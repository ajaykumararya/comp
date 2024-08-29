<?php
class Exam extends Ajax_Controller
{
    function create()
    {
        $data = $this->post();
        $data['timer_status'] = isset($data['timer_status']) ? 1 : 0;
        $data['schedule_status'] = isset($data['schedule_status']) ? 1 : 0;
        // $this->response($this->post());
        $this->db->insert('exams', $data);
        $this->response('status', true);
    }
    function update_status()
    {
        // $this->response($this->post());
        $this->db->where('id', $this->post('id'))->update('exams', ['status' => $this->post('status')]);
        $this->response('satuts', true);
    }
    function update($id)
    {
        $id = $this->decode($id);
        $data = $this->post();
        $data['timer_status'] = isset($data['timer_status']) ? 1 : 0;
        $data['schedule_status'] = isset($data['schedule_status']) ? 1 : 0;
        $this->response('status', $this->db->where('id', $id)->update('exams', $data));
    }
    function list()
    {
        $this->response('data', $this->exam_model->fetch_all()->result());
    }
    function delete($id)
    {
        $this->db->where('id', $id)->update('exams', ['isDeleted' => 1]);
        $this->response('satuts', true);
    }
    function edit_form()
    {
        $get = $this->exam_model->fetch_all($this->post('id'));
        // $this->set_data($this->post());
        if ($get->num_rows()) {
            $this->set_data($get->row_array());
            $this->response([
                'url' => 'exam/update/' . $this->encode($get->row('exam_id')),
                'form' => $this->parse('exam/edit', [], true),
                'status' => true
            ]);
        } else {
            $this->response('form', alert('Exam Not Found', 'danger'));
        }
    }
    function list_questions()
    {
        // $this->response($this->post());
        $getQuestions = $this->exam_model->list_exam_questions($this->post('exam_id'));
        $this->set_data('questions', $getQuestions->result_array());
        $this->set_data('num_rows', $getQuestions->num_rows() ? true : false);
        $this->response('status', $getQuestions->num_rows() ? true : false);
        $this->response(
            'html',
            $getQuestions->num_rows() ?
            $this->parse('exam/manage-questions-and-answers', [], true)
            : alert('No Question(s) found in this exam.', 'danger mb-10')
            . '<img class="mx-auto h-150px h-lg-200px" src="' . base_url('assets/media/illustrations/sigma-1/13.png') . '">'
        );
    }
    //assets/media/illustrations/unitedpalms-1/18.png
    function add_question_with_answers()
    {
        if ($this->validation('question_add')) {
            // $this->response($this->post());
            $answers = json_decode($this->post('answer_list'));
            $data = [
                'exam_id' => $this->post('exam_id'),
                'question' => $this->post('question')
            ];
            $this->db->insert('exam_questions', $data);
            $ques_id = $this->db->insert_id();
            $saveAns = [];
            $updateAns = [];
            foreach ($answers as $i => $ans) {
                $saveAns[] = [
                    'answer' => $ans->answer,
                    'is_right' => $ans->is_right,
                    'ques_id' => $ques_id
                ];
            }
            if ($ques_id) {
                $this->db->insert_batch('exam_ques_answers', $saveAns);
                $this->response('status', true);
            }
        }
    }
    function manage_question_with_answers()
    {
        $isEdit = isset($_POST['question_id']);
        if (!$isEdit) {
            $this->form_validation->set_rules('question', 'Question', 'required|is_unique[exam_questions.question]');
        }
        if ($this->validation('question_add')) {
            // $this->response($this->post());
            $ansIDs = $this->post("ans_id");
            $answers = json_decode($this->post('answer_list'));
            $data = [
                'exam_id' => $this->post('exam_id'),
                'question' => $this->post('question')
            ];
            if ($isEdit) {
                $ques_id = $this->post("question_id");
                $this->db->where('id', $ques_id)->update('exam_questions', $data);
            } else {
                $this->db->insert('exam_questions', $data);
                $ques_id = $this->db->insert_id();
            }
            $saveAns = [];
            $updateAns = [];
            foreach ($answers as $i => $ans) {
                $tempAns = [
                    'answer' => $ans->answer,
                    'is_right' => $ans->is_right,
                    'ques_id' => $ques_id
                ];

                if (isset($ansIDs[$i]) and $ansIDs[$i]) {
                    $tempAns['id'] = $ansIDs[$i];
                    $updateAns[] = $tempAns;
                } else {
                    $saveAns[] = $tempAns;
                }
            }
            if ($ques_id) {
                if (count($saveAns) > 0) {
                    $this->db->insert_batch('exam_ques_answers', $saveAns);
                }
                if (count($updateAns) > 0) {
                    $this->db->update_batch('exam_ques_answers', $updateAns, 'id');
                }
                $this->response('status', true);
            }
        }
    }
    function delete_question()
    {
        $this->db->where('id', $this->post('ques_id'))->delete('exam_questions');
        $this->db->where($this->post())->delete('exam_ques_answers');
        $this->response('status', true);
    }
    function remove_answer()
    {
        $this->db->where($this->post())->delete('exam_ques_answers');
        $this->response('status', true);
    }
    function submit_request()
    {
        $data = $this->post();
        $data['request_time'] = time();
        $data['center_id'] = $this->center_model->loginId();
        $this->db->insert('exam_requests', $data);
        $this->response('status', true);
    }
    function list_requests()
    {
        // $this->center_model->list_requests();
        $this->response('data', $this->center_model->list_requests()->result_array());
    }


    function list_assign_students()
    {
        $students = $this->student_model->get_switch('assign_exam_student_list', [
            'course_id' => $this->post("course_id"),
            'exam_id' => $this->post('exam_id')
        ]);
        $this->set_data('exam_id', $this->post('exam_id'));
        $this->set_data('students', $students->result_array());
        $this->response('status', ($students->num_rows() > 0));
        $this->response('html', $this->template('list-assign-students'));
    }
    function assign_to_student()
    {
        $data = [
            'center_id' => $this->post("center_id"),
            'student_id' => $this->post("student_id"),
            'exam_id' => $this->post("exam_id")
        ];
        // $this->response($this->post());
        if ($this->post('check_status') == 'true') {
            $data['assign_time'] = time();
            $data['added_by'] = $this->student_model->login_type();
            $this->db->insert('exam_students', $data);
            $this->response("status", true);
        } else {
            $this->db->delete('exam_students', $data);
            $this->response("status", true);
        }
    }
    function student_exams()
    {
        $where = [];
        if ($this->center_model->isCenter())
            $where['center_id'] = $this->center_model->loginId();
        $get = $this->student_model->get_switch('student_exams', $where);
        $data = $get->num_rows() ? $get->result_array() : [];
        $this->response('data', $data);
        $this->response('query', $this->db->last_query());
    }
    function update_student_exam()
    {
        if ($this->validation('update_student_exam')) {
            $this->response('status', $this->db->update('exam_students', [
                'isEdited' => 1,
                'percentage' => $this->post('percentage'),
                'attempt_time' => strtotime($this->post('attempt_time'))
            ], ['id' => $this->post('id')]));
        }
        // $this->response('formData',$this->post());
    }
    function delete_exam()
    {
        $this->response('status', $this->db->delete('exam_students', [
            'id' => $this->post('exam_id')
        ]));
    }
}
