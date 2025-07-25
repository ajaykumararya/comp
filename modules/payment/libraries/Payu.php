<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payu
{
    private $merchant_key;
    private $salt;
    private $payu_base_url;

    public function __construct($config = [])
    {
        if(!defined('PAYU_KEY_ID') || !defined('PAYU_KEY_SECRET'))
            throw new Exception('Please Configure Payu API details');
        $this->merchant_key = defined('PAYU_KEY_ID') ? PAYU_KEY_ID : $config['merchant_key'];
        $this->salt = defined('PAYU_KEY_SECRET') ? PAYU_KEY_SECRET : $config['salt'];
        $this->payu_base_url = $config['payu_base_url'] ?? 'https://secure.payu.in';
    }

    public function generateTransactionID()
    {
        return substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    }

    public function generateHash($data = [])
    {
        $hashSequence = "{$this->merchant_key}|{$data['txnid']}|{$data['amount']}|{$data['productinfo']}|{$data['firstname']}|{$data['email']}|||||||||||{$this->salt}";
        return strtolower(hash('sha512', $hashSequence));
    }

    public function createPaymentData($data = [])
    {
        $txnid = $data['txnid'] ?? $this->generateTransactionID();
        $hash = $this->generateHash(array_merge($data, ['txnid' => $txnid]));

        return array_merge($data, [
            'key' => $this->merchant_key,
            'txnid' => $txnid,
            'hash' => $hash,
            'action' => $this->payu_base_url . '/_payment',
        ]);
    }

    public function verifyResponseHash($response = [])
    {
        $reverseKeyString = "{$this->salt}|{$response['status']}|||||||||||{$response['email']}|{$response['firstname']}|{$response['productinfo']}|{$response['amount']}|{$response['txnid']}|{$this->merchant_key}";
        $calcHash = strtolower(hash('sha512', $reverseKeyString));
        return $calcHash === $response['hash'];
    }
    
}
