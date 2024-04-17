<?php
class Center extends MY_Controller
{
    function add()
    {
        $this->view('add');
    }
    function list()
    {
        $this->ki_theme->set_title('List Center(s)', true);
        $this->view('list');
    }
    function deleted_list()
    {
        $this->ki_theme->set_title('List Deleted Center(s)', true);
        $this->view('delete-list');
    }
    function pending_list()
    {
        $this->ki_theme->set_title('List Pedning Center(s)', true);
        $this->view('pending-list');
    }
    function generate_certificate()
    {
        $this->view('generate-certificate');
    }
    function get_certificate()
    {
        $this->view('get-certificate');
    }
    function assign_courses()
    {
        $this->view('assign-courses');
    }
    function profile()
    {
        if ($this->center_model->isAdmin())
            $this->access_method();
        $center_id = $this->uri->segment(3, 0);
        $center_id = $center_id ? base64_decode($center_id) : $center_id;
        // echo $center_id;
        $tab = $this->uri->segment(4, 'overview');
        $tabs = [
            'overview' => [
                'title' => 'Center Profile Overview',
                'icon' => array('eye', 3),
                'url' => 'overview'
            ],
            'documents' => [
                'title' => 'Documents',
                'icon' => array('file',5),
                'url' => 'documents'
            ],
            'change-password' => [
                'title' => 'Change Password of Center',
                'icon' => array('key', 4),
                'url' => 'change-password'
            ]
        ];
        if (isset ($tabs[$tab])) {
            // $this->ki_theme->set_title($tabs[$tab]['title']);
            $this->ki_theme->set_breadcrumb($tabs[$tab]);
            $center = $this->center_model->get_center($center_id);
            $this->set_data('ttl_student', $this->db->where('center_id', $center_id)->get('students')->num_rows());
            $this->set_data('ttl_course', $this->db->where('center_id', $center_id)->get('center_courses')->num_rows());
            $this->set_data($center->row_array());
            $this->set_data('center_details', $center->row_array());
            $center_id = base64_encode($center_id);
            $this->view('profile', ['tabs' => $tabs, 'tab' => $tab, 'current_link' => base_url('center/profile/' . $center_id), 'center_id' => $center_id]);
        } else
            show_404();
    }
}
