<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Generic extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function get_states($country_id)
    {
        $this->db->where(array('country_id' => $country_id));
        $query = $this->db->get("x_app_states");
        return $query->result();
    }

    public function get_cities($state_id)
    {
        $this->db->where(array('state_id' => $state_id));
        $query = $this->db->get("x_app_cities");
        return $query->result();
    }

    public function record_interest($data)
    {
        try {
            $this->db->insert('app_leads', $data);
            $reference_id = $this->db->insert_id();

            if ($reference_id) {
                $this->session->set_flashdata('success', 'We have received your interest. Please note your reference ID for future communication: #' . $reference_id);
            } else {
                $this->session->set_flashdata('error', 'Server busy, Please try again later.');
            }

        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Server busy, Please try again later.');
        }
        redirect(base_url('/i-am-interested'));
    }

    public function record_enquiry($data)
    {
        try {
            $this->db->insert('app_enquiries', $data);
            $reference_id = $this->db->insert_id();

            if ($reference_id) {
                $this->session->set_flashdata('success', 'We have received your interest. Please note your reference ID for future communication: #' . $reference_id);
            } else {
                $this->session->set_flashdata('error', 'Server busy, Please try again later.');
            }

        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Server busy, Please try again later.');
        }
        redirect(base_url('/#contact'));
    }
}
