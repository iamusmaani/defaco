<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Paymethods extends CI_Model
{
    const TABLE = "app_payment_methods";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function add($method)
    {
        try {
            $res = $this->db->insert(self::TABLE, $method);
            if ($res) {
                $this->db->insert_id();
                $this->session->set_flashdata('success', 'Fee added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Unable to add Fee.');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Unable to add Fee.');
        }
        redirect(base_url('/administration/paymethod/'));
    }

    public function update($changes, $where)
    {
        $this->db->where($where);
        $query = $this->db->update(self::TABLE, $changes);

        $this->session->set_flashdata('success', 'Pay Methods Updated Successfully');
        redirect(base_url('/administration/paymethod'));
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete(self::TABLE);
        return true;
    }

    public function get_count()
    {
        $this->db->where('status', 1);
        $query = $this->db->get(self::TABLE);
        return $query->num_rows();
    }

    public function get_pay_methods($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get(self::TABLE);
        return $query->result();
    }

    public function get_paymethod_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get(self::TABLE);
        return $query->result()[0];
    }

}
