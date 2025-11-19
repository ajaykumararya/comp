<?php
$isCenterOrAdmin = $this->student_model->isAdminOrCenter();
$date = $this->ki_theme->date();
?>
<div class="row">
    <div class="col-md-12">
        <form action="" class="mb-4" method="post">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-search"></i> Filter Data</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label required"> Select Date</label>
                                <input type="text" class="form-control attendance-date" value="<?= $date ?>"
                                    id="attendance_date" name="search" placeholder="Select Attendance Date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer form-group pt-8">
                    {search_button}
                </div>
            </div>
        </form>
        <script>
            var start = moment().subtract(29, "days");
            var end = moment();
            <?php
            if (isset($_POST['search'])) {
                // echo $_POST['search'];
                $filterDate = explode(' - ', $_POST['search']);
                $startDate = ($filterDate[0]);
                $endDate = ($filterDate[1]);
                ?>
                start = moment("<?= $startDate ?>", "YYYY-MM-DD");
                end = moment("<?= $endDate ?>", "YYYY-MM-DD");
                <?php
            }
            ?>
            function cb(start, end) {
                $(".attendance-date").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
            }

            $(".attendance-date").daterangepicker({
                startDate: start,
                endDate: end,
                locale: {
                    format: "YYYY-MM-DD"
                },
                ranges: {
                    "Today": [moment(), moment()],
                    "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
                }
            }, cb);
            cb(start, end);
        </script>


        <?php
        $startDate = $endDate = false;
        if (isset($_POST['search'])) {
            // echo $_POST['search'];
            $filterDate = explode(' - ', $_POST['search']);
            $startDate = date('d-m-Y', (strtotime($filterDate[0])));
            $endDate = date('d-m-Y', (strtotime($filterDate[1])));
            echo label('Searched Data From ' . ($startDate) . ' To ' . $endDate, 'info me-3');
            echo "<a href='{current_url}'><i class='fa fa-times'></i> Clear Record</a>";
            // $this->
        }
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
                            if ($startDate && $endDate) {
                                $this->db->where("(sft.payment_date >= '.$startDate.' and sft.payment_date <= '.$endDate.')");
                            }
                            $get = $this->student_model->get_fee_transcations([
                                'type_key' => 'course_fees'
                            ]);
                            // echo $this->db->last_query();
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
            if ($startDate && $endDate) {
                $this->db->where("(sft.payment_date >= '.$startDate.' and sft.payment_date <= '.$endDate.')");
            }
            $this->db->select('c.duration as course_duration,s.fee_emi,s.fee_emi_type')->order_by('sft.id', 'DESC');
            $get = $this->student_model->fetch_fee_transactions_group_by();


            if ($get->num_rows()) {
                ?>
                <div class="card mt-3">
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
                                    <th>Action</th>

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
                                        <a href="{base_url}student/profile/' . $row->student_id . '">
                                                <div class="symbol-label">
                                                    <img src="{base_url}upload/' . $row->image . '" alt="Emma Smith" class="w-100">
                                                </div>
                                        </a>
                                    </div>

                                    <div class="ms-5">
                                        
                                        <p class="text-gray-800 text-hover-primary fs-5 fw-bold m-0">' . $row->student_name . '</p>
                                        <p class="text-gray-600 fs-6 m-0">' . $row->roll_no . '</p>
                                        <p class="text-success fs-6 fw-bold">' . $row->course_name . '- ' . $row->course_duration . ' ' . humnize($row->course_duration, $row->duration_type) . '</p>
                                
                                    </div>
                                </div></td>';
                                    echo '<td>' . $row->payment_date . '</td>';
                                    echo '<td>' . $row->payment_id . '</td>';
                                    echo '<td>{inr} ' . $row->ttl_amount . '</td>';
                                    echo '<td>';
                                    if ($row->fee_emi == 0 || $row->fee_emi == null) {
                                        echo '<div class="btn-group">
                                                ';
                                        if ($isCenterOrAdmin) {
                                            echo $this->ki_theme
                                                ->with_icon('pencil')
                                                ->with_pulse('primary')
                                                ->outline_dashed_style('primary')
                                                ->set_attribute([
                                                    'data-fee_id' => $row->id,
                                                    'class' => 'edit-fee-record'
                                                ])
                                                ->button('Edit');
                                        }
                                        // generate receipt
                                        echo $this->ki_theme
                                            ->with_icon('file')
                                            ->with_pulse('success')
                                            ->outline_dashed_style('success')
                                            ->set_attribute([
                                                'data-fee_id' => $row->payment_id,
                                                'class' => 'print-receipt'
                                            ])
                                            ->button('Receipt');
                                        if ($isCenterOrAdmin) {
                                            echo $this->ki_theme
                                                ->with_icon('trash')
                                                ->with_pulse('danger')
                                                ->outline_dashed_style('danger')
                                                ->set_attribute([
                                                    'data-fee_id' => $row->id,
                                                    'class' => 'delete-fee-record'
                                                ])
                                                ->button('Delete');
                                        }
                                        echo '
                                              </div>';
                                    } else
                                        echo label(' EMI Payment, Can\'t edit or delete.', 'danger');
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
            } else {
                echo alert('Record Not Found.', 'danger mt-3');
            }
        }

        ?>
    </div>
</div>

<?php
if ($isCenterOrAdmin) {
    // 
    ?>
    <script id="formTemplate" type="text/x-handlebars-template">
        <input type="hidden" name="id" value="{{id}}">

        <div class="form-group mb-4">
            <label class="form-label">Date</label>
            <input type="text" name="date" class="form-control" placeholder="Enter Roll Number Prefix" value="{{date}}">
        </div>
        <div class="form-group mb-4">
            <label class="form-label">Date</label>
            <input type="text" name="date" class="form-control" placeholder="Enter Roll Number Prefix" value="{{date}}">
        </div>
    </script>
    <?php
}

?>