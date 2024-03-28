<?php
class Exam extends MY_Controller{
    function list(){
        $this->ki_theme->set_title('List Exams',true);

        $this->view("list");
    }
    function add(){
        $this->ki_theme->set_title('Add Exam',true);
        $this->view('add');
    }

    //Center Functionality
    function request(){
        $this->ki_theme->set_title('Request for Exam',true);
        $this->view('request');
    }

    function assign_to_center(){
        $this->set_data(
            'js_file', '<script src="'.base_url('assets/custom/exam/assign.js').'"></script>'
        );
        $this->view('assign_to_center');
    }

    function assign_to_student(){
        $this->set_data(
            'js_file', '<script src="'.base_url('assets/custom/exam/assign.js').'"></script>'
        );
        $this->view('assign_to_student');
    }
}