<?php
class Event extends Admin_Controller{
    function __construct(){
        parent :: __construct();
    }
    function users(){
        $this->view('users');
    }
    function setting(){
        $this->view('setting');
    }
}

