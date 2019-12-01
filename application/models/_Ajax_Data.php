<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _Ajax_Data extends CI_Model
{
    public function _get_sdm($filter)
    {
        $this->db->like('id', $filter);
        $this->db->or_like('nik', $filter);
        $this->db->or_like('fullname', $filter);
        $query = $this->db->get_where('sdm_user', array('deleted' => 0));
        if ($query->num_rows() == 0) {
            $data = array(
                'status' => 0,
                'message' => 'Data Not found'
            );
            return $data;
        } else {
            return $query->result_array();
        }
    }
    public function _get_customer($filter)
    {
        $this->db->like('id', $filter);
        $this->db->or_like('nik', $filter);
        $this->db->or_like('fullname', $filter);
        $query = $this->db->get_where('customer', array('deleted' => 0));
        if ($query->num_rows() == 0) {
            $data = array(
                'status' => 0,
                'message' => 'Data Not found'
            );
            return $data;
        } else {
            return $query->result_array();
        }
    }
    public function _get_project($filter)
    {
        $query = $this->db->get_where('project', array('deleted' => 0, 'id' => $filter));
        if ($query->num_rows() == 0) {
            $data = array(
                'status' => 0,
                'message' => 'Data Not found'
            );
            return $data;
        } else {
            return $query->result_array();
        }
    }
    public function _get_position($filter)
    {
        $this->db->like('id', $filter);
        $this->db->or_like('position_code', $filter);
        $this->db->or_like('position_name', $filter);
        $query = $this->db->get_where('sdm_position', array('deleted' => 0));
        if ($query->num_rows() == 0) {
            $data = array(
                'status' => 0,
                'message' => 'Data Not found'
            );
            return $data;
        } else {
            return $query->result_array();
        }
    }
}
