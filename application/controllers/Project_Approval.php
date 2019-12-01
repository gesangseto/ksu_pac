<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Project_Approval extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("Login"));
        }
        $this->_check_permission();
        $this->load->model('_Project_Approval');
    }
    public function index()
    {
        $dataRs['all_project_pending'] = $this->_Project_Approval->_get_all_project_approval();
        $this->load->view('Project_Approval/Index', $dataRs);
    }
    public function create()
    {
        // Here You Code for Create
    }
    public function read()
    {
        $field = array(
            'cust_id' => $this->input->get('cust_id'),
            'project_id' => $this->input->get('project_id')
        );
        $dataRs['customer'] = $this->_Project_Approval->_get_customer($field);
        $dataRs['project'] = $this->_Project_Approval->_get_project($field);
        $dataRs['absence'] = $this->_Project_Approval->_get_absence($field);
        $dataRs['uniq'] = $this->_Project_Approval->_get_sdm_uniq($field);
        $this->load->view('Project_Approval/Read', $dataRs);
    }
    public function update()
    {
        if (isset($_POST['decline'])) {
            $data = array(
                'id' => $_POST['project_id'],
                'project_note' => $_POST['project_note'],
                'status' => 'Decline'
            );
            $dataRs = $this->_Project_Approval->_decline_project($data);
        } else {
            $data = array(
                'project_id' => $_GET['project_id'],
                'status' => 'Running'
            );
            $dataRs = $this->_Payroll_Approval->_approve_absence($data);
            $this->_Payroll_Approval->_approve_payroll($data);
        }
        $dataRs['all_project_pending'] = $this->_Project_Approval->_get_all_project_approval();
        $this->load->view('Project_approval/Index', $dataRs);
    }
    public function delete()
    {
        // Here You Code for Delete
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
