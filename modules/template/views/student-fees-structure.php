<?php
// echo $admission_date;

$where = ['course_id' => $course_id, 'student_id' => $student_id, 'roll_no' => $roll_no];
$center_course = $this->center_model->get_assign_courses($institute_id, ['course_id' => $course_id]);
$course_fees = 0;
if ($center_course->num_rows()) {
    $course_fees = $center_course->row('course_fee');
}
// $calTotalFee = $this->student_model->total_course_fee($institute_id,$course_id);
// echo $calTotalFee;
$monthNum = get_month_number($admission_date);
$this->ki_theme->check_it_referral_stduent($student_id);
?>
<style>
    input.form-control.form-control-sm:read-only {
        cursor: not-allowed;
    }

    .form-check-input:disabled~.form-check-label,
    .form-check-input[disabled]~.form-check-label {
        opacity: 1;
    }

    tr th label.form-check-label {
        color: black
    }

    [data-bs-theme=dark] tr th label.form-check-label {
        color: white
    }

    tr.pending {
        color: white;
        background-color: #981e1e;
    }

    tr.success {
        background-color: #032c12;
        color: white
    }

    tr.pending th,
    tr.pending td,
    tr.pending label.form-check-label,
    tr.success th,
    tr.success td,
    tr.success label.form-check-label {
        color: white
    }
</style>
<?php
$trTemplate = "<tr class='{class} ' data-type='{type}' id='{id}'>
                    <th>{input}</th>
                    <td>{month} &nbsp; {year}</td>
                    <td>{feeAmount} {inr}</td>
                    <td>{bill}</td>
                </tr>";

$trId = 'first-transcations';

if ($this->student_model->get_fee_transcations(['type' => 'admission_fee'] + $where)->num_rows()) {
    $trId = '';
    $this->ki_theme->checked()->disabled();
}
?>
<div class="row">
    <div class="col-md-5">
        <div class="card card-body p-0 mb-5">
            <label class="d-flex flex-stack cursor-pointer p-5">
                <!--begin:Label-->
                <span class="d-flex align-items-center me-2">
                    <!--begin:Icon-->
                    <span class="symbol symbol-50px me-6">
                        <span class="symbol-label bg-light-warning">
                            <span class="fs-2x text-warning">
                                <?= get_first_latter($course_name) ?>
                            </span>
                        </span>
                    </span>
                    <!--end:Icon-->
                    <!--begin:Info-->
                    <span class="d-flex flex-column">
                        <span class="fw-bold fs-6 text-capitalize course-name">
                            <?= $course_name ?>
                        </span>
                        <span class="fs-7 text-muted text-capitalize course-duration">
                            <?= humnize_duration($duration, $duration_type, false) ?>
                        </span>
                    </span>
                    <!--end:Info-->
                    <span class="d-flex flex-column text-end w-100px">
                        <span class="fw-bold fs-3">
                            <?= $course_fees ?> {inr}
                        </span>
                    </span>
                </span>
                <!--end:Label-->
            </label>
            <table class="table table-bordered mb-0 border-info" id="transcations">
                <tbody>
                    <tr id="<?= $trId ?>" class="<?= empty($trId) ? 'success' : '' ?>" data-type="admission_fee">
                        <th colspan="2">
                            <?php
                            $trId = 'first-transcations';
                            echo $this->ki_theme->tag_html('Admission Fees')->checkbox('admission_fee', $admission_fee, 'set-fee', '');
                            ?>
                        </th>
                        <td>{admission_fee} {inr}</td>
                        <td></td>
                    </tr>
                    <?php
                    $rrrd = getRadomNumber();
                    $year = date('Y', strtotime($admission_date));
                    $loop = $duration;
                    if ($course_fees):

                        if ($duration_type == 'month') {

                            $perMonthfee = floor($course_fees / ($duration));
                            echo '<tr>
                                    <th colspan="4" class="text-center">' . $duration . ' ' . $duration_type . ' Fee</th>   
                                 </tr>';
                            $index = 0;
                            for ($i = 1; $i <= $duration; $i++) {
                                $type = $duration . "_" . $duration_type;
                                $calMonthNumber = $monthNum + ($i - 1);
                               
                                $month = get_month($calMonthNumber);
                                $monthFee = $perMonthfee;
                                $margin = 0;
                                if($i == $duration){
                                    $margin = $course_fees % $duration;
                                    $monthFee += $margin;
                                }
                                $theme = 1;
                                $getTrans = $this->student_model->get_fee_transcations(['type' => $type, 'duration' => $i] + $where);
                                if ($getTrans->num_rows()) {
                                    foreach ($getTrans->result() as $row) {
                                        $feeAmount = $row->amount;
                                        $monthFee = $monthFee - $feeAmount;
                                        $this->ki_theme->checked()->disabled();
                                        $input = $this->ki_theme->tag_html("$i Month")->checkbox($i, $feeAmount, 'set-fee', '');
                                        $passArray = [
                                            'type' => $type,
                                            'month' => $month,
                                            'feeAmount' => $feeAmount,
                                            'input' => $input,
                                            'year' => $year,
                                            'id' => '',
                                            'class' => 'success',
                                            'bill' => 'Paid'
                                        ];
                                        echo $this->parser->parse_string($trTemplate, $passArray, true);
                                    }
                                }
                                if ($monthFee) {
                                    $feeAmount = $monthFee;
                                    $input = $this->ki_theme->tag_html("$i Month")->checkbox($i, $feeAmount, 'set-fee', '');
                                    $passArray = [
                                        'type' => $type,
                                        'month' => $month,
                                        'feeAmount' => $feeAmount,
                                        'input' => $input,
                                        'year' => $year,
                                        'id' => $trId,
                                        'class' => ( $perMonthfee + $margin) == $feeAmount ? '' : 'pending',
                                        'bill' => ( $perMonthfee + $margin) == $feeAmount ? '<i class="badge badge-danger">Unpaid</i>' : '<i class="badge badge-warning text-black">Waiting</i>'
                                    ];
                                    echo $this->parser->parse_string($trTemplate, $passArray, true);
                                }

                                if($calMonthNumber % 12 == 0)
                                    $year++;
                            }
                            /*
                            $trId = '';
                            ?>
                            <tr data-index="<?= $duration ?> <?= $duration_type ?>" id="<?= $trId ?>"
                                class="<?= empty($trId) ? 'success' : '' ?>" data-type="exam_fee">
                                <th colspan="2">
                                    <?php

                                    echo $this->ki_theme->tag_html('Exam Fees')->checkbox('exam_fee', $exam_fee, 'set-fee', '');
                                    ?>
                                </th>
                                <td>{exam_fee} {inr}</td>
                                <td></td>
                            </tr>
                            <?php
                            
                            */
                        } else {

                            $perMonthfee = floor($course_fees / (12 * $duration));
                            $monthNmber = 1;
                            for ($i = 1; $i <= $duration; $i++) {

                                echo '<tr>
                                        <th colspan="4" class="text-center bg-info text-capitalize">' . $i . ' ' . $duration_type . ' Fee</th>   
                                    </tr>';
                                for ($k = 1; $k <= 12; $k++) {
                                    $type = $i . '_' . $duration_type;
                                    
                                    $calMonthNumber = $monthNum + ($k - 1);
                                    $month = get_month($calMonthNumber);
                                    
                                    $monthFee = $perMonthfee;
                                    $margin = 0;
                                    if($k == 12){
                                        $tempCourseFee = $course_fees / 2;
                                        $margin = $tempCourseFee % 12;
                                        $monthFee += $margin;
                                    }
                                    $theme = 1;
                                    $getTrans = $this->student_model->get_fee_transcations(['type' => $type, 'duration' => $k] + $where);
                                    if ($getTrans->num_rows()) {
                                        foreach ($getTrans->result() as $row) {
                                            $feeAmount = $row->amount;
                                            $monthFee = $monthFee - $feeAmount;
                                            $this->ki_theme->checked()->disabled();
                                            $input = $this->ki_theme->tag_html("$k Month")->checkbox($monthNmber, $feeAmount, 'set-fee', '');
                                            $passArray = [
                                                'type' => $type,
                                                'month' => $month,
                                                'feeAmount' => $feeAmount,
                                                'input' => $input,
                                                'year' => $year,
                                                'id' => '',
                                                'class' => 'success',
                                                'bill' => 'Paid'
                                            ];
                                            echo $this->parser->parse_string($trTemplate, $passArray, true);
                                        }
                                    }
                                    if ($monthFee) {
                                        $feeAmount = $monthFee;
                                        $input = $this->ki_theme->tag_html("$k Month")->checkbox($monthNmber, $feeAmount, 'set-fee', '');
                                        $passArray = [
                                            'type' => $type,
                                            'month' => $month,
                                            'feeAmount' => $feeAmount,
                                            'input' => $input,
                                            'year' => $year,
                                            'id' => $trId,
                                            'class' => ( $perMonthfee + $margin) == $feeAmount ? '' : 'pending',
                                            'bill' => ( $perMonthfee + $margin) == $feeAmount ? '<i class="badge badge-danger">Unpaid</i>' : '<i class="badge badge-warning text-black">Waiting</i>'
                                        ];
                                        
                                        echo $this->parser->parse_string($trTemplate, $passArray, true);
                                    }
                                    $monthNmber++;
                                    if($calMonthNumber % 12 == 0)
                                        $year++;
                                }

/*
                                $trId = '';
                                ?>
                                <tr data-index="<?= ordinal_number($i) ?> <?= $duration_type ?>" id="<?= $trId ?>"
                                    class="<?= empty($trId) ? 'success' : '' ?>" data-type="exam_fee">
                                    <th colspan="2">
                                        <?php

                                        echo $this->ki_theme->tag_html('Exam Fees')->checkbox('exam_fee', $exam_fee, 'set-fee', '');
                                        ?>
                                    </th>
                                    <td>{exam_fee} {inr}</td>
                                    <td></td>
                                </tr>
                                <?php
                                
                                */
                                
                            }
                        }


                        echo '<input type="hidden" class="per-month-fee" value="' . $perMonthfee . '">';

                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-7">
        <form action="" id="my-fee-form">
            <!-- <input type="hidden" name="course_duration" value="{duration}">
                    <input type="hidden" name="course_duration_type" value="{duration_type}"> -->
            <input type="hidden" name="student_id" value="{student_id}">
            <input type="hidden" name="roll_no" value="{roll_no}">
            <input type="hidden" name="course_id" value="{course_id}">
            <input type="hidden" name="center_id" value="{institute_id}">
            <div class="card border-danger myfee" id="myfee-form" data-kt-sticky="true"
                data-kt-sticky-name="docs-sticky-summary" data-kt-sticky-offset="{default: false, xl: '200px'}"
                data-kt-sticky-reverse="true" data-kt-sticky-width="{lg: '250px', xl: '600px'}"
                data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false"
                data-kt-sticky-zindex="95">
                <div class="card-header bg-danger">
                    <h3 class="card-title ">Select Student Fee</h3>
                    <div class="card-toolbar">
                        
                    </div>
                </div>
                <div class="card-body">
                    <table class="temp-list table table-striped table-bordered border-warning">
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total Amount</th>
                                <td class="fw-bold" colspan="2"> <span class="ttl-amount">0</span> {inr}</td>
                            </tr>

                            <tr>
                                <th colspan="2">Total Discount</th>
                                <td class="fw-bold" colspan="2"> <span class="ttl-discount">0</span> {inr} <lbael
                                        class="badge badge-light-success">Discount</lbael>
                                </td>
                            </tr>

                            <tr>
                                <th colspan="2">Total Payable Amount</th>
                                <td class="fw-bold" colspan="2"> <span class="ttl-payable">0</span> {inr}</td>
                            </tr>
                            <tr>
                                <th colspan="2">Payment Date</th>
                                <td colspan="2"><input class="form-control current-date" name="payment_date"
                                        value="{current_date}">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">Payment Type</th>
                                <td colspan="2">
                                    <select name="payment_type" class="form-control" data-control="select2" id="">
                                        <option value="cash" selected>Cash</option>
                                        <option value="cheque">Cheque</option>
                                        <option value="upi">UPI</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">Payment Description</th>
                                <td colspan="2">
                                    <textarea name="description" rows="3" class="form-control"
                                        placeholder="Description"></textarea>
                                </td>
                            </tr>
                            <tr class="bg-warning p-1 fs-1 fw-bold">
                                <th colspan="4" class="text-center text-black "><i
                                        class="ki-outline ki-information  fs-1 text-black fw-bold"></i>
                                    Student Details</th>
                            </tr>
                            <?php
                            $submissionfees = $this->student_model->get_fee_transcations_ttl($where)
                                ?>
                            <tr>
                                <th colspan="2">Total Submitted Fee</th>
                                <td>
                                    <?= $submissionfees['ttl_fee'] ?> {inr}
                                </td>
                                <td class="w-50px" rowspan="2">
                                    <a href="{base_url}student/profile/{student_id}/fee-record"
                                        class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i> Records
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <th colspan="2">Total Discount Fee</th>
                                <td colspan="1">
                                    <?= $submissionfees['ttl_discount'] ?> {inr}

                                </td>
                            </tr>
                            <tr>
                                <th>Roll No. With Name</th>
                                <td><label class="badge badge-info">{roll_no}</label></td>
                                <td class="text-capitalize" colspan="2"> <b>{student_name}</b> </td>
                            </tr>
                            <tr>
                                <th colspan="2">Center Name</th>
                                <td class="text-capitalize" colspan="2"><b>{center_name}</b></td>
                            </tr>
                            <tr>
                                <th colspan="2">Time Table</th>
                                <td class="text-capitalize" colspan="2"><b>{batch_name}</b></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="form-group">
                        <!-- <label for="fee" class="form-label mb-4">Enter Amount</label> -->
                        <input type="hidden" class="form-control enter-fee" placeholder="Enter Amount">
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
</div>