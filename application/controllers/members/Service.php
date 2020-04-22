<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('merchant_helper');
        $this->load->library("pagination");
        
        if(!is_merchant_login()){
            redirect(base_url('/members'));
        }

        $this->load->model('merchants/Services');
    }

    public function index()
    {
        $merchant_id = $this->session->userdata('merchant_information')->id;

        $config = array();
        $config["base_url"] = base_url() . "members/service";
        $config["total_rows"] = $this->Services->get_count($merchant_id);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;

        $config['full_tag_open'] = "<div class='kt-pagination kt-pagination--brand'><ul class='kt-pagination__links'>";
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="kt-pagination__link--active"><a href="javascript::">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-angle-left kt-font-brand"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-angle-right kt-font-brand"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data = array(
            'title' => 'Services',
            'breadcrumps' => array('Services', 'List'),
            'links' => $this->pagination->create_links(),
            'services' => $this->Services->get_services($merchant_id,$config["per_page"], $page)
        );
        $this->load->view('merchants/services/list', $data);
    }

    public function add()
    {
        $name = $this->input->post('name');
        $description = $this->input->post('description');

        $is_product = $this->input->post("is_product");
        if ($is_product == "on") {
            $is_product = 1;
        } else {
            $is_product = 0;
        }

        $price = $this->input->post('price');
        $attribute = $this->input->post('attributes');
        $category = $this->input->post('category');
        $tax = $this->input->post('taxes');
        $discount = $this->input->post('discounts');
        $duration = $this->input->post('service_duration');

        $status = $this->input->post("status");
        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $new_service = array(
            'merchant_id' => $this->session->userdata('merchant_information')->id,
            'name' => $name,
            'description' => $description,
            'is_product' => $is_product,
            'price' => $price,
            'attribute' => $attribute,
            'category'=> $category,
            'tax' => $tax,
            'discount' => $discount,
            'duration' => $duration,
            'status' => $status
        );

        $this->Services->add($new_service);
        die("<br>Under Development");
    }

    public function get_service($id)
    {
        if($id != NULL){
            $service = $this->Services->get_service_by_id($id);

            $service_media = "";
            if(is_array(get_service_media($id))){
                $service_media = get_service_media($id);
            }

            $service_category = "";
            if(is_array(get_service_category($id))){
                $service_category = get_service_category($id);
            }

            $data = array(
                'success' => true,
                'service' => $service,
                'service_tax' => get_service_tax($id),
                'service_discount' => get_service_discount($id),
                'service_attribute' => get_service_attributes($id),
                'service_category' => $service_category,
                'service_media' => $service_media
            );
            echo json_encode($data);
            die;
        }
    }

    public function save()
    {
        $merchant_id = $this->session->userdata('merchant_information')->id;
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $is_product = $this->input->post("is_product");
        if ($is_product == "on") {
            $is_product = 1;
        } else {
            $is_product = 0;
        }
        $price = $this->input->post('price');
        $duration = $this->input->post('service_duration');
        $status = $this->input->post("status");
        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $categories = $this->input->post('category');
        $attributes = $this->input->post('attributes');
        $taxes = $this->input->post('taxes');
        $discounts = $this->input->post('discounts');

        // remove previous catergory
        $this->Services->delete_assigned_catergory($id);

        // remove previous attribute
        $this->Services->delete_assigned_attribute($id);

        // remove previous taxes
        $this->Services->delete_assigned_taxes($id);

        // remove previous discounts
        $this->Services->delete_assigned_discounts($id);

        // remove assigned media
        if(count($_FILES['media'])>0){
            $this->Services->delete_assigned_medias($id);
        }

        // add new category
        $this->Services->assign_category($merchant_id, $id, $categories);

        // add new attributue
        $this->Services->assign_attribute($merchant_id, $id, $attributes);

        // add new taxes
        $this->Services->assign_taxes($merchant_id, $id, $taxes);

        // add new discounts
        $this->Services->assign_discounts($merchant_id, $id, $discounts);

        // add new media
        if(count($_FILES['media']) > 0){
            $this->Services->assign_medias($merchant_id, $id);
        }
        // update service
        $save = array(
            'merchant_id' => $this->session->userdata('merchant_information')->id,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'is_product' => $is_product,
            'duration' => $duration,
            'status' => $status
        );
        $this->Services->update($save, array('id'=>$id));

    }

    public function delete()
    {
        if($this->Services->delete($this->input->post('id'))){
            echo json_encode(array('success'=>true));
        }
    }

    public function get_service_attributes()
    {
        $service_id = $this->input->post('service_id');
        $attributes = $this->Services->get_service_attributes($service_id);
        echo $this->load->view('merchants/ajax/service_attributes',array('attributes'=>$attributes, 'service_id'=>$service_id), TRUE);
        die;
    }

    public function get_service_medias()
    {
        $service_id = $this->input->post('service_id');
        $medias = $this->Services->get_service_media($service_id);
        echo $this->load->view('merchants/ajax/service_media',array('medias'=>$medias, 'service_id'=>$service_id), TRUE);
        die;
    }
}