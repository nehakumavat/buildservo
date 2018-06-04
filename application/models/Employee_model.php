<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_model extends CI_Model {

    function get_employee() {
        $this->db->where('is_deleted',0);
        $query=$this->db->get('tbl_employee');
        return $query->result_array();
    }
    function get_employee_by_id($id) {
        $this->db->where('id',$id);
        $query=$this->db->get('tbl_employee');
        return $query->row_array();
    }
    function add_employee($data) {
        $this->db->trans_start();
        $this->db->insert('tbl_employee', $data);
        $this->db->trans_complete();
        return true;
    }
    function edit_employee($data) {
        $this->db->trans_start();
        $this->db->where('id',$data['id']);
        $this->db->update('tbl_employee', $data);
        $this->db->trans_complete();
        return true;
    }
    function delete_employee($id){
        $data=array('is_deleted'=>1);
        $this->db->trans_start();
        $this->db->where('id',$id);
        $this->db->update('tbl_employee', $data);
        $this->db->trans_complete();
        return true;
        
    }

}
