<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _Position_Sdm extends CI_Model
{
    public function _get_all_position()
    {
        $data = $this->db->get_where('sdm_position', array('deleted' => 0));
        return ($data)->result_array();
    }
    public function _check_position($field)
    {
        $query = $this->db->get_where('sdm_position', array('position_code' => $field['position_code']), 1);
        if ($query->num_rows() > 0) {
            $data = array(
                'status' => 0,
                'message' => 'Duplicate position'
            );
        } else {
            $data = array(
                'status' => 1,
                'message' => 'Data ready'
            );
        }
        return $data;
    }
    public function _check_update_position($id, $field)
    {
        $query = $this->db->get_where('sdm_position', array('id!=' => $id, 'position_code' => $field['position_code'], 1));
        if ($query->num_rows() > 0) {
            $data = array(
                'status' => 0,
                'message' => 'Duplicate position'
            );
        } else {
            $data = array(
                'status' => 1,
                'message' => 'Data ready'
            );
        }
        return $data;
    }
    public function _insert_position($field)
    {
        $data = $this->db->insert('sdm_position', $field);
        if ($data) {
            $data = array(
                'status' => 1,
                'message' => 'Success create position'
            );
        } else {
            $data = array(
                'status' => 0,
                'message' => 'System Error'
            );
        }
        return $data;
    }
    public function _update_position($id, $field)
    {

        $this->db->where('id', $id);
        $query = $this->db->update('sdm_position', $field);
        if ($query) {
            $data = array(
                'status' => 1,
                'message' => 'Success create position'
            );
        } else {
            $data = array(
                'status' => 0,
                'message' => 'System Error'
            );
        }
        return $data;
    }
    public function _delete_position($field)
    {

        $this->db->where('id', $field['id']);
        $query = $this->db->update('sdm_position', $field);
        if ($query) {
            $data = array(
                'status' => 1,
                'message' => 'Success delete'
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

/* End of file ModelName.php */
