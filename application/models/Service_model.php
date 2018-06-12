<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Service_model extends CI_Model {

    function get_service() {
        $this->db->where('is_deleted',0);
        $query=$this->db->get('tbl_service');
        return $query->result_array();
    }
    function get_service_by_id($id) {
        $this->db->where('id',$id);
        $query=$this->db->get('tbl_service');
        return $query->row_array();
    }
    function add_service($data) {
        $this->db->trans_start();
        $this->db->insert('tbl_service', $data);
        $this->db->trans_complete();
        return true;
    }
    function edit_service($data) {
        $this->db->trans_start();
        $this->db->where('id',$data['id']);
        $this->db->update('tbl_service', $data);
        $this->db->trans_complete();
        return true;
    }
    function delete_service($id){
        $data=array('is_deleted'=>1);
        $this->db->trans_start();
        $this->db->where('id',$id);
        $this->db->update('tbl_service', $data);
        $this->db->trans_complete();
        return true;
        
    }
    function book_service($data) {
        $this->db->trans_start();
        $this->db->insert('tbl_selected_services', $data);
        $this->db->trans_complete();
        return true;
    }
    function get_selected_service() {
        $query=$this->db->get('tbl_selected_services');
        return $query->result_array();
    }
    function get_selected_service_by_customer_id($customer_id) {
        $this->db->where('customer_id',$customer_id);
        $query=$this->db->get('tbl_selected_services');
        return $query->result_array();
    }
    function get_selected_service_by_id($id) {
        $this->db->where('id',$id);
        $query=$this->db->get('tbl_selected_services');
        return $query->row_array();
    }
    function update_selected_service_status($data) {
        $this->db->trans_start();
        $this->db->where('id',$data['id']);
        $this->db->update('tbl_selected_services', $data);
        $this->db->trans_complete();
        return true;
    }
}
