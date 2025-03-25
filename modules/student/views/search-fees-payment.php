<div class="row">
    <div class="col-md-12"><?php
    if (CHECK_PERMISSION('CUSTOM_STUDENT_FEE')) {
        ?>

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
                            $i = 1;
                            if ($get->num_rows()) {
                                foreach ($get->result() as $row) {
                                    echo '<tr>
                                    
                                        <td>' . $i++ . '.</td>
                                        <td>' . $row->payment_date . '</td>
                                        <td>' . $row->payment_id . '</td>
                                        <td>' . $row->roll_no . '</td>
                                        <td>' . $row->student_name . '</td>
                                        <td>' . $row->payable_amount . ' {inr}</td>
                                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <?php
    } else {
        $this->db->select('c.duration as course_duration')->order_by('sft.id', 'DESC');
        $get = $this->student_model->fetch_fee_transactions_group_by();
        if ($get->num_rows()) {
            ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Transcation(s)</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student </th>
                                    <th>Transaction Date</th>
                                    <th>Payment ID</th>
                                    <th>Amount</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($get->result() as $row) {
                                    // pre($row);
                                    echo '<tr>';
                                    echo '<td>' . $i++ . '</td>';
                                    echo '<td>
                                
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        <a href="{base_url}student/profile/'.$row->student_id.'">
                                                <div class="symbol-label">
                                                    <img src="{base_url}upload/'.$row->image.'" alt="Emma Smith" class="w-100">
                                                </div>
                                        </a>
                                    </div>

                                    <div class="ms-5">
                                        
                                        <p class="text-gray-800 text-hover-primary fs-5 fw-bold m-0">'.$row->student_name.'</p>
                                        <p class="text-gray-600 fs-6 m-0">'.$row->roll_no.'</p>
                                        <p class="text-success fs-6 fw-bold">'.$row->course_name.'- '.$row->course_duration.' '.humnize($row->course_duration, $row->duration_type).'</p>
                                
                                    </div>
                                </div></td>';
                                    echo '<td>' . $row->payment_date . '</td>';
                                    echo '<td>' . $row->payment_id . '</td>';
                                    echo '<td>{inr} ' . $row->ttl_amount . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
        } else {
            echo alert('Record Not Found.', 'danger');
        }
    }

    ?>
    </div>
</div>