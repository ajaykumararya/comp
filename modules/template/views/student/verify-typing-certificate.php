<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Verification Data of Typing Certificate</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>{rollno_text}</th>
                                <td>{roll_no}</td>
                                <td rowspan="3" style="width: 150px;padding:0">
                                    <img src="{base_url}upload/{image}" style="width:150px;border:1px solid black">
                                </td>
                            </tr>
                            <tr>
                                <th>Student Name</th>
                                <td>{student_name}</td>
                            </tr>
                            <tr>
                                <th>Father Name</th>
                                <td>{father_name}</td>
                            </tr>
                            <tr>
                                <th>Course Name</th>
                                <td colspan="2">{course_name} ( <?=humnize_duration($duration,$duration_type)?> )</td>
                            </tr>
                            <tr>
                                <th>Procured</th>
                                <td colspan="2">{procured}</td>
                            </tr>
                            
                            <tr>
                                <th>Grade / Session</th>
                                <td colspan="2">{grade} / {session}</td>
                            </tr>
                            <tr>
                                <th>Centre Name</th>
                                <td colspan="2">{center_name}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.title = `{page_name}`;
</script>