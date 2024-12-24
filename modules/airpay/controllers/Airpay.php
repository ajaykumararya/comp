<?php
class Airpay extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->
    }
    private function _validation($getwayData)
    {
        $error = [];
        extract($getwayData);
        if (isset($amount)) {
            $regex = '/^[0-9]{1,6}\.[0-9]{2,2}$/';
            if ($amount == '' || $amount < 0 || !preg_match($regex, $amount))
                $error[] = 'Enter a Valid amount.';
        }
        if (
            (isset($buyerFirstName) && $buyerFirstName == '') or
            (isset($buyerFirstName) && $buyerFirstName == '')
        ) {
            $error[] = 'Name is required';
        }
        pre($error);
    }
    private function amount($cleanedAmount)
    {
        if (strpos($cleanedAmount, '.') === false)
            return number_format($cleanedAmount, 2, '.', '');
        else
            return number_format((float) $cleanedAmount, 2, '.', '');

    }
    function load_wallet_balance()
    {
        if ($this->center_model->isCenter()) {
            // pre($this->session->userdata());
            // pre($this->public_data['center_data']);
            if (isset($this->public_data['center_data'])) {
                $data = $this->public_data['center_data'];
                // pre($data);
                $getwayData = [
                    'buyerEmail' => $data['email'],
                    'buyerPhone' => $data['contact_number'],
                    'buyerFirstName' => $data['name'],
                    'buyerLastName' => $data['name'],
                    'orderid' => uniqid(date('y')),
                    'amount' => $this->amount($_POST['amount']),
                    'currency' => 356,
                    'isocurrency' => 'INR'
                ];
                // pre($getwayData);
                if ($this->_validation($getwayData)) {

                }
            }
        } else
            redirect('admin');
    }
}

?>