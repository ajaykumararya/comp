<?php
class Event extends Ajax_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function add_user()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[event_users.email]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|is_unique[event_users.mobile]');
        if ($this->validation()) {
            $data = $this->post();
            $data['image'] = $this->file_up('image');
            $data['educational_doc'] = $this->file_up('educational_doc');
            $this->db->insert('event_users', $this->post());
            $this->response([
                'status' => true
            ]);
        }
    }
    function list_users()
    {
        $this->response('data', $this->db->order_by('id', 'DESC')->get('event_users')->result_array());
    }
    function delete_user($user_id)
    {
        if ($user_id) {

            $this->response(
                'status',
                $this->db->where('id', $user_id)->delete('event_users')
            );
            $this->response('html', 'User Deleted successfully.');

        } else
            $this->response('html', 'Action id undefined');
    }
}
