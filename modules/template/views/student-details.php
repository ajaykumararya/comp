<style>
    #student-details tr th{
        font-weight: 900;
        color:black
    }
</style>
<div class="container" id="student-details">
    <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title text-white"><i class="fa fa-eye"></i> <?=$student_data['student_name']?> Details</h3>
                </div>
                <div class="card-body">
                    <table class="table-responsive">
                        <table class="table table-bordered">
                            
                            <tr>
                                <th width="20%">{rollno_text}</th>
                                <td><?=$student_data['roll_no']?></td>
                                <th>Student Name</th>
                                <td><?=$student_data['student_name']?></td> 
                                <td rowspan="4" style="width:100px">
                                    <img src="{base_url}upload/<?=$student_data['image']?>" alt="<?=$student_data['student_name']?> Photo" style="width: 113px;    height: 147px;">
                                </td>
                            </tr>       
                            <tr>
                                <th>Father Name</th>
                                <td><?=$student_data['father_name']?></td>
                                <th>Mother Name</th>
                                <td><?=$student_data['mother_name']?></td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td><?=$student_data['contact_number']?></td>
                                <th>Alt Mobile</th>
                                <td><?=$student_data['alternative_mobile']?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?=strtolower($student_data['email'])?></td>
                                <th>D.O.B & Gender</th>
                                <td><?=$student_data['dob']?> & <?=ucfirst($student_data['gender'])?></td>
                            </tr>
                            
                            <tr>
                                <th>District</th>
                                <td><?=$student_data['DISTRICT_NAME']?></td>
                                <th>State</th>
                                <td><?=$student_data['STATE_NAME']?></td>
                                <td><?=$student_data['pincode']?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td colspan="4"><?=$student_address?></td>
                            </tr>
                        </table>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.title = "<?=$student_data['student_name']?> - Student Profile";
</script>