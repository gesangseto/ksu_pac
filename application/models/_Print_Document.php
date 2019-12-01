<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _Print_Document extends CI_Model
{

    public function _print_payroll_sdm($field)
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
}

/* End of file ModelName.php */
