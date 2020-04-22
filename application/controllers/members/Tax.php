<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tax extends CI_Controller
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

        $this->load->model('merchants/Taxes');
    }

    public function index()
    {
        $merchant_id = $this->session->userdata('merchant_information')->id;

        $config = array();
        $config["base_url"] = base_url() . "members/tax";
        $config["total_rows"] = $this->Taxes->get_count($merchant_id);
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
            'title' => 'Taxes',
            'breadcrumps' => array('Taxes', 'List'),
            'links' => $this->pagination->create_links(),
            'taxes' => $this->Taxes->get_taxes($merchant_id,$config["per_page"], $page)
        );

        $this->load->view('merchants/taxes/list', $data);
    }

    public function add()
    {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $amount = $this->input->post('amount');
        $is_percentage = $this->input->post("is_percentage");
        $status = $this->input->post("status");

        if ($is_percentage == "on") {
            $is_percentage = 1;
        } else {
            $is_percentage = 0;
        }

        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $new_tax = array(
            'merchant_id' => $this->session->userdata('merchant_information')->id,
            'name' => $name,
            'description' => $description,
            'amount' => $amount,
            'is_percentage' => $is_percentage,
            'status' => $status
        );

        $this->Taxes->add($new_tax);
        die("<br>Execution Ended");
    }

    public function get_tax($id)
    {
        if($id != NULL){
            $tax = $this->Taxes->get_tax_by_id($id);
            $data = array(
                'success' => true,
                'tax' => $tax
            );
            echo json_encode($data);
            die;
        }
    }

    public function save()
    {
        $id = $this->input->post('tax_id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $amount = $this->input->post('amount');
        $is_percentage = $this->input->post('is_percentage');
        $status = $this->input->post("status");

        if ($is_percentage == "on") {
            $is_percentage = 1;
        } else {
            $is_percentage = 0;
        }

        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $save_tax = array(
            'merchant_id' => $this->session->userdata('merchant_information')->id,
            'name' => $name,
            'description' => $description,
            'amount' => $amount,
            'is_percentage' => $is_percentage,
            'status' => $status
        );

        $this->Taxes->update($save_tax, array('id'=>$id));
    }

    public function delete()
    {
        if($this->Taxes->delete($this->input->post('id'))){
            echo json_encode(array('success'=>true));
        }
    }
}