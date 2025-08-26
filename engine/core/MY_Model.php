<?php
class MY_Model extends CI_Model
{
    public $login_type, $login_id, $examdb;
    function __construct()
    {
        parent::__construct();
        // $this->load->library('session');
        // if ($this->isLogin()) {
        $this->login_type = $this->session->userdata('admin_type');
        $this->login_id = $this->session->userdata('admin_id');
        // }

        if (defined('DB_EXAM'))
            $this->examdb = $this->load->database('exam', true);
    }
    function verifyData($data = [])
    {
        return array_merge($data, [
            'login_type' => $this->login_type,
            'login_id' => $this->login_id
        ]);
    }
    function verify($where)
    {
        if ($this->isCenter()) {
            $this->db->where($this->verifyData($where));
        }
        return $this;
    }
    function select($select)
    {
        $this->db->select($select);
        return $this;
    }
    function withEMI()
    {
        return $this->select('s.fee_emi,s.fee_emi_type');
    }
    function myWhere($table, $condition = [])
    {
        if (sizeof($condition)) {
            foreach ($condition as $field => $value) {
                $this->db->where("{$table}.{$field}", $value);
            }
        }
    }
    function isLogin()
    {
        return $this->session->has_userdata('admin_login');
    }
    function login_type()
    {
        return $this->login_type;
    }
    function isAdmin()
    {
        return $this->login_type == 'admin';
    }
    function isRole()
    {
        return $this->login_type == 'role_user';
    }
    function permissions()
    {
        if ($this->isRole()) {
            $chk = $this->db->where('id', $this->session->userdata('role_id'))->get('role_categories');
            if ($chk->num_rows()) {
                return json_decode($chk->row('permissions'), true);
            }
        }
        return [];
    }
    // function isUser($type = 'user')
    // {
    //     return $this->login_type == $type;
    // }
    function isCoordinator()
    {
        return (CHECK_PERMISSION('CO_ORDINATE_SYSTEM') && $this->login_type == 'co_ordinator');
    }
    function isCenter()
    {
        return $this->login_type == 'center';
    }
    function isAdminOrCenter()
    {
        return $this->isAdmin() or $this->isCenter();
    }
    function isStudent()
    {
        return $this->session->has_userdata('student_login') === TRUE;
    }
    function studentId()
    {
        if ($this->isStudent())
            return $this->session->userdata('student_id');
        return 0;
    }

    function loginId()
    {
        return $this->login_id;
    }
}
?>