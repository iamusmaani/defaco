<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('admin_helper');
        $this->load->library("pagination");
        
        if(!is_admin_login()){
            redirect(base_url('/admin'));
        }

        $this->load->model('admin/Fees');
    }

    public function index()
    {
        $config = array();
        $config["base_url"] = base_url() . "administration/fee";
        $config["total_rows"] = $this->Fees->get_count();
        $config["per_page"] = 2;
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
            'title' => 'Processing Fees',
            'breadcrumps' => array('Processing Fees', 'List'),
            'links' => $this->pagination->create_links(),
            'fees' => $this->Fees->get_fees($config["per_page"], $page)
        );

        $this->load->view('admin/fees/list', $data);
    }

    public function add()
    {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $type = $this->input->post('type');

        $is_percentage = $this->input->post("is_percentage");
        if ($is_percentage == "on") {
            $is_percentage = 1;
        } else {
            $is_percentage = 0;
        }

        $amount = $this->input->post('amount');

        $status = $this->input->post("status");
        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $new_fee = array(
            'name' => $name,
            'description' => $description,
            'type' => $type,
            'is_percentage' => $is_percentage,
            'amount' => $amount,
            'status' => $status
        );

        $this->Fees->add($new_fee);
        die("<br>Under Development");
    }

    public function get_fee($id)
    {
        if($id != NULL){
            $fee = $this->Fees->get_fee_by_id($id);
            $data = array(
                'success' => true,
                'fee' => $fee
            );
            echo json_encode($data);
            die;
        }
    }

    public function save()
    {
        $id = $this->input->post('fee_id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $type = $this->input->post('type');

        $is_percentage = $this->input->post("is_percentage");
        if ($is_percentage == "on") {
            $is_percentage = 1;
        } else {
            $is_percentage = 0;
        }

        $amount = $this->input->post('amount');

        $status = $this->input->post("status");
        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $save_fee = array(
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'type' => $type,
            'is_percentage' => $is_percentage,
            'amount' => $amount,
            'status' => $status
        );

        $this->Fees->update($save_fee, array('id'=>$id));
    }

    public function delete()
    {
        if($this->Fees->delete($this->input->post('id'))){
            echo json_encode(array('success'=>true));
        }
    }
}