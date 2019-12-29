<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Project extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("Login"));
        }
        $this->_check_permission();
        $this->load->model('_Project');
    }
    public function index()
    {
        $data['all_project'] = $this->_Project->_get_all_project();
        $this->load->view('Project/Index', $data);
    }
    public function create()
    {
        if (!empty($_POST)) {
            $data = $_POST;
            $this->db->insert('Project', $data);
            $data = array(
                "status" => 1,
                "message" => "Success Add User"
            );
            $data['all_project'] = $this->_Project->_get_all_project();
            $this->load->view('Project/Index', $data);
        } else if (!empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            $data['customer'] = $this->_Project->_get_customer($id);
            $this->load->view('Project/Create', $data);
        } else {
            $data['all_customer'] = $this->_Project->_get_all_customer();
            $this->load->view('Project/Create', $data);
        }
        $this->load->view('Templates/Footer');
    }
    public function read()
    {

        $id = $this->input->get('id');
        $data['project'] = $this->_Project->_get_project($id);
        $data['customer'] = $this->_Project->_get_customer($id);
        $data['absence'] = $this->_Project->_get_absence($id);
        $data['uniq'] = $this->_Project->_get_sdm_uniq($id);

        $this->load->view('Project/Read', $data);
    }
    public function update()
    {
        if (!empty($_GET['req_approval'])) {

            $id = $this->input->get('project_id');
            $field = array(
                'id' => $id,
                'status' => 'Pending Approval'
            );
            $dataRs = $this->_Project->_update_status_project($field);
            $dataRs['all_project'] = $this->_Project->_get_all_project();
            $this->load->view('Project/Index', $dataRs);
        } else if (!empty($_GET['running'])) {

            $id = $this->input->get('project_id');
            $field = array(
                'id' => $id,
                'status' => 'Running'
            );
            $dataRs = $this->_Project->_update_status_project($field);
            $dataRs['all_project'] = $this->_Project->_get_all_project();
            $this->load->view('Project/Index', $dataRs);
        } else if (!empty($_GET['finishing'])) {

            $id = $this->input->get('project_id');
            $field = array(
                'id' => $id,
                'status' => 'Finish'
            );
            $dataRs = $this->_Project->_update_status_project($field);
            $dataRs['all_project'] = $this->_Project->_get_all_project();
            $this->load->view('Project/Index', $dataRs);
        } else if (!empty($_GET['id'])) {
            $id = $this->input->get('id');
            $data['all_customer'] = $this->_Project->_get_all_customer();
            $data['project'] = $this->_Project->_get_project($id);
            $this->load->view('Project/Update', $data);
        } else {
            $data = $_POST;
            $dataRs = $this->_Project->_update_project($data);
            $dataRs['all_project'] = $this->_Project->_get_all_project();
            $this->load->view('Project/Index', $dataRs);
        }
    }
    public function delete()
    {
        $id = $this->input->get('id', TRUE);
        if ($this->_Project->_delete_project($id)) {
            $data = array(
                'status' => '1',
                'message' => 'Success delete'
            );
        }
        $data['all_project'] = $this->_Project->_get_all_project();
        $this->load->view('Project/Index', $data);
    }

    private function _check_permission()
    {
        $this->load->model('_BaseRole');
        $permission = $this->_BaseRole->_check_permission();
        $controller = $this->router->fetch_class();
        $method = strtolower($this->router->fetch_method());
        foreach ($permission as $row) {
            if ($row['access_map'] == $controller) {
                $auth = array(
                    'index' => '1',
                    'create' => $row['create'],
                    'read' => $row['read'],
                    'update' => $row['update'],
                    'delete' => $row['delete']
                );
            }
        }
        if ($auth[$method] == 1) {
            $this->load->model('_BaseRole');
            $header['data'] = $this->_BaseRole->_check_permission();
            $this->load->view('Templates/Header', $header);
            return TRUE;
        } else {
            echo '<script type="text/javascript"> alert("Access Denied"); window.location.href = "' . site_url("$controller") . '"; </script>';
            die;
            return FALSE;
        }
    }
}

/* End of Index Controllername.php */
