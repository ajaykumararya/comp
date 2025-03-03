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

<div class="student-profile py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow-sm bg-transparent border-dark">
                    <div class="card-header bg-transparent text-center">
                        <img class="profile_img" src="{student_profile}" alt="">
                        <h3 class="text-center">{student_name}</h3>
                    </div>
                    <div class="card-body bg-transparent p-0">
                        <table class="table table-bordered pb-0 mb-0">
                            <tr>
                                <th>{rollno_text}.</th>
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
            <div class="col-lg-6">
                <form action="" class="submit-examination-form">
                    <?php
                    echo form_hidden(
                        'token',
                        $this->token->encode([
                            'course_id'   => $course_id,
                            'duration_type' => $duration_type,
                            'student_id' => $student_id,
                            'center_id' => $institute_id
                        ])
                    );
                    ?>
                    <div class="card shadow-sm bg-transparent border-dark">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0 card-title "><i class="far fa-clone pr-1 fs-2 text-dark"></i> &nbsp;
                                Complete
                                Your Form
                            </h3>
                        </div>
                        <div class="card-body pt-0 p-0">
                            <h4 class="text-success"
                                style="    border: 1px solid green;    border-left: 12px solid;    padding: 4px;    border-right: 12px solid;    text-align: center;    border-radius: 6px;">
                                {course_name} - {duration} {duration_type}</h4>
                          
                            <div class="form-group">
                                <label for="" class="form-label required">Select Course Duration</label>
                                 <select name="duration" id="" class="form-control" data-control="select2"
                                    data-placeholder="Select Course Duration">
                                    <option></option>
                                    <?php
                                    if (isset($options)) {
                                        foreach ($options as $option) {
                                            // echo '<option value="' . $option['id'] . '">' . $option['label'].'</label>';
                                            echo '<option value="' . $option['id'] . '"
                                      ' . ($option['isCreated'] ? 'disabled data-subtitle-class="text-danger" ' : '') . '
                                    data-kt-rich-content-subcontent="' . $option['sub_label'] . '">
                                    ' . $option['label'] . '
                                </option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label required">Select Session</label>
                                <select name="session_id" id="" class="form-control" data-control="select2"
                                    data-placeholder="Select Session ">
                                    <option></option>
                                    <?php
                                    $getSession = $this->db->where('status', 1)->get('session');
                                    foreach ($getSession->result() as $session)
                                        echo '<option value="' . $session->id . '" data-kt-rich-content-subcontent="">' . $session->title . '</option>';
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button
                                class="save-btn pulse pulse-success btn btn-outline hover-rotate-end btn-outline-dashed btn-outline-success btn-active-light-success"
                                type="submit"><span class="pulse-ring"></span> <i
                                    class="ki-duotone ki-save-2 fs-1"><span class="path1"></span><span
                                        class="path2"></span></i>&nbsp;Submit Your Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>