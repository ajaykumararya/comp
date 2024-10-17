<?php
class Academic extends Ajax_Controller
{
    function add_batch()
    {
        if ($this->validation()) {
            $this->response(
                'status',
                $this->db->insert('batch', $this->post())
            );
        }
    }
    function edit_batch()
    {
        $this->db->where('id', $this->post('id'))->update('batch', [
            'batch_name' => $this->post('batch_name'),
        ]);
        $this->response('status', true);
    }
    function edit_session()
    {
        $this->db->where('id', $this->post('id'))->update('session', [
            'title' => $this->post('title'),
        ]);
        $this->response('status', true);
    }
    function update_session_status()
    {
        $this->db->where('id', $this->post('id'))->update('session', [
            'status' => $this->post('status'),
        ]);
        $this->response('status', true);
    }
    function edit_occupation()
    {
        $this->db->where('id', $this->post('id'))->update('occupation', [
            'title' => $this->post('title'),
        ]);
        $this->response('status', true);
    }
    function list_batch()
    {
        $list = $this->db->get('batch');
        $data = [];
        if ($list->num_rows())
            $data = $list->result();
        // if()
        $this->response('data', $data);
    }
    function delete_batch($batch_id = 0)
    {
        // $this->response($_GET);
        if ($batch_id) {
            $this->response(
                'status',
                $this->db->where('id', $batch_id)->delete('batch')
            );
            $this->response('html', 'Data Delete successfully.');
        } else
            $this->response('html', 'Action id undefined');
        // $this->response('html',$batch_id);
    }


    //session part
    function add_session()
    {
        if ($this->validation()) {
            $this->response(
                'status',
                $this->db->insert('session', $this->post())
            );
        }
    }
    function list_session()
    {
        $list = $this->db->get('session');
        $data = [];
        if ($list->num_rows())
            $data = $list->result();
        $this->response('data', $data);
    }
    function delete_session($session_id = 0)
    {
        // $this->response($_GET);
        if ($session_id) {
            $this->response(
                'status',
                $this->db->where('id', $session_id)->delete('session')
            );
            $this->response('html', 'Data Delete successfully.');
        } else
            $this->response('html', 'Action id undefined');
        // $this->response('html',$batch_id);
    }

    //Occupation part
    function add_occupation()
    {
        if ($this->validation()) {
            $this->response(
                'status',
                $this->db->insert('occupation', $this->post())
            );
        }
    }
    function list_occupation()
    {
        $list = $this->db->get('occupation');
        $data = [];
        if ($list->num_rows())
            $data = $list->result();
        $this->response('data', $data);
    }
    function delete_occupation($occupation_id = 0)
    {
        // $this->response($_GET);
        if ($occupation_id) {
            $this->response(
                'status',
                $this->db->where('id', $occupation_id)->delete('occupation')
            );
            $this->response('html', 'Data Delete successfully.');
        } else
            $this->response('html', 'Action id undefined');
        // $this->response('html',$batch_id);
    }
}
?>