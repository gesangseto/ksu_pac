<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _Payroll_Sdm extends CI_Model
{
    public function _get_absence($week, $sdm_id, $project_id)
    {
        $query = $this->db->get_where('sdm_absence', array('week' => $week, 'sdm_id' => $sdm_id, 'project_id' => $project_id));
        return $query->result_array();
    }
    public function _get_position($field)
    {
        $query = $this->db->get_where('sdm_position', array('id' => $field['position_id']));
        return $query->result_array();
    }
    public function _insert_payroll($field)
    {
        $this->db->insert('sdm_payroll', $field);
    }
    public function _check_payroll($field)
    {
        $query = $this->db->get_where('sdm_payroll', array('week' => $field['week'], 'sdm_id' => $field['sdm_id'], 'project_id' => $field['project_id']), 1);
        if ($query->num_rows() > 0) {
            $data = array('status' => 0, 'message' => 'Duplicate Payroll');
        } else {
            $data = array('status' => 1, 'message' => 'Ready');
        }
        return $data;
    }
    public function _update_absence($field)
    {
        $isi = array(
            'status' => 1
        );
        $this->db->where(array('week' => $field['week'], 'sdm_id' => $field['sdm_id'], 'project_id' => $field['project_id']));
        $query = $this->db->update('sdm_absence', $isi);
        if ($query) {
            $data = array('status' => 1, 'message' => 'Success');
        } else {
            $data = array('status' => 0, 'message' => 'Error system');
        }
        return $data;
    }
    public function _update_payroll($field)
    {
        $this->db->where(array('week' => $field['week'], 'sdm_id' => $field['sdm_id'], 'project_id' => $field['project_id']));
        $query = $this->db->update('sdm_payroll', $field);
        if ($query) {
            $data = array('status' => 1, 'message' => 'Success');
        } else {
            $data = array('status' => 0, 'message' => 'Error system');
        }
        return $data;
    }
    public function _get_all_payroll()
    {
        $query = $this->db->query("
        SELECT 
        A.id AS payroll_id,
        A.week AS week,
        D.id AS position_id,
        A.sdm_id AS sdm_id,
        A.project_id AS project_id,
        B.fullname AS fullname,
        C.project_name AS project_name,
        E.fullname AS project_owner,
        A.periode AS periode,
        A.status AS status 
        FROM `sdm_payroll` AS A 
        JOIN sdm_user AS B ON A.sdm_id = B.id 
        JOIN project AS C ON A.project_id = C.id 
        JOIN sdm_position AS D ON A.position_id = D.id 
        JOIN customer AS E ON E.id = C.customer_id       
        WHERE A.deleted=0 AND A.status!='Paid'");
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
        } else {
            $data = array('status' => 0, 'message' => 'Nodata');
        }
        return $data;
    }
    public function _get_sdm_absence($field)
    {
        $query = $this->db->get_where('sdm_absence', array('deleted' => 0, 'week' => $field['week'], 'sdm_id' => $field['sdm_id'], 'project_id' => $field['project_id']));
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
        } else {
            $data = array('status' => 0, 'message' => 'Nodata');
        }
        return $data;
    }
    public function _get_project($field)
    {
        $id = $field['project_id'];
        $query = "SELECT B.id as id, B.nik as nik, B.fullname as fullname, B.phone_number as phone_number, A.project_name AS project_name, A.id AS project_id, A.project_address AS project_address, A.project_price AS project_price, A.project_description AS project_description, A.start_date AS start_date, A.finish_date AS finish_date, A.status AS status, C.fullname AS project_owner 
        FROM project AS A JOIN customer AS B ON A.customer_id = B.id JOIN customer AS C ON A.customer_id = C.id 
            WHERE A.id = $id AND A.deleted=0";

        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_payroll($field)
    {
        $query = $this->db->get_where('sdm_payroll  ', array('deleted' => 0, 'week' => $field['week'], 'sdm_id' => $field['sdm_id'], 'project_id' => $field['project_id']));
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
        } else {
            $data = array('status' => 0, 'message' => 'Nodata');
        }
        return $data;
    }
    public function _get_sdm($field)
    {
        $id = $field['sdm_id'];
        $query = "SELECT  * FROM `sdm_position` as A JOIN sdm_user as B ON A.id=B.position_id where B.id=$id";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _confirmation_payroll($field)
    {
        $value = array('status' => 'Paid');
        $this->db->where(array('week' => $field['week'], 'sdm_id' => $field['sdm_id'], 'project_id' => $field['project_id']));
        $query = $this->db->update('sdm_payroll', $value);
        if ($query) {
            $data = array(
                'status' => 1,
                'message' => 'Success finishing payroll'
            );
        } else {
            $data = array(
                'status' => 0,
                'message' => 'System Error'
            );
        }
        return $data;
    }
    public function _confirmation_absence($field)
    {
        $value = array('status' => 3);
        $this->db->where(array('week' => $field['week'], 'sdm_id' => $field['sdm_id'], 'project_id' => $field['project_id']));
        $query = $this->db->update('sdm_absence', $value);
        if ($query) {
            $data = array(
                'status' => 1,
                'message' => 'Success finishing payroll'
            );
        } else {
            $data = array(
                'status' => 0,
                'message' => 'System Error'
            );
        }
        return $data;
    }
}
