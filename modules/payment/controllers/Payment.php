<?php
class Payment extends MY_Controller
{
    function student_payment_setting()
    {
        $this->view('student-payment-setting');
    }
    function center_payment_setting()
    {
        $this->view('center-payment-setting');
    }
    function payu_success()
    {
        $token = $this->decode($this->uri->segment(3, 0));
        $this->__init_session($token);
        $response = $this->input->post();
        $this->load->library('payu');
        $isValid = $this->payu->verifyResponseHash($response);

        if (!$isValid) {
            $this->session->set_flashdata('error', 'Hash mismatch. Invalid response.');
        } else {
            switch (strtolower($response['status'])) {
                case 'success':
                    $amount = $response['amount'];
                    $centre = $this->get_data('center_data');
                    $center_id = $token;
                    $opening_balance = $centre['wallet'] or 0;

                    $closing_balance = ($amount + $opening_balance);
                    $trans = [
                        'trans_for' => 'wallet_load',
                        'amount' => $response['amount'],
                        'payment_id' => PROJECT_RAND_NUM,
                        'order_id' => $response['mihpayid'],
                        'user_id' => $token,
                        'user_type' => 'center',
                        'payment_status' => 1,
                        'responseData' => json_encode($response)
                    ];
                    $this->db->insert('transactions', $trans);
                    $merchant_order_id = $this->db->insert_id();
                    $data = [
                        'center_id' => $center_id,
                        'amount' => $amount,
                        'o_balance' => $opening_balance,
                        'c_balance' => $closing_balance,
                        'type' => 'wallet_load',
                        'description' => 'online load',
                        'added_by' => 'self',
                        'order_id' => $trans['order_id'],
                        'status' => 1,
                        'wallet_status' => 'credit',
                        'type_id' => $merchant_order_id
                    ];
                    $this->db->insert('wallet_transcations', $data);
                    $this->center_model->update_wallet($center_id, $closing_balance);

                    $this->session->set_flashdata('success', 'Payment successful.');
                    break;
                case 'pending':
                    $this->session->set_flashdata('error', 'Payment is pending.');
                    break;
                default:
                    $this->session->set_flashdata('error', 'Payment failed.');
                    break;
            }

        }
        redirect(base_url('admin/wallet-load'));
    }
    function payu_failure()
    {
        $token = $this->decode($this->uri->segment(3, 0));
        $this->__init_session($token);
        $this->session->set_flashdata('error', $this->input->post('error_Message'));
        redirect(base_url('admin/wallet-load'));
    }

    function student_fee_success()
    {
        $token = ($this->uri->segment(3, 0));
        try {
            $this->token->decode($token);
            $student_id = $this->token->data('student_id');
            $this->session->set_userdata([
                'student_login' => true,
                'student_id' => $student_id
            ]);
            $this->load->library('payu');
            $response = $this->input->post();
            $isValid = $this->payu->verifyResponseHash($response);

            if (!$isValid) {
                throw new Exception('Hash mismatch. Invalid response.');
            } else {
                switch (strtolower($response['status'])) {
                    case 'success':
                        $amount = $response['amount'];

                        $data = [
                            'type' => $this->token->data('duration'),
                            'duration' => $this->token->data('duration'),
                            'type_key' => $this->token->data('type_key'),
                            'amount' => $this->token->data('amount'),
                            'discount' => 0,
                            'payable_amount' => $this->token->data('payable_amount'),
                            'description' => 'payment via online Payu',
                            'payment_type' => 'payu',
                            'late_fee' => $this->token->data('late_fee'),
                            'payment_id' => $response['mihpayid'],
                            'payment_date' => date('d-m-Y'),
                            'student_id' => $this->token->data('student_id'),
                            'course_id' => $this->token->decode('course_id'),
                            'roll_no' => $this->token->decode('roll_no'),
                            'center_id' => $this->token->decode('center_id')
                        ];
                        $this->db->insert('student_fee_transactions', $data);
                        $this->session->set_flashdata('success', 'Payment successful.');
                        break;
                    case 'pending':
                        throw new Exception('Payment is pending.');
                    default:
                        throw new Exception('Payment failed.');
                }

            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
        }

        redirect(base_url('student/profile/fee-emis'));
    }
    function student_fee_failure()
    {
        $token = ($this->uri->segment(3, 0));
        echo $token;
        try {
            $this->token->decode($token);
            $student_id = $this->token->data('student_id');
            $this->session->set_userdata([
                'student_login' => true,
                'student_id' => $student_id
            ]);
            throw new Exception($this->input->post('error_Message'));
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
        }

        redirect(base_url('student/profile/fee-emis'));
    }
}
