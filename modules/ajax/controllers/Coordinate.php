<?php
class Coordinate extends Ajax_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function create()
    {
        if ($this->validation('add_co_ordinator')) {
            $data = $this->post();
            $data['status'] = 1;
            $data['added_by'] = 'admin';
            $data['type'] = 'co_ordinator';
            $data['password'] = sha1($data['password']);

            $data['image'] = $this->file_up('image');
            $this->response(
                'status',
                $this->db->insert('centers', $data)
            );
        } else
            $this->response('html', $this->errors());
    }
    function list()
    {
        $this->response('data', $this->db->where('type', 'co_ordinator')->where('isPending', 0)->where('isDeleted', 0)->get('centers')->result());
    }

    function get_course_category_assign_form()
    {
        $get = $this->center_model->get_assign_course_cats($this->post("id"), 'co_ordinate');
        $assignedCourses = [];
        if ($get->num_rows()) {
            $assignedCourses = $get->result_array();
        }
        $this->set_data('id', $this->post('id'));
        $this->set_data('assignedCategory', $assignedCourses);
        $this->response('assignedCategory', $assignedCourses);
        $this->response('status', true);
        $this->set_data("all_category", $this->db->get('course_category')->result_array());
        if ($this->post('id'))
            $this->response('html', $this->template('assign-course-category-co-ordinate'));
        else
            $this->response('html', ' ');
    }
    function assign_course_category()
    {
        $data = $this->post();
        $where = [
            'user_type' => $data['user_type'],
            'user_id' => $data['user_id'],
            'category_id' => $data['category_id']
        ];
        $get = $this->db->where($where)->get('center_course_category');
        if ($get->num_rows()) {
            $this->db->where(['id' => $get->row('id')])->delete('center_course_category');
        } else {
            $this->db->insert('center_course_category', $data);
        }
        $this->response('status', true);
    }
}
?>