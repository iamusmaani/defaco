<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Attributes extends CI_Model
{
    const TABLE = "app_service_attributes";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function add($attributes)
    {
        try {
            $res = $this->db->insert(self::TABLE, $attributes);
            if ($res) {
                $this->db->insert_id();
                $this->session->set_flashdata('success', 'Attribute created successfully!');
            } else {
                $this->session->set_flashdata('error', 'Unable to add Attribute.');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Unable to add Attribute.');
        }
        redirect(base_url('/members/attribute/'));
    }

    public function update($changes, $where)
    {
        $this->db->where($where);
        $query = $this->db->update(self::TABLE, $changes);

        $this->session->set_flashdata('success', 'Attribute Updated Successfully');
        redirect(base_url('/members/attribute'));
    }

    public function delete($id)
    {
        $fields = array('deleted_at' => date('Y-m-d h:i:s'));
        $this->db->where('id', $id);
        $this->db->update(self::TABLE, $fields);
        return true;
    }

    public function get_count($merchant_id)
    {
        $this->db->where('merchant_id', $merchant_id);
        $this->db->where('status', 1);
        $query = $this->db->get(self::TABLE);
        return $query->num_rows();
    }

    public function get_attributes($merchant_id, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('merchant_id', $merchant_id);
        $this->db->where('status', 1);
        $this->db->where('deleted_at', NULL);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get(self::TABLE);
        return $query->result();
    }

    public function get_attribute_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get(self::TABLE);
        return $query->result()[0];
    }

}
