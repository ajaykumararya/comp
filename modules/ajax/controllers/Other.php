<?php
class Other extends Ajax_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function submit_non_objection_certificate()
    {
        $this->form_validation->set_rules('student_id', 'Student', 'required|is_unique[no_objection_certificate.student_id]', [
            'is_unique' => 'This %s is already exists in No Objection Certificate'
        ]);
        $this->form_validation->set_rules('sr_no', 'Sr.No', 'required|is_unique[no_objection_certificate.sr_no]', [
            'is_unique' => 'This %s is already exists in No Objection Certificate'
        ]);
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('attained_to', 'Attained To', 'required');
        $this->form_validation->set_rules('attained_from', 'Attained From', 'required');
        $this->form_validation->set_rules('passing_year', 'Passing year', 'required');
        if ($this->validation()) {
            $this->db->insert('no_objection_certificate', $this->post());
            $this->response('status', true);
        }
    }
    function list_non_objection_certificate()
    {
        $this->db->select('s.name,s.roll_no,noc.*')
            ->from('students as s')
            ->join('no_objection_certificate as noc', 'noc.student_id = s.id');
        if ($this->center_model->isCenter())
            $this->db->where('s.center_id', $this->center_model->loginId());
        $data = $this->db->get();
        $this->response('data', $data->result_array());
    }
    function delete_non_objection_certificate($id)
    {
        $this->response('status', $this->db->where('id', $id)->delete('no_objection_certificate'));
    }


    //MIGRATION
    function submit_migration_certificate()
    {
        $this->form_validation->set_rules('student_id', 'Student', 'required|is_unique[migration_certificate.student_id]', [
            'is_unique' => 'This %s is already exists in Certificate'
        ]);
        $this->form_validation->set_rules('sr_no', 'Seria No', 'required|is_unique[migration_certificate.sr_no]', [
            'is_unique' => 'This %s is already exists in Certificate'
        ]);
        $this->form_validation->set_rules('date', 'Date', 'required');
        if ($this->validation()) {
            $this->db->insert('migration_certificate', $this->post());
            $this->response('status', true);
        }
    }
    function list_migration_certificate()
    {
        $this->db->select('s.name,s.roll_no,mc.*')
            ->from('students as s')
            ->join('migration_certificate as mc', 'mc.student_id = s.id');

        if ($this->center_model->isCenter())
            $this->db->where('s.center_id', $this->center_model->loginId());
        $data = $this->db->get();
        $this->response('data', $data->result_array());
    }
    function delete_migration_certificate($id)
    {
        $this->response('status', $this->db->where('id', $id)->delete('migration_certificate'));
    }
    //END MIGRATION


    //START PROVISIONAL

    function submit_provisional_certificate()
    {
        $this->form_validation->set_rules('student_id', 'Student', 'required|is_unique[provisional_certificate.student_id]', [
            'is_unique' => 'This %s is already exists in Certificate'
        ]);
        $this->form_validation->set_rules('sr_no', 'Disposal No', 'required|is_unique[provisional_certificate.sr_no]', [
            'is_unique' => 'This %s is already exists in Certificate'
        ]);
        $this->form_validation->set_rules('examination_held', 'Examination Held in', 'required');
        $this->form_validation->set_rules('internship', 'Internship', 'required');
        //

        if ($this->validation()) {
            $this->db->insert('provisional_certificate', $this->post());
            $this->response('status', true);
        }
    }
    function list_provisional_certificate()
    {
        $this->db->select('s.name,s.roll_no,mc.*')
            ->from('students as s')
            ->join('provisional_certificate as mc', 'mc.student_id = s.id');

        if ($this->center_model->isCenter())
            $this->db->where('s.center_id', $this->center_model->loginId());
        $data = $this->db->get();
        $this->response('data', $data->result_array());
    }
    function delete_provisional_certificate($id)
    {
        $this->response('status', $this->db->where('id', $id)->delete('provisional_certificate'));
    }

    //END PROVISIONAL
}