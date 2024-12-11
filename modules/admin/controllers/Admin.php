<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends MY_Controller
{
    function index()
    {
        if($this->center_model->isCenter()){
            // pre($this->public_data,true);
            if(isset($this->public_data['center_data']['valid_upto']) && isset($this->public_data['center_data']['certificate_issue_date'])){
                // pre($this->public_data['center_data'],true);
                $this->ki_theme->breadcrumb_action_html(
                    $this->ki_theme->set_attribute('target','_blank')->with_icon('tablet-text-down text-warning', 4)->with_pulse('warning')->outline_dashed_style('warning')->set_class('text-warning')->add_action('View Certificate', ('franchise-certificate/'.$this->encode($this->public_data['center_data']['id'])))
                );
            }
        }
        $this->view('index');
    }
    function switch_back()
    {
        if ($this->session->has_userdata('admin_login')) {
            $this->session->unset_userdata('main_id');
            $this->session->unset_userdata('temp_login');
            $newData = [
                'admin_id' => $this->session->userdata('main_id'),
                'admin_type' => 'admin'
            ];
            $this->session->set_userdata($newData);
            redirect('admin');
        } else {
            redirect('admin');
        }
    }
    function change_password()
    {
        $this->view('change-password', ['isValid' => true]);
    }
    function sign_out()
    {
        // $this->view('change-password',['isValid' => true]);
        $this->session->sess_destroy();
        redirect('admin');
    }
    function profile()
    {
        $row = $this->center_model->get_verified([
            'id' => $this->center_model->loginId()
        ])->row_array() ?? [];
        $row['isValid'] = true;
        $this->view('profile', $row);
    }
    function wallet_history()
    {
        $this->view('wallet-history', ['isValid' => true]);
    }
    function wallet_load()
    {
        // $this->load->module('razorpay');
        // $order = $this->razorpay->fetchOrder('order_Ox2Pf0s7PibuEo');
        // pre($order,true);
        $this->load->module('razorpay');
        $this->view('wallet-load',['isValid' => true]);

        /*
        try {
            $res = $this->razorpay->fetchOrder('order_Ox2Pf0s7PibuEo');
            pre($res);
        } catch (Exception $r) {
            echo $r->getMessage();
        }*/
    }
    function manage_role_category()
    {
        $this->view('manage-role-category');
    }
    function manage_role_account(){
        $this->view('manage-role-account');
    }
    function test()
    {
        echo $this->ki_theme->wallet_balance();
    }

}
