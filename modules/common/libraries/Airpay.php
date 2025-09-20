<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airpay
{
    private $merchantKey;
    private $username;
    private $password;
    private $secretKey;

    // Constructor to initialize Airpay credentials
    public function __construct($params = [])
    {
        // Load configuration
        $this->merchantKey = $params['merchant_key'] ?? '';
        $this->username    = $params['username'] ?? '';
        $this->password    = $params['password'] ?? '';
        $this->secretKey   = $params['secret_key'] ?? '';

        // Load CodeIgniter instance
        $this->CI =& get_instance();
    }

    /**
     * Generate Hash for API request
     * @param array $params
     * @return string
     */
    private function generateHash($params)
    {
        ksort($params); // Sort params alphabetically
        $hashString = implode('|', array_values($params)) . '|' . $this->secretKey;
        // echo $hashString;
        return hash('sha256', $hashString);
    }

    /**
     * Initiate Payment
     * @param array $paymentData
     * @return array
     */
    public function initiatePayment($paymentData)
    {
        $defaultParams = [
            'merchant_key' => $this->merchantKey,
            'username'     => $this->username,
            'password'     => $this->password,
        ];

        $payload = array_merge($defaultParams, $paymentData);
        // pre($payload);
        // Generate hash and add to payload
        $payload['hash'] = $this->generateHash($payload);

        // API URL for initiating payment
        $url = 'https://payments.airpay.co.in/pay/index.php';

        // Make cURL request
        $response = $this->makeRequest($url, $payload);

        return $response;
    }

    /**
     * cURL Request Function
     * @param string $url
     * @param array $payload
     * @return array
     */
    private function makeRequest($url, $payload)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        // echo $error;
        pre($response);
        if ($error) {
            return ['error' => true, 'message' => $error];
        }

        return json_decode($response, true);
    }
}
