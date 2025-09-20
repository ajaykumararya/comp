<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ebook_cart 
{
    private $cart_key = 'ebook_cart';
    private $CI;
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
    }


    public function add_to_cart($data)
    {
        $cart_data = $this->CI->session->userdata($this->cart_key) ?: [];

        // Check if item already exists
        foreach ($cart_data as $item) {
            if ($item['id'] == $data['id']) {
                return false; // Item already in cart
            }
        }

        // Add new item
        $cart_data[] = $data;
        $this->CI->session->set_userdata($this->cart_key, $cart_data);
        return true;
    }

    public function get_cart()
    {
        return $this->CI->session->userdata($this->cart_key) ?: [];
    }
    function count(){
        return count($this->get_cart());
    }

    public function remove_from_cart($id)
    {
        $cart = $this->CI->session->userdata($this->cart_key) ?: [];

        foreach ($cart as $index => $item) {
            if ($item['id'] == $id) {
                unset($cart[$index]);
                break;
            }
        }

        $this->CI->session->set_userdata($this->cart_key, $cart);
    }

    public function clear_cart()
    {
        $this->CI->session->unset_userdata($this->cart_key);
    }

    public function item_exists($id)
    {
        $cart = $this->CI->session->userdata($this->cart_key) ?: [];

        foreach ($cart as $item) {
            if ($item['id'] == $id) {
                return true; // Item found
            }
        }
        return false; // Item not found
    }
}
