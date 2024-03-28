<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends MY_Controller
{
    function index()
    {
        $this->view('index');
    }
    function change_password(){
        $this->view('change-password',['isValid' => true]);
    }
    function sign_out(){
        // $this->view('change-password',['isValid' => true]);
        $this->session->sess_destroy();
        redirect('admin');
    }
    
}
