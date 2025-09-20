
<?php
$cert_id = $this->input->post('id');
$cert = $this->db->where(['id' => $cert_id])->get('student_certificates')->row();
?>
<div class="col-md-4">
    <input type="hidden" name="id" value="<?= $cert_id ?>">
    <div class="form-group mb-4">
        <label class="form-label required">Issue Date</label>
        <input type="text" name="date" value="<?= $cert->issue_date ?>" class="form-control selectdate">
    </div>
</div>