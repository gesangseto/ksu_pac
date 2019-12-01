<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absence_Sdm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("Login"));
        }
        $this->_check_permission();
        $this->load->model('_Absence_Sdm');
    }
    public function index()
    {
        $data['active_absence'] = $this->_Absence_Sdm->_get_active_absence();
        $this->load->view('Absence_Sdm/Index', $data);
    }
    public function create()
    {
        if (!empty($_POST)) {
            $project_id = $this->input->post('project_id', TRUE);
            $sdm_id = $this->input->post('sdm_id', TRUE);
            $start = strtotime($this->input->post('start_date', TRUE));
            $finish = strtotime($this->input->post('finish_date', TRUE));
            $week = 1;
            while ($start <= $finish) {
                if (date('D', $start) == 'Sun') {
                    $week = $week + 1;
                }
                $data = array(
                    'week' => $week,
                    'project_id' => $project_id,
                    'sdm_id' => $sdm_id,
                    'date' => date('Y-m-d', $start)
                );
                $check =  $this->_Absence_Sdm->_check_absence($data);
                if ($check['status'] == 1) {
                    $dataRs = $this->_Absence_Sdm->_insert_absence($data);
                } else {
                    $dataRs = $check;
                }
                $start = strtotime("+1 day", $start);
            }
            $dataRs['active_absence'] = $this->_Absence_Sdm->_get_active_absence();
            $this->load->view('Absence_Sdm/Index', $dataRs);
        } else if (!empty($_GET)) {
            $id = $this->input->get('project_id', TRUE);
            $data['project'] = $this->_Absence_Sdm->_get_project($id);
            $this->load->view('Absence_Sdm/Create', $data);
        } else {
            // $id = $this->input->get('project_id', TRUE);
            $data['available_project'] = $this->_Absence_Sdm->_get_available_project();
            $this->load->view('Absence_Sdm/Create', $data);
        }
        $this->load->view('Templates/Footer');
    }
    public function read()
    {
        $id = $this->input->get('id');
        $project_id = $this->input->get('project_id');
        $data['project'] = $this->_Absence_Sdm->_get_project($project_id);
        $data['sdm'] = $this->_Absence_Sdm->_get_sdm($id);
        $data['absence_week'] = $this->_Absence_Sdm->_get_absence_week($id, $project_id);
        $data['week'] = $this->_Absence_Sdm->_get_week($id, $project_id);
        $this->load->view('Absence_Sdm/Read', $data);
    }
    public function update()
    {
        if (!empty($_POST)) {
            $field = array(
                'id' => $_POST['absence_id'],
                'time_in' => $_POST['time_in'],
                'rest_start' => $_POST['rest_start'],
                'rest_finish' => $_POST['rest_finish'],
                'time_out' => $_POST['time_out'],
                'loan_amount' => $_POST['loan_amount'],
                'loan_description' =>  $_POST['loan_description']
            );
            $this->db->where('id', $_POST['absence_id']);
            $this->db->update('sdm_absence', $field);
            echo '<script type="text/javascript"> alert("Success create absen"); window.history.go(-1); </script>';
        } else {
            $id = $this->input->get('project_id', TRUE);
            $data['project'] = $this->_Absence_Sdm->_get_project($id);
            $this->load->view('Absence_Sdm/Update', $data);
        }
    }
    public function delete()
    {
        $field = $_GET;
        $data = $this->_Absence_Sdm->_delete_absence($field);
        $data['active_absence'] = $this->_Absence_Sdm->_get_active_absence();
        $this->load->view('Absence_Sdm/Index', $data);
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
