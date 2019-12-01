<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("Login"));
        }
        $this->_check_permission();
        $this->load->model('_Customer');
    }
    public function index()
    {
        $data['all_customer'] = $this->_Customer->_get_all_customer();
        $this->load->view('Customer/Index', $data);
    }
    public function create()
    {
        $datetime = strtotime(date('Y-m-d H:i:s'));
        if (empty($this->input->post('nik'))) {
            $this->load->view('Customer/Create');
        } else {
            $nik = $this->input->post('nik', TRUE);
            $phone_number = $this->input->post('phone_number', TRUE);
            $query = $this->db->query("SELECT * FROM `customer` WHERE `nik` = '$nik' OR `phone_number`='$phone_number'");
            if ($query->num_rows() >= 1) {
                $data = array(
                    "status" => "0",
                    "message" => "Nik or Phone number already exist"
                );
                $this->load->view('Customer/Create', $data);
            } else {
                $data = $_POST;
                $this->db->insert('Customer', $data);
                $data = array(
                    "status" => 1,
                    "message" => "Success Add User"
                );
                $data['all_customer'] = $this->_Customer->_get_all_customer();
                $this->load->view('Customer/Index', $data);
            }
        }
        $this->load->view('Templates/Footer');
    }
    public function read()
    {

        $id = $this->input->get('id');
        $data['customer'] = $this->_Customer->_get_customer($id);
        $data['project'] = $this->_Customer->_get_project($id);
        $this->load->view('Customer/Read', $data);
    }
    public function update()
    {
        if (empty($this->input->post('nik'))) {
            $id = $this->input->get('id');
            $data['customer'] = $this->_Customer->_get_customer($id);
            $this->load->view('Customer/Update', $data);
        } else {
            $data = $_POST;
            $check = $this->_Customer->_check_update($data);
            if ($check['status'] == 1) {
                $dataRs = $this->_Customer->_update_customer($data);
            } else {
                $dataRs = $check;
            }
            $dataRs['all_customer'] = $this->_Customer->_get_all_customer();
            $this->load->view('Customer/Index', $dataRs);
        }
    }
    public function delete()
    {
        $id = $this->input->get('id', TRUE);
        if ($this->_Customer->_delete_customer($id)) {
            $data = array(
                'status' => '1',
                'message' => 'Success delete'
            );
        }
        $data['all_customer'] = $this->_Customer->_get_all_customer();
        $this->load->view('Customer/Index', $data);
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
