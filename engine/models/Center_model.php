<?php
class Center_model extends MY_Model
{
    function center_fees($id = 0, $select = '*')
    {
        $id = $id ? $id : $this->loginId();
        $this->db->select($select);
        return $this->db->where('center_id', $id)->get('center_fees');
    }
    function get_assign_courses($id, $condition = false, $userType = 'center')
    {
        $this->db->select('c.*,co.course_name,co.id as course_id,co.fees,co.duration,co.duration_type')
            ->from('centers as c');
        if (CHECK_PERMISSION('CO_ORDINATE_SYSTEM')) {
            $this->db->join('center_course_category as cc', "cc.user_id = c.id and c.id = '$id' AND cc.user_type = '$userType'");
            $this->db->select('co.fees,cc.percentage,(co.fees * (cc.percentage / 100)) as commission ,(co.fees - (co.fees * (cc.percentage / 100))) as course_fee')->join('course as co', 'co.category_id = cc.category_id');
            if (isset($condition['course_id'])) {
                $this->db->where('co.id', $condition['course_id']);
                unset($condition['course_id']);
            }
        } 
        else if(CHECK_PERMISSION('ADMISSION_WITH_SESSION')){
            $this->db->join('center_course_category as cc', "cc.user_id = c.id and c.id = '$id' AND cc.user_type = '$userType'");
            $this->db->select('co.fees,cc.percentage,(co.fees * (cc.percentage / 100)) as commission ,(co.fees - (co.fees * (cc.percentage / 100))) as course_fee')->join('course as co', 'co.category_id = cc.category_id');
            if (isset($condition['course_id'])) {
                $this->db->where('co.id', $condition['course_id']);
                unset($condition['course_id']);
            }
        }
        else {
            $this->db->select('cc.course_fee,cc.status as course_status');
            $this->db->join('center_courses as cc', "cc.center_id = c.id and c.id = '$id' and cc.isDeleted = '0' ");
            $this->db->join('course as co', 'co.id = cc.course_id');
        }
        if (is_array($condition))
            $this->myWhere('cc', $condition);
        return $this->db->get();
    }
    function get_assign_course_cats($id, $userType = 'center', $condition = false)
    {
        $this->db->select('c.*,ccc.*,cc.*')
            ->from('centers as c')
            ->join('center_course_category as ccc', "ccc.user_id = c.id and c.id = '$id' AND ccc.user_type = '$userType'")
            ->join('course_category as cc', 'cc.id = ccc.category_id');
        if (is_array($condition))
            $this->myWhere('ccc', $condition);
        return $this->db->get();
    }
    function get_assign_co_ordinate_courses($id, $userType = 'center', $condition = false)
    {
        $this->db->select('c.*,co.course_name,co.id as course_id,co.fees,co.duration,co.duration_type,cc.course_fee,cc.status as course_status')
            ->from('centers as c')
            // ->join('center_courses as cc', "cc.center_id = c.id and c.id = '$id' and cc.isDeleted = '0' ")
            ->join('center_course_category as ccc', "ccc.user_id = c.id and c.id = '$id' AND ccc.user_type = '$userType'")
            ->join('course as co', 'co.id = ccc.course_id');
        if (is_array($condition))
            $this->myWhere('cc', $condition);
        return $this->db->get();
    }
    function get_center($id = 0, $type = 'center', $isDeleted = 0)
    {
        if ($id)
            $this->db->where('id', $id);
        $this->db->where('type', $type);
        if (!is_bool($isDeleted))
            $this->db->where('isDeleted', $isDeleted);
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
        $get = $this->db
            ->from('centers as c')
            ->join('state as s', 's.STATE_ID = c.state_id', 'left')
            ->join('district as d', 'd.DISTRICT_ID = c.city_id', 'left')
            ->get();
        // echo $this->db->last_query();
        return $get;
        // if ($where)
        //     $this->db->where($where);
        // $this->db->where('type', 'center');
        // return $this->db->get('centers');
    }
    function get_details()
    {

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
    function update_wallet($centre_id, $wallet)
    {
        return $this->db->where('id', $centre_id)->update('centers', ['wallet' => $wallet]);
    }
    function verified_centers()
    {
        $this->db->where('type', 'center');
        $this->db->where('isPending', 0);
        $this->db->where('isDeleted', 0);
        $this->db->where('status', 1);
        $this->db->where('valid_upto !=', '');
        return $this->db->get('centers');
    }
    function wallet_history()
    {
        $this->db->select('wt.*,DATE_FORMAT(wt.timestamp,"%d-%m-%Y") as date');
        $this->db->from('wallet_transcations as wt');
        $this->db->where('wt.center_id', $this->loginId());
        return $this->db->order_by('id', 'DESC')->get();
    }
}
?>