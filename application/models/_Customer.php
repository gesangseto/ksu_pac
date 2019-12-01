<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _Customer extends CI_Model
{
    public function _get_all_customer()
    {
        $data = $this->db->get_where('customer', array('deleted' => 0));
        return ($data)->result_array();
    }
    public function _get_project($id)
    {
        $query = "SELECT 
        B.id as id,
        B.nik as nik,
        B.fullname as fullname,
        B.phone_number as phone_number,
        A.project_name AS project_name,
        A.id AS project_id,
        A.project_address AS project_address,
        A.project_price AS project_price,
        A.project_description AS project_description,
        A.start_date AS start_date,
        A.finish_date AS finish_date,
        A.status AS status
         FROM project AS A JOIN customer AS B ON A.customer_id = B.id WHERE B.id=$id AND A.deleted=0";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_customer($id)
    {
        $data = $this->db->get_where('customer', array('id' => $id));
        return ($data)->result_array();
    }
    public function _check_update($field)
    {
        $check_nik = $this->db->get_where('customer', array('id !=' => $field['id'], 'nik' => $field['nik']));
        $check_phone = $this->db->get_where('customer', array('id !=' => $field['id'], 'nik' => $field['phone_number']));
        if ($check_nik->num_rows() > 0) {
            $data = array('status' => '0', 'message' => 'Id already exist');
        } else if ($check_phone->num_rows() > 0) {
            $data = array('status' => '0', 'message' => 'Phone Number already exist');
        } else {
            $data = array('status' => '1', 'message' => 'Data ready');
        }
        return $data;
    }
    public function _update_customer($field)
    {
        $this->db->where('id', $field['id']);
        $query = $this->db->update('customer', $field);
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
    public function _delete_customer($id)
    {
        $field = array(
            'deleted' => 1
        );
        $this->db->where('id', $id);
        $query = $this->db->update('customer', $field);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

/* End of file ModelName.php */
