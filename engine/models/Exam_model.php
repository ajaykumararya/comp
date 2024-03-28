<?php
class Exam_model extends MY_Model
{
    function fetch_all($id = 0)
    {
        $this->db->select('*,e.id as exam_id,e.duration as exam_duration,e.status as exam_status')
            ->from('exams as e')
            ->join('course as c', 'c.isDeleted = 0 and c.id = e.course_id')
            ->where('e.isDeleted',0);
            if($id){
                $this->db->where('e.id',$id);
            }
        return $this->db->get();
    }
    function list_exam_questions($exam_id){
        return $this->db->where('exam_id',$exam_id)->get('exam_questions');
    }
    function list_question_answers($ques_id){
        return $this->db->select('*,eqa.id as answer_id')
                        ->from('exam_ques_answers as eqa')
                        ->join('exam_questions as eq','eq.id = eqa.ques_id')
                        ->where('eq.id',$ques_id)
                        ->get();
    }
    

}

?>