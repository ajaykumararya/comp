<?php
class Api_Controller extends Ajax_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('common/curl');
    }
    
}