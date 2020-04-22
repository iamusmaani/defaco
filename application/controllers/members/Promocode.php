<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PromoCode extends CI_Controller
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

        $this->load->model('merchants/PromoCodes');
    }

    public function index()
    {
        $merchant_id = $this->session->userdata('merchant_information')->id;

        $config = array();
        $config["base_url"] = base_url() . "members/promocode";
        $config["total_rows"] = $this->PromoCodes->get_count($merchant_id);
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
            'title' => 'Promo Codes',
            'breadcrumps' => array('Promo Codes', 'List'),
            'links' => $this->pagination->create_links(),
            'promo' => $this->PromoCodes->get_promos($merchant_id,$config["per_page"], $page)
        );

        $this->load->view('merchants/promo_codes/list', $data);
    }

    public function add()
    {
        $code = $this->input->post('code');
        $description = $this->input->post('description');
        $quantity = $this->input->post('quantity');
        $expiry_date = $this->input->post('expiry_date');
        $amount = $this->input->post('amount');

        $status = $this->input->post("status");
        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $is_percentage = $this->input->post("is_percentage");
        if ($is_percentage == "on") {
            $is_percentage = 1;
        } else {
            $is_percentage = 0;
        }

        $new_promo = array(
            'merchant_id' => $this->session->userdata('merchant_information')->id,
            'code' => $code,
            'description' => $description,
            'quantity' => $quantity,
            'expiry_date' => date('Y-m-d h:i:s', strtotime($expiry_date)),
            'amount' => $amount,
            'status' => $status,
            'is_percentage' => $is_percentage
        );

        $this->PromoCodes->add($new_promo);
        die("<br>Under Development");
    }

    public function get_promo($id)
    {
        if($id != NULL){
            $promocode = $this->PromoCodes->get_promo_by_id($id);
            $data = array(
                'success' => true,
                'promocode' => $promocode
            );
            echo json_encode($data);
            die;
        }
    }

    public function save()
    {
        $id = $this->input->post('attribute_id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');

        $have_price = $this->input->post("have_price");
        if ($have_price == "on") {
            $have_price = 1;
        } else {
            $have_price = 0;
        }

        $is_product = $this->input->post("is_product");
        if ($is_product == "on") {
            $is_product = 1;
        } else {
            $is_product = 0;
        }

        $price = $this->input->post('price');
        $tax = $this->input->post('tax');
        $discount = $this->input->post('discount');
        $duration = $this->input->post('duration');

        $status = $this->input->post("status");
        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $save_attribute = array(
            'merchant_id' => $this->session->userdata('merchant_information')->id,
            'name' => $name,
            'description' => $description,
            'have_price' => $have_price,
            'price' => $price,
            'is_product' => $is_product,
            'tax' => $tax[0],
            'discount' => $discount[0],
            'duration' => $duration,
            'status' => $status
        );

        $this->Attributes->update($save_attribute, array('id'=>$id));
    }

    public function delete()
    {
        if($this->PromoCodes->delete($this->input->post('id'))){
            echo json_encode(array('success'=>true));
        }
    }
}