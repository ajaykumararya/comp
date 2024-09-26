<?php
class Coordinate extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function create()
    {
        $this->view("create");
    }
    function list()
    {
        $this->view("list");
    }
    function assign_course()
    {
        $this->view("assign_course");
    }
    function list_commission()
    {
        $id = $this->uri->segment(3,0);
        if($this->center_model->isCoordinator() && !$id)
            $id = $this->center_model->loginId();
        $this->set_data('input',form_hidden('co_id',$id));
        $this->view("list_commission", ['isValid' => true]);
    }
}
?>