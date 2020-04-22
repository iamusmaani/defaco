<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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

        $this->load->model('merchants/Categories');
    }

    public function index()
    {
        $merchant_id = $this->session->userdata('merchant_information')->id;

        $config = array();
        $config["base_url"] = base_url() . "members/category";
        $config["total_rows"] = $this->Categories->get_count($merchant_id);
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;

        $config['full_tag_open'] = "<div class='kt-pagination kt-pagination--brand'><ul class='kt-pagination__links'>";
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="kt-pagination__link--active"><a href="#">';
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
            'title' => 'Categories',
            'breadcrumps' => array('Categories', 'List'),
            'links' => $this->pagination->create_links(),
            'categories' => $this->Categories->get_categories($merchant_id,$config["per_page"], $page)
        );

        $this->load->view('merchants/categories/list', $data);
    }

    public function add()
    {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $parent_id = $this->input->post('parent_id')[0];
        $status = $this->input->post("status");

        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $new_category = array(
            'merchant_id' => $this->session->userdata('merchant_information')->id,
            'name' => $name,
            'description' => $description,
            'parent_id' => $parent_id,
            'status' => $status,
        );

        $this->Categories->add($new_category);
        die("<br>Under Development");
    }

    public function get_category($id)
    {
        if($id != NULL){
            $category = $this->Categories->get_category_by_id($id);
            $data = array(
                'success' => true,
                'category' => $category
            );
            echo json_encode($data);
            die;
        }
    }

    public function save()
    {
        $id = $this->input->post('category_id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $parent_id = $this->input->post('parent_id')[0];
        $status = $this->input->post("status");

        if($id == $parent_id){
            $this->session->set_flashdata('error', 'Category cannot be its own Parent');
            redirect(base_url('/members/category'));
        }

        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $save_category = array(
            'merchant_id' => $this->session->userdata('merchant_information')->id,
            'name' => $name,
            'description' => $description,
            'parent_id' => $parent_id,
            'status' => $status,
        );

        $this->Categories->update($save_category, array('id'=>$id));
    }

    public function delete()
    {
        if($this->Categories->delete($this->input->post('id'))){
            echo json_encode(array('success'=>true));
        }
    }
}