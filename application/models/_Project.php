<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _Project extends CI_Model
{
    public function _get_absence($id)
    {
        $query = "SELECT *
         FROM sdm_absence AS A JOIN sdm_user AS B ON A.sdm_id = B.id WHERE A.deleted=0 AND B.deleted=0 AND A.project_id=$id ";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_sdm_uniq($id)
    {
        $query = "SELECT B.fullname AS fullname ,B.id AS sdm_id, B.phone_number AS phone_number   
        FROM sdm_absence AS A JOIN sdm_user AS B ON A.sdm_id = B.id 
        WHERE A.deleted=0 AND B.deleted =0 AND A.project_id=$id GROUP BY A.sdm_id";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_all_project()
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
         FROM project AS A JOIN customer AS B ON A.customer_id = B.id WHERE A.deleted=0";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_customer($id)
    {
        $data = $this->db->get_where('customer', array('id' => $id));
        return ($data)->result_array();
    }
    public function _get_all_customer()
    {
        $data = $this->db->get_where('customer', array('deleted' => 0));
        return ($data)->result_array();
    }
    public function _get_project($id)
    {
        $query = "SELECT  * FROM project AS A JOIN customer AS B ON A.customer_id = B.id WHERE A.id = $id";

        $data = $this->db->query($query);
        return ($data)->result_array();
    }

    public function _update_project($field)
    {
        $this->db->where('id', $field['id']);
        $query = $this->db->update('project', $field);
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
    public function _get_all_sdm($id)
    {
        $query =  $this->db->get_where('sdm_user', array('id' => $id));
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function _delete_project($id)
    {
        $field = array(
            'deleted' => 1
        );
        $this->db->where('id', $id);
        $query = $this->db->update('project', $field);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function _req_approval_project($id)
    {
        $field = array(
            'status' => 'Pending Approval'
        );
        $this->db->where('id', $id);
        $query = $this->db->update('project', $field);
if ($query) {
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
}

/* End of file ModelName.php */
