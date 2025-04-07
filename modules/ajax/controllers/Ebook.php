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
        $this->form_validation->set_rules('slug', 'Project Name', 'required!is_unique[ebook_project.slug]', [
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

}