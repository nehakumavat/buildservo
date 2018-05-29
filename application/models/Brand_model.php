<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Brand_model extends CI_Model
{
   function add_brand($brand_data)
   {
   		$this->db->trans_start();
      $this->db->insert('tbl_brands', $brand_data);

      $insert_id = $this->db->insert_id();

      $this->db->trans_complete();

      return $insert_id;
   }
   function brands()
   {
   		$query = $this->db->query("SELECT * from tbl_brands");
		  return $query->result();
   }
   public function delete_brand($id)
   {
   		return $this->db->delete('tbl_brands',['brand_id'=>$id]);
   }
   
}

  