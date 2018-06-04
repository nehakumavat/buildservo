<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer_model extends CI_Model {
    function get_customer() {
        $this->db->where('is_deleted',0);
        $query=$this->db->get('tbl_customer_profile');
        return $query->result_array();
    }
    function get_customer_by_id($id) {
        $this->db->where('customer_profile_id',$id);
        $query=$this->db->get('tbl_customer_profile');
        return $query->row_array();
    }
    function add_customer($data) {
        $this->db->trans_start();
        $this->db->insert('tbl_customer_profile', $data);
        $this->db->trans_complete();
        return true;
    }
    function edit_customer($data) {
        $this->db->trans_start();
        $this->db->where('customer_profile_id',$data['id']);
        $this->db->update('tbl_customer_profile', $data);
        $this->db->trans_complete();
        return true;
    }
    function delete_customer($id){
        $data=array('is_deleted'=>1);
        $this->db->trans_start();
        $this->db->where('customer_profile_id',$id);
        $this->db->update('tbl_customer_profile', $data);
        $this->db->trans_complete();
        return true;
        
    }
    
}
