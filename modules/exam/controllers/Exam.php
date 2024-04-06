<?php
class Exam extends MY_Controller
{
    function list()
    {
        $this->ki_theme->set_title('List Exams', true);

        $this->view("list");
    }
    function add()
    {
        $this->ki_theme->set_title('Add Exam', true);
        $this->view('add');
    }

    //Center Functionality
    function request()
    {
        $this->ki_theme->set_title('Request for Exam', true);
        $this->view('request');
    }

    function assign_to_center()
    {
        $this->set_data(
            'js_file',
            '<script src="' . base_url('assets/custom/exam/assign.js') . '"></script>'
        );
        $this->view('assign_to_center');
    }

    function assign_to_student()
    {
        $this->set_data(
            'js_file',
            '<script src="' . base_url('assets/custom/exam/assign.js') . '"></script>'
        );
        $this->view('assign_to_student');
    }

    function online_exam_result()
    {
        $id = $this->uri->segment(3, 0);
        // $this->ki_theme->set_title("Online Result",true);
        $this->load->module('site');
        $this->site->set_data('page_name','Online Exam Result');
        if ($id) {
            $id  = base64_decode($id);
            $record = $this->exam_model->student_exam([
                'id' => $id
            ]);


            if( $record->num_rows() ){
                $row = $record->row_array();
                // pre($row,true);
                $student = $this->student_model->get_switch('student_id',['id' => $row['student_id']]);
                if($student->num_rows()){
                    $this->set_data($student->row_array());
                }
                $questionsData = $row['data'] ? json_decode($row['data'],true) : [];
                $this->set_data('attempt_questions',sizeof($questionsData));
                $this->set_data('exam_questions',$questionsData);
                unset($row['id'],$row['timestamp'],$row['data']);
                $this->set_data($row);
                $this->set_data('page_name', 'Result');
                $this->site->page_view($this->parse('online-exam-result', '', true));
            }
            else{
                $this->site->page_view('
                    <div class="container p-5" style="min-height:420px">
                        <div class="row">
                            <div class="col-md-12">
                                '.alert('Result Not Found.','danger').'
                                '.$this->ki_theme
                                    ->set_class('btn btn-warning')
                                    // ->with_icon('home',4)
                                    ->add_action('<span>Back To Home</span>').'
                            </div>
                        </div>
                    </div>
                
                ');
            }
        } else {
            $this->site->error_404();
        }
    }
}