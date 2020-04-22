<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin/Roles');
        $this->load->model('admin/Users');
        $this->load->helper('admin_helper');
    }

    public function index()
    {
        $this->validate_active_sesion();

        $Roles = $this->Roles->get_all();

        // get added user data for listing
        $users = $this->Users->get_all(array('deleted_at' => null));

        $page_data = array();
        $i = 0;
        foreach ($users as $value) {
            $role = get_role_id($value->id);
            $page_data[$i]['id'] = $value->id;
            $page_data[$i]['first_name'] = $value->first_name;
            $page_data[$i]['last_name'] = $value->last_name;
            $page_data[$i]['email'] = $value->email;
            $page_data[$i]['mobile'] = $value->mobile;

            $page_data[$i]['address_line_1'] = $value->address_line_1;
            $page_data[$i]['address_line_2'] = $value->address_line_2;
            $page_data[$i]['country'] = $value->country;
            $page_data[$i]['state'] = $value->state;
            $page_data[$i]['city'] = $value->city;
            $page_data[$i]['zip'] = $value->zip;

            $page_data[$i]['created_at'] = $value->created_at;

            $j = 0;
            foreach ($role as $v) {
                $page_data[$i]['assigned_roles'][$j] = $v->role_id;
                $j++;
            }

            $i++;
        }

        $data = array(
            'title' => 'List',
            'breadcrumps' => array('Admin', 'List'),
            'Roles' => $Roles,
            'PageData' => $page_data,
        );

        $this->load->view('admin/users/manager', $data);
    }

    public function login()
    {
        $this->validate_no_session();

        $data = array(
            'title' => 'Admin Login',
            'breadcrumps' => array('Admin', 'Login')
        );
        $this->load->view('admin/login', $data);
    }

    public function process_login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        
        if($user_data = $this->Users->process_login(array('email'=>$email,'password'=>$password))){
            $this->create_user_session($user_data);
            $this->session->set_flashdata('success', 'You logged in successfully.');
            redirect(base_url('/administration/admin/'));
        }
    }

    public function logout()
    {
        $this->terminate_session();
        $this->session->set_flashdata('error', 'You logged out successfully.');
        redirect(base_url('/administration/admin/login'));
    }

    public function terminate_session()
    {
        session_destroy();
    }

    public function create_user_session($user_data)
    {
        $user_roles = $this->Users->get_roles($user_data->id);
        $this->session->set_userdata('admin_user_information', $user_data);
        $this->session->set_userdata('admin_user_role', $user_roles);
    }

    public function forget_password()
    {
        $this->validate_no_session();
        echo "Functionality Under development";
    }

    public function validate_active_sesion()
    {
       if(!isset($this->session->userdata('admin_user_information')->id)){
            redirect(base_url('/administration/admin/login'));
       }
    }

    public function validate_no_session()
    {
        if(isset($this->session->userdata('admin_user_information')->id)){
            redirect(base_url('/administration/admin'));
        }
    }

    public function add()
    {
        $this->validate_active_sesion();

        $first_name = $this->input->post("first_name");
        $last_name = $this->input->post("last_name");
        $email = $this->input->post("email");
        $mobile = $this->input->post("mobile");

        $address1 = $this->input->post("address_line_1");
        $address2 = $this->input->post("address_line_2");
        $country = $this->input->post("country");
        $state = $this->input->post("state");
        $city = $this->input->post("city");
        $zip_code = $this->input->post("zip_code");

        $password = md5($this->input->post("password"));
        $cpassword = md5($this->input->post("confirm_password"));

        $roles = $this->input->post("roles");

        if ($password != $cpassword) {
            $this->session->set_flashdata('error', 'Passwords & confirm password did not matched.');
            redirect(base_url('/administration/admin'));
        }

        $user = array(
            'first_name' => strtolower($first_name),
            'last_name' => strtolower($last_name),
            'email' => strtolower($email),
            'mobile' => $mobile,
            'address_line_1' => strtolower($address1),
            'address_line_2' => strtolower($address2),
            'country' => $country,
            'state' => $state,
            'city' => $city,
            'zip' => $zip_code,
            'password' => $password,
        );

        $this->Users->add($user, $roles);
        die("<br>Execution Terminated");
    }
    
    public function view($id)
    {
        $this->validate_active_sesion();

        if($id == ""){
            $this->session->set_flashdata('error', 'No Such User');
            redirect(base_url('/administration/admin/'));
        }

        // get added user data for listing
        $users = $this->Users->get_by_id($id);

        // admin account roles
        $roles = $this->Users->get_roles($id);

        $data = array(
            'title' => 'View',
            'breadcrumps' => array('Admin', 'Profile'),
            'Roles' => $roles,
            'PageData' => $users,
        );

        $this->load->view('admin/users/profile', $data);
    }
    
    public function edit($id=NULL)
    {
        $this->validate_active_sesion();

        if($id != NULL){
            $user = $this->Users->get_by_id($id);
            $roles = $this->Users->get_roles($user[0]->id);

            $user_data = array(
                'id'=>$user[0]->id,
                'first_name'=>$user[0]->first_name,
                'last_name'=>$user[0]->last_name,
                'email'=>$user[0]->email,
                'mobile'=>$user[0]->mobile,
                'address_line_1'=>$user[0]->address_line_1,
                'address_line_2'=>$user[0]->address_line_2,
                'country'=>array(
                    'id'=> $user[0]->country,
                    'name'=>get_country_name($user[0]->country)
                ),
                'state'=>array(
                    'id'=> $user[0]->state,
                    'name'=>get_state_name($user[0]->state)
                ),
                'city'=>array(
                    'id'=> $user[0]->city,
                    'name'=>get_city_name($user[0]->city)
                ),
                'zip'=>$user[0]->zip,
                'roles'=> $roles,
                'status' => $user[0]->status,
            );

            $data = array(
                'success' => true,
                'user_data' => $user_data
            );

            echo json_encode($data);
            die;
        } else {
            // form submitted
            $id = $this->input->post('user_id');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $mobile = $this->input->post('mobile');

            $address_line_1 = $this->input->post('address_line_1');
            $address_line_2 = $this->input->post('address_line_2');
            $country = $this->input->post('country');
            $state = $this->input->post('state');
            $city = $this->input->post('city');
            $zip_code = $this->input->post('zip_code');

            $old_password = md5($this->input->post("password"));
            $new_password = md5($this->input->post("confirm_password"));

            $status = $this->input->post("status");

            if ($status == "on") {
                $status = 1;
            } else {
                $status = 0;
            }

            $update_array = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'mobile' => $mobile,

                'address_line_1' => $address_line_1,
                'address_line_2' => $address_line_2,
                'country' => $country,
                'state' => $state,
                'city' => $city,
                'zip' => $zip_code,
                'status' => $status
            );

            if( ($this->input->post("password") != "") || ($this->input->post("confirm_password") != "") ){

                if(!$this->Users->validate_password($id, $old_password)) {
                    $this->session->set_flashdata('error', 'Wrong Password');
                    redirect(base_url('/administration/admin/'));
                } else {
                    $update_array['password'] = $new_password;
                }
            }

            $roles = $this->input->post("roles");
            $this->Users->update_users($update_array, $id, $roles);
        }
    }

    public function delete()
    {
        $this->Users->delete_user($this->input->post('id'));
    }

    public function app(){
        $data = array(
            'title' => 'App',
            'breadcrumps' => array('Admin', 'App Version')
        );

        $this->load->view('admin/app', $data);
    }
}
