<?php
class SiteModel extends MY_Model
{
    function ttl_courses()
    {
        if ($this->isAdmin()) {
            return $this->db->where('isDeleted',0)->get('course')->num_rows();
        }
        if ($this->isCenter()) {
            return $this->db //->select()
                ->from('course as c')
                ->join('center_courses as cc', 'c.id = cc.course_id and cc.center_id = ' . $this->loginId())
                ->where('c.isDeleted',0)
                ->get()->num_rows();
        }
        return 0;
    }
    function get_city($where = [])
    {
        $this->db->where($where);
        return $this->db->get('district');
    }
    function get_state($where){
        $this->db->where($where);
        return $this->db->get('state');
    }

    function city($id){
        return $this->db->where('DISTRICT_ID',$id)->get('district')->row('DISTRICT_NAME');
    }
    function state($id){
        return $this->db->where('STATE_ID',$id)->get('state')->row('STATE_NAME');
    }
    function list_page()
    {
        return $this->db->get('his_pages');
    }
    function updateDefaultPage($page_id)
    {
        return $this->db->where('id', $this->loginId())->update('centers', ['active_page' => $page_id]);
    }
    function print_menu_items($where = [], $withPagesArray = false)
    {
        $allPages = [];
        if (count($where))
            $this->db->where($where);
        // $this->db->where('isMenu', 1);
        $query = $this->db->order_by('sort')
            ->get('his_pages');
        $ref = [];
        $items = [];
        foreach ($query->result() as $k => $data) {
            $thisRef = &$ref[$data->id];
            $thisRef['parent'] = $data->parent_id;
            $thisRef['type'] = start_with('http', $data->link) ? 'link' : 'page';
            $thisRef['label'] = $data->page_name;
            $thisRef['link'] = ((DefaultPage == $data->id) ? base_url() : (start_with($data->link,'http') ? $data->link : base_url($data->link)));
            $thisRef['id'] = $data->id;
            $thisRef['target'] = $data->redirection ? 'target="_blank"' : '';
            $thisRef['isActive'] = (!start_with($data->link, 'http')) ? (uri_string() === $data->link) : false;
            $allPages[$thisRef['link']] = $thisRef;
            if($data->isMenu){
                if ($data->parent_id == 0)
                    $items[$data->id] = &$thisRef;
                else
                    $ref[$data->parent_id]['child'][$data->id] = &$thisRef;
            }
        }
        if ($withPagesArray)
            return ['menus' => $items, 'all_pages_link' => $allPages];
        return $items;
    }
    function add_page($data)
    {
        $this->db->insert('his_pages', $data);
        return $this->db->insert_id();
    }


    function add_page_content($data)
    {
        $this->db->insert('his_page_content', $data);
        $this->add_page_schema([
            'page_id' => $data['page_id'],
            'event' => 'content',
            'event_id' => $this->db->insert_id()
        ]);
    }
    function get_page_content($url)
    {
        return $this->db->select('*,hpc.id as content_id')
            ->from('his_pages as hp')
            ->join('his_page_content as hpc', "hpc.page_id = hp.id and hp.link = '$url' ")
            ->get();
    }
    // function get_page_schema($url){
    //     return $this->db->select('*')
    //                 ->from('his_pages as hp')
    //                 ->join('schema as s',"s.page_id = hp.id and hp.link = '$url'")
    //                 ->get();
    // }
    function page_content($page_id)
    {
        return $this->db->where('page_id', $page_id)->get("his_page_content");
    }
    function add_page_schema($data)
    {
        return $this->db->insert('schema', $data);
    }
    function get_page_schema($page_id)
    {
        return $this->db->where('page_id', $page_id)->order_by('seq', 'ASC')->get('schema');
    }
    function delete_page($id)
    {
        $where = ['page_id' => $id];
        $this->delete_page_content($where);
        $this->delete_schema($where);
        return $this->db->where('id', $id)->delete('his_pages');
    }
    function delete_page_content($where)
    {
        return $this->db->where($where)->delete('his_page_content');
    }
    function delete_schema($where)
    {
        return $this->db->where($where)->delete('schema');
    }
    function update_schema($data)
    {
        if ($this->db->where($data)->get('schema')->num_rows()) {
            $this->db->where($data)->delete('schema');
        } else {
            $this->db->insert('schema', $data);
        }
        return true;
    }
    function getPageSchemaWithSelect($where, $select = '*')
    {
        if ($where)
            $this->db->where($where);

        return $this->db->select($select)->order_by('seq', 'asc')->get('schema');
    }
    function slider()
    {
        return $this->db->get('slider');
    }
    function update_setting($type = '', $value = '')
    {
        $get = $this->db->get_where('settings', ['type' => $type]);
        $value = is_array($value) ? json_encode($value) : $value;
        if ($get->num_rows()) {
            return $this->db->where('id', $get->row('id'))->update('settings', ['value' => $value]);
        } else {
            return $this->db->insert('settings', ['type' => $type, 'value' => $value]);
        }
    }
    function get_setting($type = '', $return = '', $json_decode = false)
    {
        if ($type) {
            $get = $this->db->get_where('settings', ['type' => $type]);
            if ($get->num_rows()) {
                $data = $get->row('value');
                if ($json_decode)
                    return json_decode($data);
                return $data;
            }
        }
        return $return;
    }

    function get_theme_templates()
    {
        return $this->db->where('theme_id', THEME_ID)->get('theme_templates');
    }
    function add_content_courses($data)
    {
        return $this->db->insert('content_courses', $data);
    }
    function content_courses()
    {
        return $this->db->get('content_courses');
    }
    function content_certificates()
    {
        return $this->db->get('content_certificates');
    }
    function delete_content_certificate($id)
    {
        return $this->db->where('id', $id)->delete('content_certificates');
    }
    function delete_content_course($d)
    {
        return $this->db->where('id', $d)->delete('content_courses');
    }
    function get_our_acheivements()
    {
        return $this->db->get('our_acheivements');
    }
    function add_acheivement($data)
    {
        return $this->db->insert('our_acheivements', $data);
    }
    function delete_our_acheivements($id)
    {
        return $this->db->where('id', $id)->delete('our_acheivements');
    }
    function list_enquiries($type = 0)
    {
        $this->db->select("*,DATE_FORMAT(timestamp,'%d-%m-%Y') as date,UPPER(REPLACE(type,'_', ' ')) AS `type_data`")
            
            ->order_by('id', 'DESC');
        if($type){
            $this->db->where('type', $type);
        }
        return $this->db->get('contact_us_action');
    }

    function get_contents($type,$where = 0){
        if($where && is_array($where))
            $this->db->where($where);
        return $this->db->where('type',$type)->get('content');
    }
}
