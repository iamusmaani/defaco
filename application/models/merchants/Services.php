<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Services extends CI_Model
{
    const TABLE = "app_services";
    const TABLE2 = "app_service_assigned_attributes";
    const TABLE3 = "app_service_assigned_categories";
    const TABLE4 = "app_service_assigned_discounts";
    const TABLE5 = "app_service_assigned_taxes";
    const TABLE6 = "app_service_medias";

    const TABLE_ATTRIBUTE = "app_service_attributes";

    private $max_upload_size = 20460000;
    private $allowed_extensions = "gif|jpg|png|jpeg|pdf|mp4";
    private $upload_path = "./uploads/services/";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload');
    }

    public function add($service)
    {
        try {
            $service_data = array(
                'name' => $service['name'],
                'description' => $service['description'],
                'price' => $service['price'],
                'duration' => $service['duration'],
                'status' => $service['status'],
                'merchant_id' => $service['merchant_id']
            );
            $res = $this->db->insert(self::TABLE, $service_data);
            if ($res) {
                $service_id = $this->db->insert_id();

                // adding attributes
                if(is_array($service['attribute'])){
                    for($i=0;$i<count($service['attribute']);$i++){
                        $service_attribute = array(
                            'merchant_id' => $service['merchant_id'],
                            'service_id' => $service_id,
                            'attribute_id' => $service['attribute'][$i],
                        );
                        $this->db->insert(self::TABLE2, $service_attribute);
                    }
                }

                // adding category
                if($service['category'] != 0){
                    $service_tax = array(
                        'merchant_id' => $service['merchant_id'],
                        'service_id' => $service_id,
                        'category_id' => $service['category'],
                    );
                    $this->db->insert(self::TABLE3, $service_tax);
                }

                // adding discount
                if(is_array($service['discount'])){
                    for($i=0;$i<count($service['discount']);$i++){
                        $service_tax = array(
                            'merchant_id' => $service['merchant_id'],
                            'service_id' => $service_id,
                            'discount_id' => $service['discount'][$i],
                        );
                        $this->db->insert(self::TABLE4, $service_tax);
                    }
                }

                // adding tax
                if(is_array($service['tax']) > 0){
                    for($i=0;$i<count($service['tax']);$i++){
                        $service_tax = array(
                            'merchant_id' => $service['merchant_id'],
                            'service_id' => $service_id,
                            'tax_id' => $service['tax'][$i],
                        );
                        $this->db->insert(self::TABLE5, $service_tax);
                    }
                }

                // uploadng media
                $uploaded_files = $this->upload_service_media($service_id);
                if(!isset($uploaded_files['filenames'])){
                    $this->session->set_flashdata('error', 'Files not uploaded, please upload it later');
                    redirect(base_url('/members/service/'));
                }

                for($i=0; $i<count($uploaded_files['filenames']); $i++){
                    $service_tax = array(
                        'merchant_id' => $service['merchant_id'],
                        'service_id' => $service_id,
                        'media' => $uploaded_files['filenames'][$i]
                    );
                    $this->db->insert(self::TABLE6, $service_tax);
                }
                $this->session->set_flashdata('success', 'Service added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Unable to add Service.');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Unable to add Service.');
        }
        redirect(base_url('/members/service/'));
    }

    public function update($changes, $where)
    {
        $this->db->where($where);
        $query = $this->db->update(self::TABLE, $changes);

        $this->session->set_flashdata('success', 'Service Updated Successfully');
        redirect(base_url('/members/service'));
    }

    public function delete($id)
    {
        $this->db->delete(self::TABLE, array('id' => $id)); 
        $this->db->delete(self::TABLE2, array('service_id' => $id));
        $this->db->delete(self::TABLE3, array('service_id' => $id));
        $this->db->delete(self::TABLE4, array('service_id' => $id));
        $this->db->delete(self::TABLE5, array('service_id' => $id));
        $this->db->delete(self::TABLE6, array('service_id' => $id));
        
        $this->delete_media_folder($this->upload_path.$id);
        return true;
    }

    private function delete_media_folder($url)
    {
        if (is_dir($url)){
            $dir_handle = opendir($url);
        }
           
        if (!isset($dir_handle)){
            return false;
        }
            
        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($url."/".$file)){
                    unlink($url."/".$file);
                } else {
                    $this->delete_media_folder($url.'/'.$file);
                }
            }
        }
        closedir($dir_handle);
        rmdir($url);
        return true;
    }

    public function get_count($merchant_id)
    {
        $this->db->where('merchant_id', $merchant_id);
        $query = $this->db->get(self::TABLE);
        return $query->num_rows();
    }

    public function get_services($merchant_id, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('merchant_id', $merchant_id);
        $this->db->where('deleted_at', NULL);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get(self::TABLE);
        return $query->result();
    }

    public function get_service_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get(self::TABLE);
        return $query->result()[0];
    }

    private function upload_service_media($service_id)
    {
        
        $countfiles = count($_FILES['media']['name']);
        
        $data = array();
        for($i=0;$i<$countfiles;$i++){
            if(!empty($_FILES['media']['name'][$i])){
                $_FILES['file']['name'] = $_FILES['media']['name'][$i];
                $_FILES['file']['type'] = $_FILES['media']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['media']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['media']['error'][$i];
                $_FILES['file']['size'] = $_FILES['media']['size'][$i];

                if (!is_dir($this->upload_path.$service_id)) {
                    mkdir($this->upload_path. $service_id, 0777, TRUE);
                }

                $config = array(
                    'upload_path'   => $this->upload_path.$service_id,
                    'allowed_types' => $this->allowed_extensions,
                    'overwrite'     => TRUE,
                    'max_size'      => $this->max_upload_size,
                    'file_name'     => $service_id."-".$i
                );

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                // File upload
                if($this->upload->do_upload('file')){
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];

                    // Initialize array
                    $data['filenames'][] = $filename;
                } else {
                    $data['errors'][] = $this->upload->display_errors();
                }
            }
        }

        return $data;
    }

    public function delete_assigned_catergory($service_id)
    {
        $this->db->delete(self::TABLE3, array('service_id' => $service_id));
    }

    public function delete_assigned_attribute($service_id)
    {
        $this->db->delete(self::TABLE2, array('service_id' => $service_id));
    }

    public function delete_assigned_taxes($service_id)
    {
        $this->db->delete(self::TABLE5, array('service_id' => $service_id));
    }

    public function delete_assigned_discounts($service_id)
    {
        $this->db->delete(self::TABLE4, array('service_id' => $service_id));
    }

    public function delete_assigned_medias($service_id)
    {
        $this->delete_media_folder($this->upload_path.$service_id);
        $this->db->delete(self::TABLE6, array('service_id' => $service_id));
    }

    public function assign_attribute($merchant_id, $service_id, $arribute_ids)
    {
        if(is_array($arribute_ids)){
            if(count($arribute_ids) > 0){
                foreach($arribute_ids as $k => $v){
                    $attribute = array(
                        'merchant_id' => $merchant_id,
                        'service_id' => $service_id,
                        'attribute_id' => $v
                    );
                    $this->db->insert(self::TABLE2, $attribute);
                }   
            }
        }
    }

    public function assign_category($merchant_id, $service_id, $category_ids)
    {
        if(is_array($category_ids)){
            if(is_array($arribute_ids)){
                if(count($arribute_ids) > 0){
                    foreach($category_ids as $k => $v){
                        if($v !=0 ){
                            $category = array(
                                'merchant_id' => $merchant_id,
                                'service_id' => $service_id,
                                'category_id' => $v
                            );
                            $this->db->insert(self::TABLE3, $category);
                        }
                    }
                }
            }
        } else {
            $category = array(
                'merchant_id' => $merchant_id,
                'service_id' => $service_id,
                'category_id' => $category_ids
            );
            $this->db->insert(self::TABLE3, $category);
        }
        
    }

    public function assign_taxes($merchant_id, $service_id, $taxes)
    {
        if(is_array($taxes)){
            if(count($taxes) > 0){
                foreach($taxes as $k => $v){
                    if($v != 0){
                        $tax = array(
                            'merchant_id' => $merchant_id,
                            'service_id' => $service_id,
                            'tax_id' => $v
                        );
                        $this->db->insert(self::TABLE5, $tax);
                    }
                }   
            }
        }
    }

    public function assign_discounts($merchant_id, $service_id, $discounts)
    {
        if(is_array($discounts)){
            if(count($discounts) > 0){
                foreach($discounts as $k => $v){
                    if($v != 0){
                        $tax = array(
                            'merchant_id' => $merchant_id,
                            'service_id' => $service_id,
                            'discount_id' => $v
                        );
                        $this->db->insert(self::TABLE4, $tax);
                    }
                }   
            }
        }
    }

    public function assign_medias($merchant_id, $service_id)
    {
        // uploadng media
        $uploaded_files = $this->upload_service_media($service_id);
        
        for($i=0; $i<count($uploaded_files['filenames']); $i++){
            $service_tax = array(
                'merchant_id' => $merchant_id,
                'service_id' => $service_id,
                'media' => $uploaded_files['filenames'][$i]
            );
            $this->db->insert(self::TABLE6, $service_tax);
        }
    }

    public function get_service_attributes($service_id)
    {
        return get_service_attributes($service_id);
    }

    public function get_service_media($service_id)
    {
        return get_service_media($service_id);
    }
}
