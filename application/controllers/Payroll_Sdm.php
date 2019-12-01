<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payroll_Sdm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("Login"));
        }
        $this->_check_permission();
        $this->load->model('_Payroll_Sdm');
    }
    public function index()
    {
        $data['all_payroll'] = $this->_Payroll_Sdm->_get_all_payroll();
        $this->load->view('Payroll_Sdm/Index', $data);
    }

    public function create()
    {

        if (isset($_GET['recreate'])) {
            $value = array(
                'week' => $_GET['week'],
                'sdm_id' => $_GET['sdm_id'],
                'project_id' => $_GET['project_id'],
                'position_id' => $_GET['position_id'],
                'periode' => $_GET['periode']
            );
            $response = $this->hitung($value);
            $dataRs = $this->_Payroll_Sdm->_update_payroll($response);
            $this->_Payroll_Sdm->_update_absence($response);
        } else {
            $value = array(
                'week' => $_GET['week'],
                'sdm_id' => $_GET['sdm_id'],
                'project_id' => $_GET['project_id'],
                'position_id' => $_GET['position_id'],
                'periode' => $_GET['periode']
            );
            $response = $this->hitung($value);
            $check = $this->_Payroll_Sdm->_check_payroll($response);
            if ($check['status'] == 1) {
                $dataRs = $this->_Payroll_Sdm->_insert_payroll($response);
                $this->_Payroll_Sdm->_update_absence($response);
            } else {
                $dataRs = $check;
            }
        }

        $dataRs['all_payroll'] = $this->_Payroll_Sdm->_get_all_payroll();
        $this->load->view('Payroll_Sdm/Index', $dataRs);
    }
    public function read()
    {
        if (isset($_GET['print'])) { }
    }
    public function update()
    {
        if (isset($_GET['confirmation'])) {

            $field = array(
                'week' => $_GET['week'],
                'sdm_id' => $_GET['sdm_id'],
                'project_id' => $_GET['project_id'],
                'position_id' => $this->input->get('position_id')
            );
            $dataRs = $this->_Payroll_Sdm->_confirmation_payroll($field);
            $dataRs = $this->_Payroll_Sdm->_confirmation_absence($field);
        }
        $dataRs['sdm_absence'] = $this->_Payroll_Sdm->_get_sdm_absence($field);
        $dataRs['project'] = $this->_Payroll_Sdm->_get_project($field);
        $dataRs['payroll'] = $this->_Payroll_Sdm->_get_payroll($field);
        $dataRs['sdm'] = $this->_Payroll_Sdm->_get_sdm($field);
        $dataRs['position'] = $this->_Payroll_Sdm->_get_position($field);
        $this->load->view('Payroll_Sdm/Read', $dataRs);
    }
    public function delete()
    {
        // Here You Code for Delete
    }
    private function hitung($value)
    {
        $check_absence = $this->_Payroll_Sdm->_get_absence($value['week'], $value['sdm_id'], $value['project_id']);
        $check_position = $this->_Payroll_Sdm->_get_position($value);
        $working_time = 0;
        $loan_amount = 0;
        $position_salary = $check_position[0]['position_salary'];
        foreach ($check_absence as $row) {
            $in = date('H.i', strtotime($row['time_in']));
            $out = date('H.i', strtotime($row['time_out']));
            $rest_finish = date('H.i', strtotime($row['rest_finish']));
            $rest_start = date('H.i', strtotime($row['rest_start']));
            $working_time = $working_time + ($out - $in) - ($rest_finish - $rest_start);
            $loan_amount = $loan_amount + $row['loan_amount'];
        }
        $gross_income = $working_time * $position_salary;
        $net_income = $gross_income - $loan_amount;
        $field = array(
            'week' => $value['week'],
            'periode' => $value['periode'],
            'sdm_id' => $value['sdm_id'],
            'project_id' => $value['project_id'],
            'position_id' => $value['position_id'],
            'gross_income' => $gross_income,
            'working_time' => $working_time,
            'net_income' => $net_income,
            'loan_amount' => $loan_amount,
            'position_salary' => $position_salary,
            'status' => 'Pending Approval'
        );
        return ($field);
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
