<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function validate($username, $password) {
        $this->db->select('BaseTbl.id,BaseTbl.name,BaseTbl.username,BaseTbl.password,BaseTbl.type,BaseTbl.status,BaseTbl.privileges,BaseTbl.adminfile');
        $this->db->from('tbl_admin as BaseTbl');
        $this->db->where('BaseTbl.username', $username);
        $this->db->where('BaseTbl.password', $password);
        $this->db->where('BaseTbl.status', 1);

        $query = $this->db->get();

        return $query->result();
    }
    public function validate_admin($username, $password) {
        
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));// admin@123
        $query = $this->db->get('tbl_admin');
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
        
    }
    public function login_validate($data) {
        
        $this->db->where('customer_email', $data['customer_email']);
        $this->db->where('customer_password', md5($data['customer_password']));
        $query = $this->db->get('tbl_customer_profile');
        if($query->num_rows() == 1){
            $result=$query->row_array();
            return $result;
        }else{
            return false;
        }
        
    }
    public function get_contact() {
        $query = $this->db->get('tbl_contact_us');
        return $query->result_array();
    }
    public function delete_contact($id){
        //$data=array('is_deleted'=>1);
        $this->db->trans_start();
        $this->db->where('id',$id);
        $this->db->delete('tbl_contact_us');
        $this->db->trans_complete();
        return true;
        
    }
    public function get_feedback() {
        $this->db->select('f.*,e.*,c.*');
        $this->db->from('tbl_feedback f');
        $this->db->join('tbl_employee e','e.id=f.employee_id');
        $this->db->join('tbl_customer_profile c','c.customer_profile_id=f.customer_id');
        $this->db->order_by("feedback_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_feedback_by_id($id){
        $this->db->where('feedback_id',$id);
        $query = $this->db->get('tbl_feedback');
        return $query->row_array();
    }

    public function get_feedback_customer_id($customer_id) {
        $this->db->select('f.*,e.*');
        $this->db->from('tbl_feedback f');
        $this->db->join('tbl_employee e','e.id=f.employee_id');
        $this->db->where('f.customer_id',$customer_id);
        $this->db->order_by("feedback_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    function add_feedback($data) {
        $this->db->trans_start();
        $this->db->insert('tbl_feedback', $data);
        $this->db->trans_complete();
        return true;
    }

}
