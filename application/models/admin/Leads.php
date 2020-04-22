<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Leads extends CI_Model
{
    const TABLE = "app_leads";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('admin_helper');
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get(self::TABLE);
        return $query->result();
    }

    public function get_all($where = null)
    {
        if ($where != null) {
            $this->db->where($where);
        }
        $this->db->order_by("id", "desc");
        $query = $this->db->get(self::TABLE);
        return $query->result();
    }
} 