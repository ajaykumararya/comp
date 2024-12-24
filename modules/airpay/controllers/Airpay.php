<?php
class Airpay extends MY_Controller
{
    private $props;
    function __construct()
    {
        parent::__construct();
        $this->load->library('common/Checksum');
        $this->props = $this->load->config('config', true);
    }
    private function prop($index)
    {
        return $this->props[$index];
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
        if (isset($buyerPhone)) {

            $regex = '/^[0-9- ]{8,15}$/i';
            if (!preg_match($regex, $buyerPhone)) {
                $error[] = "Please enter valid phone number.";
            }
        }

        if (isset($buyerEmail) && !filter_var($buyerEmail, FILTER_VALIDATE_EMAIL) || (strlen($buyerEmail) > 50)) {
            $error[] = 'Please enter valid email.';
        }
        if (sizeof($error)) {
            $html = '';
            foreach ($error as $message)
                $html .= alert($message, 'danger');
            $this->session->set_flashdata('error', $html);
            return false;
        }

        return true;
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
                    'buyerEmail' => trim($data['email']),
                    'buyerPhone' => trim($data['contact_number']),
                    'buyerFirstName' => trim($data['name']),
                    'buyerLastName' => trim($data['name']),
                    'amount' => $this->amount($_POST['amount']),
                    'orderid' => uniqid(date('y'))
                ];
                $copy = $getwayData;
                unset($copy['buyerPhone']);
                // pre($getwayData);
                if ($this->_validation($getwayData)) {
                    // echo 'OK';
                    $alldata = implode($copy);
                    $username = $this->prop('username');
                    $password = $this->prop('password');
                    $secret = $this->prop('secret');
                    $privatekey = Checksum::encrypt($username . ":|:" . $password, $secret);
                    $keySha256 = Checksum::encryptSha256($username . "~:~" . $password);
                    $checksum = Checksum::calculateChecksumSha256($alldata . date('Y-m-d'), $keySha256);
                    // pre($checksum);
                    $this->send([
                        'privatekey' => $privatekey,
                        'checksum' => $checksum,
                        'hiddenmod' => '',
                        'mercid' => $this->prop('mercid'),
                        'orderid' => $getwayData['orderid'],
                        'postdata' => $getwayData
                    ]);
                } else
                    redirect('admin/wallet-load');
            }
        } else
            redirect('admin');
    }
    function send($data)
    {
        date_default_timezone_set('Asia/Kolkata');
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        // pre($data,true);
        $this->load->view('request-send',$data);
    }
    function wallet_response(){
        pre($_POST);
    }
}

?>