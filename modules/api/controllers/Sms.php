<?php
class Sms extends Api_Controller{
    function __construct(){
        parent :: __construct();
    }
    function send(){
    //    $demo = $this->curl->_simple_call('get','http://justgosms.com/http-tokenkeyapi.php',[
    //         'authentic-key' => '33337a6363656475636174696f6e3130301720516704',
    //         'senderid' => 'ZCCEDU',
    //         'route' => '1',
    //         'number' => '918533898539',
    //         'message' => "Our OTP For Online Password Reset is 765678 Which is valid for 5 min from now. Do not disclose OTP. ZCC COMPUTER EDUCATION CENTRE",
    //         'templateid' => '1707170246149685512'
    //     ]);
    //     pre($demo);
    
        $authentic_key = '33337a6363656475636174696f6e3130301720516704';
        $sender_id = 'ZCCEDU';
        $route = 18;
        $number = '918533898539';
        $message = "Our OTP For Online Password Reset is 765678 Which is valid for 5 min from now. Do not disclose OTP. ZCC COMPUTER EDUCATION CENTRE";
    
        $template_id = '1707170246149685512';

        $url = 'http://justgosms.com/http-tokenkeyapi.php';
        $params = array(
            'authentic-key' => $authentic_key,
            'senderid' => $sender_id,
            'route' => $route,
            'number' => $number,
            'message' => $message,
            'templateid' => $template_id
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));

        $response = curl_exec($curl);
        curl_close($curl);

        // Check the response
        if ($response === false) {
            echo 'Error sending SMS: ' . curl_error($curl);
        } else {
            echo 'SMS sent successfully!';
        }
    }
}

/*
http://justgosms.com/http-tokenkeyapi.php?authentic-key=33337a6363656475636174696f6e3130301720516704&senderid=ZCCEDU&route=1&number=918533898539&message=Our OTP For Online Password Reset is 765678 Which is valid for 5 min from now. Do not disclose OTP. ZCC COMPUTER EDUCATION CENTRE&templateid=1707170246149685512
http://justgosms.com/http-tokenkeyapi.php?authentic-key=33337a6363656475636174696f6e3130301720516704&senderid=ZCCEDU&route=1&number=918533898539&message=Our%20OTP%20for%20online%20password%20reset%20is%20099912%20which%20is%20valid%20for%205%20min%20from%20now.%20Do%20not%20disclose%20OTP.%20ZCC%20EDUCATION%20ASSOCIATION&templateid=1707170246149685512

*/