<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function profile()
    {
        $this->load->view("customers/profile.php");
    }
    
    public function change_password()
    {
        $this->load->view("customers/change-password.php");
    }
    
    public function chat()
    {
        $this->load->view("customers/chat.php");
    }
    
    public function favourites()
    {
        $this->load->view("customers/favourites.php");
    }
    
    public function invoices()
    {
        $this->load->view("customers/invoices.php");
    }
    
    public function settings()
    {
        $this->load->view("customers/profile-settings.php");
    }
    
    public function reviews()
    {
        $this->load->view("customers/reviews.php");
    }
    
    public function videocall()
    {
        $this->load->view("customers/video-call.php");
    }
    
    public function voicecall()
    {
        $this->load->view("customers/voice-call.php");
    }
    
    public function invoice()
    {
        $this->load->view("customers/invoice.php");
    }
    
    public function booking()
    {
        $this->load->view("customers/booking.php");
    }
    
    public function success()
    {
        $this->load->view("customers/booking-success.php");
    }
    
    public function checkout()
    {
        $this->load->view("customers/checkout.php");
    }
    
    public function appointment()
    {
        $this->load->view("customers/appointment.php");
    }
    
    public function wallet()
    {
        $this->load->view("customers/wallet.php");
    }

}