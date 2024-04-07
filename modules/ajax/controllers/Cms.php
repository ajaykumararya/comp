<?php
class Cms extends Ajax_Controller
{
    function add_page()
    {
        $data = [
            'page_name' => $this->post('page_name'),
            'link' => $this->post('link'),
            'redirection' => isset($_POST['redirection']) ? 1 : 0,
            'isMenu' => isset($_POST['isMenu']) ? 1 : 0
        ];
        $page_id = $this->SiteModel->add_page($data);
        if ($this->post('page_type') == 'content') {
            $data = ['page_id' => $page_id];
            $this->SiteModel->add_page_content($data);
        }
        $this->response('status', true);
    }
    function delete_page()
    {
        if ($id = $this->post('id')) {
            if ($this->db->where('parent_id', $id)->get('his_pages')->num_rows()) {
                $this->response('html', 'Sorry, Can\'t Delete Bcz This page is the parent of some pages. First arrange the menu and then delete.');
            } else {
                $this->db->where(['id' => $id])->delete('his_pages');
                $this->db->where(['page_id' => $id])->delete('his_page_content');
                $this->db->where(['page_id' => $id])->delete('schema');
                $this->response('status', true);
                $this->response('html', 'Page Deleted');
            }
        }
    }
    function get_menus()
    {
        $menus = $this->SiteModel->print_menu_items();
        $this->response('status', true);
        $html = '
        <div class="cf nestable-lists"><div class="dd" id="nestable" style="width:100%">' . $this->get_menu($menus) . '</div></div>
        <input type="hidden" id="nestable-output">';
        $this->response('html', $html);
    }
    function update_menus()
    {
        $readbleArray = $this->parseJsonArray(json_decode($this->post('data')));
        $i = 0;
        $data = [];
        foreach ($readbleArray as $row) {
            $i++;
            $data[] = [
                'parent_id' => $row['parentID'],
                'sort' => $i,
                'id' => $row['id']
            ];
        }
        $this->db->update_batch('his_pages', $data, 'id');
        $this->response('status', $data);
    }
    function parseJsonArray($jsonArray, $parentID = 0)
    {
        $return = array();
        foreach ($jsonArray as $subArray) {
            $returnSubSubArray = array();
            if (isset($subArray->children)) {
                $returnSubSubArray = $this->parseJsonArray($subArray->children, $subArray->id);
            }
            $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
            $return = array_merge($return, $returnSubSubArray);
        }
        return $return;
    }
    function get_menu($items, $class = 'dd-list')
    {
        $html = "<ol class=\"" . $class . "\" id=\"menu-id\">";
        foreach ($items as $key => $value) {
            $html .= '<li class="dd-item dd3-item" data-id="' . $value['id'] . '" >
			                    <div class="dd-handle dd3-handle"></div>
			                    <div class="dd3-content">
			                        <span id="label_show' . $value['id'] . '">' . $value['label'] . '</span> 
			                        <span class="span-right"><span id="link_show' . $value['id'] . '">' . ucwords($value['type']) . '</span> &nbsp;&nbsp; 
			                    </div>
			                    ';
            if (array_key_exists('child', $value))
                $html .= $this->get_menu($value['child'], 'child');
            $html .= "</li>";
        }
        $html .= "</ol>";
        return $html;
    }
    function update_default_page()
    {
        $this->SiteModel->updateDefaultPage($this->post("page_id"));
        $this->response('status', true);
    }
    function slider()
    {
        // $this->response($_FILES);
        if ($file = $this->file_up('image')) {
            $this->db->insert('slider', ['image' => $file]);
            $this->response('status', true);
        }
    }
    function delete_slider($id)
    {
        $this->db->where('id', $id)->delete('slider');
        $this->response('status', true);
        $this->response('html', 'Slider Deleted Successfully..');
    }
    function list_sliders()
    {
        $this->response('data', $this->db->get('slider')->result());
    }
    function update_logo()
    {
        if ($file = $this->file_up('image')) {
            $this->SiteModel->update_setting('logo', $file);
            $this->response('status', true);
            $this->response('file', base_url('upload/' . $file));
        }
    }
    function update_setting()
    {
        foreach ($_POST as $index => $value) {
            $this->SiteModel->update_setting($index, $value);
        }
        $this->response('status', true);
    }
    function update_contnet()
    {
        $this->db->where('id', $this->post('id'))->update('his_page_content', ['content' => $_POST['content']]);
        $this->response('status', true);
        $this->response($_POST);
    }
    function update_page_schema()
    {
        $i = 1;
        $data = [];
        foreach ($this->post('sortedIds') as $id) {
            $data[] = ['id' => $id, 'seq' => $i++];
        }
        if ($i > 1) {
            $this->db->update_batch('schema', $data, 'id');
        }
        // $this->response('events',$data);
        $this->response('status', true);
    }
    function extra_setting()
    {
        // $this->response($_POST);
        $type = $this->post('type');
        $data = [];
        if (isset($_POST['title'])) {
            $values = $_POST['value'];
            foreach ($_POST['title'] as $index => $title) {
                $data[] = ['title' => $title, 'link' => $values[$index]];
            }
        }
        $this->SiteModel->update_setting($type, $data);
        unset($_POST['type'], $_POST['title'], $_POST['value']);
        if (sizeof($_POST)) {
            foreach ($_POST as $index => $value) {
                $this->SiteModel->update_setting($index, $value);
            }
        }
        $this->response('status', true);
        $this->response('html', 'Process Complete Successfully..');
    }
    function event_set_in_page()
    {
        $status = $this->SiteModel->update_schema($this->post());
        $this->response('status', true);
    }
    private function build_post_data(){
        $data = [];
        foreach ($_POST as $index => $value) {
            $data[$index] = is_array($value) ? json_encode($value) : $value;
        }
        if (sizeof($_FILES)) {
            foreach ($_FILES as $index => $file) {
                $file = $this->file_up($index);
                if ($file)
                    $data[$index] = $file;
            }
        }
        return $data;
    }
    function save_extra_setting()
    {
        $this->response($_POST);
        $this->response($_FILES);
        $data = $this->build_post_data();
        if (sizeof($data)) {
            foreach ($data as $index => $value) {
                $this->SiteModel->update_setting($index, $value);
                $this->response('status', true);
            }
        }
    }
    function insert_content(){
        $type = $this->post('type');
        unset($_POST['type']);
        $data = $this->build_post_data();
        $data['type'] = $type;
        $this->db->insert('content',$data);
        $this->response('status',true);
    }
    function delete_content(){
        $this->db->where($this->post())->delete('content');
        $this->response('status',true);
    }
    function add_course_for_content()
    {
        $data = $this->post();
        $data['image'] = $this->file_up('image');
        $this->SiteModel->add_content_courses($data);
        $this->response('status', true);
    }
    function list_content_courses()
    {
        $this->response('data', $this->SiteModel->content_courses()->result());
    }
    function add_certificate_for_content()
    {
        $data = $this->post();
        $data['image'] = $this->file_up('image');
        $this->db->insert('content_certificates', $data);
        $this->response('status', true);
    }
    function list_content_certificates()
    {
        $this->response('data', $this->SiteModel->content_certificates()->result());
    }
    function delete_content_course($id)
    {
        $this->response(
            'status',
            $this->SiteModel->delete_content_course($id)
        );
    }
    function delete_content_certificate($id)
    {
        $this->response(
            'status',
            $this->SiteModel->delete_content_certificate($id)
        );
    }
    function save_acheivement()
    {
        $this->response('status', $this->SiteModel->add_acheivement($this->post()));
    }
    function list_content_acheivements()
    {
        $this->response(
            'data',
            $this->SiteModel->get_our_acheivements()->result()
        );
    }
    function delete_our_acheivement($id)
    {
        $this->response(
            'status',
            $this->SiteModel->delete_our_acheivements($id)
        );
    }
    function upload_gallery_image()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048; // 2 MB max file size
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            // File uploaded successfully
            $this->db->insert('gallery_images', ['image' => $this->upload->data('file_name')]);
            $this->response([
                'success' => true,
                'filename' => $this->upload->data('file_name'),
                'url' => base_url('upload/' . $this->upload->data('file_name')),
            ]);
        } else {
            http_response_code(500);
            // Handle upload failure
            $this->response('error', $this->upload->display_errors('', ''));
        }
    }
    function update_gallery_image_title(){
        $this->db->where('id',$this->post('id'))->update('gallery_images',[
            'title' => $this->post("title")
        ]);
        $this->response('status',true);
    }
    function list_gallery_images()
    {
        $this->response('data', $this->db->get('gallery_images')->result());
    }
    function delete_gallery_image($id)
    {
        $this->db->where(['id' => $id])->delete('gallery_images');
        $this->response('status', true);
    }
    function upload_syllabus()
    {
        $file = $this->file_up('file');
        if ($file) {
            $this->response(
                'status',
                $this->db->insert('syllabus', [
                    'title' => $this->post('title'),
                    'file' => $file
                ])
            );
        }
    }
    function list_syllabus(){
        $this->response('data',$this->db->order_by('id','DESC')->get('syllabus')->result_array());
    }
    function delete_syllabus($id){
        $this->db->delete('syllabus',['id' => $id]);
        $this->response('status',true);
    }
}
