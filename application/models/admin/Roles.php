<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Roles extends CI_Model
{

    const TABLE = "app_admin_roles";
    const TABLE2 = "app_admin_roles_responsibility";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('admin_helper');
    }

    public function add($role, $responsibility)
    {
        try {
            if ($this->db->insert(self::TABLE, $role)) {
                $role_id = $this->db->insert_id();

                for ($i = 0; $i < count($responsibility); $i++) {
                    $relation = array(
                        'responsibility_id' => $responsibility[$i],
                        'role_id' => $role_id,
                    );
                    $this->db->insert(self::TABLE2, $relation);
                }
                $this->session->set_flashdata('success', 'Responsibility Created Successfully');
            } else {
                $this->session->set_flashdata('error', 'Unable to create new responsibility.');
            }
        } catch (Exception $e) {
            // write in log file
        }
        redirect(base_url('/administration/role'));
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
        $query = $this->db->get(self::TABLE);
        return $query->result();
    }

    public function view_responsibility($ids)
    {
        $sql = "SELECT * FROM `app_admin_responsibility` WHERE `id` IN (" . $ids . ")";
        return $this->db->query($sql)->result();
    }

    public function update_role($fields, $id, $responsibility)
    {
        $this->db->where(array('id'=>$id));
        $query = $this->db->update(self::TABLE, $fields);

        // deleting existing responsibilities
        $qry = "DELETE FROM ".self::TABLE2." WHERE role_id = ".$id;
        $this->db->query($qry);
        
        for ($i = 0; $i < count($responsibility); $i++) {
            $relation = array(
                'responsibility_id' => $responsibility[$i],
                'role_id' => $id,
            );
            $this->db->insert(self::TABLE2, $relation);
        }

        $this->session->set_flashdata('success', 'Role Updated Successfully');
        redirect(base_url('/administration/role'));
    }

    public function delete_role($id)
    {
        $fields = array('deleted_at' => date('Y-m-d h:i:s'));
        $this->db->where('id', $id);
        $query = $this->db->update(self::TABLE, $fields);

        $fields = array('deleted_at' => date('Y-m-d h:i:s'));
        $this->db->where('role_id', $id);
        $query = $this->db->update(self::TABLE2, $fields);
        return true;
    }
}
