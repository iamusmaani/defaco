<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users extends CI_Model
{

    const TABLE = "app_admin";
    const TABLE2 = "app_admin_assigned_roles";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('admin_helper');
    }

    public function add($user, $role)
    {
        try {
            $res = $this->db->insert(self::TABLE, $user);
            if ($res) {
                $user_id = $this->db->insert_id();

                for ($i = 0; $i < count($role); $i++) {
                    $relation = array(
                        'user_id' => $user_id,
                        'role_id' => $role[$i]
                    );
                    $this->db->insert(self::TABLE2, $relation);
                }
                $this->session->set_flashdata('success', 'User Created Successfully');
            } else {
                $this->session->set_flashdata('error', 'Unable to create user.');
            }
        } catch (Exception $e) {
            // write in log file
        }
        redirect(base_url('/administration/admin'));
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

        $this->db->order_by("created_at", "DESC");
        $query = $this->db->get(self::TABLE);
        return $query->result();
    }

    public function process_login($credentials)
    {
        $this->db->where($credentials);
        $this->db->where('status','1');
        $this->db->where('deleted_at',NULL);
        $query = $this->db->get(self::TABLE);
        if(count($query->result()) == 0 ){
            $this->session->set_flashdata('error', 'Invalid credentials.');
            redirect(base_url('/administration/admin/login'));
        } else {
            return $query->result()[0];
        }
    }

    public function get_roles($user_id)
    {
        $this->db->where('user_id',$user_id);
        $query = $this->db->get(self::TABLE2);
        if(count($query->result()) == 0 ){
            $this->session->set_flashdata('error', 'No Roles Assigned to you.');
            redirect(base_url('/administration/admin/login'));
        } else {
            return $query->result();
        }
    }

    public function view_responsibility($ids)
    {
        $sql = "SELECT * FROM `app_admin_responsibility` WHERE `id` IN (" . $ids . ")";
        return $this->db->query($sql)->result();
    }

    public function delete_user($id)
    {
        $fields = array('deleted_at' => date('Y-m-d h:i:s'));
        $this->db->where('id', $id);
        $query = $this->db->update(self::TABLE, $fields);

        $fields = array('deleted_at' => date('Y-m-d h:i:s'));
        $this->db->where('user_id', $id);
        $query = $this->db->update(self::TABLE2, $fields);
        return true;
    }

    public function validate_password($user_id, $password)
    {
        $this->db->where('password',$password);
        $this->db->where('id',$user_id);
        $query = $this->db->get(self::TABLE);
        
        if(empty($query->result())){
            return false;
        } else {
            return true;
        }
    }

    public function update_users($fields, $id, $roles)
    {
        $this->db->where(array('id'=>$id));
        $this->db->update(self::TABLE, $fields);

        // deleting existing responsibilities
        $qry = "DELETE FROM ".self::TABLE2." WHERE user_id = ".$id;
        $this->db->query($qry);

        for ($i = 0; $i < count($roles); $i++) {
            $relation = array(
                'user_id' => $id,
                'role_id' => $roles[$i],
            );
            $this->db->insert(self::TABLE2, $relation);
        }

        $this->session->set_flashdata('success', 'User Updated Successfully');
        redirect(base_url('/administration/admin'));
    }

    
}
