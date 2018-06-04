<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Designation_model extends CI_Model {

    function get_designation() {
        $query=$this->db->get('tbl_designation');
        return $query->result_array();
    }
    function get_designation_by_id($id) {
        $this->db->where('id',$id);
        $query=$this->db->get('tbl_designation');
        return $query->row_array();
    }
    function add_designation($data) {
        $this->db->trans_start();
        $this->db->insert('tbl_designation', $data);
        $this->db->trans_complete();
        return true;
    }
    function edit_designation($data) {
        $this->db->trans_start();
        $this->db->where('id',$data['id']);
        $this->db->update('tbl_designation', $data);
        $this->db->trans_complete();
        return true;
    }
    function delete_designation($id){
        $this->db->trans_start();
        $this->db->where('id',$id);
        $this->db->delete('tbl_designation');
        $this->db->trans_complete();
        return true;
        
    }
    
}
