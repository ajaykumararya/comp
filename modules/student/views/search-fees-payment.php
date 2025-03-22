<?php
if (CHECK_PERMISSION('CUSTOM_STUDENT_FEE')) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Payment History</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Payment ID</th>
                                <th>{rollno_text}</th>
                                <th>Student Name</th>
                                <th>Fee</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $get = $this->student_model->get_fee_transcations([
                                'type_key' => 'course_fees'
                            ]);
                            $i =1 ;
                            if($get->num_rows()){
                                foreach($get->result() as $row){
                                    echo '<tr>
                                    
                                        <td>'.$i++.'.</td>
                                        <td>'.$row->payment_date.'</td>
                                        <td>'.$row->payment_id.'</td>
                                        <td>'.$row->roll_no.'</td>
                                        <td>'.$row->student_name.'</td>
                                        <td>'.$row->payable_amount.' {inr}</td>
                                    </tr>';
                                }
                            }     
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
}


?>