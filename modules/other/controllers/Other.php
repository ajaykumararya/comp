<?php
class Other extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function non_objection_certificate()
    {
        $this->view(__FUNCTION__);
    }
    function migration_certificate()
    {
        $this->view(__FUNCTION__);
    }
    function provisional_certificate()
    {
        $this->view(__FUNCTION__);
    }
}