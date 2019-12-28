<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _Project_Approval extends CI_Model
{
    public function _get_all_project_approval()
    {
        $query = $this->db->query("SELECT 
        A.id AS cust_id,
        B.id AS project_id,
        A.fullname AS cust_name,
        B.project_name AS project_name,
        B.project_address AS project_address,
        B.start_date AS start_date,
        B.finish_date AS finish_date,
        B.status AS status,
        B.project_price AS project_price
        FROM `customer` AS A
        JOIN `project` AS B ON B.customer_id = A.id
        WHERE B.deleted =0 AND B.status = 'Pending Approval'
        ");
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
        } else {
            $data = array('status' => 0, 'message' => 'Nodata');
        }
        return $data;
    }
    public function _get_customer($field)
    {
        $id = $field['cust_id'];
        $query = $this->db->get_where('customer', array('id' => $id));
        if ($query) {
            $data = $query->result_array();
        } else {
            $data = array('status' => 0, 'message' => 'Nodata');
        }
        return $data;
    }
    public function _get_project($field)
    {
        $id = $field['project_id'];
        $query = $this->db->get_where('project', array('id' => $id));
        if ($query) {
            $data = $query->result_array();
        } else {
            $data = array('status' => 0, 'message' => 'Nodata');
        }
        return $data;
    }
    public function _get_absence($field)
    {
        $id = $field['project_id'];
        $query = "SELECT *
         FROM sdm_absence AS A JOIN sdm_user AS B ON A.sdm_id = B.id WHERE A.deleted=0 AND B.deleted=0 AND A.project_id=$id ";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_sdm_uniq($field)
    {
        $id = $field['project_id'];
        $query = "SELECT B.fullname AS fullname ,B.id AS sdm_id, B.phone_number AS phone_number   
        FROM sdm_absence AS A JOIN sdm_user AS B ON A.sdm_id = B.id 
        WHERE A.deleted=0 AND B.deleted =0 AND A.project_id=$id GROUP BY A.sdm_id";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _update_status_project($field)
    {
        $this->db->where(array('id' => $field['id']));
        $query =  $this->db->update('project', $field);
        if ($query) {
            $data = array('status' => 1, 'message' => 'Success Update');
        } else {
            $data = array('status' => 0, 'message' => 'System error');
        }
        return $data;
    }
}
