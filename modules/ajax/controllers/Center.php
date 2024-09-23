<?php
class Center extends Ajax_Controller
{
    function delete_docs()
    {
        if (file_exists('upload/' . $this->post('file')))
            @unlink('upload/' . $this->post('file'));
        $this->db->where('id', json_decode($this->post('id')))
            ->set($this->post('field'), null)
            ->update('centers');
        $this->response('status', true);
    }
    function add()
    {
        if ($this->form_validation->run('add_center')) {
            // $this->response($_FILES);
            $data = $this->post();
            $data['status'] = 1;
            if ($this->center_model->isCoordinator()) {
                $data['added_by'] = 'co_ordinator';
                $data['added_by_id'] = $this->center_model->loginId();
            } else
                $data['added_by'] = 'admin';
            $data['type'] = 'center';
            $email = $data['email_id'];
            unset($data['email_id']);
            $data['email'] = $email;
            $data['password'] = sha1($data['password']);

            ///upload docs
            $data['adhar'] = $this->file_up('adhar');
            // $data['adhar_back'] = $this->file_up('adhar_back');
            $data['image'] = $this->file_up('image');
            $data['agreement'] = $this->file_up('agreement');
            $data['address_proof'] = $this->file_up('address_proof');
            $data['signature'] = $this->file_up('signature');
            if (CHECK_PERMISSION('CENTRE_LOGO'))
                $data['logo'] = $this->file_up('logo');
            $this->response(
                'status',
                $this->db->insert('centers', $data)
            );
        } else
            $this->response('html', $this->errors());
    }
    function update()
    {
        $id = $this->post('id');
        if ($this->validation('update_center')) {
            $this->db->update('centers', $this->post(), ['id' => $id]);
            $this->response('status', true);
        }
    }
    function edit_rollno_prefix()
    {
        if ($this->validation('update_center_roll_no')) {
            $this->db->where('id', $this->post('id'))->update('centers', [
                'rollno_prefix' => $this->post("rollno_prefix")
            ]);
            $this->response("status", true);
        }

    }
    function get_short_profile($id = 0)
    {
        $id = $this->post('id');
        $get = $this->center_model->get_center($id);
        if ($get->num_rows()) {
            $row = $get->row();
            // pre($row,true);
            $this->set_data((array) $row);
            $this->set_data('image', base_url(($row->image ? UPLOAD . $row->image : DEFAULT_USER_ICON)));
            $this->response('profile_html', $this->template('custom-profile'));
            // $this->response('genral_html',$this->template('genral-details'));
            // sleep(4);
        }
    }
    function get_course_assign_form()
    {
        $this->get_short_profile();
        $get = $this->center_model->get_assign_courses($this->post("id"));
        $assignedCourses = [];
        if ($get->num_rows()) {
            $assignedCourses = $get->result_array();
        }
        $this->set_data('assignedCourses', $assignedCourses);
        $this->response('assignedCourses', $assignedCourses);
        $this->response('status', true);
        $this->set_data("all_courses", $this->db->where('status', '1')->where('isDeleted', '0')->get('course')->result_array());
        $this->response('html', $this->template('assign-course-center'));
    }
    function assign_course()
    {
        $where = $data = $this->post();
        if (isset($where['course_fee']))
            unset($where['course_fee']);
        if (isset($where['isDeleted']))
            unset($where['isDeleted']);
        $get = $this->db->where($where)->get('center_courses');
        $data = $this->post();
        $data['status'] = 1;
        if ($get->num_rows()) {
            $this->db->update('center_courses', $data, ['id' => $get->row('id')]);
        } else {
            if (!$data['isDeleted'])
                $this->db->insert('center_courses', $data);
        }
        $this->response('status', true);
    }
    private function coCondition()
    {
        if ($this->center_model->isCoordinator()) {
            $data = [];
            $data['added_by'] = 'co_ordinator';
            $data['added_by_id'] = $this->center_model->loginId();
            $this->db->where($data);
        }
    }
    function list()
    {
        $this->coCondition();
        $this->response('data', $this->db->where('type', 'center')->where('isPending', 0)->where('isDeleted', 0)->get('centers')->result());
    }
    function param_delete()
    {
        $this->response(
            'status',
            $this->db->where('id', $this->post('id'))->delete('centers')
        );
    }
    function deleted_list()
    {
        $this->coCondition();
        $this->response('data', $this->db->where('type', 'center')->where('isDeleted', 1)->get('centers')->result());
    }
    function pending_list()
    {
        $this->coCondition();
        $this->response('data', $this->db->where('type', 'center')->where('isPending', 1)->where('isDeleted', 0)->get('centers')->result());
    }
    function edit_form()
    {
        $get = $this->db->where('id', $this->post('id'))->get('centers');
        if ($get->num_rows()) {
            $this->response('url', 'center/update');
            $this->response('status', true);
            $this->response('form', $this->parse('center/edit-form', $get->row_array(), true));
        }
    }
    function update_pending_status()
    {
        $this->response(
            'status',
            $this->db->where('id', $this->post('id'))->update('centers', ['isPending' => 0])
        );
    }
    function update_password()
    {
        if ($this->validation('change_password') && !$this->isDemo()) {
            $this->db->update('centers', ['password' => sha1($this->post('password'))], [
                'id' => $this->post('center_id')
            ]);
            $this->response('status', true);
        }

    }

    function list_certificates()
    {
        $this->coCondition();
        $this->response(
            'data',
            $this->center_model->verified_centers()->result_array()
        );
    }
    function update_dates()
    {
        if ($this->validation('check_center_dates')) {
            $this->response(
                'status',
                $this->db->where('id', $this->post('id'))->update('centers', [
                    'valid_upto' => $this->post('valid_upto'),
                    'certificate_issue_date' => $this->post('certificate_issue_date')
                ])
            );
        }
    }

    function set_centre_wise_fees()
    {
        if (CHECK_PERMISSION('CENTRE_WISE_WALLET_SYSTEM')) {
            $fields = $this->db->list_fields('center_fees');
            // unset($fields['id'],$fields['center_id']);
            $data = [];
            foreach ($fields as $field) {
                if (!in_array($field, ['id', 'center_id']))
                    $data[$field] = (isset($_POST[$field])) ? $_POST[$field . "_amount"] : null;
            }
            $center_id = $this->post('center_id');
            $get = $this->db->get_where('center_fees', ['center_id' => $center_id]);
            if ($get->num_rows()) {
                $this->db->where('id', $get->row('id'))->update('center_fees', $data);
            } else
                $this->db->insert('center_fees', $data + ['center_id' => $center_id]);
            $this->response('status', true);
        } else
            $this->response('html', 'Permission Denied.');
    }
    function wallet_history()
    {
        $data = [];
        $list = $this->center_model->wallet_history();
        if ($list->num_rows()) {
            foreach ($list->result() as $row) {
                $tempData = [
                    'date' => $row->date,
                    'amount' => $row->amount,
                    'type' => $row->type,
                    'description' => $row->description,
                    'status' => $row->wallet_status,
                    'url' => 0
                ];
                if ($row->type_id && $row->type != 'wallet_load') {
                    switch ($row->type) {
                        case 'admission':
                            $student = $this->student_model->get_all_student([
                                'id' => $row->type_id
                            ]);
                            $tempData['student_name'] = @$student[0]->student_name . ' ' . label('Admission');
                            $tempData['url'] = base_url('student/profile/' . $row->type_id);
                            break;
                        case 'marksheet':
                            $marksheet = $this->student_model->marksheet(['id' => $row->type_id]);
                            $student = '';
                            if ($marksheet->num_rows()) {
                                $drow = $marksheet->row();
                                $tempData['url'] = base_url('marksheet/' . $this->encode($row->type_id));

                                $student = $drow->student_name . ' ' . label(humnize_duration_with_ordinal($drow->marksheet_duration, $drow->duration_type) . ' Marksheet');
                            }
                            $tempData['student_name'] = $student;
                            break;
                        case 'certificate':
                            $student_certificates = $this->student_model->student_certificates([
                                'id' => $row->type_id
                            ]);
                            $tempData['url'] = base_url('certificate/' . $this->encode(($row->type_id)));
                            $tempData['student_name'] = $student_certificates->row('student_name') . ' ' . label('Certificate');
                            break;
                    }
                } else
                    $tempData['student_name'] = label(ucfirst(str_replace('_', ' ', $row->type)));

                $data[] = $tempData;
            }
        }
        $this->response('data', $data);
    }
    function wallet_load()
    {
        $center_id = $this->center_model->loginId();

        $amount = $this->post('amount');

        $data = [
            'amount' => $amount * 100,
            'receipt' => PROJECT_RAND_NUM,
            'currency' => 'INR',
            'notes' => [
                'center_id' => $this->center_model->loginId(),
                'message' => $this->post('note')
            ]
        ];
        $this->load->module('razorpay');
        try {
            $order_id = $this->razorpay->create_order($data);
            // $order_id = $order['id'];
            // pre($data);
            $trans = [
                'trans_for' => 'wallet_load',
                'amount' => $amount,
                'payment_id' => PROJECT_RAND_NUM,
                'order_id' => $order_id,
                'user_id' => $center_id,
                'user_type' => 'center'
            ];
            $this->db->insert('transactions', $trans);
            $trans_id = $this->db->insert_id();
            $this->response('data', $trans);


            // $order_id = "order_Ox2Pf0s7PibuEo";
            // $payment_id = "942SEWAEDU938";
            // $trans_id = 2;

            $data = [
                'key' => RAZORPAY_KEY_ID,
                'amount' => $amount * 100,
                'name' => ES('title'),
                'description' => 'Computer Institute',
                'image' => logo(),
                'prefill' => [
                    'name' => $this->get_data('owner_name'),
                    'email' => $this->get_data('owner_email'),
                    'contact' => $this->get_data('owner_phone')
                ],
                'notes' => [
                    'merchant_order_id' => $trans_id,
                    'center_id' => $center_id
                ],
                'order_id' => $order_id
            ];
            $this->response('status', true);
            $this->response('option', $data);
        } catch (Exception $e) {
            $this->response('error', $e->getMessage());
        }
    }
    function wallet_update()
    {
        $post = $this->post();

        $razorpay_payment_id = $post['razorpay_payment_id'];
        $razorpay_order_id = $post['razorpay_order_id'];
        $razorpay_signature = $post['razorpay_signature'];
        $merchant_order_id = $post['merchant_order_id'];
        $this->load->module('razorpay');

        try {

            $get = $this->db->where(['id' => $merchant_order_id, 'payment_status' => 1])->get('transactions');
            if ($get->num_rows()) {
                throw new Exception('Payment has already been updated');
            }

            $verifyPayment = true;//$this->razorpay->verifyPayment($razorpay_payment_id, $razorpay_order_id, $razorpay_signature);
            if ($verifyPayment) {
                $status = $this->razorpay->fetchOrderStatus($razorpay_order_id);
                if ($status) {
                    $amount = $post['amount'];
                    $centre = $this->get_data('center_data');
                    $center_id = $centre['id'];
                    $opening_balance = $centre['wallet'] or 0;

                    $closing_balance = ($amount + $opening_balance);
                    $data = [
                        'center_id' => $center_id,
                        'amount' => $amount,
                        'o_balance' => $opening_balance,
                        'c_balance' => $closing_balance,
                        'type' => 'wallet_load',
                        'description' => 'online load',
                        'added_by' => 'self',
                        'order_id' => $razorpay_order_id,
                        'status' => 1,
                        'wallet_status' => 'credit',
                        'type_id' => $merchant_order_id
                    ];
                    $this->response('data', $data);
                    $this->db->insert('wallet_transcations', $data);
                    $this->center_model->update_wallet($center_id, $closing_balance);
                    $this->db->update('transactions', [
                        'payment_status' => 1,
                        'responseData' => json_encode([
                                    'razorpay_payment_id' => $razorpay_payment_id,
                                    'razorpay_order_id' => $razorpay_order_id,
                                    'razorpay_signature' => $razorpay_signature
                                ])
                    ], ['id' => $merchant_order_id]);
                    $this->response('status', true);
                }

            }
        } catch (Exception $e) {
            $this->response('status', false);
            $this->response('error', $e->getMessage());
        }
    }
    function old_transaction()
    {
        $get = $this->db->where($this->post())->get('transactions');
        if ($get->num_rows()) {
            $this->response('status', true);
            $row = $get->row();
            $this->load->module('razorpay');
            $status = $this->razorpay->fetchOrder($row->order_id, 'status');
            if ($status == 'paid' or $status == 'captured') {
                $amount = $row->amount;
                $razorpay_order_id = $row->order_id;
                // $this->response('order_status',$status);
                $centre = $this->get_data('center_data');
                $center_id = $centre['id'];
                $opening_balance = $centre['wallet'] or 0;

                $closing_balance = ($amount + $opening_balance);
                $data = [
                    'center_id' => $center_id,
                    'amount' => $amount,
                    'o_balance' => $opening_balance,
                    'c_balance' => $closing_balance,
                    'type' => 'wallet_load',
                    'description' => 'online load',
                    'added_by' => 'self',
                    'order_id' => $razorpay_order_id,
                    'status' => 1,
                    'wallet_status' => 'credit',
                    'type_id' => $row->id
                ];
                $this->db->insert('wallet_transcations', $data);
                $this->center_model->update_wallet($center_id, $closing_balance);
                $this->db->update('transactions', [
                    'payment_status' => 1
                ], ['id' => $row->id]);
                $this->response('status', true);
            } else {
                $data = [
                    'key' => RAZORPAY_KEY_ID,
                    'amount' => $row->amount * 100,
                    'name' => ES('title'),
                    'description' => 'Computer Institute',
                    'image' => logo(),
                    'prefill' => [
                            'name' => $this->get_data('owner_name'),
                            'email' => $this->get_data('owner_email'),
                            'contact' => $this->get_data('owner_phone')
                        ],
                    'notes' => [
                        'merchant_order_id' => $row->id,
                        'center_id' => $this->get_data('owner_id')
                    ],
                    'order_id' => $row->order_id
                ];
                $this->response('status', true);
                $this->response('option', $data);
                $this->response('amount', $row->amount);
            }
        }
    }
    function get_student_record()
    {
        $year = $this->post('year');

        $this->db->select("MONTH(STR_TO_DATE(admission_date, '%d-%m-%Y')) AS month", FALSE);
        $this->db->select("COUNT(*) AS total_records");
        $this->db->from('students');
        $this->db->where('YEAR(STR_TO_DATE(admission_date, "%d-%m-%Y")) =', $year);
        $this->db->group_by("MONTH(STR_TO_DATE(admission_date, '%d-%m-%Y'))");
        // $this->db->order_by("MONTH(STR_TO_DATE(admission_date, '%d-%m-%Y'))", "ASC");
        if ($this->center_model->isCenter())
            $this->db->where('center_id', $this->center_model->loginId());
        $query = $this->db->get();
        $results = $query->result();
        $monthlyTotals = array_fill(1, 12, 0);

        // Update the array with actual totals
        foreach ($results as $row) {
            $monthlyTotals[(int) ($row->month)] = (int) $row->total_records;
        }
        $this->response('status', true);

        $this->response('data', $monthlyTotals);
        // $this->isDemo();
    }
}