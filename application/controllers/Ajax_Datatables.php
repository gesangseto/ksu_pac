<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_Datatables extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("Login"));
        }
        $this->load->model('_Ajax_Datatables');
    }
    function get_data_user_admin()
    {
        $BaseData = array(
            'table' => 'user_admin',
            'column_order' => array(null, 'username', 'email', 'password'),
            'column_search' => array('username', 'email', 'password'),
            'order' => array('id' => 'asc')
        );
        $list = $this->_Ajax_Datatables->get_datatables($BaseData);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->username;
            $row[] = $field->email;
            $row[] = $field->create_time;
            $row[] = $field->update_time;
            $row[] = '
        <button onclick="hapus(' . $field->id . ')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            <a href="' . site_url('User_Admin/Update') . '?id=' . $field->id . '" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
            <a href="' . site_url('User_Admin/Read') . '?id=' . $field->id . '" class="btn btn-success"><i class="fa fa-search"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->_Ajax_Datatables->count_all($BaseData),
            "recordsFiltered" => $this->_Ajax_Datatables->count_filtered($BaseData),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function get_data_user_sdm()
    {
        $BaseData = array(
            'table' => 'sdm_user',
            'column_order' => array(null, 'nik', 'fullname', 'phone_number', 'address'),
            'column_search' => array('nik', 'fullname', 'phone_number', 'address'),
            'order' => array('id' => 'asc')
        );
        $list = $this->_Ajax_Datatables->get_datatables($BaseData);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($field->deleted == 0) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->nik;
                $row[] = $field->fullname;
                $row[] = $field->phone_number;
                $row[] = $field->address;
                $row[] = $field->create_time;
                $row[] = '
            <button onclick="hapus(' . $field->id . ')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                <a href="' . site_url('User_Sdm/Update') . '?id=' . $field->id . '" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                <a href="' . site_url('User_Sdm/Read') . '?id=' . $field->id . '" class="btn btn-success"><i class="fa fa-search"></i></a>';
                $data[] = $row;
            }
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->_Ajax_Datatables->count_all($BaseData),
            "recordsFiltered" => $this->_Ajax_Datatables->count_filtered($BaseData),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    function get_data_customer()
    {
        $BaseData = array(
            'table' => 'customer',
            'column_order' => array(null, 'nik', 'fullname', 'phone_number', 'address'),
            'column_search' => array('nik', 'fullname', 'phone_number', 'address'),
            'order' => array('id' => 'asc')
        );
        $list = $this->_Ajax_Datatables->get_datatables($BaseData);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($field->deleted == 0) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->nik;
                $row[] = $field->fullname;
                $row[] = $field->phone_number;
                $row[] = $field->address;
                $row[] = $field->create_time;
                $row[] = '
            <button onclick="hapus(' . $field->id . ')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                <a href="' . site_url('Customer/Update') . '?id=' . $field->id . '" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                <a href="' . site_url('Customer/Read') . '?id=' . $field->id . '" class="btn btn-success"><i class="fa fa-search"></i></a>';
                $data[] = $row;
            }
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->_Ajax_Datatables->count_all($BaseData),
            "recordsFiltered" => $this->_Ajax_Datatables->count_filtered($BaseData),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    function get_data_project()
    {
        $BaseData = array(
            'table' => 'project',
            'column_order' => array(null, 'id', 'project_name', 'project_address', 'start_date', 'finish_date', 'status'),
            'column_search' => array('id', 'project_name', 'project_address', 'start_date', 'finish_date', 'status'),
            'order' => array('id' => 'asc')
        );
        $list = $this->_Ajax_Datatables->get_datatables($BaseData);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($field->deleted == 0) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->id;
                $row[] = $field->project_name;
                $row[] = $field->project_address;
                $row[] = $field->start_date;
                $row[] = $field->finish_date;
                $row[] = $field->status;
                if ($field->status == 'New' || $field->status == 'Decline') {
                    $row[] = '
            <button onclick="hapus(' . $field->id . ')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                <a href="' . site_url('Project/Update') . '?id=' . $field->id . '" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                <a href="' . site_url('Project/Read') . '?id=' . $field->id . '" class="btn btn-success"><i class="fa fa-search"></i></a>';
                } else {
                    $row[] = '
                <a href="' . site_url('Project/Update') . '?id=' . $field->id . '" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                <a href="' . site_url('Project/Read') . '?id=' . $field->id . '" class="btn btn-success"><i class="fa fa-search"></i></a>';
                }
                $data[] = $row;
            }
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->_Ajax_Datatables->count_all($BaseData),
            "recordsFiltered" => $this->_Ajax_Datatables->count_filtered($BaseData),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}

/* End of file Login.php */
