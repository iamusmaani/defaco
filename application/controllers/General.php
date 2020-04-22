<?php
defined('BASEPATH') or exit('No direct script access allowed');

class General extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('Generic');
    }

    public function get_states(){
        $country_id = $this->input->post('country_id');
        $States = $this->Generic->get_states($country_id);
        echo json_encode(array('States'=> $States));
        die;
    }

    public function get_cities(){
        $state_id = $this->input->post('state_id');
        $Cities = $this->Generic->get_cities($state_id);
        echo json_encode(array('Cities'=> $Cities));
        die;
    }

}
