<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Permission extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("Login"));
        }
        $this->_check_permission();
        $this->load->model('_Permission');
    }
    public function index()
    {
        $data['user'] = $this->_Permission->_view_all_role();
        $data['all_user'] = $this->_Permission->_view_all_user();
        $this->load->view('Permission/Index', $data);
        $this->load->view('Templates/Footer');
    }
    public function create()
    {
        $access_map_id = $_POST['access_map_id'];
        $user_id = $_POST['user_id'];
        if (empty($_POST['create'])) {
            $create = 0;
        } else {
            $create = 1;
        }
        if (empty($_POST['read'])) {
            $read = 0;
        } else {
            $read = 1;
        }
        if (empty($_POST['update'])) {
            $update = 0;
        } else {
            $update = 1;
        }
        if (empty($_POST['delete'])) {
            $delete = 0;
        } else {
            $delete = 1;
        }
        $data = array(
            'access_map_id' => $access_map_id,
            'admin_id' => $user_id,
            'create' => $create,
            'read' => $read,
            'update' => $update,
            'delete' => $delete,
        );
        $check = $this->_Permission->_check_role($data);
        if ($check['status'] == 0) {
            $dataRs = $check;
        } else {
            $dataRs = $this->_Permission->_create_permission($data);
        }
        $dataRs['user_info'] = $this->_Permission->_view_user($user_id);
        $dataRs['user_role'] = $this->_Permission->_view_user_role($user_id);
        $dataRs['access_map'] = $this->_Permission->_view_access_map();
        $dataRs['parent_map'] = $this->_Permission->_view_parent_map();
        $this->load->view('Permission/Read', $dataRs);
        $this->load->view('Templates/Footer');
    }
    public function read()
    {
        $id = $this->input->get('id', TRUE);
        $data['user_info'] = $this->_Permission->_view_user($id);
        $data['user_role'] = $this->_Permission->_view_user_role($id);
        $data['access_map'] = $this->_Permission->_view_access_map();
        $data['parent_map'] = $this->_Permission->_view_parent_map();
        $this->load->view('Permission/Read', $data);
        $this->load->view('Templates/Footer');
    }
    public function update()
    {
        $role_id = $_POST['role_id'];
        $user_id = $_POST['user_id'];
        if (empty($_POST['create'])) {
            $create = 0;
        } else {
            $create = 1;
        }
        if (empty($_POST['read'])) {
            $read = 0;
        } else {
            $read = 1;
        }
        if (empty($_POST['update'])) {
            $update = 0;
        } else {
            $update = 1;
        }
        if (empty($_POST['delete'])) {
            $delete = 0;
        } else {
            $delete = 1;
        }
        $data = array(
            'create' => $create,
            'read' => $read,
            'update' => $update,
            'delete' => $delete,
        );
        $dataRs = $this->_Permission->_update_role($role_id, $data);
        $dataRs['user_info'] = $this->_Permission->_view_user($user_id);
        $dataRs['user_role'] = $this->_Permission->_view_user_role($user_id);
        $data['access_map'] = $this->_Permission->_view_access_map();
        $data['parent_map'] = $this->_Permission->_view_parent_map();
        $this->load->view('Permission/Read', $dataRs);
        $this->load->view('Templates/Footer');
        // Here You Code for Update
    }
    public function delete()
    {
        $role_id = $_GET['role_id'];
        $user_id = $_GET['user_id'];
        $this->db->delete('user_role', array('id' => $role_id));
        $dataRs = array(
            'status' => '1',
            'message' => 'delete success'
        );
        $dataRs['user_info'] = $this->_Permission->_view_user($user_id);
        $dataRs['user_role'] = $this->_Permission->_view_user_role($user_id);
        $dataRs['access_map'] = $this->_Permission->_view_access_map();
        $dataRs['parent_map'] = $this->_Permission->_view_parent_map();
        $this->load->view('Permission/Read', $dataRs);
        $this->load->view('Templates/Footer');


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
