<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Responsibilitites extends CI_Model
{

    const TABLE = "app_admin_responsibility";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function add($data)
    {
        try {
            if ($this->db->insert(self::TABLE, $data)) {
                $this->session->set_flashdata('success', 'Responsibility Created Successfully');
            } else {
                $this->session->set_flashdata('error', 'Unable to create new responsibility.');
            }
        } catch (Exception $e) {
            // write in log file
        }

        redirect(base_url('/administration/responsibility'));
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get(self::TABLE);
        return $query->result();
    }

    public function get_all($where=NULL)
    {
        if($where != NULL){
            $this->db->where($where);
        }
        $query = $this->db->get(self::TABLE);
        return $query->result();
    }

    public function update($fields, $where)
    {
        $this->db->where($where);
        $query = $this->db->update(self::TABLE, $fields);

        $this->session->set_flashdata('success', 'Responsibility Updated Successfully');
        redirect(base_url('/administration/responsibility'));
    }

    public function delete($id)
    {
        $fields = array('deleted_at' => date('Y-m-d h:i:s'));
        $this->db->where('id', $id);
        $query = $this->db->update(self::TABLE, $fields);
        return true;
    }
}
