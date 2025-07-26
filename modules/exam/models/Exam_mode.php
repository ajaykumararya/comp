<?php
class Exam_model extends MY_Model {
    public $db;
    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('exam',true);
    }
    function check(){
        $num = $this->db->get('courses');
        echo $num->num_rows();
    }
}