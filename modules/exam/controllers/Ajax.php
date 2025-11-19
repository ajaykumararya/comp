<?php
class Ajax extends Ajax_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('exam_model2');
    }
    // function get_paper_list_by_filters(){
    //     $center_id = $this->post('center_id');
    //     $course_id = $this->post('course_id');
    //     $session_id = $this->post('session_id');
    //     $duration = $this->post('duration');
    //     $duration_type = $this->post('duration_type');

    //     $papers = $this->exam_model2->get_paper_list_by_filters($center_id, $course_id, $session_id, $duration, $duration_type);
    //     $html = '';
    //     if($papers->num_rows()){
    //         foreach($papers->result() as $paper){
    //             $html .= "<div class='card mb-3'>
    //                         <div class='card-body'>
    //                             <h5 class='card-title'>Paper ID: {$paper->id}</h5>
    //                             <p class='card-text'>Paper Name: {$paper->course_id}</p>
    //                             <p class='card-text'>Course ID: {$paper->course_id}</p>
    //                             <p class='card-text'>Session ID: {$paper->session_id}</p>
    //                         </div>
    //                     </div>";
    //         }
    //     } else {
    //         $html = '<p>No papers found for the selected filters.</p>';
    //     }
    //     $this->response('html', $html);
    //     $this->response('status', true);
    // }
    function update_exam_setting()
    {
        try {
            $setting_type = $this->post('setting_type');
            $default = $this->post('default');
            if ($default)
                throw new Exception('Cannot change setting.');
            $tokenData = $this->token->decode($this->post('token'));
            if (!isset($tokenData['center_id']))
                throw new Exception('Invalid token data.');
            if (!in_array($setting_type, ['2', '1']))
                throw new Exception('Invalid setting type.');
            $center_id = $tokenData['center_id'];

            if ($setting_type) {
                $this->exam_model2->update_exam_setting_type($setting_type, $center_id);
                $this->response('status', true);
            }
        } catch (Exception $e) {
            $this->response('message', 'Invalid token data.');
        }
    }
    function course_setting()
    {
        $chk = $this->exam_model2->get_setting_course($this->post('course_id'));
        if (!$chk->num_rows()) {
            $this->exam_model->add_setting_course($this->post());
            $this->response('status', true);
        } else
            $this->response('error', 'This Course setting already set..');
    }
    function delete_course_setting()
    {
        $id = base64_decode(base64_decode($this->post('token')));
        $this->exam_model2->delete_setting_course($id);
        $this->response('status', true);
    }

    function add_topic()
    {
        $title = trim($this->post('title'));
        $chk = $this->exam_model2->check_topic_exists($title);
        if ($chk)
            $this->response('error', 'Topic already exists..');
        else {
            $this->exam_model2->add_topic($title);
            $this->response('status', true);
        }
    }
    function update_topic_status()
    {
        $topic_id = $this->post('topic_id');
        $status = $this->post('status');
        $this->exam_model2->update_topic([
            'status' => $status
        ], $topic_id);
        $this->response('status', true);

    }
    function update_topic()
    {
        $title = trim($this->post('title'));
        $id = $this->post('id');
        $this->exam_model2->update_topic([
            'title' => $title
        ], $id);
        $this->response('status', true);
    }
    function add_question()
    {
        $html = '';
        // $this->response($_POST);
        if (isset($_POST['topics'])) {
            foreach ($_POST['topics'] as $topic) {
                $topic_id = $topic['topicId'];
                if ($topic_id && isset($topic['questions'])) {
                    foreach ($topic['questions'] as $question) {
                        $exists = $this->exam_model2->question_exists([
                            'question' => $question['question'],
                            'topic_id' => $topic_id
                        ]);

                        if ($exists > 0) {
                            $html .= "<b class='text-warning'>⚠️ {$question['question']}: Question already exists. Skipped.</b>";
                            continue;
                        }

                        $insert_id = $this->exam_model2->add_question([
                            'question' => $question['question'],
                            'topic_id' => $topic_id
                        ]);
                        // $insert_id = rand(0,100);
                        $answerList = [];
                        if (isset($question['options'])) {
                            foreach ($question['options'] as $index => $option) {
                                $answerList[] = [
                                    'ques_id' => $insert_id,
                                    'choice' => $option,
                                    'isRight' => $index == $question['correctAnswer'] ? 1 : 0
                                ];
                            }
                            if (count($answerList)) {
                                $this->exam_model2->add_answer_list($answerList);
                            }

                            if ($insert_id) {
                                $html .= "<b class='text-success'>✅{$question['question']}: Inserted successfully.</b>";
                            } else {
                                $html .= "<b class='text-danger'>❌{$question['question']}: Failed to insert.</b>";
                            }
                        }
                    }
                }
            }
        }
        $this->response('html', $html);
        $this->response('status', true);
    }
    public function question_import()
    {
        // $json = file_get_contents('php://input');
        $questions = $this->input->post('data');

        $responses = [];

        foreach ($questions as $index => $q) {
            $row_num = $index + 2;

            if (
                empty($q['question']) || empty($q['correct_ans']) ||
                !isset($q['option_a'], $q['option_b'], $q['option_c'], $q['option_d'], $q['topic_id'])
            ) {
                $responses[] = "<b class='text-danger'>❌ Row $row_num: Missing required fields.</b>";
                continue;
            }
            $options = ['option_a', 'option_b', 'option_c', 'option_d'];
            if (!in_array(strtolower($q['correct_ans']), $options)) {
                $responses[] = "<b class='text-danger'>❌ Row $row_num: Invalid correct_ans.</b>";
                continue;
            }
            $question = trim($q['question']);
            $exists = $this->exam_model2->question_exists([
                'question' => $question,
                'topic_id' => $q['topic_id']
            ]);

            if ($exists > 0) {
                $responses[] = "<b class='text-warning'>⚠️ Row $row_num: Question already exists. Skipped.</b>";
                continue;
            }


            $insert_id = $this->exam_model2->add_question([
                'question' => $question,
                'topic_id' => $q['topic_id']
            ]);
            $answerList = [];
            foreach ($options as $option) {
                $answerList[] = [
                    'ques_id' => $insert_id,
                    'choice' => $q[$option],
                    'isRight' => $option == $q['correct_ans'] ? 1 : 0
                ];
            }
            if (count($answerList))
                $this->exam_model2->add_answer_list($answerList);
            if ($insert_id) {
                $responses[] = "<b class='text-success'>✅ Row $row_num: Inserted successfully.</b>";
            } else {
                $responses[] = "<b class='text-danger'>❌ Row $row_num: Failed to insert.</b>";
            }
        }
        $this->response('html', implode('<br>', $responses));
        $this->response('status', true);
    }

    function save_exam()
    {
        $data = $this->post();
        try {
            $paper_type = $this->post('exam_type');
            $insertData = [
                'center_id' => $data['center_id'],
                'course_id' => $data['course_id'],
                'session_id' => $data['session_id'],
                'duration' => $data['current_duration'],
                'duration_type' => $data['duration_type'],
                'paper_type' => $paper_type,
                'login_type' => $this->center_model->login_type(),
                'title' => $data['paper_title'],
                'instructions' => $_POST['instructions']
            ];
            if ($paper_type == '1') {
                $insertData['start_time'] = $data['start_time'];
                $insertData['end_time'] = $data['end_time'];
            }
            if (!isset($data['subjects'])) {
                throw new Exception('No subjects selected.');
            }
            if (isset($_POST['paper_id'])) {
                $paper_id = $this->post('paper_id');
                $this->exam_model2->update_exam($insertData, $paper_id);
            } else
                $paper_id = $this->exam_model2->save_exam($insertData);
            if (!$paper_id)
                throw new Exception('Error saving exam.');
            $allSubjectData = [];
            $allUpdateData = [];
            foreach ($data['subjects'] as $subject) {
                $subjectData = [
                    'paper_id' => $paper_id,
                    'subject_id' => $subject['subject_id'],
                    'topic_id' => $subject['topic_id'],
                    'question' => $subject['questions'],
                ];
                if ($paper_type == '2') {
                    $subjectData['start_time'] = $subject['start_datetime'];
                    $subjectData['end_time'] = $subject['end_datetime'];
                }
                if (isset($_POST['paper_id']) && isset($subject['paper_subject_id'])) {
                    $subjectData['id'] = $subject['paper_subject_id'];
                    $allUpdateData[] = $subjectData;
                } else
                    $allSubjectData[] = $subjectData;
            }
            if (count($allUpdateData))
                $this->exam_model2->update_exam_subjects($allUpdateData);
            else
                $this->exam_model2->save_exam_subjects($allSubjectData);
            $this->response('status', true);
        } catch (Exception $e) {
            $this->response('message', 'Error saving exam.');
        }
        /*
        $this->response('data', $data);
        */
    }
    

}