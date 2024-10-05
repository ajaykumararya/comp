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
        $this->db->select('c.*,SUM( CASE WHEN co.status = 1 THEN co.commission ELSE 0 END) as ttlCommission,SUM( CASE WHEN co.status = 0 THEN co.commission ELSE 0 END) as ttlPendingCommission')
        // $this->db->select('c.*')
        //     ->select('IFNULL(SUM(CASE WHEN co.status = 1 THEN co.commission ELSE 0 END), 0) as ttlCommission, 
        //                 IFNULL(SUM(CASE WHEN co.status = 0 THEN co.commission ELSE 0 END), 0) as ttlPendingCommission')
            ->from('centers as c')
            ->join('commissions as co', 'co.user_id = c.id', 'left')
            ->where('c.type', 'co_ordinator')
            ->where('c.isPending', '0')
            ->where('c.isDeleted', '0')
            ->group_by('c.id');
        $this->response('data', $this->db->get()->result());
    }

    function get_course_category_assign_form()
    {
        $loginId = $this->center_model->loginId();
        $get = $this->center_model->get_assign_course_cats($this->post("id"), $this->post('type'));
        $assignedCourses = [];
        if ($get->num_rows()) {
            $assignedCourses = $get->result_array();
        }
        $this->set_data($this->post());
        // $this->response('sql', $this->db->last_query());
        $this->set_data('assignedCategory', $assignedCourses);
        $this->response('assignedCategory', $assignedCourses);
        $this->response('status', true);
        $allCats = [];
        if ($this->center_model->isCoordinator())
            $allCats = $this->center_model->get_assign_course_cats($loginId, 'co_ordinator')->result_array();
        if ($this->center_model->isAdmin())
            $allCats = $this->db->get('course_category')->result_array();
        $this->set_data("all_category", $allCats);
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
    function list_commission()
    {
        $id = $this->post('id');
        $this->db->select('co.*,ce.institute_name,s.name as student_name')
            ->from('commissions as co')
            ->join('centers as ce', 'ce.id = co.center_id')
            ->join('students as s', 's.id = co.type_id')
            ->where('co.user_type', 'co_ordinator')
            ->where('co.user_id', $id);

        $this->response('data', $this->db->get()->result_array());
    }
    function update_commission()
    {
        $this->db->where('id', $this->post('id'))->update('commissions', ['status' => 1]);
        $this->response('status', true);
    }
}
?>