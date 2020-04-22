<?php 
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('is_merchant_login')) {
    function is_merchant_login()
    {
        $CI =& get_instance();
        if(!isset($CI->session->userdata('merchant_information')->id)){
            return false;
        } else {
            return true;
        }
    }
}

if (!function_exists('get_active_categories')) {
    function get_active_categories()
    {
        $CI =& get_instance();
        $query = "SELECT * FROM app_merchant_categories WHERE status = 1 AND merchant_id = ".$CI->session->userdata('merchant_information')->id;
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_active_attributes')) {
    function get_active_attributes()
    {
        $CI =& get_instance();
        $query = "SELECT * FROM app_service_attributes WHERE status = 1 AND merchant_id = ".$CI->session->userdata('merchant_information')->id;
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_active_tax')) {
    function get_active_tax()
    {
        $CI =& get_instance();
        $query = "SELECT id, name, amount, is_percentage FROM app_merchant_taxes WHERE status = 1 AND merchant_id = ".$CI->session->userdata('merchant_information')->id;
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_active_discount')) {
    function get_active_discount()
    {
        $CI =& get_instance();
        $query = "SELECT id, name, amount, is_percentage FROM app_merchant_discounts WHERE status = 1 AND merchant_id = ".$CI->session->userdata('merchant_information')->id;
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_parent_category_name')) {
    function get_parent_category_name($cat_id)
    {
        $CI =& get_instance();
        $query = "SELECT name FROM app_merchant_categories WHERE id = ".$cat_id;
        $query = $CI->db->query($query);

        return $query->result()[0]->name;
    }
}

if (!function_exists('get_merchant_tax')) {
    function get_merchant_tax($tax_id)
    {
        $CI =& get_instance();
        $query = "SELECT id, name, amount, is_percentage FROM app_merchant_taxes WHERE id = ".$tax_id;
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_merchant_discount')) {
    function get_merchant_discount($discount_id)
    {
        $CI =& get_instance();
        $query = "SELECT id, name, amount, is_percentage FROM app_merchant_discounts WHERE id = ".$discount_id;
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_services_details')) {
    function get_services_details($id)
    {
        $CI =& get_instance();
        $query = "SELECT * FROM app_services WHERE id = " . $id;
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_service_tax')) {
    function get_service_tax($service_id)
    {
        $CI =& get_instance();
        $query = "SELECT id, name, amount, is_percentage FROM app_merchant_taxes WHERE id IN ( SELECT tax_id FROM app_service_assigned_taxes WHERE service_id = ".$service_id.")";
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_service_discount')) {
    function get_service_discount($service_id)
    {
        $CI =& get_instance();
        $query = "SELECT id, name, amount, is_percentage FROM app_merchant_discounts WHERE id IN ( SELECT discount_id FROM app_service_assigned_discounts WHERE service_id = ".$service_id.")";
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_service_attributes')) {
    function get_service_attributes($service_id)
    {
        $CI =& get_instance();
        $query = "SELECT * FROM app_service_attributes WHERE id IN ( SELECT attribute_id FROM app_service_assigned_attributes WHERE service_id = ".$service_id.")";
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_service_media')) {
    function get_service_media($service_id)
    {
        $CI =& get_instance();
        $query = "SELECT * FROM app_service_medias WHERE service_id = ".$service_id;
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_service_category')) {
    function get_service_category($service_id)
    {
        $CI =& get_instance();
        $query = "SELECT * FROM app_merchant_categories WHERE id IN ( SELECT category_id FROM app_service_assigned_categories WHERE service_id = ".$service_id.")";
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_service_media')) {
    function get_service_media($service_id)
    {
        $CI =& get_instance();
        $query = "SELECT id, media FROM app_service_medias WHERE service_id = ".$service_id."";
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_services')) {
    function get_services($merchant_id)
    {
        $CI =& get_instance();
        $query = "SELECT * FROM app_services WHERE merchant_id = " . $merchant_id;
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_merchant_configurations')) {
    function get_merchant_configurations($config_name)
    {
        $CI =& get_instance();
        $merchant_id = $CI->session->userdata('merchant_information')->id;
        $query = "SELECT * FROM app_merchant_configurations WHERE merchant_id = " . $merchant_id ." AND name LIKE '". $config_name."'";
        $query = $CI->db->query($query);

        return $query->result()[0]->value;
    }
}

if (!function_exists('get_customer')) {
    function get_customer($field, $string)
    {
        $CI =& get_instance();
        $merchant_id = $CI->session->userdata('merchant_information')->id;
        $query = "SELECT * FROM app_customers WHERE ".$field." = '".$string."' AND created_by = " . $merchant_id ." AND created_type = 1";
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_payment_method')) {
    function get_payment_method()
    {
        $CI =& get_instance();
        $query = "SELECT * FROM app_payment_methods WHERE status = 1";
        $query = $CI->db->query($query);

        return $query->result();
    }
}

if (!function_exists('get_payment_method_details')) {
    function get_payment_method_details($method_id)
    {
        $CI =& get_instance();
        $query = "SELECT * FROM app_payment_methods WHERE id = ".$method_id;
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