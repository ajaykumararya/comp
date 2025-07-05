<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends MY_Controller
{
    function manage_states()
    {
        $this->view('locations/manage-states');
    }
    function manage_city()
    {
        $this->view('locations/manage-city');
    }
    function upload_editor_file()
    {
        header("Content-Type: application/json");

        if (isset($_FILES['file']['name'])) {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                echo json_encode(['error' => $this->upload->display_errors()]);
            } else {
                $upload_data = $this->upload->data();
                $image_url = base_url('upload/' . $upload_data['file_name']);
                echo json_encode(['location' => $image_url]);
            }
        } else {
            echo json_encode(['error' => 'No file uploaded.']);
        }
    }
    function index()
    {
        if ($this->center_model->isCenter()) {
            // pre($this->public_data,true);
            if (isset($this->public_data['center_data']['valid_upto']) && isset($this->public_data['center_data']['certificate_issue_date'])) {
                // pre($this->public_data['center_data'],true);
                if (CHECK_PERMISSION('FRANCHISE_ID_CARD')) {
                    $this->ki_theme->breadcrumb_action_html(
                        $this->ki_theme->set_attribute('target', '_blank')->with_icon('tablet-text-down text-primary', 4)->with_pulse('primary')->outline_dashed_style('primary')->set_class('text-primary')->add_action('View ID Card', ('franchise-id-card/' . $this->encode($this->public_data['center_data']['id'])))
                    );
                }
                $this->ki_theme->breadcrumb_action_html(
                    $this->ki_theme->set_attribute('target', '_blank')->with_icon('tablet-text-down text-warning', 4)->with_pulse('warning')->outline_dashed_style('warning')->set_class('text-warning')->add_action('View Certificate', ('franchise-certificate/' . $this->encode($this->public_data['center_data']['id'])))
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
        $this->view('wallet-load', ['isValid' => true]);

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
    function manage_role_account()
    {
        $this->view('manage-role-account');
    }
    function test()
    {
        echo $this->ki_theme->wallet_balance();
    }

}
