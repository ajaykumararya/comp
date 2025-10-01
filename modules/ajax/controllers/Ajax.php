<?php
class Ajax extends Ajax_Controller
{

    public function question_import()
    {
        // $json = file_get_contents('php://input');
        $questions = json_decode($this->input->post('data'), true);

        $responses = [];

        foreach ($questions as $index => $q) {
            $row_num = $index + 2;

            if (
                empty($q['question']) || empty($q['correct_ans']) ||
                !isset($q['option_a'], $q['option_b'], $q['option_c'], $q['option_d'], $q['exam_id'])
            ) {
                $responses[] = "<b class='text-danger'>❌ Row $row_num: Missing required fields.</b>";
                continue;
            }
            $options = ['option_a', 'option_b', 'option_c', 'option_d'];
            if (!in_array(strtolower($q['correct_ans']), $options)) {
                $responses[] = "<b class='text-danger'>❌ Row $row_num: Invalid correct_ans.</b>";
                continue;
            }
            $question = trim($q['question']);
            $exists = $this->db->get_where('exam_questions', [
                'question' => $question,
                'exam_id' => $q['exam_id']
            ])->num_rows();

            if ($exists > 0) {
                $responses[] = "<b class='text-warning'>⚠️ Row $row_num: Question already exists. Skipped.</b>";
                continue;
            }


            $this->db->insert('exam_questions', [
                'question' => $question,
                'exam_id' => $q['exam_id']
            ]);
            $insert_id = $this->db->insert_id();
            $answerList = [];
            foreach ($options as $option) {
                $answerList[] = [
                    'ques_id' => $insert_id,
                    'answer' => $q[$option],
                    'is_right' => $option == $q['correct_ans'] ? 1 : 0
                ];
            }
            if (count($answerList))
                $this->db->insert_batch('exam_ques_answers', $answerList);
            if ($insert_id) {
                $responses[] = "<b class='text-success'>✅ Row $row_num: Inserted successfully.</b>";
            } else {
                $responses[] = "<b class='text-danger'>❌ Row $row_num: Failed to insert.</b>";
            }
        }
        $this->response('html', implode('<br>', $responses));
        $this->response('status', true);
        $this->response('data', $questions);
    }
    function fetch_states()
    {
        $this->response([
            'status' => true,
            'data' => $this->db->order_by('STATE_NAME', 'ASC')->get('state')->result_array()
        ]);
    }
    function edit_state()
    {
        $this->response([
            'status' => $this->db->where('STATE_ID', $this->post('id'))->update('state', ['STATE_NAME' => $this->post('state_name')])
        ]);
    }
    function fetch_city()
    {
        $this->response([
            'status' => true,
            'data' => $this->db
                ->select('d.DISTRICT_NAME,d.DISTRICT_ID,s.STATE_NAME')
                ->from('district as d')
                ->join('state as s', 's.STATE_ID = d.STATE_ID')
                ->order_by('d.DISTRICT_NAME', 'ASC')
                ->get()->result_array()
        ]);
    }
    function edit_city()
    {
        $this->response([
            'status' => $this->db->where('DISTRICT_ID', $this->post('id'))->update('district', ['DISTRICT_NAME' => $this->post('district_name')])
        ]);
    }
    function change_password()
    {
        //f865b53623b121fd34ee5426c792e5c33af8c227
        try {
            $this->form_validation->set_rules('current_password', 'Current Password', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'required|matches[password]');
            if ($this->validation()) {
                $loginId = $this->center_model->loginId();
                $get = $this->db->select('password')->where('id', $loginId)->get('centers');
                if ($get->num_rows()) {
                    $row = $get->row();
                    $myPass = sha1($this->post('current_password'));
                    if ($myPass == $row->password) {
                        $this->db->where('id', $loginId)->update('centers', [
                            'password' => sha1($this->post('password'))
                        ]);
                        $this->session->sess_destroy();
                        $this->response('status', true);
                    } else
                        throw new Exception('Current Password is not matched.');
                } else
                    throw new Exception('');
            }
        } catch (Exception $e) {
            $this->response('html', $e->getMessage());
        }
    }
    function generate_link()
    {
        $allLinks = $this->ki_theme->project_config('open_links');
        if (isset($allLinks[$this->post('type')])) {
            $this->response('link', base_url($allLinks[$this->post('type')] . '/' . $this->encode($this->post('id'))));
            $this->response('status', true);
        }
        $this->response($this->post());
    }
    function register()
    {
        $this->db->insert('demo_query', $this->post());
        try {
            $this->set_data($this->post());
            $this->do_email('hyperprowebtech@gmail.com', 'New Demo Checklist', $this->template('email/demo-query'));
        } catch (Exception $e) {

        }
        $this->response('status', true);
        $this->response('html', 'Thankyou..');
    }
    function deleted()
    {
        $this->response(
            'status',
            $this->db->where($this->post('field'), $this->post('field_value'))->update($this->post('table_name'), [
                'isDeleted' => 1
            ])
        );
    }
    function undeleted()
    {
        $this->response(
            'status',
            $this->db->where($this->post('field'), $this->post('field_value'))->update($this->post('table_name'), [
                'isDeleted' => 0
            ])
        );
    }
    function admin_login()
    {
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        $table = $this->db->where('email', $email)->get('centers');
        if ($table->num_rows()) {

            $row = $table->row();
            if (($row->status && $row->type == 'center') or in_array($row->type, ['admin', 'co_ordinator', 'role_user'])) {
                if ($row->password == $password) {
                    $this->load->library('session');
                    $sessionData = [
                        'admin_login' => true,
                        'admin_type' => $row->type,
                        'admin_id' => $row->id
                    ];
                    if ($row->type == 'role_user') {
                        $sessionData['role_id'] = $row->role_id;
                    }
                    $this->session->set_userdata($sessionData);
                    $this->response('status', 1);
                } else
                    $this->response('error', alert('Sorry, the email or password is incorrect, please try again.', 'danger'));
            } else
                $this->response('error', alert('Your Account is In-active. Please Contact Your Admin', 'danger'));
        } else
            $this->response('error', alert('Sorry, this email  is not found..', 'danger'));
    }
    function delete_enquiry($id)
    {
        $this->response('status', $this->db->where('id', $id)->delete('contact_us_action'));
    }
    function upload_file()
    {
        if ($this->file_up('image'))
            $this->response('status', true);
    }

    function centre_wallet_load()
    {
        $post = $this->post();
        $closing_balance = ($post['amount'] + $post['closing_balance']);
        $data = [
            'center_id' => $post['centre_id'],
            'amount' => $post['amount'],
            'o_balance' => $post['closing_balance'],
            'c_balance' => $closing_balance,
            'type' => 'wallet_load',
            'description' => $post['description'],
            'added_by' => 'admin',
            'order_id' => strtolower(generateCouponCode(12)),
            'status' => 1,
            'wallet_status' => 'credit'
        ];
        $this->db->insert('wallet_transcations', $data);
        $this->center_model->update_wallet($post['centre_id'], $closing_balance);
        $this->response('status', true);
    }

    function add_role_category()
    {
        if ($this->validation('add_role_category')) {
            $perimissions = json_encode($_POST['permission']);
            $title = $_POST['title'];
            $this->db->insert('role_categories', [
                'role_category_title' => $title,
                'permissions' => $perimissions,
                'note' => $_POST['note']
            ]);
            $this->response('status', true);
        }
    }
    function list_role_categories()
    {
        $this->response('data', $this->db->get('role_categories')->result_array());
    }
    function list_role_users()
    {
        $this->response('data', $this->center_model->roleUsers()->result_array());
    }
    function delete_role_user($id)
    {
        $this->response('status', $this->db->where('id', $id)->where('type', 'role_user')->delete('centers'));
    }
    function delete_role_cat($id)
    {
        $chk = $this->db->where('role_id', $id)->get('centers')->num_rows();
        if ($chk) {
            $this->response('html', $chk . ' account(s) are/is opened through it, either update its role or delete that account,then this category will be removed.');
        } else {
            $this->db->where('role_id', $id)->delete('role_categories');
            $this->response('status', true);
        }
    }
    function add_role_user()
    {
        if ($this->validation('add_role_user')) {
            $this->db->insert('centers', [
                'role_id' => $_POST['role_id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => sha1($_POST['password']),
                'type' => 'role_user',
                'added_by' => $this->center_model->isAdmin() ? 'admin' : 'center',
                'added_by_id' => $this->center_model->loginId()
            ]);
            $this->response('status', true);
        }
    }
    function view_permissions()
    {
        $this->response('status', true);
        $titles = $this->ki_theme->createTitleArrayByType();
        $permissions = json_decode($_POST['permissions'], true);
        $html = '<table class="table">
            <tr>
                <th>#</th><th>Method</th>
            </tr>';
        $i = 1;
        foreach ($permissions as $index) {
            $html .= '<tr>
                <td>' . $i++ . '.</td>
                <td>' . ($titles[$index]) . '</td>
            </tr>';
        }

        $html .= '</table>';
        $this->response('html', $html);
    }
    function remove_setting()
    {
        $this->db->where($_POST['key_type'], $_POST['key'])->delete('settings');
        $this->response('status', true);
    }
}