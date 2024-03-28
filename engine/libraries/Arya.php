<?php
class Arya
{
    private $CI;
    private $key;
    private $api;
    function __construct()
    {
        // $this->CI = &get_instance();
        $this->key = '8533898539';
        $this->api = new \MrShan0\CryptoLib\CryptoLib();
    }
    function set_key($key)
    {
        $this->key = $key;
    }
    function encode($string)
    {
        return  str_replace('/', 'ARYA', $this->api->encryptPlainTextWithRandomIV($string, $this->key));
    }
    function decode($string)
    {
        $string = str_replace('ARYA', '/', $string);
        return $this->api->decryptCipherTextWithRandomIV($string, $this->key);
    }
}
?>
