<?php
if (table_exists('student_typing_certicate')) {
    ?>
    <div class="row">
        <div class="col-md-12 mb-4">
            <form action="" class="add-typing-certificate">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Typing Certificate</h3>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6 form-group mb-4">
                            <label for="liststudent" class="form-label required">Select
                                Student</label>
                            <select name="student_id" required data-control="select2" data-placeholder="Select Student"
                                class="form-select first" data-allow-clear="true">
                                <option></option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label for="" class="form-label">Procured</label>
                            <input type="text" required placeholder="Enter Procured.." name="procured" class="form-control">
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label for="grade" class="form-label required">Grade</label>
                            <input type="text" name="grade" required placeholder="Grade" class="form-control">
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label for="grade" class="form-label required">Certification No</label>
                            <input type="text" name="certification_no" required placeholder="Certificate No" class="form-control">
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label for="certificate_date" class="form-label required">Issue Date</label>
                            <input type="date" name="issue_date" required class="form-control selectdate">
                        </div>
                    </div>
                    <div class="card-footer">
                        {publish_button}
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Typing Certificate(s)</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        $list = $this->db->select('stc.*,s.name,s.roll_no')
                            ->from('student_typing_certicate as stc')
                            ->join('students as s', 's.id = stc.student_id')
                            ->get();
                        // $list = $this->db->order_by('timestamp', 'DESC')->get('student_typing_certicate');
                        if ($list->num_rows()) {
                            ?>
                            <table class="table table-bordered table-striped" id="listTypingCertificate">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Certificate No</th>
                                        <th>Student Name</th>
                                        <th>{rollno_text}</th>
                                        <th>Procured</th>
                                        <th>Grade</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($list->result() as $index => $row) {
                                        echo '<tr>
                                            <td>' . $i++ . '.</td>
                                            <td>'.$row->certification_no.'</td>
                                            <td>' . $row->name . '</td>
                                            <td>' . $row->roll_no . '</td>
                                            <td>' . $row->procured . '</td>
                                            <td>' . $row->grade . '</td>
                                            <td>
                                                <a target="_blank" href="'.base_url('typing-certificate/'.base64_encode(base64_encode($row->id))).'" class="btn btn-xs btn-sm btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <button class="btn btn-xs btn-sm btn-danger dlt-cert" data-id="' . $row->id . '">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo alert('Record not found    ','danger');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else
    echo alert('Typing certificate Service is not found.', 'danger');
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const liststudentBox = $('select[name="student_id"]');
        $('#listTypingCertificate').DataTable();
        select2Student(liststudentBox[0]);
        $(document).on('submit', '.add-typing-certificate', function (d) {
            d.preventDefault();
            $.AryaAjax({
                url: 'student/add-typing-certificate',
                data: new FormData(this)
            }).then((r) => {
                if (r.status) {
                    SwalSuccess('Success', 'Certificate Added Successfully..');
                    location.reload();
                }
                showResponseError(r);
            })
        })
        $(document).on('click', '.dlt-cert', function () {
            var id = $(this).data('id');
            SwalWarning('Confirmation!', 'Are you sure for delete this certificate', true, 'Ok delete it').then((r) => {
                if (r.isConfirmed) {
                    // alert(id);
                    $.AryaAjax({
                        url: 'student/delete-typing-certificate',
                        data: { id },
                        success_message: 'Deleted Successfully..',
                        page_reload: true
                    });
                }
            })
        })
    })
</script>