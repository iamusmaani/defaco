<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Appointments extends CI_Model
{
    const TABLE_APPOINTMENTS = "app_merchant_appointments";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function get_appointments($date)
    {
        $merchant_id = $this->session->userdata('merchant_information')->id;
        $this->db->where('merchant_id', $merchant_id);
        $this->db->where('appointment_date', $date);
        $this->db->where('status', 1);
        $query = $this->db->get(self::TABLE_APPOINTMENTS);
        return $query->result();
    }

    public function get_schedule($merchant_id)
    {
        $this->db->where('merchant_id', $merchant_id);
        $query = $this->db->get(self::TABLE_MY_SCHEDULE);
        return $query->result();
    }

    public function clear_schedule($merchant_id)
    {
        $this->db->delete(self::TABLE_MY_SCHEDULE, array('merchant_id' => $merchant_id));
    }

    public function save_schedule($data)
    {
        for($i=0;$i<count($data);$i++){
            $this->db->insert(self::TABLE_MY_SCHEDULE, $data[$i]);
        }
        $this->session->set_flashdata('success', 'Schedule Updated Successfuly');
        redirect(base_url('/members/setting/schedule'));
    }

    public function get_holidays($merchant_id)
    {
        $this->db->where('merchant_id', $merchant_id);
        $query = $this->db->get(self::TABLE_MY_HOLIDAYS);
        return $query->result();
    }

    public function add_holidays($data)
    {
        $this->db->insert(self::TABLE_MY_HOLIDAYS, $data);
        $this->session->set_flashdata('success', 'Holiday Added Successfuly');
        redirect(base_url('/members/setting/holiday'));
    }

    public function delete_holiday($id)
    {
        $this->db->delete(self::TABLE_MY_HOLIDAYS, array('id' => $id));
        $this->session->set_flashdata('success', 'Holiday deleted successfuly');
        redirect(base_url('/members/setting/holiday'));
    }

    public function get_configs($merchant_id)
    {
        $this->db->where('merchant_id', $merchant_id);
        $query = $this->db->get(self::TABLE_MY_CONFIGS);
        return $query->result();
    }

    public function add_configuration($data)
    {
        $this->db->insert(self::TABLE_MY_CONFIGS, $data);
        $this->session->set_flashdata('success', 'Configuration added Successfuly');
        redirect(base_url('/members/setting/configuration'));
    }

    public function save_configuration($where, $changes)
    {
        $this->db->where($where);
        $query = $this->db->update(self::TABLE_MY_CONFIGS, $changes);
    }

    public function get_tax_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get(self::TABLE);
        return $query->result()[0];
    }

}
