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
    function users()
    {
        $this->view('user-list');
    }
    function my_account()
    {
        $this->account_view();
    }
    function my_projects()
    {
        $this->account_view('projects', [], 'My Project(s)');
    }
    function change_password()
    {
        $this->account_view('change-password', [], 'Change Password');
    }
    function logout()
    {
        $this->session->unset_userdata('ebook_login');
        redirect(base_url());
    }

    private function account_view($page = 'index', $data = [], $pageName = 'My Account')
    {
        if ($this->session->has_userdata('ebook_login')) {
            $data['user'] = $this->db->where('id', $this->session->userdata('ebook_user'))->get('ebook_users')->row_array();
            $this->load->module('site', ['page_name' => $pageName]);
            $this->site->content('ebook/index', [
                'content' => $this->parser->parse('user/' . $page, $data, true)
            ]);
        } else
            redirect(base_url());

    }
}