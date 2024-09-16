<?php
class Payment_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function create_transcation($data)
    {
        $this->db->insert('transcations', $data);
        return $this->db->insert_id();
    }
    function update_transcation($data,$where){
        $this->db->where($where);
        return $this->db->update('transcations',$data);
    }
}