<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _User_Sdm extends CI_Model
{
    public function _get_all_sdm()
    {
        $data = $this->db->get_where('sdm_user', array('deleted' => 0));
        return ($data)->result_array();
    }
    public function _get_sdm($id)
    {
        $query = "SELECT  * FROM `sdm_position` as A JOIN sdm_user as B ON A.id=B.position_id where B.id=$id";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _check_update($field)
    {
        $check_nik = $this->db->get_where('sdm_user', array('id !=' => $field['id'], 'nik' => $field['nik']));
        $check_phone = $this->db->get_where('sdm_user', array('id !=' => $field['id'], 'nik' => $field['phone_number']));
        if ($check_nik->num_rows() > 0) {
            $data = array('status' => '0', 'message' => 'Id already exist');
        } else if ($check_phone->num_rows() > 0) {
            $data = array('status' => '0', 'message' => 'Phone Number already exist');
        } else {
            $data = array('status' => '1', 'message' => 'Data ready');
        }
        return $data;
    }
    public function _update_sdm($field)
    {
        $this->db->where('id', $field['id']);
        $query = $this->db->update('sdm_user', $field);
        if ($query == 1) {
            $data = array(
                'status' => '1',
                'message' => 'success update data'
            );
        } else {
            $data = array(
                'status' => '0',
                'message' => 'system error'
            );
        }
        return $data;
    }
    public function _delete_sdm($id)
    {
        $field = array(
            'deleted' => 1
        );
        $this->db->where('id', $id);
        $query = $this->db->update('sdm_user', $field);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function _get_all_position()
    {
        $data = $this->db->get_where('sdm_position', array('deleted' => 0));
        return ($data)->result_array();
    }
}

/* End of file ModelName.php */
