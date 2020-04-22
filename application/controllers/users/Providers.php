<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Providers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function customers_profile()
    {
        $this->load->view("providers/customer_profile.php");
    }
    
    public function provider_profile()
    {
        $this->load->view("providers/dashboard.php");
    }
    
    public function provider_change_password()
    {
        $this->load->view("providers/change-password.php");
    }
    
    public function provider_messages()
    {
        $this->load->view("providers/providers_messages.php");
    }
    
    public function customers()
    {
        $this->load->view("providers/customers.php");
    }
    
    public function provider_invoices()
    {
        $this->load->view("providers/invoices.php");
    }
    
    public function provider_settings()
    {
        $this->load->view("providers/profile-settings.php");
    }
    
    public function reviews()
    {
        $this->load->view("providers/reviews.php");
    }
    
    public function schedule()
    {
        $this->load->view("providers/schedule-timings.php");
    }
    
    public function social_media()
    {
        $this->load->view("providers/social-media.php");
    }

}