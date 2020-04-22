<?php
defined('BASEPATH') or exit('No direct script access allowed');
class PromoCodes extends CI_Model
{
    const TABLE = "app_merchant_promo";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function add($promo)
    {
        try {
            $res = $this->db->insert(self::TABLE, $promo);
            if ($res) {
                $this->db->insert_id();
                $this->session->set_flashdata('success', 'Promo Code created successfully!');
            } else {
                $this->session->set_flashdata('error', 'Unable to add Promo Code.');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Unable to add Promo Code.');
        }
        redirect(base_url('/members/promocode/'));
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
        $this->db->where('id', $id);
        $this->db->delete(self::TABLE);
        return true;
    }

    public function get_count($merchant_id)
    {
        $this->db->where('merchant_id', $merchant_id);
        $this->db->where('status', 1);
        $query = $this->db->get(self::TABLE);
        return $query->num_rows();
    }

    public function get_promos($merchant_id, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('merchant_id', $merchant_id);
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get(self::TABLE);
        return $query->result();
    }

    public function get_promo_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get(self::TABLE);
        return $query->result()[0];
    }

}
