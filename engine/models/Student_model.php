<?php
class Student_model extends MY_Model
{
    function get_switch($case = 'all', $condition = [], $withCenter = true)
    {
        extract($condition);
        $this->db->select('        
                b.batch_name,
                
                s.status as admission_status,
                s.image,
                s.dob,
                s.gender,
                s.admission_date,
                s.admission_type,
                s.roll_no,
                s.contact_number,
                s.contact_no_type,
                s.name as student_name,
                s.father_name,
                s.mother_name,
                s.email,
                s.id as student_id,
                s.address,
                s.pincode,
                s.status as student_profile_status,
                s.added_by,
                s.alt_mobile_type,
                s.alternative_mobile,
                s.family_id,
                s.password,

                c.course_name,
                c.fees as course_fees,
                c.id as course_id,
                c.duration,
                c.duration_type,

                ce.institute_name as center_name,
                ce.id as institute_id,
                ce.center_full_address,


                state.*,
                district.*'


        )
            ->from('students as s')
            // ->where('s.status',1)

            ->join("course as c", "s.course_id = c.id ", 'left')
            ->join('state', 'state.STATE_ID = s.state_id')
            ->join('district', 'district.DISTRICT_ID = s.city_id and district.STATE_ID = state.STATE_ID')
            ->join('batch as b', "b.id = s.batch_id", 'left');

        if (!isset($without_admission_status))
            $this->db->where('s.admission_status', isset($admission_status) ? $admission_status : 1);

        if (($this->isCenter() and $withCenter) or ($case == 'center' and isset($center_id)))
            $this->db->join('centers as ce', 'ce.id = s.center_id AND s.center_id = ' . (isset($center_id) ? $center_id : $this->loginId()));
        else
            $this->db->join('centers as ce', 'ce.id = s.center_id', 'left');
        switch ($case) {
            case 'student_result_verification':
                $this->db->select('m.id as marksheet_id');
                $this->db->where('s.roll_no', $roll_no);
                $this->db->where('s.dob', $dob);
                $this->db->where('s.status', isset($status) ? $status : 0);
                $this->db->join('marksheets as m', 'm.student_id = s.id');
                $this->db->join('admit_cards as ac', 'ac.id = m.admit_card_id and ac.student_id = s.id');
                break;
            case 'search_student_for_select2':
                $this->db->select('s.id');
                if ($search) {
                    $this->db->group_start()->like('s.name', $search);
                    $this->db->or_like('s.roll_no', $search);
                    $this->db->or_like('s.contact_number', $search);
                    $this->db->or_like('s.alternative_mobile', $search)->group_end();
                }
                // $this->db->where('s.admission_status',1);
                break;
            case 'student_verification':
                $this->db->where('s.roll_no', $roll_no);
                $this->db->where('s.dob', $dob);
                $this->db->where('s.status', isset($status) ? $status : 0);
                break;
            case 'online_students':
                $this->db->where('s.admission_type', 'online');
                break;
            case 'course':
                $this->db->where('c.id', $course_id);
                break;
            case 'student_id':
                $this->db->where('s.id', $id);
                break;
            case 'roll_no':
                $this->db->where('s.roll_no', $roll_no);
                break;
            case 'batch':
                $this->db->where('b.id', $batch_id);
                break;
            case 'fetch_fee_transactions':
                $this->db->select('sft.*')->join('student_fee_transactions as sft', "sft.student_id = s.id");
                $this->myWhere('sft', $condition);
                break;
            case 'fetch_fee_transactions_group_by':
                $this->db->select('sft.*,sft.payable_amount as ttl_amount')
                    ->join('student_fee_transactions as sft', "sft.student_id = s.id");
                $this->db->group_by('sft.payment_id');
                $this->myWhere('sft', $condition);
                break;
            case 'fetch_fee_transactions_ttl':
                $this->db->select('sft.*,SUM(sft.payable_amount) as ttl_fee,SUM(sft.discount) as ttl_discount')->join('student_fee_transactions as sft', "sft.student_id = s.id");
                $this->db->group_by('sft.student_id', $student_id)->limit(1);

                $this->myWhere('sft', $condition);
                break;
            case 'get_admit_card':
                $this->db->select('
                                DATE_FORMAT(ac.timestamp,"%d-%m-%Y") as createdOn,
                                ss.title as session,
                                ac.id as admit_card_id,
                                ac.duration as admit_card_duration,
                                ac.enrollment_no,
                                DATE_FORMAT(ac.exam_date,"%d-%m-%Y %h:%i %p") as exam_date
                            ');
                $this->db->join("admit_cards as ac", "ac.student_id = s.id");
                $this->db->join('session as ss', 'ss.id = ac.session_id');
                if (isset($roll_no)) {
                    unset($condition['roll_no']);
                    $this->myWhere('s', ['roll_no' => $roll_no]);
                }

                $this->myWhere('ac', $condition);
                break;
            case 'get_marksheet':
                $this->db->select('
                                    m.id as result_id,
                                    m.date as issue_date,
                                    m.duration as marksheet_duration,
                                    ac.enrollment_no,
                                    ss.title as session
                                    ');
                $this->db->join('marksheets as m', "m.student_id = s.id and m.center_id = ce.id");
                $this->db->join('admit_cards as ac', 'ac.id = m.admit_card_id', 'left');
                $this->db->join('session as ss', 'ss.id = ac.session_id', 'left');
                $this->myWhere('m', $condition);
                break;
            case 'student_certificates':
                $this->db->select('sc.id as certiticate_id,ss.title as session, sc.issue_date as createdOn,sc.exam_conduct_date');
                $this->db->join('student_certificates as sc', "sc.student_id = s.id");
                $this->db->join('admit_cards as ac', "ac.student_id = sc.student_id and c.duration = ac.duration and c.duration_type = ac.duration_type");
                $this->db->join('session as ss', "ss.id = ac.session_id");
                if (isset($roll_no)) {
                    unset($condition['roll_no']);
                    $this->myWhere('s', ['roll_no' => $roll_no]);
                }

                if (isset($condition['id'])) {
                    $this->db->where('sc.id', $condition['id']);
                } else
                    $this->myWhere('sc', $condition);

                break;
        }
        return $this->db->get();
    }
    function student_certificates($where = [])
    {
        return $this->get_switch('student_certificates', $where);
    }
    function student_verification($data)
    {
        return $this->get_switch('student_verification', $data);
    }
    function search_student_for_select2($query)
    {
        return $this->get_switch('search_student_for_select2', $query);
    }
    function student_result_verification($data)
    {
        return $this->get_switch('student_result_verification', $data);
    }
    function get_fee_transcations($where)
    {
        return $this->get_switch('fetch_fee_transactions', $where);
    }
    function marksheet($where = [])
    {
        return $this->get_switch('get_marksheet', $where);
    }
    function admit_card($where = [])
    {
        return $this->get_switch('get_admit_card', $where);
    }
    function fetch_student_center_wise($id)
    {
        return $this->get_switch('center', ['center_id' => $id]);
    }

    function get_fee_transcations_ttl($where)
    {
        $ttlrow = $this->get_switch('fetch_fee_transactions_ttl', $where);
        $data = ['ttl_fee' => 0, 'ttl_discount' => 0];
        if ($ttlrow->num_rows()) {
            $data = [
                'ttl_fee' => $ttlrow->row('ttl_fee'),
                'ttl_discount' => $ttlrow->row('ttl_discount'),
            ];
        }
        return $data;
    }
    function get_fee_transcations_using_payment_id($where)
    {
        return $this->get_switch('fetch_fee_transactions', $where);
    }
    function get_online_student()
    {
        return $this->get_switch('online_students')->result();
    }
    function get_student_course_wise($course_id = 0)
    {
        return $this->get_switch('course', ['course_id' => $course_id]);
    }

    function get_all_student($where = [])
    {
        return $this->get_switch('all', $where)->result();
    }
    function get_student_via_roll_no($rollNo = 0)
    {
        return $this->get_switch('roll_no', ['roll_no' => $rollNo]);
    }
    function get_student_via_id($id = 0)
    {
        return $this->get_switch('student_id', ['id' => $id]);
    }
    function get_student_via_batch($batch_id = 0)
    {
        return $this->get_switch('batch', ['batch_id' => $batch_id]);
    }
    function fix_payment_settings($id = 0, $isDeleted = 0)
    {
        if ($id)
            $this->db->where('id', $id);
        $this->db->where('isDeleted', $isDeleted);
        return $this->db->get('student_fix_payment');
    }

    function course_subject($where)
    {
        return $this->db->where($where)
            ->order_by('seq','ASC')    
        ->get('subjects');
    }
    function check_admit_card($where)
    {
        return $this->get_switch('get_admit_card', $where);
    }
    function get_marksheet_using_admit_card($id)
    {
        return $this->db->where('admit_card_id', $id)->get('marksheets');
    }
    function update_admission_status($student_id, $admission_status)
    {
        return $this->db->where('id', $student_id)->update('students', [
            'admission_status' => $admission_status
        ]);
    }
    function marksheet_marks($result_id)
    {
        $this->db
            ->from('marks_table as mt')
            ->join('marksheets as m', 'mt.marksheet_id = m.id and m.id = ' . $result_id)
            ->join('subjects as s', "( s.id = mt.subject_id and s.isDeleted = 0 and m.id = '$result_id'")
            ->order_by('s.seq','ASC');
        // ->where('mt.marksheet_id' , $result_id);
        return $this->db->get();

    }

    function study_materials()
    {
        $this->db
            ->from('study_material as sm')
            ->join('course as c', 'c.id = sm.course_id')
            ->join('centers as ce', 'ce.id = sm.center_id', 'left');
            
        if ($this->isCenter())
            $this->db->where('ce.id',$this->loginId());

           
        return $this->db->get();

    }





    function list_system_course(){
        return $this->db->where('isDeleted',0)
                        ->get('course');
    }

    function system_subjects()
    {
        return $this->db->select('*,s.id as subject_id,s.duration as subject_duration')
            ->from('subjects as s')
            ->join('course as c', 'c.isDeleted = "0" and s.course_id = c.id')
            ->where('s.isDeleted', 0)
            ->get();
    }
}
