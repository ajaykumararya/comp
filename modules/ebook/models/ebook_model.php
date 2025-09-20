<?php
class Ebook_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function category()
    {
        return $this->db->order_by('id', 'DESC')->get("ebook_category");
    }
    function get_category($where)
    {
        return $this->db->where($where)->get("ebook_category");
    }
    function get_category_slug($id)
    {
        return $this->db->where("id", $id)->get("ebook_category")->row('slug') ?? '';
    }
    function get_project($where)
    {
        return $this->db->where($where)->get('ebook_project');
    }
    public function get_projects($limit, $start, $search = '', $cat_id = 0)
    {
        $this->db->group_start();
        $this->db->like('project_name', $search);
        $this->db->or_like('project_value', $search);
        $this->db->or_like('description', $search);
        $this->db->group_end();
        if ($cat_id) {
            $this->db->where('category_id', $cat_id);
        }
        $this->db->where('status', 1);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('ebook_project');
        return $query->result();
    }

    public function count_projects($search = '', $cat_id = 0)
    {
        $this->db->group_start();
        $this->db->like('project_name', $search);
        $this->db->or_like('project_value', $search);
        $this->db->or_like('description', $search);
        $this->db->group_end();
        $this->db->where('status', 1);
        if ($cat_id) {
            $this->db->where('category_id', $cat_id);
        }
        return $this->db->count_all_results('ebook_project');
    }
    function get_user($where)
    {
        return $this->db->where($where)->get('ebook_users');
    }
    function add_user($data)
    {
        return $this->db->insert('ebook_users', $data);
    }
    function get_category_slug_via_project($project_id)
    {
        $get = $this->db->select('ec.slug')
            ->from('ebook_category as ec')
            ->join('ebook_project as ep', 'ep.category_id = ec.id')
            ->get();
        return $get->num_rows() ? $get->row('slug') : '';
    }
}
?>