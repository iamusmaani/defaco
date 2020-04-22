<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merchant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('merchant_helper');
        $this->load->model('merchants/Merchants');
    }

    public function index()
    {
        $this->validate_active_sesion();
        
        $data = array(
            'title' => 'Dashboard',
            'breadcrumps' => array('Merchant', 'Dashboard')
        );

        $this->load->view('merchants/dashboard', $data);
    }

    public function login()
    {
        $this->validate_no_session();

        $data = array(
            'title' => 'Merchant Portal Login'
        );

        $this->load->view('merchants/login',$data);
    }

    public function signup()
    {
        $this->validate_no_session();

        $data = array(
            'title' => 'Join Us'
        );

        $this->load->view('merchants/register',$data);
    }

    public function logout()
    {
        $this->terminate_session();
        $this->session->set_flashdata('error', 'You logged out successfully.');
        redirect(base_url('/members'));
    }

    public function process_login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        
        if($data = $this->Merchants->process_login(array('email'=>$email,'password'=>$password))){
            $this->create_user_session($data);
            $this->session->set_flashdata('success', 'You logged in successfully.');
            redirect(base_url('/members/merchant/'));
        }
    }

    private function create_user_session($data)
    {
        $this->session->set_userdata('merchant_information', $data);
    }

    public function process_signup()
    {
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $company_name = $this->input->post('company_name');
        $password = md5($this->input->post('password'));

        if($this->input->post('terms') == "on"){
            $insert_array = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $phone,
                'company_name' => $company_name,
                'password' => $password,
                'status' => 0
            );
            $this->Merchants->add($insert_array);
        } else {
            $this->session->set_flashdata('error', 'Sorry, You dont agreed our terms. We cannot create your account.');
            redirect(base_url('/members/merchant/signup'));
        }
    }

    public function terms_conditions()
    {
        $data = array(
            'title' => 'Merchant Terms & Conditions'
        );
        $this->load->view('merchants/terms_conditions',$data);
    }

    private function validate_active_sesion()
    {
       if(!isset($this->session->userdata('merchant_information')->id)){
            redirect(base_url('/members'));
       }
    }

    private function validate_no_session()
    {
        if(isset($this->session->userdata('merchant_information')->id)){
            redirect(base_url('/members/merchant/'));
        }
    }

    private function terminate_session()
    {
        session_destroy();
    }
} 