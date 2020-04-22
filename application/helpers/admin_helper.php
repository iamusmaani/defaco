<?php 
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('is_admin_login')) {
    function is_admin_login()
    {
        $CI =& get_instance();
        if(!isset($CI->session->userdata('admin_user_information')->id)){
            return false;
        } else {
            return true;
        }
    }
}

if (!function_exists('get_responsibility_id')) {
    function get_responsibility_id($role_id)
    {
        $CI =& get_instance();
        $query = "SELECT responsibility_id FROM app_admin_roles_responsibility WHERE role_id = " . $role_id;
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_role_id')) {
    function get_role_id($user_id)
    {
        $CI =& get_instance();
        $query = "SELECT role_id FROM app_admin_assigned_roles WHERE `user_id` = " . $user_id;
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_countries')) {
    function get_countries()
    {
        $CI =& get_instance();
        $query = "SELECT * FROM x_app_countries";
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_city_name')) {
    function get_city_name($city_id)
    {
        $CI =& get_instance();
        $query = "SELECT `name` FROM x_app_cities WHERE id = " . $city_id;
        $query = $CI->db->query($query);

        return $query->result()[0]->name;
    }
}

if (!function_exists('get_state_name')) {
    function get_state_name($state_id)
    {
        $CI =& get_instance();
        $query = "SELECT `name` FROM x_app_states WHERE id = " . $state_id;
        $query = $CI->db->query($query);

        return $query->result()[0]->name;
    }
}

if (!function_exists('get_country_name')) {
    function get_country_name($country_id)
    {
        $CI =& get_instance();
        $query = "SELECT `name` FROM x_app_countries WHERE id = " . $country_id;
        $query = $CI->db->query($query);

        return $query->result()[0]->name;
    }
}

if (!function_exists('get_role_name')) {
    function get_role_name($role_id)
    {
        $CI =& get_instance();
        $query = "SELECT `name` FROM app_admin_roles WHERE id = " . $role_id;
        $query = $CI->db->query($query);

        return $query->result()[0]->name;
    }
}

if (!function_exists('get_fees_types')) {
    function get_fees_types()
    {
        $CI =& get_instance();
        $query = "SELECT * FROM x_app_fees_types WHERE status = 1";
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_fees_type_name')) {
    function get_fees_type_name($id)
    {
        $CI =& get_instance();
        $query = "SELECT name FROM x_app_fees_types WHERE id = " . $id;
        $query = $CI->db->query($query);

        return $query->result()[0]->name;
    }
}