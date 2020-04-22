<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Enquiry extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin/Enquiries');
        $this->load->helper('admin_helper');
    }

    public function index()
    {
        $enquiries = $this->Enquiries->get_all(array('deleted_at' => null));

        $data = array(
            'title' => 'List',
            'breadcrumps' => array('Admin', 'Enquiry', 'List'),
            'enquiries' => $enquiries
        );

        $this->load->view('admin/enquiries/manager', $data);
    }
}
