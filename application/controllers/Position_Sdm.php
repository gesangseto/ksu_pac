<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Position_Sdm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("Login"));
        }
        $this->_check_permission();
        $this->load->model('_Position_Sdm');
    }
    public function index()
    {
        $data['all_position'] = $this->_Position_Sdm->_get_all_position();
        $this->load->view('Position_Sdm/Index', $data);
    }
    public function create()
    {
        $field = $_POST;
        $check =  $this->_Position_Sdm->_check_position($field);
        if ($check['status'] == 0) {
            $dataRs = $check;
        } else {
            $dataRs = $this->_Position_Sdm->_insert_position($field);
        }
        $dataRs['all_position'] = $this->_Position_Sdm->_get_all_position();
        $this->load->view('Position_Sdm/Index', $dataRs);
    }
    public function read()
    {
        // Here You Code for Read
    }
    public function update()
    {

        $id = $_POST['id'];
        $field = array(
            'position_code' => $_POST['position_code'],
            'position_name' => $_POST['position_name'],
            'position_salary' => $_POST['position_salary'],
            'workspace' => $_POST['workspace']
        );
        $check =  $this->_Position_Sdm->_check_update_position($id, $field);
        if ($check['status'] == 0) {
            $dataRs = $check;
        } else {
            $dataRs = $this->_Position_Sdm->_update_position($id, $field);
        }
        $dataRs['all_position'] = $this->_Position_Sdm->_get_all_position();
        $this->load->view('Position_Sdm/Index', $dataRs);
    }
    public function delete()
    {
        $field = array(
            'id' => $_GET['id'],
            'deleted' => 1
        );
        $data = $this->_Position_Sdm->_delete_position($field);
        $data['all_position'] = $this->_Position_Sdm->_get_all_position();
        $this->load->view('Position_Sdm/Index', $data);
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
