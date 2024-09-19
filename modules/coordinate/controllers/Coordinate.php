<?php
class Coordinate extends Admin_Controller{
    function __construct(){
        parent::__construct();
    }
    function create(){
        $this->view("create");
    }
    function list(){
        $this->view("list");
    }
    function assign_course(){
        $this->view("assign_course");
    }
}
?>