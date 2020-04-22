<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Responsibilitites');
        $this->load->model('admin/Roles');
        $this->load->helper('admin_helper');
    }

    public function index()
    {
        $responsibilities = $this->Responsibilitites->get_all(array('deleted_at' => null));
        $roles = $this->Roles->get_all(array('deleted_at' => null));

        $page_data = array();
        $i = 0;
        foreach ($roles as $value) {
            $responsibility = get_responsibility_id($value->id);
            $page_data[$i]['id'] = $value->id;
            $page_data[$i]['name'] = $value->name;
            $page_data[$i]['description'] = $value->description;
            $page_data[$i]['status'] = $value->status;

            $j = 0;
            foreach ($responsibility as $v) {
                $page_data[$i]['responsiblities'][$j] = $v->responsibility_id;
                $j++;
            }

            $i++;
        }
        $data = array(
            'title' => 'Add New Role',
            'breadcrumps' => array('Roles', 'Add New'),
            'responsibilities' => $responsibilities,
            'roles' => $page_data,
        );

        $this->load->view('admin/roles/manager', $data);
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

        $roles = array(
            'name' => $name,
            'description' => $description,
            'status' => $status,
        );

        $this->Roles->add($roles, $this->input->post('responsibilities'));
        die("<br>Execution Terminated");
    }

    public function view_responsibility()
    {
        $IDs = $this->input->post('ids');
        $responsibilities = $this->Roles->view_responsibility($IDs);
        echo json_encode(array(
            'success' => true,
            'responsibilities' => $responsibilities,
        ));
        die;
    }

    public function edit($id=NULL){
        if($id != NULL){
            $roles = $this->Roles->get_by_id($id);
            $responsibility = get_responsibility_id($roles[0]->id);

            $roles_details = array(
                'id'=>$roles[0]->id,
                'name'=>$roles[0]->name,
                'description'=>$roles[0]->description,
                'status'=>$roles[0]->status,
                'responsibility'=> $responsibility
            );

            $data = array(
                'success' => true,
                'role_data' => $roles_details
            );

            echo json_encode($data);
            die;
        } else {
            // when form is submitted
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
            );
            $this->Roles->update_role($updates, $this->input->post('role_id'), $this->input->post('responsibilities'));
        }
    }

    function delete(){
        $this->Roles->delete_role($this->input->post('id'));
    }
}
