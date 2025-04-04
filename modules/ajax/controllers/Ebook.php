<?php
class Ebook extends Ajax_Controller
{
    public function __construct()
    {
        parent::__construct();
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
    function list_projects(){
        $get = $this->db->select('ep.*,ec.category_name')
                        ->from('ebook_project as ep')
                        ->join('ebook_category as ec','ec.id = ep.category_id')
                        ->get();
        $this->response('data',$get->result_array());
    }
    function update_project_status(){
        $this->db->where('id', $this->post('id'))->update('ebook_project', [
            'status' => $this->post('status'),
        ]);
        $this->response('status', true);
    }
    function delete_project($id){
        $this->db->where('id', $id)->delete('ebook_project');
        $this->response('status', true);
    }
}