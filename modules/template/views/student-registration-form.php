<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title text-white"><i class="fa fa-eye"></i> {name}`s Registration Details
                    </h3>

                </div>
                <div class="card-body" id="printableContent">
                    <table class="table-responsive">
                        <table class="table table-bordered">
                        <?php
                        if (PATH == 'upstate'):
                            echo '<tr >
                                <td colspan="3"><img src="{base_url}{document_path}/header-img.jpg" style="width:100%"></td>
                            </tr>';
                        endif;
                        ?>
                            <tr>
                                <th>Course Name</th>
                                <td>{exam_or_course}</td>
                                <td rowspan="4" style="width:100px">
                                    <img src="{base_url}upload/{photo}" alt="{name} Photo"
                                        style="width: 113px;    height: 147px;">
                                </td>
                            </tr>
                            <tr>
                                <th>Registration No.</th>
                                <td>{registration_no}</td>
                            </tr>
                            <tr>
                                <th>Registration Date</th>
                                <td>{registration_date}</td>
                            </tr>
                            <tr>
                                <th>Student Name</th>
                                <td>{name}</td>
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
                                <td colspan="2">{student_address}</td>
                            </tr>
                            <tr>
                                <th>Training Centre</th>
                                <td colspan="2">{institute_name}</td>
                            </tr>
                            <tr>
                                <th>Training Period</th>
                                <td colspan="2">{training_period}</td>
                            </tr>
                            <tr>
                                <th>Examination Body</th>
                                <td colspan="2">{examination_body}</td>
                            </tr>
                        </table>
                    </table>
                    <?php
                    if(PATH == 'upstate'){
                        echo '<b class="text-primary">
                            UPSTATE PARAMEDICAL COUNCIL Has The Right To Cancel The Certificate If Any Infirmation Is Found To Be Wrong Of False
                        </b>';

                        echo '<center><p class="text-primary">This is a computer generated copy, does\'nt require signature or stamp.</p></center>';
                    }

                    ?>
                </div>
                <div class="card-footer" align="center">
                    <button type="button" class="btn btn-primary btn-xs btn-sm print-btn"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </div>
</div>