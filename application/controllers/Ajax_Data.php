<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("Login"));
        }
        $this->load->model('_Ajax_Data');
    }
    public function search_sdm()
    {
        $filter = $this->input->get('filter');
        $sdm = $this->_Ajax_Data->_get_sdm($filter);
        echo '<label>Nama Sdm</label>';
        echo '<select name="sdm_id" required class="form-control">';
        if (isset($sdm['status'])) {
            echo '<option value="">' . $sdm['message'] . '</option>';
        } else {

            foreach ($sdm as $row) {
                echo '<option value="' . $row["id"] . '">' . $row["fullname"] . '</option>';
            }
        }
        echo '</select>';
    }
    public function search_customer()
    {
        $filter = $this->input->get('filter');
        $sdm = $this->_Ajax_Data->_get_customer($filter);
        echo '<label>Nama Customer</label>';
        echo '<select name="customer_id" required class="form-control">';
        if (isset($sdm['status'])) {
            echo '<option value="">' . $sdm['message'] . '</option>';
        } else {

            foreach ($sdm as $row) {
                echo '<option value="' . $row["id"] . '">' . $row["fullname"] . '</option>';
            }
        }
        echo '</select>';
    }
    public function project_autofill()
    {
        $filter = $this->input->get('id');
        $project = $this->_Ajax_Data->_get_project($filter);
        // print_r($project);
        echo '<div class="col-md-6">';
        echo '<label>Keterangan Project </label>';
        echo '<textarea type="text" readonly required class="form-control">' . $project[0]['project_description'] . '</textarea>';
        echo '</div>';
        echo '<div class="col-md-3">';
        echo '<label>Start Date </label>';
        echo '<input type="date" name="start_date" required value="' . $project[0]['start_date'] . '" class="form-control">';
        echo '</div>';
        echo '<div class="col-md-3">';
        echo '<label>Finish Date</label>';
        echo '<input type="date" name="finish_date" required value="' . $project[0]['finish_date'] . '" class="form-control">';
        echo '</div>';
        echo '<div class="col-md-12">';
        echo '<label>Alamat</label>';
        echo '<textarea required readonly class="form-control">' . $project[0]['project_address'] . '</textarea>';
        echo '</div>';
    }
    public function search_position()
    {
        $filter = $this->input->get('filter');
        $sdm = $this->_Ajax_Data->_get_position($filter);
        echo '<label>Jabatan</label>';
        echo '<select name="position_id" required class="form-control">';
        if (isset($sdm['status'])) {
            echo '<option value="">' . $sdm['message'] . '</option>';
        } else {

            foreach ($sdm as $row) {
                echo '<option value="' . $row["id"] . '">' . $row["position_name"] . ' - ' . $row["position_code"] . '</option>';
            }
        }
        echo '</select>';
    }
}

/* End of Index Controllername.php */
