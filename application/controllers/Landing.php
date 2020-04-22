<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Generic');
    }

    public function index()
    {
        $this->load->view('home');
    }

    public function show_interest()
    {
        $this->load->view('interested');
    }
    
    public function show_terms()
    {
        $this->load->view('term-condition');
    }
    
    public function show_privacy()
    {
        $this->load->view('privacy-policy');
    }
    
    public function show_register()
    {
        $this->load->view('register');
    }

    public function show_login()
    {
        $this->load->view('login');
    }

     public function show_provider_register()
    {
        $this->load->view('provider-register');
    }
    
     public function show_forgot_password()
    {
        $this->load->view('forgot-password');
    }
    
    public function show_search()
    {
        $this->load->view('search');
    }

    public function show_provider_profile()
    {
        $this->load->view('provider-profile');
    }
    
    public function show_faq()
    {
        $this->load->view('faq');
    }
    
    public function show_business()
    {
        $this->load->view('business');
    }
    

    public function record_interest()
    {

        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $company = $this->input->post('company');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');

        $record_interest = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'company' => $company,
            'email' => $email,
            'phone' => $phone,
            'source' => 1,
        );

        $this->Generic->record_interest($record_interest);
    }

    public function register_merchant()
    {
        $this->session->set_flashdata('error', 'Feature Under Development. Contact info@defaco.com');
        redirect(base_url('/#pricing'));
    }

    public function get_in_touch()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $description = $this->input->post('description');
        $phone = $this->input->post('phone');
        $callme = $this->input->post('callme');

        if ($callme == "on") {
            $callme = 1;
        } else {
            $callme = 0;
        }

        $data = array(
            'name' => $name,
            'email' => $email,
            'description' => $description,
            'call_allowed' => $callme,
            'phone'=> $phone
        );

        $this->Generic->record_enquiry($data);
    }
}
