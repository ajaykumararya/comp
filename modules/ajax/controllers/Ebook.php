<?php
class Ebook extends Ajax_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ebook/ebook_model');
        $this->load->library('ebook/ebook_cart');
    }
    function add_category()
    {
        $this->form_validation->set_rules("category_name", "Category", 'required|is_unique[ebook_category.category_name]');
        if ($this->validation()) {
            // $this->response('data',$this->post());
            $this->db->insert('ebook_category', $this->post());
            $this->response([
                'status' => true,
                'html' => 'Category Added Successfully..'
            ]);
        }
    }
    function edit_category()
    {
        $this->form_validation->set_rules('category_name', 'Category', 'required');
        if ($this->validation()) {
            // $this->response('data', $this->post());
            $this->db->where('id', $this->post('id'))->update('ebook_category', [
                'slug' => $this->post('slug'),
                'category_name' => $this->post('category_name')
            ]);
            $this->response([
                'status' => true,
                'html' => 'Category Updated Successfully..'
            ]);
        }
    }
    function delete_category($id)
    {
        $get = $this->db->where('category_id', $id)->get('ebook_project');
        if ($get->num_rows()) {
            $this->response([
                'status' => false,
                'html' => 'There are ' . $get->num_rows() . ' projects in this category, first delete them then the category will be deleted'
            ]);
        } else {
            $this->db->where('id', $id)->delete('ebook_category');
            $this->response('status', true);
            $this->response('html', 'Category Deleted Successfully..');
        }

    }
    function list_category()
    {
        $this->response('data', $this->db->get('ebook_category')->result_array());
    }



    function add_project()
    {
        $this->form_validation->set_rules('slug', 'Project Name', 'required|is_unique[ebook_project.slug]', [
            'is_uniquue' => 'This project name is already exists..'
        ]);
        if ($this->validation()) {
            if ($post = $this->input->post()) {
                $data = [
                    'file_type' => $post['file_type'],
                    'project_name' => $post['project_name'],
                    'slug' => $post['slug'],
                    'project_value' => $post['project_value'],
                    'image' => $this->file_up('image'),
                    'price' => $post['price'],
                    'category_id' => $post['category_id'],
                    'description' => $post['description']
                ];
                if ($post['file_type'] == 'file') {
                    $this->chunkUpload('project');
                    $data['file'] = $this->post('_file_name');
                    if (isset($data['_file_name']))
                        unset($data['_file_name']);
                } else {
                    $data['file'] = $this->post('link');
                    unset($data['link']);
                }
                if (isset($data['file']) and !empty($data['file']))
                    $this->response('status', $this->db->insert('ebook_project', $data));
            }
        }
    }
    function list_projects()
    {
        $get = $this->db->select('ep.*,ec.category_name')
            ->from('ebook_project as ep')
            ->join('ebook_category as ec', 'ec.id = ep.category_id')
            ->get();
        $this->response('data', $get->result_array());
    }
    function update_project_status()
    {
        $this->db->where('id', $this->post('id'))->update('ebook_project', [
            'status' => $this->post('status'),
        ]);
        $this->response('status', true);
    }
    function delete_project($id)
    {
        $this->db->where('id', $id)->delete('ebook_project');
        $this->response('status', true);
    }
    function fetch_projects()
    {
        $limit = 5;//$this->input->get('length');
        $page = $this->post('page');
        $start = ($page - 1) * $limit;
        $search = $this->post('search');
        $catId = 0;
        if ($this->post('cat')) {
            $cat = $this->ebook_model->get_category(['slug' => $this->post("cat")]);
            $catId = $cat->num_rows() ? $cat->row('id') : 0;
        }

        $projects = $this->ebook_model->get_projects($limit, $start, $search, $catId);
        $query = $this->db->last_query();
        $totalRecords = $this->ebook_model->count_projects($search, $catId);
        $totalPages = ceil($totalRecords / $limit);
        $html = '';
        foreach ($projects as $project) {
            $html .= $this->parse('ebook/project-ajax-view', (array) $project + ['CURRENT_URL' => $this->post('CURRENT_URL')], true);
        }
        if (empty($html)) {
            $html = alert('Result not found.', 'danger');
        }
        $this->response([
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "html" => $html,
            'totalPages' => $totalPages,
            'cat_id' => $catId,
            'post' => $this->post(),
            'query' => $query
        ]);

    }
    function add_to_cart()
    {
        try {
            $this->form_validation->set_rules('slug', 'Product', 'required');
            if ($this->validation()) {
                $get = $this->ebook_model->get_project(['slug' => $this->input->post('slug')]);
                if ($get->num_rows() > 0) {
                    $row = $get->row();
                    $this->response('status', true);
                    $this->ebook_cart->add_to_cart([
                        'id' => $row->id,
                        'name' => $row->project_name,
                        'project_value' => $row->project_value,
                        'image' => $row->image,
                        'slug' => $row->slug,
                        'price' => $row->price
                    ]);
                    $this->response('button', '<button class="btn btn btn-outline-success" data-slug="project-name" disabled="">
                            <span><i class="fa fa-shopping-cart"></i>Added</span>
                        </button>');
                } else
                    throw new Exception('Invalid Project..');
            }
        } catch (Exception $e) {
            $this->response('error', $e->getMessage());
        }

        $this->response('count', $this->ebook_cart->count());
    }
    function remove_to_cart()
    {
        try {
            $this->form_validation->set_rules('slug', 'Product', 'required');
            if ($this->validation()) {
                $get = $this->ebook_model->get_project(['slug' => $this->input->post('slug')]);
                if ($get->num_rows() > 0) {
                    $row = $get->row();
                    $this->response('status', true);
                    $this->ebook_cart->remove_from_cart($row->id);
                } else
                    throw new Exception('Invalid Project..');
            }
        } catch (Exception $e) {
            $this->response('error', $e->getMessage());
        }

        $this->response('count', $this->ebook_cart->count());

    }
    function user_login()
    {
        try {
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->validation()) {
                $get = $this->ebook_model->get_user([
                    'mobile' => $this->input->post('mobile')
                ]);
                if ($get->num_rows() > 0) {
                    $row = $get->row();
                    if ($row->password == sha1($this->input->post('password'))) {
                        $this->session->set_userdata([
                            'ebook_login' => true,
                            'ebook_user' => $row->id
                        ]);
                        $this->response('status', true);
                    } else
                        throw new Exception('Wrong Password....');
                } else
                    throw new Exception('Invalid Mobile....');
            }
        } catch (Exception $e) {
            $this->response('error', $e->getMessage());
        }
    }
    function user_registration()
    {
        try {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|is_unique[ebook_users.mobile]', [
                'is_unique' => 'This %s Already Exists.'
            ]);
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[ebook_users.email]', [
                'is_unique' => 'This %s Already Exists.'
            ]);
            if ($this->validation()) {
                $this->ebook_model->add_user([
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'email' => $this->input->post('email'),
                    'password' => sha1($this->input->post('password')),
                    'mobile' => $this->input->post('mobile')
                ]);
                $this->session->set_userdata([
                    'ebook_login' => true,
                    'ebook_user' => $this->db->insert_id()
                ]);
                $this->response('status', true);
            }
        } catch (Exception $e) {
            $this->response('error', $e->getMessage());
        }
    }
    function update_cart_payment()
    {
        $post = $this->post();
        $razorpay_payment_id = $post['razorpay_payment_id'];
        $razorpay_order_id = $post['razorpay_order_id'];
        $razorpay_signature = $post['razorpay_signature'];
        $merchant_order_id = $post['merchant_order_id'];
        $this->load->module('razorpay');

        try {

            $user_id = $this->session->userdata('ebook_user');
            $status = $this->razorpay->fetchOrderStatus($razorpay_order_id);
            if ($status) {
                $items = $this->ebook_cart->get_cart();
                if ($post['token'] != $this->token->encode($items))
                    throw new Exception('Something went wrong..');
                $data = [];
                foreach ($items as $item) {
                    $data[] = [
                        'user_id' => $user_id,
                        'project_id' => $item['id'],
                        'amount' => $item['price'],
                        'payment_id' => $razorpay_payment_id,
                        'status' => 1
                    ];
                }
                $this->db->insert_batch('ebook_user_projects', $data);
                $this->ebook_cart->clear_cart();
                $this->response('status', true);
                $this->response("url", base_url('ebook/payment/' . $this->token->encode([
                    'payment_id' => $razorpay_payment_id
                ])));
            }
        } catch (Exception $e) {
            $this->response('error', $e->getMessage());
        }
    }
    function cart_payment()
    {
        try {
            if ($this->session->has_userdata('ebook_login')) {
                $get = $this->ebook_model->get_user([
                    'id' => $this->session->userdata('ebook_user')
                ]);
                if ($get->num_rows() > 0) {
                    $row = $get->row();
                    $items = $this->ebook_cart->get_cart();
                    $totalPrice = 0;
                    foreach ($items as $item) {
                        $totalPrice += $item['price'];
                    }
                    if (!$totalPrice)
                        throw new Exception('Invalid Amount.');
                    $this->load->module('razorpay');
                    $order_id = $this->razorpay->create_order([
                        'receipt' => PATH . mt_rand(00000, 8999999),
                        'amount' => $totalPrice * 100,
                        'currency' => 'INR',
                        'notes' => [
                            'merchant_order_id' => time()
                        ]
                    ]);
                    $name = $row->name;
                    $mobile = $row->mobile;
                    $email = $row->email;

                    $data = [
                        'key' => RAZORPAY_KEY_ID,
                        'amount' => $totalPrice * 100,
                        'name' => ES('title'),
                        'description' => 'Computer Institute',
                        'image' => logo(),
                        'prefill' => [
                            'name' => $name,
                            'email' => $email,
                            'contact' => $mobile
                        ],
                        'notes' => [
                            'merchant_order_id' => time(),
                        ],
                        'order_id' => $order_id
                    ];
                    $this->response('status', true);
                    $this->response('option', $data);
                } else {
                    $this->session->sess_destroy();
                    $this->response('status', true);
                }
            } else
                $this->response('status', 'login');
        } catch (Exception $e) {
            $this->response('message', $e->getMessage());
        }
    }
    function update_user_profile()
    {
        $this->db->where('id', $this->session->userdata('ebook_user'))->update('ebook_users', $this->post());
        $this->response('status', true);
    }
    function update_user_password()
    {
        $password = $this->post('current_password');
        $new_password = $this->post('new_password');
        $repeat_new_password = $this->post('repeat_new_password');
        try {
            $this->form_validation->set_rules('current_password', 'Current Password', 'required');
            $this->form_validation->set_rules('new_password', 'Password', 'required');
            $this->form_validation->set_rules('repeat_new_password', 'Confirm Password', 'required|matches[new_password]');
            if ($this->validation()) {
                $user_id = $this->session->userdata('ebook_user');
                $get = $this->db->where('id', $user_id)->get('ebook_users');
                if ($get->num_rows()) {
                    $row = $get->row();
                    if (sha1($password) == $row->password) {
                        $this->db->where('id', $user_id)->update('ebook_users', ['password' => sha1($new_password)]);
                        $this->response('status', true);
                    } else
                        throw new Exception('Current Password is wrong.');
                } else
                    throw new Exception('Something went wrong..');
            }
        } catch (Exception $e) {
            $this->response('error', alert($e->getMessage(),'danger'));
        }
    }
}