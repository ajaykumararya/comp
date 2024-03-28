<?php
class Payment extends MY_Controller
{
    function student_payment_setting()
    {
        $this->view('student-payment-setting');
    }
    function center_payment_setting()
    {
        $this->view('center-payment-setting');
    }
}
