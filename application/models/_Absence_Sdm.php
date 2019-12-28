<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _Absence_Sdm extends CI_Model
{

    public function _get_available_project()
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
         FROM project AS A JOIN customer AS B ON A.customer_id = B.id WHERE A.deleted=0 AND A.status != 'Finish'";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_customer($id)
    {
        $data = $this->db->get_where('customer', array('id' => $id, 'deleted' => 0));
        return ($data)->result_array();
    }
    public function _get_all_customer()
    {
        $data = $this->db->get_where('customer', array('deleted' => 0));
        return ($data)->result_array();
    }
    public function _get_project($id)
    {
        $query = "SELECT B.id as id, B.nik as nik, B.fullname as fullname, B.phone_number as phone_number, A.project_name AS project_name, A.id AS project_id, A.project_address AS project_address, A.project_price AS project_price, A.project_description AS project_description, A.start_date AS start_date, A.finish_date AS finish_date, A.status AS status, C.fullname AS project_owner 
        FROM project AS A JOIN customer AS B ON A.customer_id = B.id JOIN customer AS C ON A.customer_id = C.id 
            WHERE A.id = $id";

        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_active_absence()
    {
        $query = "SELECT B.id AS sdm_id,B.fullname AS fullname,B.phone_number as phone_number, C.project_name AS project_name ,C.id AS project_id ,C.status AS status,D.fullname as project_owner
        FROM `sdm_absence` AS A JOIN sdm_user AS B ON A.sdm_id = B.id JOIN project AS C ON A.project_id = C.id JOIN  customer AS D ON C.customer_id = D.id
        WHERE A.deleted =0 AND B.deleted=0 AND A.status =0 AND C.status='Running'
        GROUP BY A.sdm_id";
        $data = $this->db->query($query);
        return ($data)->result_array();
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
    public function _insert_absence($field)
    {
        $query = $this->db->insert('sdm_absence', $field);
        if ($query) {
            $data = array('status' => 1, 'message' => 'Absence added');
        } else {
            $data = array('status' => 0, 'message' => 'Failed create absence');
        }
        return $data;
    }
    public function _check_absence($field)
    {
        $query = $this->db->get_where('sdm_absence', array('project_id' => $field['project_id'], 'sdm_id' => $field['sdm_id'], 'date' => $field['date']));
        if ($query->num_rows() > 0) {
            $data = array('status' => 0, 'message' => 'Duplicate absence');
        } else {
            $data = array('status' => 1, 'message' => 'Ready absence');
        }
        return $data;
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
         FROM project AS A JOIN customer AS B ON A.customer_id = B.id";

        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_sdm_uniq()
    {
        $query = "SELECT DISTINCT(B.fullname) AS fullname ,B.id AS sdm_id, B.phone_number AS phone_number   
        FROM sdm_absence AS A JOIN sdm_user AS B ON A.sdm_id = B.id 
        WHERE A.deleted=0";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_absence($id)
    {
        $query = "SELECT  * FROM `sdm_position` as A JOIN sdm_user as B ON A.id=B.position_id where B.id=$id";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_sdm($id)
    {
        $query = "SELECT  * FROM `sdm_position` as A JOIN sdm_user as B ON A.id=B.position_id where B.id=$id";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_absence_week($id, $project_id)
    {
        $query = "SELECT * FROM `sdm_absence` WHERE deleted =0 AND sdm_id = $id AND project_id = $project_id";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _get_week($id, $project_id)
    {
        $query = "SELECT A.week as week,A.absence_note as absence_note,A.status AS status , A.status AS color FROM `sdm_absence` AS A JOIN sdm_user AS B ON A.sdm_id = B.id JOIN project AS C ON A.project_id = C.id JOIN  customer AS D ON C.customer_id = D.id
        WHERE A.deleted =0 AND A.sdm_id = $id AND A.project_id = $project_id
        GROUP BY A.week";
        $data = $this->db->query($query);
        return ($data)->result_array();
    }
    public function _delete_absence($field)
    {
        $delete = array('deleted' => 1);
        $this->db->where(array('sdm_id' => $field['sdm_id'], 'project_id' => $field['project_id']));
        $query = $this->db->update('sdm_absence', $delete);
        if ($query) {
            $data = array(
                'status' => 1,
                'message' => 'Delete success'
            );
        } else {
            $data = array(
                'status' => 0,
                'message' => 'Delete failed system error'
            );
        }
        return ($data);
    }
}

/* End of file ModelName.php */
