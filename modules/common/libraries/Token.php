<?php
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
class Token{
    public $jwt_key;
    function __construct(){
        $this->jwt_key = 'ARYAG85';
    }
    function encode($payload)
    {
        return JWT::encode($payload, $this->jwt_key,'HS256');
    }
    function decode($jwt)
    {
        try {
            return JWT::decode($jwt, new Key($this->jwt_key, 'HS256'));
        } catch (Exception $e) {
            return false;
        }
    }
}