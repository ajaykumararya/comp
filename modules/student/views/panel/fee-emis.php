<?php
if (isset($fee_emi) && $fee_emi && $this->student_model->isStudent()) {
    $where = [
        'student_id' => $student_id,
        'course_id' => $course_id,
        'roll_no' => $roll_no,
        'center_id' => $institute_id
    ];
    $Html = '';
    $isEmis = true;
    $nextEMIs = '';
    $firstEMIs = '';
    $emiCount = 0;
    $paidEMIs = 0;
    $lastHistory = '';
    $perMonthFee = round($course_fees / $fee_emi);
    $emi_date = '01-' . date('m-Y', strtotime($admission_date));
    $date = DateTime::createFromFormat('d-m-Y', $emi_date);
    $currentDate = DateTime::createFromFormat('d-m-Y', date('d-m-Y'));
    $Html = '<table class="table tables-striped table-bordered">
            <thead>
                <tr>
                    <th>#.</th>
                    <th>Emi Date</th>
                    <th>Payment Date</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Receipt / Pay Now</th>
                </tr>
            </thead>
            <body>';
    for ($i = 1; $i <= $fee_emi; $i++) {
        $check = $this->student_model->get_fee_transcations(['duration' => $i, 'type_key' => 'course_fees'] + $where);
        $emiDate = $date->format('d-m-Y');
        
        $interval = $date->diff($currentDate);
        $penalty = false;
        if ($date < $currentDate) {
            $isPenalty = $penalty = $interval->days;
        }
        $date->modify('+1 month');
        if ($check->num_rows()) {
            $paidEMIs++;
            $checkRow = $check->row();
            $lastHistory = '<div class="overflow-auto pb-5 mb-2">
                            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                                <i class="ki-duotone ki-bank ' . (empty($checkRow->description) ? 'fs-2tx' : 'fs-5tx') . ' text-primary me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>

                                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                    <div class="mb-3 mb-md-0 fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Last Transaction of ' . ordinal_number($i) . ' Month EMI on ' . $checkRow->payment_date . '!</h4>

                                        <div class="fs-6 text-gray-700 pe-7">Amount : ' . $checkRow->amount . ' {inr}, Discount : ' . $checkRow->discount . ' {inr}, Paid Amount ' . $checkRow->payable_amount . ' {inr} </div>
                                        <div class="fs-3 text-success">Note : ' . $checkRow->description . '</div>
                                        </div>

                                    <!--a href="#" class="btn btn-primary px-6 align-self-center text-nowrap"> Proceed</a --->
                                </div>
                            </div>                
                        </div>';
            $Html .= '<tr>
                    <td>' . ordinal_number($i) . ' Month EMI</td>
                    <td>' . $emiDate . '</td>
                    <td>'.$checkRow->payment_date.'</td>
                    <td>' . $checkRow->payable_amount . ' {inr}</td>
                    <td>' . $checkRow->description . '</td>
                    <td>Done</td>
                </tr>';
        } else {
            
            $Html .= '<tr>
            <td>' . ordinal_number($i) . ' Month EMI</td>
            <td>' . $emiDate . '</td>
            <td></td>
            ';
            if($penalty && $penalty > 10){
                $Html.= '<td>'.($perMonthFee + 100).'{inr} </td> 
                    <td>'.label('Included Penality Fee: 100 {inr}','danger').'</td>';
            }
            else{
                $Html.= '<td>'.$perMonthFee .'{inr}</td><td>';
                if($penalty < 10 && $penalty){
                    $Html .= label('Penalty will be imposed in '.$penalty.' days','warning');
                } 
                $Html .= '</td>';
            }
            
            $Html .='
            <td>';
            if (strtotime($emiDate) <= strtotime(date('01-m-Y'))) {
                $myToken = $this->token->encode($where + [
                    'duration' => $i,
                    'type_key' => 'course_fees',
                    'late_fee' => ($penalty && $penalty > 10) ? 100 : 0,
                    'amount' => $perMonthFee,
                    'payable_amount' => $perMonthFee + ($penalty && $penalty > 10) ? 100 : 0,
                ]);
                $Html .= '<button class="btn btn-primary btn-xs btn-sm paynow-emi" data-token="'.$myToken.'">Pay Now</button>';
            }
            $Html .= '</td>
        </tr>';
            /*
            pre([
                'type' => 'course_fees',
                'title' => ordinal_number($i) . ' Month EMI',
                'fee' => $perMonthFee,
                'current_Date' => date('01-m-Y'),
                'date' => $emiDate,
                'index' => $i,
                'penalty' => $penalty > 10,
                'added' => 0,
                'record' => ''
            ]);
            */
            $Html .= '<tr>
            
            
            </tr>';
        }
    }
    $Html .= '
            </body>
        </table>';
    echo '<div class="card mb-2"><div class="card-body">';
    echo $lastHistory . "\n\n" . $Html;
    echo '</div></div>';
}

?>