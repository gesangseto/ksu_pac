<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_Sdm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("Login"));
        }
        $this->_check_permission();
        $this->load->model('_User_Sdm');
    }
    public function index()
    {
        $data['all_sdm'] = $this->_User_Sdm->_get_all_sdm();
        $this->load->view('User_Sdm/Index', $data);
    }
    public function create()
    {

        if (empty($this->input->post('nik'))) {
            $data['all_position'] = $this->_User_Sdm->_get_all_position();
            $this->load->view('User_Sdm/Create', $data);
        } else {
            $nik = $this->input->post('nik', TRUE);
            $phone_number = $this->input->post('phone_number', TRUE);
            $query = $this->db->query("SELECT * FROM `sdm_user` WHERE `nik` = '$nik' OR `phone_number`='$phone_number'");
            if ($query->num_rows() >= 1) {
                $data = array(
                    "status" => "0",
                    "message" => "Nik or Phone number already exist"
                );
                $this->load->view('User_Sdm/Create', $data);
            } else {
                $data = $_POST;
                $this->db->insert('sdm_user', $data);
                $data = array(
                    "status" => 1,
                    "message" => "Success Add User"
                );
                $data['all_sdm'] = $this->_User_Sdm->_get_all_sdm();
                $this->load->view('User_Sdm/Index', $data);
            }
        }
        $this->load->view('Templates/Footer');
    }
    public function read()
    {

        $id = $this->input->get('id');
        $data['sdm'] = $this->_User_Sdm->_get_sdm($id);
        $this->load->view('User_Sdm/Read', $data);
    }
    public function update()
    {
        if (empty($this->input->post('nik'))) {
            $id = $this->input->get('id');
            $data['all_position'] = $this->_User_Sdm->_get_all_position();
            $data['sdm'] = $this->_User_Sdm->_get_sdm($id);
            $this->load->view('User_Sdm/Update', $data);
        } else {
            $data = $_POST;
            $check = $this->_User_Sdm->_check_update($data);
            if ($check['status'] == 1) {
                $dataRs = $this->_User_Sdm->_update_sdm($data);
            } else {
                $dataRs = $check;
            }
            $dataRs['all_sdm'] = $this->_User_Sdm->_get_all_sdm();
            $this->load->view('User_Sdm/Index', $dataRs);
        }
    }
    public function delete()
    {
        $id = $this->input->get('id', TRUE);
        if ($this->_User_Sdm->_delete_sdm($id)) {
            $data = array(
                'status' => '1',
                'message' => 'Success delete'
            );
        }
        $data['all_sdm'] = $this->_User_Sdm->_get_all_sdm();
        $this->load->view('User_Sdm/Index', $data);
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
