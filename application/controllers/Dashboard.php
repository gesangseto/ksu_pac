<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("Login"));
        }
        $this->load->model('_BaseRole');
        $header['data'] = $this->_BaseRole->_check_permission();
        $this->load->view('Templates/Header', $header);
        $this->load->model('_Dashboard');
    }


    public function index()
    {
        $data['all_project'] = $this->_Dashboard->_get_all_project();
        $data['all_running_project'] = $this->_Dashboard->_get_all_running_project();
        $this->load->view('Dashboard/Index', $data);
        $this->load->view('Templates/Footer');
    }
}

/* End of Index Controllername.php */
