<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('merchant_helper');

        if(!is_merchant_login()){
            redirect(base_url('/members'));
        }

        $this->load->model('merchants/Settings');
    }

    public function index()
    {
        $data = array(
            'title' => 'Settings',
            'breadcrumps' => array('Merchant', 'Settings'),
            'breadcrump_links' => array('members/merchant/','#')
        );

        $this->load->view('merchants/settings/dashboard', $data);
    }

    public function schedule()
    {
        $merchant_id = $this->session->userdata('merchant_information')->id;

        // get schedule
        $schedule = $this->Settings->get_schedule($merchant_id);

        $data = array(
            'title' => 'Settings',
            'breadcrumps' => array('Merchant', 'Settings', 'Schedule'),
            'schedule' => $schedule
        );

        $this->load->view('merchants/settings/schedule', $data);
    }

    public function save_schedule()
    {
        $merchant_id = $this->session->userdata('merchant_information')->id;

        // clear previous schedule
        $this->Settings->clear_schedule($merchant_id);
        
        $data = array();
        for($i=0; $i<count($this->input->post('start')); $i++){

            $days = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
            $start = date('H:i:s',strtotime($this->input->post('start')[$i]));
            $end = date('H:i:s',strtotime($this->input->post('end')[$i]));

            $is_off = 0;
            if($this->input->post('week_off_'.$i)[0] == "on"){
                $is_off = 1;
            }

            $data[] = array(
                "merchant_id" => $merchant_id,
                "day" => ($i+1),
                "start" => $start,
                "end" => $end,
                "is_off" => $is_off
            );
        }

        // add updated schedule
        $this->Settings->save_schedule($data);

        die("Script Terminated");
    }

    public function holiday()
    {
        $merchant_id = $this->session->userdata('merchant_information')->id;

        // get schedule
        $holidays = $this->Settings->get_holidays($merchant_id);

        $data = array(
            'title' => 'Settings',
            'breadcrumps' => array('Merchant', 'Settings', 'Holidays'),
            'holidays' => $holidays
        );

        $this->load->view('merchants/settings/holiday', $data);
    }

    public function add_holiday()
    {
        $merchant_id = $this->session->userdata('merchant_information')->id;
        $holiday_date = date('Y-m-d', strtotime($this->input->post('holiday_date')));
        $holiday_name = $this->input->post('holiday_name');

        $data = array(
            'merchant_id' => $merchant_id,
            'holiday_date' => $holiday_date,
            'holiday_name' => $holiday_name
        );

        // add holiday
        $this->Settings->add_holidays($data);

        die("Script Terminated");
    }

    public function delete_holiday()
    {
        $id = $this->input->post('id');
        $this->Settings->delete_holiday($id);
    }

    public function configuration()
    {
        $merchant_id = $this->session->userdata('merchant_information')->id;

        // get schedule
        $configs = $this->Settings->get_configs($merchant_id);

        $data = array(
            'title' => 'Configurations',
            'breadcrumps' => array('Merchant', 'Settings', 'Configurations'),
            'configs' => $configs
        );

        $this->load->view('merchants/settings/configuration', $data);
    }

    public function add_configuration()
    {

        $merchant_id = $this->session->userdata('merchant_information')->id;
        $name = $this->input->post('add_conf_name');
        $value = $this->input->post('add_conf_value');

        $data = array(
            'merchant_id' => $merchant_id,
            'name' => $name,
            'value' => $value
        );

        // add holiday
        $this->Settings->add_configuration($data);

        die("Script Terminated");
    }

    public function save_configuration()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $value = $this->input->post('value');

        $data = array(
            'name' => $name,
            'value' => $value
        );

        $this->Settings->save_configuration(array('id'=>$id), $data);

        die("Script Terminated");
    }

    public function payment_methods()
    {
        $merchant_id = $this->session->userdata('merchant_information')->id;

        // fetch added payment methods
        $methods = $this->Settings->get_payment_methods($merchant_id);

        $data = array(
            'title' => 'Payment Methods',
            'breadcrumps' => array('Merchant', 'Settings', 'Payment Methods'),
            'breadcrump_links' => array('members/merchant/', 'members/mechant/setting/', '#'),
            'methods' => $methods
        );

        $this->load->view('merchants/settings/payment_methods', $data);
    }
}