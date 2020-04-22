<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appointment extends CI_Controller
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

        $this->load->model('merchants/Appointments');
    }

    public function index()
    {
        redirect(base_url('/members/appointment/calender'));
    }

    public function calender()
    {
        $data = array(
            'title' => 'Appointments',
            'breadcrumps' => array('Appointments', 'Calender')
        );

        $this->load->view('merchants/appointments/calender', $data);
    }

    public function get_appointments()
    {
        $date = date('Y-m-d',strtotime($this->input->post('date')));
        $appointments = $this->Appointments->get_appointments($date);

        echo $this->load->view('merchants/ajax/booked_appointments_list', array('appointments'=>$appointments), TRUE);
        die;
    }

    public function book()
    {
        $data = array(
            'title' => 'Appointments',
            'breadcrumps' => array('Appointments', 'Book')
        );

        $this->load->view('merchants/appointments/book', $data);
    }

    public function booking_summary()
    {
        $service_array = array();

        if(is_array($this->input->post('services')) > 0){
            $i=0;
            foreach($this->input->post('services') as $k => $v){
                $service_array[$i++] = get_services_details($v['id']);
            }
            $i++;
        }

        $data = array(
            "customer" => $this->input->post('customer'),
            "appointment_schedule" => $this->input->post('appointment_schedule'),
            "payment_method" => get_payment_method_details($this->input->post('payment_method'))[0]->name,
            "services" => $service_array,
        );

        echo $this->load->view('merchants/ajax/booking_preview',$data, TRUE);
    }

    public function process_booking()
    {
        echo "<pre>";
        print_r($_POST);
        die("Processing Booking!");
    }

    public function search_customer()
    {
        echo json_encode(get_customer($this->input->post('field'),$this->input->post('string')));
        die;
    }
}