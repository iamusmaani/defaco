<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lead extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin/Leads');
        $this->load->helper('admin_helper');
    }

    public function index()
    {
        $leads = $this->Leads->get_all(array('deleted_at' => null));

        $data = array(
            'title' => 'List',
            'breadcrumps' => array('Admin', 'Leads', 'List'),
            'leads' => $leads
        );

        $this->load->view('admin/leads/manager', $data);
    }
}
