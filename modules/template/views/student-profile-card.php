<style>
    .student-profile .card {
        border-radius: 10px;
    }

    .student-profile .card .card-header .profile_img {
        width: 150px;
        height: 150px;
        /* object-fit: cover; */
        margin: 10px auto;
        border: 10px solid #ccc;
        border-radius: 50%;
    }

    .student-profile .card h3 {
        font-size: 20px;
        font-weight: 700;
    }

    .student-profile .card p {
        font-size: 16px;
        /* color: #000; */
    }

    .student-profile .table th,
    .student-profile .table td {
        font-size: 14px;
        padding: 5px 10px;
        /* color: #000; */
    }
</style>
<!-- Student Profile -->
<?php
$IsPassout = $this->student_model->get_switch('passout', ['id' => $student_id])->num_rows();
?>
<div class="student-profile py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow-sm bg-transparent border-dark">
                    <div class="card-header bg-transparent text-center">
                        <img class="profile_img" src="{student_profile}" alt="">
                        <h3 class="text-center">{student_name}</h3>
                    </div>
                    <div class="card-body bg-transparent p-0">
                        <table class="table table-bordered pb-0 mb-0">
                            <tr>
                                <th>Roll No.</th>
                                <td>{roll_no}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td class="text-capitalize">{gender}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{contact_number}</td>
                            </tr>
                            <?php
                            if ($this->center_model->isAdminOrCenter()) {
                                echo '<tr>
                                    <td colspan="2">
                                    <div class="btn-wrapper btn-wrapper2">
                                        <a href="' . base_url('student/profile/' . $student_id) . '"  target="_blank" class="btn btn-xs btn-sm btn-info w-100"> <span><i class="fa fa-user"></i> View Profile</span></a>
                                    
                                    </div>
                                    </td>
                                </tr>';
                            }
                            ?>
                        </table>
                        <!-- <p class="mb-0"><strong class="pr-1">Roll No:</strong>&nbsp;{roll_no}</p>
                        <p class="mb-0 text-capitalize"><strong class="pr-1">Gender:</strong>&nbsp; {gender}</p>
                        <p class="mb-0"><strong class="pr-1">Mobile:</strong>&nbsp;{contact_number}</p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow-sm bg-transparent border-dark">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="mb-0 card-title "><i class="far fa-clone pr-1 fs-2 text-dark"></i> &nbsp; General
                            Information
                        </h3>
                    </div>
                    <div class="card-body pt-0 p-0">
                        <table class="table table-bordered ">
                            <tr>
                                <th width="30%">DOB </th>
                                <td width="2%">:</td>
                                <td>{dob}</td>
                            </tr>
                            <tr>
                                <th width="30%">Admission Date</th>
                                <td width="2%">:</td>
                                <td>{admission_date}</td>
                            </tr>
                            <?php
                            if (!CHECK_PERMISSION('NOT_TIMETABLE')) {
                                ?>
                                <tr>
                                    <th width="30%">Time Table </th>
                                    <td width="2%">:</td>
                                    <td>{batch_name} <?= $IsPassout ? label('Passount Student', 'success') : '' ?></td>
                                </tr>
                                <?php
                            }
                            if (CHECK_PERMISSION('ADMISSION_WITH_SESSION')) {
                                ?>
                                <tr>
                                    <th width="30%">Session </th>
                                    <td width="2%">:</td>
                                    <td>{session} <?= $IsPassout ? label('Passount Student', 'success') : '' ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <th width="30%">Center Name </th>
                                <td width="2%">:</td>
                                <td>{center_name}</td>
                            </tr>
                            <tr>
                                <th width="30%">Course</th>
                                <td width="2%">:</td>
                                <td>{course_name}</td>
                            </tr>
                            <tr>
                                <th width="30%">Duration</th>
                                <td width="2%">:</td>
                                <td class="text-capitalize">{duration} {duration_type}</td>
                            </tr>
                            <tr>
                                <th width="30%">Status</th>
                                <td width="2%">:</td>
                                <td>{admission_status}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>