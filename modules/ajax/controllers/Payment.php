<?php
class Payment extends Ajax_Controller
{
    function student_payment_setting()
    {
        $this->response('data', $this->student_model->fix_payment_settings([
            'onlyFor' => $this->post('type')
        ],true)->result());
    }
    function save_student_payment_setting()
    {
        // $this->response('data',$this->post());
        foreach ($this->post('amount') as $id => $amount) {
            $this->db->where('id', $id)->update('student_fix_payment', [
                'amount' => $amount,
                'status' => isset($_POST['status'][$id]) ? 1 : 0
            ]);
        }
        $this->response('status', true);
        $this->response('html', 'Student Fix Payment Update Successfully..');
    }
    function collect_fee()
    {
        $data = [];
        $paymentId = time();
        if (sizeof($this->post('amountData'))) {
            $this->response('status', true);
            foreach ($this->post('amountData') as $amountDetails) {
                $data[] = [
                    'student_id' => $this->post('student_id'),
                    'roll_no' => $this->post('roll_no'),
                    'course_id' => $this->post('course_id'),
                    'center_id' => $this->post('center_id'),
                    'payment_id' => $amountDetails['type'] == 'admission_fee' ? time() - 651 : $paymentId,
                    'amount' => $amountDetails['amount'],
                    'duration' => $amountDetails['duration'],
                    'type' => $amountDetails['type'],
                    'payment_date' => $this->post('payment_date'),
                    'added_by' => $this->ki_theme->loginUser(),
                    'discount' => $amountDetails['discount'],
                    'payable_amount' => $amountDetails['amount'] - $amountDetails['discount'],
                    'description' => $this->post("description"),
                    'payment_type' => $this->post('payment_type')
                ];
            }
            $this->db->insert_batch('student_fee_transactions', $data);
        }
        // $this->response($data);
    }
    function student_fee_structure()
    {
        // sleep(4);
        // $this->set_data('student', $this->student_model->)
        $admissionFee = $this->student_model->fix_payment_settings('admission_fees')->row('amount');
        $exam_fee = $this->student_model->fix_payment_settings('exam_fee')->row('amount');
        $this->set_data('admission_fee', $admissionFee);
        $this->set_data('exam_fee', $exam_fee);
        $this->set_data($this->post());
        $this->set_data($this->student_model->get_student_via_id($this->post('student_id'))->row_array());
        $this->response('status', true);
        $this->response('html', $this->template('student-fees-structure'));
    }


    ///RAZORPAY GETWAY
    function create_razorpay_order_for_center_wallet(){
        return 2.5;
    }
    //END RAZORPAY GETWAY
}
