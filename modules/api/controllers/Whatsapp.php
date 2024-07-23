<?php
class Whatsapp extends Api_Controller{
    public $data = [];
    function __construct(){
        parent :: __construct();
        $this->data = $this->load->config('whatsapp',true);
       

    }
    function set_type($type){
        $this->data['type'] = $type;
        return $this;
    }
    function send($number,$message){
        // $this->response($this->data);
        // $number = '918533898539';
        // $message = "Our OTP For Online Password Reset is 765678 Which is valid for 5 min from now. Do not disclose OTP. ZCC COMPUTER EDUCATION CENTRE";
        $this->data['number'] = $number;
        $this->data['message'] = $message;
        return $this->curl->_simple_call('POST','https://chatbotking.in/api/send',$this->data);
        // $this->response(json_decode($res,true));
        /*
        https://chatbotking.in/api/send?number=84933313xxx&type=text&message=test+message&instance_id=668FD0F2CDAAF&access_token=668fd09ca441d
        */
    }
}