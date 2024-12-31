<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title text-white"><i class="fa fa-eye"></i> {student_name}`s Registration Details
                    </h3>

                </div>
                <div class="card-body" id="printableContent">
                    <table class="table-responsive">
                        <table class="table table-bordered">

                            <tr>
                                <th>Course Name</th>
                                <td>{course_name}</td>
                                <td rowspan="4" style="width:100px">
                                    <img src="{base_url}upload/{image}" alt="{name} Photo"
                                        style="width: 113px;    height: 147px;">
                                </td>
                            </tr>
                            <tr>
                                <th>Registration No.</th>
                                <td>{roll_no}</td>
                            </tr>
                            <tr>
                                <th>Registration Date</th>
                                <td>{admission_date}</td>
                            </tr>
                            <tr>
                                <th>Student Name</th>
                                <td>{student_name}</td>
                            </tr>
                            <tr>
                                <th>Father`s Name</th>
                                <td colspan="2">{father_name}</td>
                            </tr>
                            <tr>
                                <th>Mother`s Name</th>
                                <td colspan="2">{mother_name}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td colspan="2">{dob}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td colspan="2">{address}</td>
                            </tr>
                            <tr>
                                <th>Training Centre</th>
                                <td colspan="2">{center_name}</td>
                            </tr>
                            <tr>
                                <th>Training Period</th>
                                <td colspan="2">{duration} {duration_type}</td>
                            </tr>
                            <tr>
                                <th>Examination Body</th>
                                <td colspan="2">{examination_body}</td>
                            </tr>
                        </table>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>