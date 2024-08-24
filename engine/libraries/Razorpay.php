<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\BadRequestError;
use Razorpay\Api\Errors\ServerError;
use Razorpay\Api\Errors\SignatureVerificationError;

class Razorpay
{

    protected $ci;
    protected $api;

    public function __construct()
    {
        // Get the CodeIgniter instance
        $this->ci =& get_instance();

        // Set your Razorpay API key and secret
        $key_id = $this->ci->ki_theme->config('razorpay_key');
        $key_secret = $this->ci->ki_theme->config('razorpay_secret');

        // Initialize Razorpay API
        $this->api = new Api($key_id, $key_secret);
    }

    /**
     * Create an order in Razorpay
     */
    public function create_order($receipt_id, $amount, $currency = 'INR')
    {
        try {
            $order = $this->api->order->create(array(
                'receipt' => $receipt_id,
                'amount' => $amount * 100, // Convert amount to paise
                'currency' => $currency
            ));
            return $order;
        } catch (BadRequestError $e) {
            // Handle bad request error
            log_message('error', 'Razorpay BadRequestError: ' . $e->getMessage());
            return false;
        } catch (ServerError $e) {
            // Handle server error
            log_message('error', 'Razorpay ServerError: ' . $e->getMessage());
            return false;
        } catch (Exception $e) {
            // Handle other exceptions
            log_message('error', 'Razorpay Exception: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Capture a payment
     */
    public function capture_payment($payment_id, $amount)
    {
        try {
            $payment = $this->api->payment->fetch($payment_id);
            $response = $payment->capture(array('amount' => $amount * 100));
            return $response;
        } catch (BadRequestError $e) {
            // Handle bad request error
            log_message('error', 'Razorpay BadRequestError: ' . $e->getMessage());
            return false;
        } catch (ServerError $e) {
            // Handle server error
            log_message('error', 'Razorpay ServerError: ' . $e->getMessage());
            return false;
        } catch (Exception $e) {
            // Handle other exceptions
            log_message('error', 'Razorpay Exception: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Fetch payment details
     */
    public function fetch_payment($payment_id)
    {
        try {
            $payment = $this->api->payment->fetch($payment_id);
            return $payment;
        } catch (BadRequestError $e) {
            // Handle bad request error
            log_message('error', 'Razorpay BadRequestError: ' . $e->getMessage());
            return false;
        } catch (ServerError $e) {
            // Handle server error
            log_message('error', 'Razorpay ServerError: ' . $e->getMessage());
            return false;
        } catch (Exception $e) {
            // Handle other exceptions
            log_message('error', 'Razorpay Exception: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Verify Razorpay signature
     */
    public function verify_signature($attributes)
    {
        try {
            $order_id = $attributes['razorpay_order_id'];
            $payment_id = $attributes['razorpay_payment_id'];
            $signature = $attributes['razorpay_signature'];

            $generated_signature = hash_hmac('sha256', $order_id . '|' . $payment_id, $this->api->getApiSecret());

            if ($generated_signature === $signature) {
                return true;
            } else {
                throw new SignatureVerificationError('Invalid signature passed.');
            }
        } catch (SignatureVerificationError $e) {
            // Handle signature verification error
            log_message('error', 'Razorpay SignatureVerificationError: ' . $e->getMessage());
            return false;
        } catch (Exception $e) {
            // Handle other exceptions
            log_message('error', 'Razorpay Exception: ' . $e->getMessage());
            return false;
        }
    }
}

