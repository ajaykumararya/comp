<?php
class Exam_model2 extends MY_Model
{
    function last_query()
    {
        return $this->examdb->last_query();
    }
    function get_sub_papers($where)
    {
        $this->examdb->order_by('start_time', 'ASC');
        return $this->examdb->where($where)->get('paper_subjects');
    }
    function list_exams($where)
    {
        return $this->examdb->where($where)->get('papers');
    }
    function update_exam_setting_type($setting_type, $center_id)
    {
        return $this->db->update('centers', [
            'exam_2_type' => $setting_type
        ], [
            'id' => $center_id
        ]);
    }
    function check()
    {
        $num = $this->examdb->get('courses');
        echo $this->db->get('course')->num_rows() . ',==';
        echo $num->num_rows();
    }
    function add_setting_course($data)
    {
        return $this->examdb->insert('courses', $data);
    }
    function get_setting_course($course_id)
    {
        return $this->examdb->get_where('courses', array('course_id' => $course_id));
    }
    function get_course($id = 0)
    {
        if ($id)
            $this->db->where('id', $id);
        return $this->db->where([
            'status' => 1,
            'isDeleted' => 0
        ])->get('course');
    }
    function list_setting_courses()
    {
        $list = $this->examdb->get('courses');
        $data = [];
        if ($list->num_rows()) {
            foreach ($list->result() as $row) {
                $course = $this->db->where('id', $row->course_id)->get('course');
                if ($course->num_rows()) {
                    $courseRow = $course->row();
                    $ttlPapers = $this->get_papers_via_course($row->course_id)->num_rows();
                    $data[$row->course_id] = [
                        'button' => $ttlPapers ?
                            "<b class='text-danger'>{$ttlPapers} Paper(s) Exists..</b>" : '<button class="btn btn-danger delete-exam-course-setting btn-xs btn-sm" data-token="' . base64_encode(base64_encode($row->id)) . '"><i class="fa fa-trash"></i></button>',
                        'id' => $row->id,
                        'course_name' => $courseRow->course_name,
                        'type_text' => $row->type == 'duration_wise' ? label('Duration Wise Paper', 'info') : label('Duration with Subject Wise Paper', 'primary'),
                        'type' => $row->type,
                        'course_id' => $row->course_id,
                        'duration' => $courseRow->duration,
                        'duration_type' => $courseRow->duration_type,
                        'course_duration' => label(humnize_duration($courseRow->duration, $courseRow->duration_type))
                    ];
                }
            }
        }
        return $data;
    }
    function delete_setting_course($id)
    {
        return $this->examdb->where('id', $id)->delete('courses');
    }

    function get_papers_via_course($course_id)
    {
        return $this->examdb->where('course_id', $course_id)->get('papers');
    }
    function check_topic_exists($title)
    {
        return $this->examdb->where('title', $title)->get('topics')->num_rows();
    }
    function add_topic($title)
    {
        $data = ['title' => $title];
        // if (CHECK_PERMISSION(''))
        return $this->examdb->insert('topics', ['title' => $title]);
    }
    function update_topic($data, $id)
    {
        return $this->examdb->update('topics', $data, ['id' => $id]);
    }
    function list_topics()
    {
        return $this->examdb->get('topics');
    }
    function json_topic()
    {
        $list = $this->list_topics();
        $data = [];
        foreach ($list->result() as $row) {
            $data[] = [
                'id' => $row->id,
                'title' => $row->title
            ];
        }
        return json_encode($data);

    }
    function add_question($data)
    {
        $this->examdb->insert('questions_bank', $data);
        return $this->examdb->insert_id();
    }
    function question_exists($condition)
    {
        return $this->examdb->where($condition)->get('questions_bank')->num_rows();
    }
    function add_answer_list($data)
    {
        return $this->examdb->insert_batch('ques_answers', $data);
    }
    function allQuestions()
    {
        $this->examdb->select('q.id as question_id,q.question as question_text,t.id as topic_id,qa.id as option_id,qa.choice as option_text,qa.isRight as is_correct');
        $this->examdb->from('questions_bank as q');
        $this->examdb->join('ques_answers as qa', 'q.id = qa.ques_id');
        $this->examdb->join('topics as t', 'q.topic_id = t.id');
        return $this->examdb->get();
    }

    // function my_question_bank()
    // {
    //     $result = $this->allQuestions()->result_array();
    //     $grouped = [];
    //     $ques = [];
    //     foreach ($result as $row) {
    //         $qid = $row['question_id'];
    //         if (!isset($grouped[$qid])) {
    //             $grouped[$qid] = [
    //                 'question' => $row['question_text'],
    //                 'topic' => $row['topic_id'],
    //                 'options' => []
    //             ];
    //             $ques[$row['topic_id']][] = $grouped;
    //         }
    //         $grouped[$qid]['options'][] = [
    //             'option_id' => $row['option_id'],
    //             'text' => $row['option_text'],
    //             'is_correct' => $row['is_correct']
    //         ];
    //     }
    //     return $ques;
    // }
    function my_question_bank()
    {
        $result = $this->allQuestions()->result_array();
        $grouped = [];
        $ques = [];

        foreach ($result as $row) {
            $qid = $row['question_id'];

            // Agar question pehli baar mila
            if (!isset($grouped[$qid])) {
                $grouped[$qid] = [
                    'question_id' => $qid,
                    'question' => $row['question_text'],
                    'topic' => $row['topic_id'],
                    'options' => []
                ];
            }

            // Add option to that question
            $grouped[$qid]['options'][] = [
                'option_id' => $row['option_id'],
                'text' => $row['option_text'],
                'is_correct' => $row['is_correct']
            ];
        }

        // Ab grouped ko topic-wise arrange karo
        foreach ($grouped as $q) {
            $topic_id = $q['topic'];
            $ques[$topic_id][] = $q;
        }

        return $ques;
    }

    function paper_questions($paper_id)
    {
        return $paper_id;
    }
    function save_exam_subjects($allSubjectData)
    {
        return $this->examdb->insert_batch('paper_subjects', $allSubjectData);
    }
    function udpate_exam_subjects($allSubjectData)
    {
        return $this->examdb->update_batch('paper_subjects', $allSubjectData, 'id');
    }
    function get_exam_subjects($condition)
    {
        return $this->examdb->where($condition)->get('paper_subjects');
    }
    function save_exam($data)
    {
        $this->examdb->insert('papers', $data);
        return $this->examdb->insert_id();
    }
    function update_exam($data, $paper_id)
    {
        return $this->examdb->update('papers', $data, ['id' => $paper_id]);
    }
    function get_exam_papers($condition)
    {
        $this->db->order_by('id', 'DESC');
        return $this->examdb->where($condition)->get('papers');
    }
    function update_exam_subjects($data)
    {
        return $this->examdb->update_batch('paper_subjects', $data, 'id');
    }
    function get_subject_or_topic($paper_id = 0, $subject_id = 0)
    {
        if ($subject_id)
            $this->examdb->where(['subject_id' => $subject_id]);
        return $this->examdb->where([
            'paper_id' => $paper_id,
            // 'subject_id' => $subject_id
        ])->get('paper_subjects');
    }
    // limit ke base par questions fetch karne ke liye wo. bhi suffle me
    function get_questions_via_topic_limit($topic_id = 0, $limit = 0)
    {
        if ($limit)
            $this->examdb->limit($limit);
        $get = $this->examdb->where([
            'topic_id' => $topic_id
        ])->order_by('RAND()')->get('questions_bank');
        $questions = [];
        if ($get->num_rows()) {
            foreach ($get->result() as $row) {
                $question = [
                    'id' => $row->id,
                    'q' => $row->question,
                    'options' => [],
                    'answer' => 0
                ];
                $gett = $this->examdb->select('id,choice,isRight')->where(['ques_id' => $row->id])->order_by('RAND()')->get('ques_answers');
                // $question['dd'] = $this->db->last_query();
                if ($gett->num_rows()) {
                    $isRight = 0;
                    foreach ($gett->result_array() as $row1) {
                        if ($isRight == 0) {
                            if ($row1['isRight'] == 1) {
                                $isRight = $row1['id'];
                            }
                        }
                        unset($row1['isRight']);
                        $question['options'][] = $row1;
                    }
                    $question['answer'] = $isRight;
                }
                $questions[] = $question;
            }
        }
        return $questions;
    }




}