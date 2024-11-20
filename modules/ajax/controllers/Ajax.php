<?php
class Ajax extends Ajax_Controller
{

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
            if (($row->status && $row->type == 'center') or in_array($row->type,['admin','co_ordinator','role_user'])) {
                if ($row->password == $password) {
                    $this->load->library('session');
                    $sessionData = [
                        'admin_login' => true,
                        'admin_type' => $row->type,
                        'admin_id' => $row->id
                    ];
                    if($row->type == 'role_user'){
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

    function add_role_category(){
        if($this->validation('add_role_category')){
            $perimissions = json_encode($_POST['permission']);
            $title = $_POST['title'];
            $this->db->insert('role_categories',[
                'role_category_title' => $title,
                'permissions' => $perimissions,
                'note' => $_POST['note']
            ]);
            $this->response('status',true);
        }
    }
    function list_role_categories(){
        $this->response('data',$this->db->get('role_categories')->result_array());
    }
    function list_role_users(){
        $this->response('data',$this->center_model->roleUsers()->result_array());
    }
    function delete_role_user($id){
        $this->response('status',$this->db->where('id',$id)->where('type','role_user')->delete('centers'));
    }
    function delete_role_cat($id){
        $chk = $this->db->where('role_id',$id)->get('centers')->num_rows();
        if($chk){
            $this->response('html',$chk.' account(s) are/is opened through it, either update its role or delete that account,then this category will be removed.');
        }
        else{
            $this->db->where('role_id',$id)->delete('role_categories');
            $this->response('status',true);
        }
    }
    function add_role_user(){
        if($this->validation('add_role_user')){
            $this->db->insert('centers',[
                'role_id'=>$_POST['role_id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => sha1($_POST['password']),
                'type' => 'role_user',
                'added_by' => $this->center_model->isAdmin() ? 'admin' : 'center',
                'added_by_id' => $this->center_model->loginId()
            ]);
            $this->response('status',true);
        }
    }
    function view_permissions(){
        $this->response('status',true);
        $titles = $this->ki_theme->createTitleArrayByType();
        $permissions =json_decode($_POST['permissions'],true);
        $html = '<table class="table">
            <tr>
                <th>#</th><th>Method</th>
            </tr>';
        $i = 1;
        foreach($permissions as $index){
            $html .= '<tr>
                <td>'.$i++.'.</td>
                <td>'.($titles[$index]).'</td>
            </tr>';
        }
        
        $html .= '</table>';
        $this->response('html',$html);
    }
}