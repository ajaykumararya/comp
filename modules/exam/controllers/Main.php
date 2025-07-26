<?php
class Main extends MY_Controller{
    public function __construct(){
        parent::__construct();
        // $this->load->model('exam_model');
    }
    function index(){
        $this->exam_model->check();
    }
}
?>