<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

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

}
