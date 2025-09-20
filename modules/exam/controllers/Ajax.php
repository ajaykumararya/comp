<?php
class Ajax extends Ajax_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('exam_model');
    }
    function course_setting()
    {
        $chk = $this->exam_model->get_setting_course($this->post('course_id'));
        if (!$chk->num_rows()) {
            $this->exam_model->add_setting_course($this->post());
            $this->response('status', true);
        } else
            $this->response('html', 'This Course setting already set..');
    }
    function delete_course_setting()
    {
        $id = base64_decode(base64_decode($this->post('token')));
        $this->exam_model->delete_setting_course($id);
        $this->response('status', true);
    }

    function add_topic()
    {
        $title = trim($this->post('title'));
        $chk = $this->exam_model->check_topic_exists($title);
        if ($chk)
            $this->response('html', 'Topic already exists..');
        else {
            $this->exam_model->add_topic($title);
            $this->response('status', true);
        }
    }
    function update_topic()
    {
        $title = trim($this->post('title'));
        $id = $this->post('id');
        $this->exam_model->update_topic([
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
                        $exists = $this->exam_model->question_exists([
                            'question' => $question['question'],
                            'topic_id' => $topic_id
                        ]);

                        if ($exists > 0) {
                            $html .= "<b class='text-warning'>⚠️ {$question['question']}: Question already exists. Skipped.</b>";
                            continue;
                        }

                        $insert_id = $this->exam_model->add_question([
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
                                $this->exam_model->add_answer_list($answerList);
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
            $exists = $this->exam_model->question_exists([
                'question' => $question,
                'topic_id' => $q['topic_id']
            ]);

            if ($exists > 0) {
                $responses[] = "<b class='text-warning'>⚠️ Row $row_num: Question already exists. Skipped.</b>";
                continue;
            }


            $insert_id = $this->exam_model->add_question([
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
                $this->exam_model->add_answer_list($answerList);
            if ($insert_id) {
                $responses[] = "<b class='text-success'>✅ Row $row_num: Inserted successfully.</b>";
            } else {
                $responses[] = "<b class='text-danger'>❌ Row $row_num: Failed to insert.</b>";
            }
        }
        $this->response('html', implode('<br>', $responses));
        $this->response('status', true);
    }

}