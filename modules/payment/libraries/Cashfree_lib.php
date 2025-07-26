<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cashfree_lib
{
    private $app_id;
    private $secret_key;
    private $api_url;

    public function __construct($params = [])
    {
        if (!defined('CASHFREE_KEY_ID') || !defined('CASHFREE_KEY_SECRET'))
            throw new Exception('Please Configure Payu API details');
        $this->app_id = defined('CASHFREE_KEY_ID') ? CASHFREE_KEY_ID : $params['app_id'];
        $this->secret_key = defined('CASHFREE_KEY_SECRET') ? CASHFREE_KEY_SECRET : $params['secret_key'];
        $this->api_url = $params['api_url'] ?? 'https://sandbox.cashfree.com/pg/orders';
    }
    public function create_order($order_id, $amount, $currency = 'INR', $customer = [],$return_url = 'payment/cashfree')
    {
        $payload = [
            "order_id" => $order_id,
            "order_amount" => $amount,
            "order_currency" => $currency,
            "customer_details" => [
                "customer_id" => $customer['id'] ?? "cust_" . time(),
                "customer_email" => $customer['email'] ?? "test@example.com",
                "customer_phone" => $customer['phone'] ?? "9999999999"
            ],
            "order_meta" => [
                "return_url" => base_url($return_url."?order_id={$order_id}"),
            ]
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "x-api-version: 2022-01-01",
                "x-client-id: {$this->app_id}",
                "x-client-secret: {$this->secret_key}"
            ),
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            return ['status' => 'ERROR', 'message' => $error];
        }

        return json_decode($response, true);
    }
}
