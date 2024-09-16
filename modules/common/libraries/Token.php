<?php
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
class Token
{
    public $jwt_key;
    private $data = [];
    private $decodeData = [];
    function __construct()
    {
        $this->jwt_key = 'ARYAG85';
    }
    function withExpire($time = '+30 minutes')
    {
        $starttime = time();
        $endtime = strtotime($time, $starttime);
        $this->data['iat'] = $starttime;
        $this->data['exp'] = $endtime;
        return $this;
    }
    function expiredOn()
    {
        return date('d-m-Y h:i A', $this->decodeData->exp);
    }
    function encode($payload)
    {
        $this->data['data'] = $payload;
        return JWT::encode($this->data, $this->jwt_key, 'HS256');
    }
    function data($index = 0)
    {
        if (!isset($this->decodeData->data))
            throw new Exception('Decode Data Not Found.');
        $data = (array) $this->decodeData->data;
        if ($index)
            return isset($data[$index]) ? $data[$index] : '';
        return $data;

    }
    function decode($jwt)
    {
        $this->decodeData = JWT::decode($jwt, new Key($this->jwt_key, 'HS256'));
        return (array) $this->decodeData->data;
    }
}