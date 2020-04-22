<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Taxes extends CI_Model
{
    const TABLE = "app_merchant_taxes";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function add($tax)
    {
        try {
            $res = $this->db->insert(self::TABLE, $tax);
            if ($res) {
                $user_id = $this->db->insert_id();
                $this->session->set_flashdata('success', 'Tax added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Unable to add Tax.');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Unable to add Tax.');
        }
        redirect(base_url('/members/tax/'));
    }

    public function update($changes, $where)
    {
        $this->db->where($where);
        $query = $this->db->update(self::TABLE, $changes);

        $this->session->set_flashdata('success', 'Tax Updated Successfully');
        redirect(base_url('/members/tax'));
    }

    public function delete($id)
    {
        $fields = array('deleted_at' => date('Y-m-d h:i:s'));
        $this->db->where('id', $id);
        $query = $this->db->update(self::TABLE, $fields);
        return true;
    }

    public function get_count($merchant_id)
    {
        $this->db->where('merchant_id', $merchant_id);
        $this->db->where('deleted_at', NULL);
        $query = $this->db->get(self::TABLE);
        return $query->num_rows();
    }

    public function get_taxes($merchant_id, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('merchant_id', $merchant_id);
        $this->db->where('deleted_at', NULL);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get(self::TABLE);
        return $query->result();
    }

    public function get_tax_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get(self::TABLE);
        return $query->result()[0];
    }

}
