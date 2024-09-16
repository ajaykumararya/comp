<?php
use Razorpay\Api\Api;

class Razorpay extends MY_Controller
{
    private $itsME = false;
    private $api;
    function __construct()
    {
        parent::__construct();
        $this->itsME = (strtolower($this->router->fetch_class()) === strtolower(__CLASS__));

        $this->api = new Api(RAZORPAY_KEY_ID, RAZORPAY_KEY_SECRET);
    }

    function create_order($data = [])
    {
        $g = $this->api->order->create($data);
        return $g['id'];
        // $g = $this->api->order->create(array('receipt' => '123', 'amount' => 100, 'currency' => 'INR', 'notes' => array('key1' => 'value3', 'key2' => 'value2')));
        // return ($g['id']);
    }
    public function verifyPayment($razorpay_payment_id, $razorpay_order_id, $razorpay_signature)
    {
        // Validate the post parameters
        if (empty($razorpay_payment_id) || empty($razorpay_order_id) || empty($razorpay_signature)) {
            throw new Exception('Missing parameters.');
        }

        $attributes = array(
            'razorpay_order_id' => $razorpay_order_id,
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_signature' => $razorpay_signature
        );

        try {
            // Verify the signature
            $this->api->utility->verifyPaymentSignature($attributes);
            return true;
        } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
            throw new Exception('Payment signature verification failed.');
        }
    }
    function fetchOrder($order_id, $field = 'all')
    {
        $get = $this->api->order->fetch($order_id);
        // throw new Exception($get->status);
        return $get->{$field};
    }
    function fetchOrderStatus($order_id)
    {
        $get = $this->api->order->fetch($order_id);
        $status = $get->status;
        switch ($status) {
            case 'authorized':
                throw new Exception('The payment has been authorized but not yet captured.');
            case 'attempted':
                throw new Exception('The payment has been '.($get->attempts > 1 ? $get->attempts .' times ' :'').' attempted, But not Completed');
            case 'created':
                throw new Exception('The order has been created, but no payment has been made.');
            case 'paid':
            case 'captured':
                return true;
            default:
                throw new Exception('Invalid order status');
        }
    }
}