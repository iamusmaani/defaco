<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paymethod extends CI_Controller
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

        $this->load->model('admin/Paymethods');
    }

    public function index()
    {
        $config = array();
        $config["base_url"] = base_url() . "administration/paymethod";
        $config["total_rows"] = $this->Paymethods->get_count();
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
            'title' => 'Payment Methods',
            'breadcrumps' => array('Payment Methods', 'List'),
            'links' => $this->pagination->create_links(),
            'paymethod' => $this->Paymethods->get_pay_methods($config["per_page"], $page)
        );

        $this->load->view('admin/pay_methods/list', $data);
    }

    public function add()
    {
        $name = $this->input->post('name');
        $description = $this->input->post('description');

        $status = $this->input->post("status");
        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $method = array(
            'name' => $name,
            'description' => $description,
            'status' => $status
        );

        $this->Paymethods->add($method);
        die("<br>Under Development");
    }

    public function get_paymethod($id)
    {
        if($id != NULL){
            $paymethod = $this->Paymethods->get_paymethod_by_id($id);
            $data = array(
                'success' => true,
                'paymethod' => $paymethod
            );
            echo json_encode($data);
            die;
        }
    }

    public function save()
    {
        $id = $this->input->post('method_id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');

        $status = $this->input->post("status");
        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $changes = array(
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'status' => $status
        );

        $this->Paymethods->update($changes, array('id'=>$id));
    }

    public function delete()
    {
        if($this->Paymethods->delete($this->input->post('id'))){
            echo json_encode(array('success'=>true));
        }
    }
}