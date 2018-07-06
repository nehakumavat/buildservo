<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog_model extends CI_Model {

    function get_blog() {
        $this->db->order_by('id','desc');
        $query=$this->db->get('tbl_blogs');
        return $query->result_array();
    }
    function get_blog_by_id($id) {
        $this->db->where('id',$id);
        $query=$this->db->get('tbl_blogs');
        return $query->row_array();
    }
    function add_blog($data) {
        $this->db->trans_start();
        $this->db->insert('tbl_blogs', $data);
        $this->db->trans_complete();
        return true;
    }
    function edit_blog($data) {
        $this->db->trans_start();
        $this->db->where('id',$data['id']);
        $this->db->update('tbl_blogs', $data);
        $this->db->trans_complete();
        return true;
    }
    function delete_blog($id){
        $this->db->trans_start();
        $this->db->delete('tbl_blogs',['id'=>$id]);
        $this->db->trans_complete();
        return true;
        
    }

}
