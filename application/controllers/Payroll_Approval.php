<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payroll_Approval extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("Login"));
        }
        $this->_check_permission();
        $this->load->model('_Payroll_Approval');
    }
    public function index()
    {
        $dataRs['all_pending_approval'] = $this->_Payroll_Approval->_get_all_pending_approval();
        $this->load->view('Payroll_approval/Index', $dataRs);
    }
    public function create()
    {
        // Here You Code for Create
    }
    public function read()
    {
        $field = array(
            'sdm_id' => $this->input->get('sdm_id'),
            'project_id' => $this->input->get('project_id'),
            'week' => $this->input->get('week')
        );
        $dataRS['sdm_absence'] = $this->_Payroll_Approval->_get_sdm_absence($field);
        $dataRS['project'] = $this->_Payroll_Approval->_get_project($field);
        $dataRS['payroll'] = $this->_Payroll_Approval->_get_payroll($field);
        $dataRS['sdm'] = $this->_Payroll_Approval->_get_sdm($field);
        $dataRS['position'] = $this->_Payroll_Approval->_get_position($field);
        $this->load->view('Payroll_approval/Read', $dataRS);
    }
    public function update()
    {
        if (isset($_POST['decline'])) {
            $data = array(
                'week' => $_POST['week'],
                'sdm_id' => $_POST['sdm_id'],
                'project_id' => $_POST['project_id'],
                'absence_note' => $_POST['absence_note'],
                'status' => -1
            );
            $dataRs = $this->_Payroll_Approval->_decline_absence($data);
            $this->_Payroll_Approval->_decline_payroll($data);
        } else {
            $data = array(
                'week' => $_GET['week'],
                'sdm_id' => $_GET['sdm_id'],
                'project_id' => $_GET['project_id'],
                'status' => 2
            );
            $dataRs = $this->_Payroll_Approval->_approve_absence($data);
            $this->_Payroll_Approval->_approve_payroll($data);
        }
        $dataRs['all_pending_approval'] = $this->_Payroll_Approval->_get_all_pending_approval();
        $this->load->view('Payroll_approval/Index', $dataRs);
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
