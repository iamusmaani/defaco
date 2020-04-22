<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Responsibility extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Responsibilitites');
    }

    public function index()
    {
        // get list data
        $responsibilities = $this->Responsibilitites->get_all(array('deleted_at' => NULL));

        $data = array(
            'title' => 'Responsibility Management',
            'breadcrumps' => array('Responsibility'),
            'responsibilities' => $responsibilities,
        );
        $this->load->view('admin/responsibility/manager', $data);
    }

    public function add()
    {
        $name = $this->input->post("name");
        $description = $this->input->post("description");
        $status = $this->input->post("status");

        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $insertion_data = array(
            'name' => $name,
            'description' => $description,
            'status' => $status,
        );

        $this->Responsibilitites->add($insertion_data);
        die("<br>Execution Terminated");
    }

    public function get_responsibility_data()
    {
        $responsibility = $this->Responsibilitites->get_by_id($this->input->post('id'));
        echo json_encode($responsibility[0]);
        die;
    }

    public function edit()
    {
        $id = $this->input->post("id");
        $name = $this->input->post("name");
        $description = $this->input->post("description");
        $status = $this->input->post("status");

        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }

        $updates = array(
            'name' => $name,
            'description' => $description,
            'status' => $status,
            'updated_at' => date('Y-m-d h:i:s')
        );

        $res = $this->Responsibilitites->update($updates, array('id' => $id));

        if($res){
            echo json_encode(array('success'=>1));
        }
        die("<br>Execution Terminated");
    }

    public function delete(){
        $id = $this->input->post("id");
        $this->Responsibilitites->delete($id);
    }
}
