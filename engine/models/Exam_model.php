<?php
class Exam_model extends MY_Model
{
    function fetch_all($id = 0)
    {
        $this->db->select('*,e.id as exam_id,e.duration as exam_duration,e.status as exam_status')
            ->from('exams as e')
            ->join('course as c', 'c.isDeleted = 0 and c.id = e.course_id')
            ->where('e.isDeleted', 0);
        if ($id) {
            $this->db->where('e.id', $id);
        }
        return $this->db->get();
    }
    function list_exam_questions($exam_id)
    {
        return $this->db->where('exam_id', $exam_id)->get('exam_questions');
    }
    function fetch_question($id){
        return $this->db->where('id',$id)->get('exam_questions');
    }
    function list_question_answers($ques_id)
    {
        return $this->db->select('*,eqa.id as answer_id')
            ->from('exam_ques_answers as eqa')
            ->join('exam_questions as eq', 'eq.id = eqa.ques_id')
            ->where('eq.id', $ques_id)
            ->get();
    }

    function student_exam($where)
    {
        $this->db->select('*')
            ->from('exam_students as es')
            ->join('exams as e', 'e.id = es.exam_id');
        $this->myWhere('es', $where);
        return $this->db->get();
    }
    function get_student_exam($where){
        return $this->db->where($where)->get('exam_students');
    }
    public function get_shuffled_questions($exam_id, $limit = 0)
    {

        $seed = rand();

        // $this->db->query('SET @seed := ' . $seed);
        // $query = $this->db->query("SELECT * FROM ".DB_DBPREFIX."exam_questions WHERE exam_id = '$exam_id' ORDER BY RAND(@seed) " . ($limit ? "LIMIT $limit" : ''));
        $this->db->where('exam_id', $exam_id);
        if ($limit)
            $this->db->limit($limit);

        $query = $this->db->get('exam_questions');
        if ($query->num_rows() > 0) {
            $questions = $query->result_array();
            shuffle($questions);
            return $questions;
        } else {
            return array();
        }
    }
}