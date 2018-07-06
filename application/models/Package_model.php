<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Package_model extends CI_Model {

    function get_package() {
        $query=$this->db->get('tbl_package');
        return $query->result_array();
    }
    function get_package_by_id($id) {
        $this->db->where('package_id',$id);
        $query=$this->db->get('tbl_package');
        return $query->row_array();
    }
    function add_package($data) {
        $this->db->trans_start();
        $this->db->insert('tbl_package', $data);
        $this->db->trans_complete();
        return true;
    }
    function edit_package($data) {
        $this->db->trans_start();
        $this->db->where('package_id',$data['package_id']);
        $this->db->update('tbl_package', $data);
        $this->db->trans_complete();
        return true;
    }
    function delete_package($id){
        $this->db->delete('tbl_package',['package_id'=>$id]);
        return true;
        
    }

}
