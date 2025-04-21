<?php
class Ebook extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function category()
    {
        $this->view('category');
    }
    function project()
    {
        $this->ki_theme->breadcrumb_action_html(
            $this->ki_theme->drawer_button('ebook', 'project_system', 'Project System')
        );
        $this->view('project');
    }
    function my_account()
    {
        // echo 'ddd';
        $this->load->module('site', ['page_name' => 'MY-Account']);
        $this->site->content('ebook/index');
    }
}