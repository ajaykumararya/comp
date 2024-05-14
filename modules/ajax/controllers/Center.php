<?php
class Center extends Ajax_Controller
{
    function add()
    {
        // $this->response($_FILES);
        $data = $this->post();
        $data['status'] = 1;
        $data['added_by'] = 'admin';
        $data['type'] = 'center';
        $email = $data['email_id'];
        unset($data['email_id']);
        $data['email'] = $email;
        $data['password'] = sha1($data['password']);
        ///upload docs
        $data['adhar'] = $this->file_up('adhar');
        // $data['adhar_back'] = $this->file_up('adhar_back');
        $data['image'] = $this->file_up('image');
        $data['agreement'] = $this->file_up('agreement');
        $data['address_proof'] = $this->file_up('address_proof');
        $data['signature'] = $this->file_up('signature');
        if ($this->form_validation->run('add_center')) {
            $this->response(
                'status',
                $this->db->insert('centers', $data)
            );
        } else
            $this->response('html', $this->errors());
    }
    function update()
    {
        $id = $this->post('id');
        if ($this->validation('update_center')) {
            $this->db->update('centers', $this->post(), ['id' => $id]);
            $this->response('status', true);
        }
    }
    function edit_rollno_prefix()
    {
        if ($this->validation('update_center_roll_no')) {
            $this->db->where('id', $this->post('id'))->update('centers', [
                'rollno_prefix' => $this->post("rollno_prefix")
            ]);
            $this->response("status", true);
        }

    }
    function get_short_profile($id = 0)
    {
        $id = $this->post('id');
        $get = $this->center_model->get_center($id);
        if ($get->num_rows()) {
            $row = $get->row();
            $this->set_data((array) $row);
            $this->set_data('image', base_url(($row->image ? UPLOAD . $row->image : DEFAULT_USER_ICON)));
            $this->response('profile_html', $this->template('custom-profile'));
            // $this->response('genral_html',$this->template('genral-details'));
            // sleep(4);
        }
    }
    function get_course_assign_form()
    {
        $this->get_short_profile();
        $get = $this->center_model->get_assign_courses($this->post("id"));
        $assignedCourses = [];
        if ($get->num_rows()) {
            $assignedCourses = $get->result_array();
        }
        $this->set_data('assignedCourses', $assignedCourses);
        $this->response('assignedCourses', $assignedCourses);
        $this->response('status', true);
        $this->set_data("all_courses", $this->db->where('status', '1')->where('isDeleted', '0')->get('course')->result_array());
        $this->response('html', $this->template('assign-course-center'));
    }
    function assign_course()
    {
        $where = $data = $this->post();
        if (isset($where['course_fee']))
            unset($where['course_fee']);
        if (isset($where['isDeleted']))
            unset($where['isDeleted']);
        $get = $this->db->where($where)->get('center_courses');
        $data = $this->post();
        $data['status'] = 1;
        if ($get->num_rows()) {
            $this->db->update('center_courses', $data, ['id' => $get->row('id')]);
        } else {
            if (!$data['isDeleted'])
                $this->db->insert('center_courses', $data);
        }
        $this->response('status', true);
    }
    function list()
    {
        $this->response('data', $this->db->where('type', 'center')->where('isDeleted', 0)->get('centers')->result());
    }
    function deleted_list()
    {
        $this->response('data', $this->db->where('type', 'center')->where('isDeleted', 1)->get('centers')->result());
    }
    function pending_list()
    {
        $this->response('data', $this->db->where('type', 'center')->where('isPending', 1)->where('isDeleted', 0)->get('centers')->result());
    }
    function edit_form()
    {
        $get = $this->db->where('id', $this->post('id'))->get('centers');
        if ($get->num_rows()) {
            $this->response('url', 'center/update');
            $this->response('status', true);
            $this->response('form', $this->parse('center/edit-form', $get->row_array(), true));
        }
    }
    function update_pending_status()
    {
        $this->response(
            'status',
            $this->db->where('id', $this->post('id'))->update('centers', ['isPending' => 0])
        );
    }
    function update_password()
    {
        if ($this->validation('change_password')) {
            $this->db->update('centers', ['password' => sha1($this->post('password'))], [
                'id' => $this->post('center_id')
            ]);
            $this->response('status', true);
        }
    }

    function list_certificates()
    {
        $this->response(
            'data',
            $this->center_model->verified_centers()->result_array()
        );
    }
    function update_dates()
    {
        if ($this->validation('check_center_dates')) {
            $this->response(
                'status',
                $this->db->where('id', $this->post('id'))->update('centers', [
                    'valid_upto' => $this->post('valid_upto'),
                    'certificate_issue_date' => $this->post('certificate_issue_date')
                ])
            );
        }
    }

    function set_centre_wise_fees()
    {
        if (CHECK_PERMISSION('CENTRE_WISE_WALLET_SYSTEM')) {
            $fields = $this->db->list_fields('center_fees');
            // unset($fields['id'],$fields['center_id']);
            $data = [];
            foreach ($fields as $field) {
                if (!in_array($field, ['id', 'center_id']))
                    $data[$field] = (isset($_POST[$field])) ? $_POST[$field . "_amount"] : null;
            }
            $center_id = $this->post('center_id');
            $get = $this->db->get_where('center_fees', ['center_id' => $center_id]);
            if ($get->num_rows()) {
                $this->db->where('id', $get->row('id'))->update('center_fees', $data);
            } else
                $this->db->insert('center_fees', $data + ['center_id' => $center_id]);
            $this->response('status', true);
        } else
            $this->response('html', 'Permission Denied.');
    }
}
?>