<?php
class Center_model extends MY_Model
{
    function get_assign_courses($id, $condition = false)
    {
        $this->db->select('c.*,co.course_name,co.id as course_id,co.fees,co.duration,co.duration_type,cc.course_fee,cc.status as course_status')
            ->from('centers as c')
            ->join('center_courses as cc', "cc.center_id = c.id and c.id = '$id' and cc.isDeleted = '0' ")
            ->join('course as co', 'co.id = cc.course_id');
        if (is_array($condition))
            $this->myWhere('cc', $condition);
        return $this->db->get();
    }
    function get_center($id = 0, $type = 'center')
    {
        if ($id)
            $this->db->where('id', $id);    
        $this->db->where('type', $type);
        return $this->db->get('centers');
        /*
        $this->db->select('c.*,s.STATE_NAME,d.DISTRICT_NAME')
            ->from('centers as c')
            ->join('district as d', 'd.DISTRICT_ID = c.city_id')
            ->join('state as s', 'd.STATE_ID = c.state_id');
        if ($id)
            $this->db->where('c.id', $id);
        $this->db->where('c.type', $type);
        $this->db->get();
        echo $this->db->last_query();
        exit;
        return $this->db->get();*/
    }
    function get_verified($where = 0)
    {
        $this->myWhere('c', $where);
        $get =  $this->db
            ->from('centers as c')
            ->join('state as s', 's.STATE_ID = c.state_id','left')
            ->join('district as d', 'd.DISTRICT_ID = c.city_id','left')
            ->get();
        // echo $this->db->last_query();
        return $get;
        // if ($where)
        //     $this->db->where($where);
        // $this->db->where('type', 'center');
        // return $this->db->get('centers');
    }
    function get_details(){

    }
    function list_requests()
    {
        $this->db->select('er.*,co.course_name,c.institute_name as center_name')
            ->from('exam_requests as er')
            ->join('centers as c', 'c.id = er.center_id', 'left')
            ->join('course as co', 'co.id = er.course_id', 'left');
        if ($this->isCenter())
            $this->db->where('c.id', $this->loginId());
        return $this->db->get();
    }
    function update_wallet($centre_id , $wallet){
        return $this->db->where('id',$centre_id)->update('centers',['wallet' => $wallet]);
    }
    function verified_centers(){
        $this->db->where('type','center');
        $this->db->where('isPending',0);
        $this->db->where('isDeleted',0);
        $this->db->where('status',1);
        $this->db->where('valid_upto !=','');
        return $this->db->get('centers');
    }
}
?>